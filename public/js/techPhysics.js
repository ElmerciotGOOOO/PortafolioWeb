// ============================================
// PHYSICS SIMULATION - TECH ICONS (OPTIMIZED)
// - Visibility-based culling (pauses when not visible)
// - 30 FPS physics (reduced from 60)
// - Cached values for better performance
// - Minimal shadow effects
// ============================================

(function () {
    'use strict';

    const container = document.getElementById('techPhysicsContainer');
    const canvas = document.getElementById('techPhysicsCanvas');
    if (!container || !canvas) return;

    // Visibility state
    let isVisible = false;
    let animationId = null;

    // Tech logos - LOCAL + CDN IMAGES
    const techLogos = [
        // Local images
        { url: 'img/visualcode.webp', color: '#007ACC' },
        { url: 'img/python.webp', color: '#3776AB' },
        { url: 'img/ddsadasdsa.png', color: '#E34F26' },
        { url: 'img/css.webp', color: '#1572B6' },
        { url: 'img/js.webp', color: '#F7DF1E' },
        // CDN icons
        { url: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg', color: '#777BB4' },
        { url: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg', color: '#FF2D20' },
        { url: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg', color: '#61DAFB' },
        // Additional logos
        { url: 'https://registry.npmmirror.com/@lobehub/icons-static-png/latest/files/dark/gemini-color.png', color: '#8E75B2' },
        { url: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/unity/unity-original.svg', color: '#AAAAAA' },
        { url: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg', color: '#4479A1' },
        { url: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg', color: '#F05032' },
        { url: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg', color: '#339933' },
        { url: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg', color: '#3178C6' },
        { url: 'img/logoempresa.webp', color: '#6366f1' }
    ];

    // Cached values
    const loadedImages = [];
    const LOGO_COUNT = techLogos.length;
    let imagesReady = 0;
    let physicsInitialized = false;
    let engine, bodies, walls, ctx, width, height;

    // Constants (cached for performance) - BIGGER ICONS
    const BOX_SIZE = 56;
    const HALF_BOX = BOX_SIZE / 2;
    const IMG_SIZE = BOX_SIZE - 12;
    const HALF_IMG = IMG_SIZE / 2;
    const BORDER_RADIUS = 10;
    const WALL_T = 50;

    // Preload images with lazy loading
    function preloadImages() {
        techLogos.forEach((logo, i) => {
            const img = new Image();
            img.crossOrigin = 'anonymous';
            img.onload = () => { loadedImages[i] = img; imagesReady++; tryInit(); };
            img.onerror = () => { loadedImages[i] = null; imagesReady++; tryInit(); };
            img.src = logo.url;
        });
    }

    // Delay image loading slightly
    setTimeout(preloadImages, 100);
    setTimeout(() => tryInit(true), 2500);

    function tryInit(force = false) {
        if (physicsInitialized) return;
        if (force || imagesReady >= 5) {
            physicsInitialized = true;
            initPhysics();
            setupVisibilityObserver();
        }
    }

    // Visibility Observer - Pauses physics when not visible
    function setupVisibilityObserver() {
        const observer = new IntersectionObserver((entries) => {
            const entry = entries[0];
            if (entry.isIntersecting && !isVisible) {
                isVisible = true;
                startPhysicsLoop();
            } else if (!entry.isIntersecting && isVisible) {
                isVisible = false;
                stopPhysicsLoop();
            }
        }, { threshold: 0.05 });

        observer.observe(container);
    }

    function startPhysicsLoop() {
        if (animationId) return;
        lastTime = performance.now();
        animationId = requestAnimationFrame(update);
    }

    function stopPhysicsLoop() {
        if (animationId) {
            cancelAnimationFrame(animationId);
            animationId = null;
        }
    }

    let lastTime = 0;
    // 30 FPS for physics (more efficient)
    const FPS_INTERVAL = 1000 / 30;

    function initPhysics() {
        const { Engine, Bodies, Composite, Mouse, MouseConstraint, Events } = Matter;

        width = container.offsetWidth || 280;
        height = container.offsetHeight || 350;
        canvas.width = width;
        canvas.height = height;

        engine = Engine.create({
            gravity: { x: 0, y: 0.35 },
            positionIterations: 3,
            velocityIterations: 2
        });

        const cols = 4;
        const spacing = 62;
        const startX = (width - cols * spacing) / 2 + spacing / 2;
        const startY = 35;

        bodies = [];
        for (let i = 0; i < LOGO_COUNT; i++) {
            const x = startX + (i % cols) * spacing;
            const y = startY + Math.floor(i / cols) * spacing;

            const body = Bodies.rectangle(x, y, BOX_SIZE, BOX_SIZE, {
                chamfer: { radius: BORDER_RADIUS },
                restitution: 0.4,
                friction: 0.3,
                frictionAir: 0.02,
                slop: 0.02
            });
            body.techIndex = i;
            body.borderColor = techLogos[i].color;
            bodies.push(body);
        }

        Composite.add(engine.world, bodies);

        walls = [
            Bodies.rectangle(width / 2, height + WALL_T / 2, width + WALL_T * 2, WALL_T, { isStatic: true }),
            Bodies.rectangle(-WALL_T / 2, height / 2, WALL_T, height + WALL_T * 2, { isStatic: true }),
            Bodies.rectangle(width + WALL_T / 2, height / 2, WALL_T, height + WALL_T * 2, { isStatic: true }),
            Bodies.rectangle(width / 2, -WALL_T / 2, width + WALL_T * 2, WALL_T, { isStatic: true })
        ];
        Composite.add(engine.world, walls);

        const mouse = Mouse.create(canvas);
        const mouseConstraint = MouseConstraint.create(engine, {
            mouse: mouse,
            constraint: { stiffness: 0.08, render: { visible: false } }
        });
        Composite.add(engine.world, mouseConstraint);

        Events.on(mouseConstraint, 'startdrag', () => canvas.style.cursor = 'grabbing');
        Events.on(mouseConstraint, 'enddrag', () => canvas.style.cursor = 'grab');

        ctx = canvas.getContext('2d', { alpha: true });
        canvas.style.cursor = 'grab';

        // Throttled resize handler
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(handleResize, 300);
        }, { passive: true });
    }

    function handleResize() {
        width = container.offsetWidth;
        height = container.offsetHeight;
        canvas.width = width;
        canvas.height = height;
        Matter.Body.setPosition(walls[0], { x: width / 2, y: height + WALL_T / 2 });
        Matter.Body.setPosition(walls[1], { x: -WALL_T / 2, y: height / 2 });
        Matter.Body.setPosition(walls[2], { x: width + WALL_T / 2, y: height / 2 });
        Matter.Body.setPosition(walls[3], { x: width / 2, y: -WALL_T / 2 });
    }

    function update(timestamp) {
        if (!isVisible) {
            animationId = null;
            return;
        }

        const elapsed = timestamp - lastTime;

        if (elapsed >= FPS_INTERVAL) {
            lastTime = timestamp - (elapsed % FPS_INTERVAL);

            Matter.Engine.update(engine, 33.33);

            ctx.clearRect(0, 0, width, height);

            // Batch render all bodies
            for (let j = 0; j < bodies.length; j++) {
                const body = bodies[j];
                const pos = body.position;

                // Skip if outside viewport
                if (pos.x < -BOX_SIZE || pos.x > width + BOX_SIZE ||
                    pos.y < -BOX_SIZE || pos.y > height + BOX_SIZE) {
                    // Respawn
                    Matter.Body.setPosition(body, { x: width / 2, y: 25 });
                    Matter.Body.setVelocity(body, { x: (Math.random() - 0.5) * 2, y: 0 });
                    continue;
                }

                const angle = body.angle;
                const i = body.techIndex;
                const img = loadedImages[i];
                const color = body.borderColor;

                ctx.save();
                ctx.translate(pos.x, pos.y);
                ctx.rotate(angle);

                // Draw box
                ctx.beginPath();
                ctx.roundRect(-HALF_BOX, -HALF_BOX, BOX_SIZE, BOX_SIZE, BORDER_RADIUS);
                ctx.fillStyle = 'rgba(12, 12, 20, 0.92)';
                ctx.fill();

                // Border with minimal glow
                ctx.strokeStyle = color;
                ctx.lineWidth = 1.5;
                ctx.stroke();

                // Draw image
                if (img) {
                    ctx.drawImage(img, -HALF_IMG, -HALF_IMG, IMG_SIZE, IMG_SIZE);
                }

                ctx.restore();
            }
        }

        animationId = requestAnimationFrame(update);
    }
})();
