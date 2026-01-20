// === THREE.JS 3D EARTH GLOBE - Optimized for Performance ===
(function initEarthGlobe() {
    const canvas = document.getElementById('earthGlobe');
    if (!canvas) return;

    const CONFIG = {
        size: 120,
        cameraZ: 2.5,
        earthRadius: 1,
        cloudRadius: 1.02,
        atmosphereRadius: 1.15,
        markerRadius: 1.03,
        textureSize: { w: 1024, h: 512 },
        cloudSize: { w: 512, h: 256 }
    };

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(45, 1, 0.1, 1000);
    camera.position.z = CONFIG.cameraZ;

    const renderer = new THREE.WebGLRenderer({
        canvas,
        alpha: true,
        antialias: true,
        powerPreference: "high-performance"
    });
    renderer.setSize(CONFIG.size, CONFIG.size);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

    const earthCanvas = document.createElement('canvas');
    earthCanvas.width = CONFIG.textureSize.w;
    earthCanvas.height = CONFIG.textureSize.h;
    const ctx = earthCanvas.getContext('2d');

    const oceanGradient = ctx.createRadialGradient(512, 256, 0, 512, 256, 600);
    oceanGradient.addColorStop(0, '#1e90ff');
    oceanGradient.addColorStop(0.3, '#0077be');
    oceanGradient.addColorStop(0.6, '#005a9e');
    oceanGradient.addColorStop(1, '#003366');
    ctx.fillStyle = oceanGradient;
    ctx.fillRect(0, 0, 1024, 512);

    for (let i = 0; i < 15; i++) {
        const x = Math.random() * 1024, y = Math.random() * 512;
        const grad = ctx.createRadialGradient(x, y, 0, x, y, 100);
        grad.addColorStop(0, 'rgba(30, 144, 255, 0.2)');
        grad.addColorStop(1, 'transparent');
        ctx.fillStyle = grad;
        ctx.fillRect(0, 0, 1024, 512);
    }

    const SHADOW = { color: 'rgba(34, 139, 34, 0.5)', blur: 5 };
    const drawContinent = (points, fill = '#228B22', stroke = '#32CD32') => {
        ctx.fillStyle = fill;
        ctx.strokeStyle = stroke;
        ctx.lineWidth = 2;
        ctx.shadowColor = SHADOW.color;
        ctx.shadowBlur = SHADOW.blur;
        ctx.beginPath();
        ctx.moveTo(points[0].x, points[0].y);
        for (let i = 1; i < points.length; i++) ctx.lineTo(points[i].x, points[i].y);
        ctx.closePath();
        ctx.fill();
        ctx.stroke();
        ctx.shadowBlur = 0;
    };

    drawContinent([
        { x: 180, y: 50 }, { x: 280, y: 40 }, { x: 320, y: 80 },
        { x: 300, y: 130 }, { x: 260, y: 150 }, { x: 210, y: 140 },
        { x: 185, y: 100 }, { x: 170, y: 70 }
    ], '#2E8B57', '#3CB371');

    drawContinent([
        { x: 240, y: 145 }, { x: 275, y: 150 }, { x: 280, y: 180 },
        { x: 265, y: 195 }, { x: 235, y: 180 }
    ], '#228B22', '#32CD32');

    ctx.fillStyle = '#228B22';
    ctx.strokeStyle = '#32CD32';
    ctx.lineWidth = 2;
    ctx.shadowColor = 'rgba(34, 139, 34, 0.5)';
    ctx.shadowBlur = 5;
    ctx.beginPath();
    ctx.moveTo(180, 180);
    ctx.lineTo(350, 175);
    ctx.lineTo(365, 270);
    ctx.lineTo(340, 350);
    ctx.lineTo(290, 390);
    ctx.lineTo(220, 350);
    ctx.lineTo(180, 280);
    ctx.closePath();
    ctx.fill();
    ctx.stroke();
    ctx.shadowBlur = 0;

    drawContinent([
        { x: 480, y: 55 }, { x: 540, y: 50 }, { x: 560, y: 85 },
        { x: 540, y: 110 }, { x: 500, y: 115 }, { x: 470, y: 90 }
    ], '#2E8B57', '#3CB371');

    drawContinent([
        { x: 490, y: 120 }, { x: 560, y: 115 }, { x: 580, y: 180 },
        { x: 560, y: 260 }, { x: 520, y: 290 }, { x: 480, y: 250 },
        { x: 470, y: 180 }
    ], '#228B22', '#32CD32');

    drawContinent([
        { x: 560, y: 45 }, { x: 750, y: 40 }, { x: 820, y: 70 },
        { x: 850, y: 120 }, { x: 800, y: 160 }, { x: 700, y: 150 },
        { x: 620, y: 120 }, { x: 570, y: 90 }
    ], '#2E8B57', '#3CB371');

    drawContinent([
        { x: 680, y: 150 }, { x: 720, y: 145 }, { x: 730, y: 210 },
        { x: 700, y: 230 }, { x: 670, y: 200 }
    ], '#228B22', '#32CD32');

    drawContinent([
        { x: 820, y: 270 }, { x: 890, y: 260 }, { x: 910, y: 300 },
        { x: 880, y: 340 }, { x: 830, y: 330 }, { x: 810, y: 300 }
    ], '#2E8B57', '#3CB371');

    const earthTexture = new THREE.CanvasTexture(earthCanvas);
    earthTexture.anisotropy = renderer.capabilities.getMaxAnisotropy();

    const earthGeometry = new THREE.SphereGeometry(1, 64, 64);
    const earthMaterial = new THREE.MeshStandardMaterial({
        map: earthTexture,
        roughness: 0.7,
        metalness: 0.1
    });

    const earth = new THREE.Mesh(earthGeometry, earthMaterial);
    earth.rotation.y = 1.5;
    scene.add(earth);

    const cloudCanvas = document.createElement('canvas');
    cloudCanvas.width = 512;
    cloudCanvas.height = 256;
    const cloudCtx = cloudCanvas.getContext('2d');

    for (let i = 0; i < 25; i++) {
        const x = Math.random() * 512;
        const y = Math.random() * 256;
        const size = Math.random() * 35 + 15;
        const gradient = cloudCtx.createRadialGradient(x, y, 0, x, y, size);
        gradient.addColorStop(0, 'rgba(255, 255, 255, 0.35)');
        gradient.addColorStop(1, 'transparent');
        cloudCtx.fillStyle = gradient;
        cloudCtx.beginPath();
        cloudCtx.ellipse(x, y, size, size * 0.4, Math.random() * Math.PI, 0, Math.PI * 2);
        cloudCtx.fill();
    }

    const cloudTexture = new THREE.CanvasTexture(cloudCanvas);
    const cloudMaterial = new THREE.MeshStandardMaterial({
        map: cloudTexture,
        transparent: true,
        opacity: 0.35,
        depthWrite: false
    });
    const clouds = new THREE.Mesh(new THREE.SphereGeometry(1.02, 32, 32), cloudMaterial);
    earth.add(clouds);

    const atmosphereGeometry = new THREE.SphereGeometry(1.15, 64, 64);
    const atmosphereMaterial = new THREE.ShaderMaterial({
        vertexShader: `
            varying vec3 vNormal;
            void main() {
                vNormal = normalize(normalMatrix * normal);
                gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
            }
        `,
        fragmentShader: `
            varying vec3 vNormal;
            void main() {
                float intensity = pow(0.6 - dot(vNormal, vec3(0.0, 0.0, 1.0)), 2.0);
                vec3 atmosphereColor = vec3(0.3, 0.6, 1.0);
                gl_FragColor = vec4(atmosphereColor, intensity * 0.6);
            }
        `,
        blending: THREE.AdditiveBlending,
        side: THREE.BackSide,
        transparent: true
    });
    const atmosphere = new THREE.Mesh(atmosphereGeometry, atmosphereMaterial);
    scene.add(atmosphere);

    const lat = 55 * (Math.PI / 180);
    const lon = 10 * (Math.PI / 180);

    const markerPosition = new THREE.Vector3(
        CONFIG.markerRadius * Math.cos(lat) * Math.sin(-lon),
        CONFIG.markerRadius * Math.sin(lat),
        CONFIG.markerRadius * Math.cos(lat) * Math.cos(-lon)
    );

    const dotGeometry = new THREE.SphereGeometry(0.07, 16, 16);
    const dotMaterial = new THREE.MeshBasicMaterial({ color: 0xff2222, transparent: true });
    const dot = new THREE.Mesh(dotGeometry, dotMaterial);
    dot.position.copy(markerPosition);
    earth.add(dot);

    const ringConfigs = [
        { inner: 0.09, outer: 0.12, color: 0xff4444, opacity: 0.9 },
        { inner: 0.14, outer: 0.17, color: 0xff6666, opacity: 0.6 },
        { inner: 0.19, outer: 0.21, color: 0xff8888, opacity: 0.4 }
    ];
    const rings = [], ringMaterials = [];

    ringConfigs.forEach(cfg => {
        const geo = new THREE.RingGeometry(cfg.inner, cfg.outer, 32);
        const mat = new THREE.MeshBasicMaterial({
            color: cfg.color,
            transparent: true,
            opacity: cfg.opacity,
            side: THREE.DoubleSide
        });
        const ring = new THREE.Mesh(geo, mat);
        ring.position.copy(markerPosition);
        ring.lookAt(0, 0, 0);
        earth.add(ring);
        rings.push(ring);
        ringMaterials.push(mat);
    });

    const ambientLight = new THREE.AmbientLight(0x404060, 0.6);
    scene.add(ambientLight);

    const sunLight = new THREE.DirectionalLight(0xffffff, 1.3);
    sunLight.position.set(5, 3, 5);
    scene.add(sunLight);

    const blueLight = new THREE.PointLight(0x3b82f6, 0.4);
    blueLight.position.set(-4, 2, 3);
    scene.add(blueLight);

    let isDragging = false;
    let previousMousePosition = { x: 0, y: 0 };
    let targetRotationX = earth.rotation.x;
    let targetRotationY = earth.rotation.y;
    let autoRotate = true;
    let lastInteraction = Date.now();

    canvas.addEventListener('mousedown', (e) => {
        isDragging = true;
        autoRotate = false;
        lastInteraction = Date.now();
        previousMousePosition = { x: e.clientX, y: e.clientY };
    });

    canvas.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        const deltaX = e.clientX - previousMousePosition.x;
        const deltaY = e.clientY - previousMousePosition.y;
        targetRotationY += deltaX * 0.01;
        targetRotationX += deltaY * 0.01;
        targetRotationX = Math.max(-Math.PI / 3, Math.min(Math.PI / 3, targetRotationX));
        previousMousePosition = { x: e.clientX, y: e.clientY };
    });

    canvas.addEventListener('mouseup', () => { isDragging = false; lastInteraction = Date.now(); });
    canvas.addEventListener('mouseleave', () => { isDragging = false; });

    canvas.addEventListener('touchstart', (e) => {
        e.preventDefault();
        isDragging = true;
        autoRotate = false;
        lastInteraction = Date.now();
        const touch = e.touches[0];
        previousMousePosition = { x: touch.clientX, y: touch.clientY };
    }, { passive: false });

    canvas.addEventListener('touchmove', (e) => {
        e.preventDefault();
        if (!isDragging) return;
        const touch = e.touches[0];
        const deltaX = touch.clientX - previousMousePosition.x;
        const deltaY = touch.clientY - previousMousePosition.y;
        targetRotationY += deltaX * 0.01;
        targetRotationX += deltaY * 0.01;
        targetRotationX = Math.max(-Math.PI / 3, Math.min(Math.PI / 3, targetRotationX));
        previousMousePosition = { x: touch.clientX, y: touch.clientY };
    }, { passive: false });

    canvas.addEventListener('touchend', () => { isDragging = false; lastInteraction = Date.now(); });

    let pulsePhase = 0;
    const pulseConfigs = [
        { amplitude: 0.3, offset: 0, baseOpacity: 0.9, opacityFactor: 2 },
        { amplitude: 0.4, offset: 0.5, baseOpacity: 0.6, opacityFactor: 1 },
        { amplitude: 0.5, offset: 1, baseOpacity: 0.4, opacityFactor: 0.6 }
    ];

    function animate() {
        requestAnimationFrame(animate);

        if (!autoRotate && Date.now() - lastInteraction > 3000) autoRotate = true;

        if (autoRotate && !isDragging) targetRotationY += 0.003;

        earth.rotation.x += (targetRotationX - earth.rotation.x) * 0.08;
        earth.rotation.y += (targetRotationY - earth.rotation.y) * 0.08;

        clouds.rotation.y += 0.0005;

        pulsePhase += 0.04;
        rings.forEach((ring, i) => {
            const cfg = pulseConfigs[i];
            const pulse = 1 + Math.sin(pulsePhase - cfg.offset) * cfg.amplitude;
            ring.scale.set(pulse, pulse, 1);
            ringMaterials[i].opacity = cfg.baseOpacity - (pulse - 1) * cfg.opacityFactor;
        });

        dotMaterial.opacity = 0.8 + Math.sin(pulsePhase * 2) * 0.2;

        renderer.render(scene, camera);
    }

    animate();
})();
