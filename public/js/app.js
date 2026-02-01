// ============================================
// APP.JS - FULLY OPTIMIZED VERSION
// No lag, no freezing, clean code
// ============================================
'use strict';

// ============================================
// SCROLL TO TOP - Siempre iniciar desde arriba
// ============================================
// Desactivar restauración automática del navegador
if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
}

// Scroll to top inmediato
window.scrollTo(0, 0);

// Scroll to top cuando se recarga la página
window.addEventListener('beforeunload', () => {
    window.scrollTo(0, 0);
});

// Scroll to top cuando la página carga
window.addEventListener('load', () => {
    window.scrollTo(0, 0);
});

// Scroll to top para navegación back/forward
window.addEventListener('pageshow', (event) => {
    if (event.persisted) {
        window.scrollTo(0, 0);
    }
});

// Prevent context menu
document.addEventListener('contextmenu', e => e.preventDefault());

// ============================================
// SCROLL HEADER - Optimized with throttle
// ============================================
let scrollTicking = false;
window.addEventListener('scroll', () => {
    if (!scrollTicking) {
        requestAnimationFrame(() => {
            document.body.classList.toggle('scrolled', window.scrollY > 100);
            scrollTicking = false;
        });
        scrollTicking = true;
    }
}, { passive: true });

// ============================================
// PLANETS BACKGROUND - CROSSFADE OPTIMIZADO
// Más apps, se desvanecen y rotan, sin lag
// ============================================
const bgEl = document.getElementById('planetsBg');

// Todas las apps disponibles
const allLogos = [
    { url: 'img/html.webp', border: '#ff8844' },    // HTML
    { url: 'img/css.webp', border: '#379ad6' },           // CSS
    { url: 'img/js.webp', border: '#fccd00' },            // JS
    { url: 'img/python.webp', border: '#3776AB' },        // Python
    { url: 'img/visualcode.webp', border: '#007ACC' },    // VS Code
    { url: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg', border: '#777BB4' },
    { url: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg', border: '#FF2D20' },
    { url: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg', border: '#61DAFB' },
    { url: 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/unity/unity-original.svg', border: '#ffffff' },
    { url: 'https://registry.npmmirror.com/@lobehub/icons-static-png/latest/files/dark/gemini-color.png', border: '#8E75B2' }
];

// 5 posiciones fijas para planetas
const positions = [
    { left: '8%', top: '12%' },
    { left: '82%', top: '18%' },
    { left: '15%', top: '68%' },
    { left: '78%', top: '72%' },
    { left: '45%', top: '40%' }
];

let planetElements = [];
let currentLogos = [0, 1, 2, 3, 4]; // Índices actuales

function createPlanets() {
    if (!bgEl) return;

    positions.forEach((pos, i) => {
        const el = document.createElement('div');
        el.className = 'planet-logo planet-crossfade';
        el.style.cssText = `
            left: ${pos.left};
            top: ${pos.top};
            background-image: url(${allLogos[i].url});
            box-shadow: 0 0 15px ${allLogos[i].border};
        `;
        bgEl.appendChild(el);
        planetElements.push(el);

        // Aparecer con delay escalonado
        setTimeout(() => el.classList.add('visible'), 1800 + i * 200);
    });
}

// Rotar logos cada 8 segundos (uno a la vez, sin lag)
function rotatePlanet() {
    if (planetElements.length === 0) return;

    // Elegir planeta aleatorio
    const planetIdx = Math.floor(Math.random() * planetElements.length);
    const el = planetElements[planetIdx];

    // Elegir nuevo logo diferente
    let newLogoIdx;
    do {
        newLogoIdx = Math.floor(Math.random() * allLogos.length);
    } while (currentLogos.includes(newLogoIdx));

    // Crossfade: desaparecer
    el.classList.remove('visible');

    // Cambiar y reaparecer después de la transición
    setTimeout(() => {
        const logo = allLogos[newLogoIdx];
        el.style.backgroundImage = `url(${logo.url})`;
        el.style.boxShadow = `0 0 15px ${logo.border}`;
        currentLogos[planetIdx] = newLogoIdx;
        el.classList.add('visible');
    }, 600);
}

// Iniciar después de cargar
setTimeout(createPlanets, 1500);
setTimeout(() => setInterval(rotatePlanet, 5000), 4000);

// ============================================
// LOADING SCREEN - SISTEMA DE PRECARGA ROBUSTO
// Precarga completa de todos los recursos
// ============================================
const bar = document.getElementById('loadingBar');
const pct = document.getElementById('loadingPercent');
const ring = document.getElementById('progressRing');
const status = document.getElementById('loadingStatus');

// Circumference of the progress ring (2 * PI * radius)
const circumference = 2 * Math.PI * 90; // r=90

let prog = 0;
let resourcesLoaded = 0;
let totalResources = 0;

// Lista de recursos críticos a precargar
const criticalImages = [
    'img/logoempresa.webp',
    'img/carta1_optimized.webp',
    'img/css.webp',
    'img/js.webp',
    'img/python.webp',
    'img/visualcode.webp',
    'img/html.webp'
];

// Código animado en ambos lados
const codeLeft = document.getElementById('codeLeft');
const codeRight = document.getElementById('codeRight');

const codeSnippets = [
    '&lt;html&gt;',
    '&lt;head&gt;',
    'import React',
    'const app = {}',
    'function init()',
    'loading...',
    'fetch(api)',
    'async/await',
    'render()',
    '.container',
    '@keyframes',
    'export default',
    '&lt;portfolio&gt;',
    'npm install',
    'git push',
    'deploy()',
    'build: true',
    'config.js',
    'styles.css',
    '{ success }',
    'return data',
    '&lt;/html&gt;'
];

let codeIndex = 0;
let maxLines = 12;

function addCodeLine() {
    if (!codeLeft || !codeRight) return;

    const snippet = codeSnippets[codeIndex % codeSnippets.length];
    const line = document.createElement('div');
    line.className = 'code-line';
    line.innerHTML = snippet;

    // Alternar entre izquierda y derecha
    const target = codeIndex % 2 === 0 ? codeLeft : codeRight;
    target.appendChild(line);

    // Limitar líneas
    while (target.children.length > maxLines) {
        target.removeChild(target.firstChild);
    }

    codeIndex++;
}

// Generar código cada 200ms
const codeInterval = setInterval(addCodeLine, 200);

function showDone() {
    clearInterval(codeInterval);

    const doneLeft = document.createElement('div');
    doneLeft.className = 'code-line done';
    doneLeft.innerHTML = '// done ✓';
    if (codeLeft) codeLeft.appendChild(doneLeft);

    const doneRight = document.createElement('div');
    doneRight.className = 'code-line done';
    doneRight.innerHTML = '// done ✓';
    if (codeRight) codeRight.appendChild(doneRight);
}

// Actualizar UI de progreso
function updateProgress(newProg, statusMsg) {
    prog = Math.min(newProg, 100);

    if (bar) bar.style.width = prog + '%';
    if (pct) pct.textContent = Math.floor(prog) + '%';
    if (ring) {
        const offset = circumference - (prog / 100) * circumference;
        ring.style.strokeDashoffset = offset;
    }
    if (status && statusMsg) status.textContent = statusMsg;
}

// Precargar una imagen
function preloadImage(src) {
    return new Promise((resolve) => {
        const img = new Image();
        img.onload = () => resolve(true);
        img.onerror = () => resolve(false); // No fallar por una imagen
        img.src = src;
    });
}

// Precargar video
function preloadVideo() {
    return new Promise((resolve) => {
        const video = document.querySelector('.hero-showcase-video');
        if (!video) return resolve(true);

        if (video.readyState >= 3) {
            resolve(true);
        } else {
            video.addEventListener('canplaythrough', () => resolve(true), { once: true });
            // Timeout para no quedarnos esperando eternamente
            setTimeout(() => resolve(true), 3000);
        }
    });
}

// Verificar que Three.js y Matter.js estén listos
function checkLibraries() {
    return new Promise((resolve) => {
        let checks = 0;
        const maxChecks = 50; // Max 5 segundos

        function check() {
            checks++;
            const threeReady = typeof THREE !== 'undefined';
            const matterReady = typeof Matter !== 'undefined';

            if (threeReady && matterReady) {
                resolve(true);
            } else if (checks >= maxChecks) {
                resolve(true); // Continuar aunque no estén listas
            } else {
                setTimeout(check, 100);
            }
        }
        check();
    });
}

// Sistema de carga principal - ROBUSTO
async function startRealLoading() {
    // Scroll to top inmediato
    window.scrollTo(0, 0);

    updateProgress(5, 'Inicializando...');

    // Fase 1: Verificar librerías (0-15%)
    updateProgress(10, 'Cargando librerías 3D...');
    await checkLibraries();
    updateProgress(15, 'Librerías listas ✓');

    // Fase 2: Precargar imágenes críticas (15-40%)
    updateProgress(18, 'Precargando imágenes críticas...');
    totalResources = criticalImages.length;
    resourcesLoaded = 0;

    const criticalPromises = criticalImages.map(async (src) => {
        await preloadImage(src);
        resourcesLoaded++;
        const imageProgress = 15 + (resourcesLoaded / totalResources) * 25;
        updateProgress(imageProgress, `Cargando ${resourcesLoaded}/${totalResources}...`);
    });

    await Promise.all(criticalPromises);
    updateProgress(40, 'Imágenes críticas ✓');

    // Fase 3: Precargar TODAS las imágenes del DOM (40-60%)
    updateProgress(42, 'Cargando recursos adicionales...');
    const allDomImages = document.querySelectorAll('img[src]');
    const domImageSrcs = Array.from(allDomImages).map(img => img.src).filter(src => src);

    if (domImageSrcs.length > 0) {
        let domLoaded = 0;
        const domPromises = domImageSrcs.map(async (src) => {
            await preloadImage(src);
            domLoaded++;
            const domProgress = 40 + (domLoaded / domImageSrcs.length) * 20;
            updateProgress(domProgress, `Optimizando ${domLoaded}/${domImageSrcs.length}...`);
        });
        await Promise.all(domPromises);
    }
    updateProgress(60, 'Recursos listos ✓');

    // Fase 4: Precargar video (60-75%)
    updateProgress(62, 'Preparando video...');
    await preloadVideo();
    updateProgress(75, 'Video listo ✓');

    // Fase 5: Esperar fuentes (75-85%)
    updateProgress(78, 'Cargando fuentes...');
    if (document.fonts && document.fonts.ready) {
        await document.fonts.ready;
    }
    updateProgress(85, 'Fuentes listas ✓');

    // Fase 6: Preparar animaciones y renderizado (85-95%)
    updateProgress(88, 'Inicializando animaciones...');

    // Forzar reflow para que todo esté renderizado
    document.body.offsetHeight;

    // Dar tiempo para que el DOM esté completamente listo
    await new Promise(r => setTimeout(r, 300));
    updateProgress(95, 'Preparando interfaz...');

    // Fase 7: Finalizar (95-100%)
    await new Promise(r => setTimeout(r, 400));
    updateProgress(100, '¡Listo!');

    showDone();
    await new Promise(r => setTimeout(r, 500));

    // Scroll to top antes de mostrar
    window.scrollTo(0, 0);

    finishLoading();
}

function finishLoading() {
    const loadingScreen = document.getElementById('loadingScreen');
    const mainContent = document.getElementById('mainContent');

    if (loadingScreen) loadingScreen.classList.add('hidden');
    if (mainContent) mainContent.classList.add('visible');

    // Activar animaciones de la página principal
    initAnimations();

    // Mostrar el selector de idioma después de la carga (solo móvil)
    initLangToggleMobile();
}

// ============================================
// LANGUAGE TOGGLE MOBILE - Dinámico según scroll
// ============================================
function initLangToggleMobile() {
    const langToggle = document.getElementById('langToggle');
    if (!langToggle) return;

    // Verificar si es móvil
    const isMobile = window.innerWidth <= 768;

    if (isMobile) {
        // Mostrar después de un pequeño delay
        setTimeout(() => {
            langToggle.classList.add('lang-visible');
        }, 500);

        // Manejar scroll para cambiar posición
        let langScrollTicking = false;
        window.addEventListener('scroll', () => {
            if (!langScrollTicking) {
                requestAnimationFrame(() => {
                    // Si scrolleó más de 50px, bajar el toggle
                    if (window.scrollY > 50) {
                        langToggle.classList.add('lang-scrolled');
                    } else {
                        langToggle.classList.remove('lang-scrolled');
                    }
                    langScrollTicking = false;
                });
                langScrollTicking = true;
            }
        }, { passive: true });
    }
}

// Empezar carga real después de un pequeño delay
setTimeout(startRealLoading, 300);

// ============================================
// POST-LOAD ANIMATIONS - Batched
// ============================================
function initAnimations() {
    // Stat counters with requestAnimationFrame
    document.querySelectorAll('.stat-number').forEach(el => {
        const target = +el.dataset.target;
        let current = 0;
        const increment = target / 30;

        function count() {
            current += increment;
            if (current >= target) {
                el.textContent = target;
            } else {
                el.textContent = Math.ceil(current);
                requestAnimationFrame(count);
            }
        }
        requestAnimationFrame(count);
    });

    // Reveal animations - use single observer
    const revealObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

    // Scroll spy para navegación
    initScrollSpy();
}

// ============================================
// SCROLL SPY - Marca los nav-links según la sección visible
// ============================================
function initScrollSpy() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');

    if (sections.length === 0 || navLinks.length === 0) return;

    // Función para actualizar el link activo basado en scroll position
    function updateActiveLink() {
        const scrollPos = window.scrollY + 150; // Offset para activar antes

        let currentSection = null;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;

            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                currentSection = section.getAttribute('id');
            }
        });

        // Si estamos al principio de la página, activar inicio
        if (window.scrollY < 100) {
            currentSection = 'inicio';
        }

        // Actualizar los links de navegación
        if (currentSection) {
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + currentSection) {
                    link.classList.add('active');
                }
            });
        }
    }

    // Ejecutar al hacer scroll con throttle
    let scrollSpyTicking = false;
    window.addEventListener('scroll', () => {
        if (!scrollSpyTicking) {
            requestAnimationFrame(() => {
                updateActiveLink();
                scrollSpyTicking = false;
            });
            scrollSpyTicking = true;
        }
    }, { passive: true });

    // Ejecutar inmediatamente
    updateActiveLink();
}

// ============================================
// CLOCK - Simple interval
// ============================================
function updateClock() {
    const el = document.getElementById('currentTime');
    if (el) {
        el.textContent = new Date().toLocaleTimeString('es-PE', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: false
        });
    }
}
updateClock();
setInterval(updateClock, 1000);

// ============================================
// STARS - Minimal, CSS-only
// ============================================
function generateStars() {
    const container = document.getElementById('starsContainer');
    if (!container) return;

    // Only 15 stars (reduced from 30)
    for (let i = 0; i < 15; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        star.style.cssText = `
            left: ${Math.random() * 100}%;
            top: ${Math.random() * 100}%;
            animation-delay: ${Math.random() * 2}s;
            width: ${1 + Math.random() * 2}px;
            height: ${1 + Math.random() * 2}px;
        `;
        container.appendChild(star);
    }
}
generateStars();

// ============================================
// TYPEWRITER - Optimized with single timeout
// ============================================
const phrases = [
    'Desarrollador Web Moderno',
    'AI-Assisted Developer',
    'Prompt Engineer',
    'Software Engineer'
];
let phraseIdx = 0, charIdx = 0, deleting = false;
const typeEl = document.getElementById('typewriter');

function typeWriter() {
    if (!typeEl) return;

    const phrase = phrases[phraseIdx];

    if (deleting) {
        charIdx--;
        typeEl.textContent = phrase.substring(0, charIdx);
    } else {
        charIdx++;
        typeEl.textContent = phrase.substring(0, charIdx);
    }

    let delay = deleting ? 30 : 60;

    if (!deleting && charIdx === phrase.length) {
        delay = 2500;
        deleting = true;
    } else if (deleting && charIdx === 0) {
        deleting = false;
        phraseIdx = (phraseIdx + 1) % phrases.length;
        delay = 500;
    }

    setTimeout(typeWriter, delay);
}
setTimeout(typeWriter, 1200);

// ============================================
// NAVIGATION - Smooth scroll
// ============================================
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
        this.classList.add('active');
        document.querySelector(this.getAttribute('href'))?.scrollIntoView({ behavior: 'smooth' });
    });
});

// ============================================
// SPOTLIGHT - Throttled mousemove
// ============================================
const spotlight = document.getElementById('mouseSpotlight');
let spotX = 0, spotY = 0, mouseX = 0, mouseY = 0;
let spotlightActive = false;

document.addEventListener('mousemove', e => {
    mouseX = e.clientX;
    mouseY = e.clientY;

    if (spotlight && !spotlightActive) {
        spotlight.classList.add('active');
        spotlightActive = true;
        animateSpotlight();
    }
}, { passive: true });

function animateSpotlight() {
    if (!spotlight || !spotlightActive) return;

    spotX += (mouseX - spotX) * 0.1;
    spotY += (mouseY - spotY) * 0.1;
    spotlight.style.transform = `translate3d(${spotX}px, ${spotY}px, 0)`;

    requestAnimationFrame(animateSpotlight);
}

document.addEventListener('mouseleave', () => {
    if (spotlight) {
        spotlight.classList.remove('active');
        spotlightActive = false;
    }
});

// ============================================
// PROFILE CARD SPOTLIGHT - Throttled
// ============================================
const profileCard = document.getElementById('profileCard');
if (profileCard) {
    let cardThrottle = false;
    profileCard.addEventListener('mousemove', e => {
        if (cardThrottle) return;
        cardThrottle = true;

        requestAnimationFrame(() => {
            const rect = profileCard.getBoundingClientRect();
            profileCard.style.setProperty('--mouse-x', `${((e.clientX - rect.left) / rect.width) * 100}%`);
            profileCard.style.setProperty('--mouse-y', `${((e.clientY - rect.top) / rect.height) * 100}%`);
            cardThrottle = false;
        });
    }, { passive: true });
}

// ============================================
// PROJECT SLIDER - NAVIGATION
// ============================================
let currentSlide = 0;
const totalSlides = 3;

function slideProjects(direction) {
    const track = document.querySelector('.projects-track');
    const cards = document.querySelectorAll('.project-card');
    if (!track || cards.length === 0) return;

    currentSlide += direction;

    if (currentSlide >= totalSlides) currentSlide = 0;
    if (currentSlide < 0) currentSlide = totalSlides - 1;

    updateSlider();
}

function goToSlide(index) {
    currentSlide = index;
    updateSlider();
}

function updateSlider() {
    const track = document.querySelector('.projects-track');
    const cards = document.querySelectorAll('.project-card');
    const dots = document.querySelectorAll('.slider-dots .dot');

    if (!track || cards.length === 0) return;

    const cardWidth = cards[0].offsetWidth + 24;
    track.style.transform = `translateX(-${currentSlide * cardWidth}px)`;

    dots.forEach((dot, i) => {
        dot.classList.toggle('active', i === currentSlide);
    });
}

// ============================================
// NOVA - CHATBOT IA ASISTENTE
// ============================================

// Base de conocimiento de Nova (se actualizará con info del usuario)
const novaKnowledge = {
    proyectos: "Elmer ha desarrollado varios proyectos increíbles: 🛒 E-Commerce con Laravel y Vue.js, 📊 Dashboard Analytics con React y Node.js, 📱 App de Gestión con Python y Django, y 🎵 Fluxy - una app de escritorio para streamers de TikTok que permite a la audiencia pedir música desde el chat.",
    tecnologias: "Elmer domina múltiples tecnologías: 💻 Frontend: React, Vue.js, HTML5, CSS3, JavaScript | 🔧 Backend: Laravel, Node.js, Python, PHP | 🗄️ Bases de datos: MySQL, MongoDB, SQLite, Firebase | 🖥️ Desktop: Electron.js | 🤖 IA: Claude API, Gemini, OpenAI",
    contacto: "Puedes contactar a Elmer a través de: 📧 Email: elmeroff.dc@gmail.com | 📱 Teléfono: +51 961 349 020 | 📍 Ubicación: Ate, Lima, Perú. ¡Está disponible para proyectos freelance!",
    sobre: "Elmer es un Ingeniero de Software especializado en AI-Driven Development. Utiliza Claude API, Gemini y técnicas avanzadas de Prompt Engineering para construir software de complejidad industrial en tiempo récord. Crea interfaces premium con Canvas y renderizado optimizado.",
    fluxy: "Fluxy es una aplicación de escritorio desarrollada con Electron y React para streamers de TikTok. Permite que la audiencia pida música desde el chat usando comandos personalizados. Incluye sistema de licencias, permisos por roles, y una interfaz premium con tema oscuro.",
    servicios: "Elmer ofrece: 🌐 Desarrollo Web Full Stack | 🖥️ Apps de Escritorio con Electron | 🤖 Automatización con IA | 🎮 Apps para Streamers | 🎨 Diseño UI Premium | 🔌 APIs & Backend",
    default: "¡Interesante pregunta! 🤔 Puedo ayudarte con información sobre los proyectos de Elmer, sus tecnologías, servicios que ofrece, o cómo contactarlo. ¿Qué te gustaría saber?"
};

function findNovaResponse(question) {
    const q = question.toLowerCase();

    if (q.includes('proyecto') || q.includes('trabajo') || q.includes('portfolio')) {
        return novaKnowledge.proyectos;
    }
    if (q.includes('tecnolog') || q.includes('lenguaje') || q.includes('domina') || q.includes('sabe') || q.includes('programa')) {
        return novaKnowledge.tecnologias;
    }
    if (q.includes('contact') || q.includes('email') || q.includes('teléfono') || q.includes('telefono') || q.includes('hablar') || q.includes('contratar')) {
        return novaKnowledge.contacto;
    }
    if (q.includes('quién es') || q.includes('quien es') || q.includes('sobre') || q.includes('elmer') || q.includes('experiencia')) {
        return novaKnowledge.sobre;
    }
    if (q.includes('fluxy') || q.includes('tiktok') || q.includes('streamer') || q.includes('música') || q.includes('musica')) {
        return novaKnowledge.fluxy;
    }
    if (q.includes('servicio') || q.includes('ofrece') || q.includes('hace') || q.includes('puede hacer')) {
        return novaKnowledge.servicios;
    }
    if (q.includes('hola') || q.includes('hey') || q.includes('buenas')) {
        return "¡Hola! 👋 ¿En qué puedo ayudarte hoy? Puedes preguntarme sobre los proyectos de Elmer, sus tecnologías, servicios o cómo contactarlo.";
    }
    if (q.includes('gracias') || q.includes('thank')) {
        return "¡De nada! 😊 Estoy aquí para ayudarte. ¿Hay algo más que quieras saber sobre Elmer o sus proyectos?";
    }

    return novaKnowledge.default;
}

function addMessage(text, isUser = false) {
    const chatMessages = document.getElementById('chatMessages');
    if (!chatMessages) return;

    const messageDiv = document.createElement('div');
    messageDiv.className = `chat-message ${isUser ? 'user-message' : 'nova-message'}`;

    if (isUser) {
        messageDiv.innerHTML = `
            <div class="message-avatar">T</div>
            <div class="message-content">
                <span class="message-name">Tú</span>
                <p>${text}</p>
            </div>
        `;
    } else {
        messageDiv.innerHTML = `
            <div class="message-avatar">
                <svg viewBox="0 0 40 40" fill="none">
                    <circle cx="20" cy="20" r="18" fill="url(#msgNovaGrad2)"/>
                    <ellipse cx="15" cy="18" rx="2" ry="2.5" fill="#fff"/>
                    <ellipse cx="25" cy="18" rx="2" ry="2.5" fill="#fff"/>
                    <path d="M15 24 Q20 28 25 24" stroke="#fff" stroke-width="2" stroke-linecap="round" fill="none"/>
                    <defs>
                        <linearGradient id="msgNovaGrad2" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#0050FF"/>
                            <stop offset="100%" stop-color="#00AAFF"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="message-content">
                <span class="message-name">Nova</span>
                <p>${text}</p>
            </div>
        `;
    }

    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

function showTypingIndicator() {
    const chatMessages = document.getElementById('chatMessages');
    if (!chatMessages) return;

    const typingDiv = document.createElement('div');
    typingDiv.className = 'chat-message nova-message typing-message';
    typingDiv.innerHTML = `
        <div class="message-avatar">
            <svg viewBox="0 0 40 40" fill="none">
                <circle cx="20" cy="20" r="18" fill="url(#msgNovaGrad3)"/>
                <defs>
                    <linearGradient id="msgNovaGrad3" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#0050FF"/>
                        <stop offset="100%" stop-color="#00AAFF"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>
        <div class="message-content">
            <div class="typing-indicator">
                <span></span><span></span><span></span>
            </div>
        </div>
    `;
    chatMessages.appendChild(typingDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
    return typingDiv;
}

function sendToNova() {
    const input = document.getElementById('novaInput');
    if (!input) return;

    const question = input.value.trim();
    if (!question) return;

    // Agregar mensaje del usuario
    addMessage(question, true);
    input.value = '';

    // Nova empieza a pensar
    if (typeof novaThinking === 'function') {
        novaThinking();
    }

    // Mostrar indicador de escritura
    const typingIndicator = showTypingIndicator();

    // Tiempo de pensamiento (4-5 segundos)
    const thinkingTime = 4000 + Math.random() * 1000;

    setTimeout(() => {
        if (typingIndicator) typingIndicator.remove();
        const response = findNovaResponse(question);
        addMessage(response);

        // Nova responde feliz
        if (typeof novaRespond === 'function') {
            novaRespond();
        }
    }, thinkingTime);
}

function askNova(question) {
    const input = document.getElementById('novaInput');
    if (input) {
        input.value = question;
        sendToNova();
    }
}

function handleNovaKeypress(event) {
    if (event.key === 'Enter') {
        sendToNova();
    }
}

// ============================================
// NOVA - OJOS INTERACTIVOS Y EXPRESIONES
// ============================================

const novaAvatar = document.getElementById('novaAvatar');
const novaFace = document.getElementById('novaFace');
const novaPupilLeft = document.getElementById('novaPupilLeft');
const novaPupilRight = document.getElementById('novaPupilRight');
const novaMouth = document.getElementById('novaMouth');
const novaBrowLeft = document.getElementById('novaBrowLeft');
const novaBrowRight = document.getElementById('novaBrowRight');
const novaBlushLeft = document.getElementById('novaBlushLeft');
const novaBlushRight = document.getElementById('novaBlushRight');
const novaFaceGroup = document.getElementById('novaFaceGroup');

// Variable de control para expresiones
let novaIsExpressing = false;

// Expresiones amigables de Nova con movimientos de cabeza
const novaExpressions = {
    normal: {
        mouth: "M43 61 Q50 67 57 61",  // sonrisa simple
        browLeft: "M34 40 Q38 38 42 40",
        browRight: "M58 40 Q62 38 66 40",
        eyeScaleY: 1,
        blush: 0.15,
        headMove: null  // sin movimiento
    },
    happy: {
        mouth: "M42 61 Q50 69 58 61",  // sonrisa más grande
        browLeft: "M34 39 Q38 36 42 39",
        browRight: "M58 39 Q62 36 66 39",
        eyeScaleY: 0.7,
        blush: 0.35,
        headMove: 'tiltRight'  // inclina feliz
    },
    surprised: {
        mouth: "M46 63 Q50 66 54 63",  // :o 
        browLeft: "M34 36 Q38 33 42 37",
        browRight: "M58 37 Q62 33 66 36",
        eyeScaleY: 1.15,
        blush: 0.2,
        headMove: 'up'  // mira arriba sorprendido
    },
    wink: {
        mouth: "M43 61 Q50 68 57 61",  // guiño
        browLeft: "M34 40 Q38 38 42 40",
        browRight: "M58 38 Q62 36 66 40",
        leftEyeScale: 0.1,
        rightEyeScale: 1,
        blush: 0.3,
        headMove: 'tiltLeft'  // inclina pícaramente
    },
    thinking: {
        mouth: "M45 63 Q50 62 55 64",  // hmm
        browLeft: "M34 39 Q38 41 42 38",
        browRight: "M58 37 Q62 35 66 39",
        eyeScaleY: 0.85,
        blush: 0.1,
        headMove: 'tiltRight'  // piensa mirando a un lado
    },
    excited: {
        mouth: "M41 60 Q50 71 59 60",  // :D muy feliz
        browLeft: "M34 37 Q38 34 42 37",
        browRight: "M58 37 Q62 34 66 37",
        eyeScaleY: 0.6,
        blush: 0.45,
        headMove: 'nod'  // asiente emocionado
    },
    sad: {
        mouth: "M44 65 Q50 62 56 65",  // triste
        browLeft: "M34 38 Q38 40 42 39",
        browRight: "M58 39 Q62 40 66 38",
        eyeScaleY: 0.8,
        blush: 0.1,
        headMove: 'down'  // agacha triste
    },
    angry: {
        mouth: "M44 64 Q50 62 56 64",  // enojado
        browLeft: "M34 37 Q38 39 42 36",
        browRight: "M58 36 Q62 39 66 37",
        eyeScaleY: 0.9,
        blush: 0.05,
        headMove: 'shake'  // sacude enojado
    },
    sleepy: {
        mouth: "M46 63 Q50 64 54 63",  // -
        browLeft: "M34 42 Q38 43 42 42",
        browRight: "M58 42 Q62 43 66 42",
        eyeScaleY: 0.35,
        blush: 0.1,
        headMove: 'down'  // cabeza caída
    },
    curious: {
        mouth: "M44 62 Q50 66 56 62",  // o curioso
        browLeft: "M34 38 Q38 36 42 39",
        browRight: "M58 38 Q62 36 66 39",
        eyeScaleY: 1.1,
        blush: 0.2,
        headMove: 'tiltLeft'  // inclina curioso
    }
};

let currentExpression = 'normal';
let isBlinking = false;

function setNovaExpression(expressionName) {
    const expr = novaExpressions[expressionName];
    if (!expr || !novaMouth || !novaBrowLeft || !novaBrowRight) return;

    // Pausar seguimiento del cursor durante expresiones
    if (expressionName !== 'normal') {
        novaIsExpressing = true;
    }

    // Animar boca
    novaMouth.setAttribute('d', expr.mouth);

    // Animar cejas
    novaBrowLeft.setAttribute('d', expr.browLeft);
    novaBrowRight.setAttribute('d', expr.browRight);

    // Animar ojos (escala)
    const leftEyeGroup = document.getElementById('novaEyeLeft');
    const rightEyeGroup = document.getElementById('novaEyeRight');

    if (leftEyeGroup && rightEyeGroup) {
        if (expressionName === 'wink') {
            leftEyeGroup.style.transform = `scaleY(${expr.leftEyeScale})`;
            rightEyeGroup.style.transform = `scaleY(${expr.rightEyeScale})`;
        } else {
            leftEyeGroup.style.transform = `scaleY(${expr.eyeScaleY})`;
            rightEyeGroup.style.transform = `scaleY(${expr.eyeScaleY})`;
        }
        leftEyeGroup.style.transformOrigin = 'center';
        rightEyeGroup.style.transformOrigin = 'center';
    }

    // Animar rubor
    if (novaBlushLeft && novaBlushRight) {
        novaBlushLeft.style.fill = `rgba(255, 150, 180, ${expr.blush})`;
        novaBlushRight.style.fill = `rgba(255, 150, 180, ${expr.blush})`;
    }

    // Movimiento de cabeza según expresión
    if (novaFaceGroup && expr.headMove) {
        novaFaceGroup.style.transition = 'transform 0.3s ease';

        if (expr.headMove === 'tiltRight') {
            novaFaceGroup.style.transform = 'rotate(8deg) translateX(2px)';
        } else if (expr.headMove === 'tiltLeft') {
            novaFaceGroup.style.transform = 'rotate(-8deg) translateX(-2px)';
        } else if (expr.headMove === 'down') {
            novaFaceGroup.style.transform = 'translateY(4px)';
        } else if (expr.headMove === 'up') {
            novaFaceGroup.style.transform = 'translateY(-3px)';
        } else if (expr.headMove === 'shake') {
            // Sacudir cabeza (enojado)
            novaFaceGroup.style.animation = 'novaHeadShake 0.4s ease';
            setTimeout(() => {
                novaFaceGroup.style.animation = '';
            }, 400);
        } else if (expr.headMove === 'nod') {
            // Asentir (sí)
            novaFaceGroup.style.animation = 'novaHeadNod 0.5s ease';
            setTimeout(() => {
                novaFaceGroup.style.animation = '';
            }, 500);
        }
    }

    currentExpression = expressionName;
}

// Resetear cabeza a posición normal
function resetNovaHead() {
    if (novaFaceGroup) {
        novaFaceGroup.style.transition = 'transform 0.3s ease';
        novaFaceGroup.style.transform = 'translate(0, 0) rotate(0)';
    }
    novaIsExpressing = false;
}

// Parpadeo natural
function novaBlink() {
    if (isBlinking) return;
    isBlinking = true;

    const leftEyeGroup = document.getElementById('novaEyeLeft');
    const rightEyeGroup = document.getElementById('novaEyeRight');

    if (leftEyeGroup && rightEyeGroup) {
        leftEyeGroup.style.transition = 'transform 0.1s ease';
        rightEyeGroup.style.transition = 'transform 0.1s ease';
        leftEyeGroup.style.transform = 'scaleY(0.1)';
        rightEyeGroup.style.transform = 'scaleY(0.1)';

        setTimeout(() => {
            const expr = novaExpressions[currentExpression];
            if (currentExpression === 'wink') {
                leftEyeGroup.style.transform = `scaleY(${expr.leftEyeScale})`;
                rightEyeGroup.style.transform = `scaleY(${expr.rightEyeScale})`;
            } else {
                leftEyeGroup.style.transform = `scaleY(${expr.eyeScaleY || 1})`;
                rightEyeGroup.style.transform = `scaleY(${expr.eyeScaleY || 1})`;
            }
            leftEyeGroup.style.transition = 'transform 0.15s ease';
            rightEyeGroup.style.transition = 'transform 0.15s ease';
            isBlinking = false;
        }, 100);
    }
}

// Nova piensa (cuando recibe una pregunta)
function novaThinking() {
    setNovaExpression('thinking');

    // Acelerar el anillo
    const ring = document.querySelector('.nova-ring');
    if (ring) {
        ring.style.animation = 'novaRingSpin 1s linear infinite';
    }
}

// Nova termina de pensar y responde feliz
function novaRespond() {
    // Restaurar velocidad del anillo
    const ring = document.querySelector('.nova-ring');
    if (ring) {
        ring.style.animation = 'novaRingSpin 8s linear infinite';
    }

    // Expresión feliz
    setNovaExpression('happy');

    // Asentir con la cabeza
    if (novaFaceGroup) {
        novaFaceGroup.style.animation = 'novaHeadNod 0.5s ease';
        setTimeout(() => {
            novaFaceGroup.style.animation = '';
        }, 500);
    }

    // Volver a normal después
    setTimeout(() => {
        setNovaExpression('normal');
        resetNovaHead();
    }, 2000);
}

// Cambiar expresión aleatoria con movimiento de cabeza
function randomNovaExpression() {
    const expressions = Object.keys(novaExpressions);
    const randomExpr = expressions[Math.floor(Math.random() * expressions.length)];
    setNovaExpression(randomExpr);

    // Volver a normal después de un tiempo
    setTimeout(() => {
        if (currentExpression !== 'normal') {
            setNovaExpression('normal');
            resetNovaHead();
        }
    }, 2500 + Math.random() * 1500);
}

// Iniciar animaciones de Nova
if (novaAvatar) {
    // Parpadeo cada 3-5 segundos
    setInterval(() => {
        if (Math.random() > 0.3) novaBlink();
    }, 3000 + Math.random() * 2000);

    // Expresión aleatoria cada 8-12 segundos
    setInterval(randomNovaExpression, 8000 + Math.random() * 4000);

    // Expresión feliz cuando el usuario pasa el mouse cerca
    novaAvatar.addEventListener('mouseenter', () => {
        setNovaExpression('excited');
    });

    novaAvatar.addEventListener('mouseleave', () => {
        setTimeout(() => {
            setNovaExpression('normal');
            resetNovaHead();
        }, 500);
    });
}
