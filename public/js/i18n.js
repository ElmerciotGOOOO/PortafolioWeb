// Language Switcher System
const translations = {
    es: {
        // Navigation
        'nav.home': 'Inicio',
        'nav.about': 'Sobre mí',
        'nav.projects': 'Proyectos',
        'nav.contact': 'Contacto',

        // Hero
        'hero.badge': 'Disponible para proyectos',
        'hero.title': 'Hola, soy',
        'hero.description': 'Transformo ideas en software de alto nivel mediante IA avanzada. Desarrollo desde sistemas web y automatizaciones en Python hasta aplicaciones APK y de escritorio. Mi enfoque: código inteligente, desarrollo acelerado y experiencias digitales de impacto.',
        'hero.btn.cv': 'Descargar CV',
        'hero.btn.contact': 'Contactar',

        // Stats
        'stats.years': 'Años Exp.',
        'stats.projects': 'Proyectos',
        'stats.clients': 'Clientes',
        'stats.commitment': '% Compromiso',

        // About
        'about.tag': 'Conóceme',
        'about.title': 'Acerca de',
        'about.title.span': 'Mí',
        'about.status': 'Disponible para Desarrollo con IA Avanzada',
        'about.name': 'Rafael Elmer Huaynate Trinidad',
        'about.role': 'Desarrollador Full Stack',
        'about.bio': 'Ingeniero de Software especializado en AI-Driven Development. Utilizo Claude API, Gemini y técnicas avanzadas de Prompt Engineering para construir software de complejidad industrial en tiempo récord. Creo interfaces premium con Canvas y renderizado optimizado, sin depender de software pesado.',
        'about.location': 'Lima, Perú',
        'about.lang': 'Español, Inglés',
        'about.timezone.title': 'Zona Horaria',
        'about.timezone.country': 'Perú',
        'about.timezone.city': 'Lima, América',
        'about.expertise.title': 'Mi Experiencia',
        'about.expertise.ai': 'AI & Automation',
        'about.expertise.ai.desc': 'Prompt Engineering, IA Agents, Voces RVC',
        'about.expertise.desktop': 'Desktop Apps',
        'about.expertise.desktop.desc': 'Electron.js v40, ASAR, Auto-updates',
        'about.expertise.web': 'Web Dev',
        'about.expertise.web.desc': 'Laravel, React v18, Vite, Node.js',
        'about.expertise.network': 'Networking',
        'about.expertise.network.desc': 'Socket.io, Firebase, MySQL, SQLite',
        'about.expertise.design': 'Diseño Digital',
        'about.expertise.design.desc': 'UI/UX, Assets premium, Canvas',
        'about.expertise.game': 'Game Dev',
        'about.expertise.game.desc': 'Unreal Engine C++, Python, C#',

        // Projects
        'projects.tag': 'Portafolio',
        'projects.title': 'Mis',
        'projects.title.span': 'Proyectos',
        'projects.fluxy.title': 'Fluxy - Music Request',
        'projects.fluxy.desc': 'App de escritorio para streamers de TikTok. Tu audiencia pide música desde el chat en tiempo real.',
        'projects.fluxy.status': 'Completado',
        'projects.laive.title': 'Laive V2',
        'projects.laive.desc': 'Sistema de control de producción industrial. Cronómetro inteligente, KPIs en tiempo real y sincronización multi-dispositivo.',
        'projects.laive.status': 'Completado',
        'projects.laive.badge': 'Personal',
        'projects.view': 'Ver Proyecto',

        // Testimonials
        'testimonials.tag': 'Testimonios',
        'testimonials.title': 'Clientes y',
        'testimonials.title.span': 'Usuarios',
        'testimonials.1.text': '"Fluxy transformó mis streams de TikTok. Mis seguidores pueden pedir música desde el chat y la experiencia es increíble. Muy recomendado!"',
        'testimonials.2.text': '"El dashboard que me desarrolló es exactamente lo que necesitaba para mi negocio. Datos en tiempo real y una interfaz muy profesional."',
        'testimonials.3.text': '"La app de gestión facilitó todo el control de mi inventario. Interfaz intuitiva y funciona perfectamente en cualquier dispositivo."',

        // Services
        'services.tag': 'Servicios',
        'services.title': 'Lo que',
        'services.title.span': 'Ofrezco',
        'services.web.title': 'Desarrollo Web Full Stack',
        'services.web.desc': 'Sitios web y aplicaciones completas con Laravel, React, Vue.js y bases de datos. Desde landing pages hasta sistemas complejos.',
        'services.desktop.title': 'Apps de Escritorio',
        'services.desktop.desc': 'Aplicaciones nativas con Electron y Python. Instaladores profesionales, actualizaciones automáticas y rendimiento óptimo.',
        'services.ai.title': 'Automatización con IA',
        'services.ai.desc': 'Integración de Claude API, Gemini y OpenAI. Bots inteligentes, procesamiento de datos y flujos automatizados.',
        'services.stream.title': 'Apps para Streamers',
        'services.stream.desc': 'Herramientas personalizadas para TikTok Live, Twitch y YouTube. Comandos de chat, música interactiva y overlays.',
        'services.ui.title': 'Diseño UI Premium',
        'services.ui.desc': 'Interfaces modernas sin Photoshop. Diseño con código, animaciones CSS y experiencias visuales de alto impacto.',
        'services.api.title': 'APIs & Backend',
        'services.api.desc': 'APIs RESTful con Laravel y Python. Autenticación, bases de datos, webhooks y arquitectura escalable.',

        // Nova/CLICber
        'nova.tag': 'Asistente IA',
        'nova.title': 'Conoce a',
        'nova.title.span': 'CLICber',
        'nova.badge': 'Tu Asistente Personal',
        'nova.status': 'Fuera de línea',
        'nova.desc.1': 'Soy CLICber Nova, tu guía inteligente.',
        'nova.desc.2': 'Conozco todos los detalles sobre los proyectos y habilidades de Elmer.',
        'nova.desc.3': 'Estoy en constante aprendizaje para brindarte la mejor información.',
        'nova.maintenance': 'EN MANTENIMIENTO',
        'nova.training': 'Sistema en Entrenamiento',

        // Footer
        'footer.copyright': '© 2026',

        // CV Modal
        'cv.title': 'Selecciona el idioma',
        'cv.spanish': 'Español',
        'cv.spanish.desc': 'Currículum en español',
        'cv.english': 'English',
        'cv.english.desc': 'Resume in English'
    },
    en: {
        // Navigation
        'nav.home': 'Home',
        'nav.about': 'About me',
        'nav.projects': 'Projects',
        'nav.contact': 'Contact',

        // Hero
        'hero.badge': 'Available for projects',
        'hero.title': "Hi, I'm",
        'hero.description': 'I transform ideas into high-level software using advanced AI. From web systems and Python automations to APK and desktop applications. My approach: smart code, accelerated development, and impactful digital experiences.',
        'hero.btn.cv': 'Download CV',
        'hero.btn.contact': 'Contact',

        // Stats
        'stats.years': 'Years Exp.',
        'stats.projects': 'Projects',
        'stats.clients': 'Clients',
        'stats.commitment': '% Commitment',

        // About
        'about.tag': 'About',
        'about.title': 'About',
        'about.title.span': 'Me',
        'about.status': 'Available for Development with Advanced AI',
        'about.name': 'Rafael Elmer Huaynate Trinidad',
        'about.role': 'Full Stack Developer',
        'about.bio': 'Software Engineer specialized in AI-Driven Development. I use Claude API, Gemini and advanced Prompt Engineering techniques to build industrial-complexity software in record time. I create premium interfaces with Canvas and optimized rendering, without relying on heavy software.',
        'about.location': 'Lima, Peru',
        'about.lang': 'Spanish, English',
        'about.timezone.title': 'Timezone',
        'about.timezone.country': 'Peru',
        'about.timezone.city': 'Lima, America',
        'about.expertise.title': 'My Expertise',
        'about.expertise.ai': 'AI & Automation',
        'about.expertise.ai.desc': 'Prompt Engineering, AI Agents, RVC Voices',
        'about.expertise.desktop': 'Desktop Apps',
        'about.expertise.desktop.desc': 'Electron.js v40, ASAR, Auto-updates',
        'about.expertise.web': 'Web Dev',
        'about.expertise.web.desc': 'Laravel, React v18, Vite, Node.js',
        'about.expertise.network': 'Networking',
        'about.expertise.network.desc': 'Socket.io, Firebase, MySQL, SQLite',
        'about.expertise.design': 'Digital Design',
        'about.expertise.design.desc': 'UI/UX, Premium Assets, Canvas',
        'about.expertise.game': 'Game Dev',
        'about.expertise.game.desc': 'Unreal Engine C++, Python, C#',

        // Projects
        'projects.tag': 'Portfolio',
        'projects.title': 'My',
        'projects.title.span': 'Projects',
        'projects.fluxy.title': 'Fluxy - Music Request',
        'projects.fluxy.desc': 'Desktop app for TikTok streamers. Your audience requests music from the chat in real time.',
        'projects.fluxy.status': 'Completed',
        'projects.laive.title': 'Laive V2',
        'projects.laive.desc': 'Industrial production control system. Smart timer, real-time KPIs and multi-device sync.',
        'projects.laive.status': 'Completed',
        'projects.laive.badge': 'Personal',
        'projects.view': 'View Project',

        // Testimonials
        'testimonials.tag': 'Testimonials',
        'testimonials.title': 'Clients and',
        'testimonials.title.span': 'Users',
        'testimonials.1.text': '"Fluxy transformed my TikTok streams. My followers can request music from the chat and the experience is incredible. Highly recommended!"',
        'testimonials.2.text': '"The dashboard he developed for me is exactly what I needed for my business. Real-time data and a very professional interface."',
        'testimonials.3.text': '"The management app made all the inventory control easier. Intuitive interface and works perfectly on any device."',

        // Services
        'services.tag': 'Services',
        'services.title': 'What I',
        'services.title.span': 'Offer',
        'services.web.title': 'Full Stack Web Development',
        'services.web.desc': 'Complete websites and applications with Laravel, React, Vue.js and databases. From landing pages to complex systems.',
        'services.desktop.title': 'Desktop Apps',
        'services.desktop.desc': 'Native applications with Electron and Python. Professional installers, automatic updates and optimal performance.',
        'services.ai.title': 'AI Automation',
        'services.ai.desc': 'Integration of Claude API, Gemini and OpenAI. Smart bots, data processing and automated workflows.',
        'services.stream.title': 'Streamer Apps',
        'services.stream.desc': 'Custom tools for TikTok Live, Twitch and YouTube. Chat commands, interactive music and overlays.',
        'services.ui.title': 'Premium UI Design',
        'services.ui.desc': 'Modern interfaces without Photoshop. Code-based design, CSS animations and high-impact visual experiences.',
        'services.api.title': 'APIs & Backend',
        'services.api.desc': 'RESTful APIs with Laravel and Python. Authentication, databases, webhooks and scalable architecture.',

        // Nova/CLICber
        'nova.tag': 'AI Assistant',
        'nova.title': 'Meet',
        'nova.title.span': 'CLICber',
        'nova.badge': 'Your Personal Assistant',
        'nova.status': 'Offline',
        'nova.desc.1': "I'm CLICber Nova, your intelligent guide.",
        'nova.desc.2': "I know all the details about Elmer's projects and skills.",
        'nova.desc.3': "I'm constantly learning to provide you with the best information.",
        'nova.maintenance': 'UNDER MAINTENANCE',
        'nova.training': 'System in Training',

        // Footer
        'footer.copyright': '© 2026',

        // CV Modal
        'cv.title': 'Select language',
        'cv.spanish': 'Español',
        'cv.spanish.desc': 'Currículum en español',
        'cv.english': 'English',
        'cv.english.desc': 'Resume in English'
    }
};

let currentLang = localStorage.getItem('lang') || 'es';

function setLanguage(lang) {
    currentLang = lang;
    localStorage.setItem('lang', lang);

    // Update all elements with data-i18n attribute
    document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.getAttribute('data-i18n');
        if (translations[lang][key]) {
            el.textContent = translations[lang][key];
        }
    });

    // Update language toggle button
    updateLangToggle();
}

function updateLangToggle() {
    const toggle = document.getElementById('langToggle');
    if (toggle) {
        const flag = toggle.querySelector('.lang-flag');
        const text = toggle.querySelector('.lang-text');
        if (currentLang === 'es') {
            flag.innerHTML = `<rect width="32" height="24" fill="#AA151B"/><rect y="6" width="32" height="12" fill="#F1BF00"/>`;
            text.textContent = 'ES';
        } else {
            flag.innerHTML = `<rect width="32" height="24" fill="#012169"/><path d="M0 0L32 24M32 0L0 24" stroke="#fff" stroke-width="4"/><path d="M0 0L32 24M32 0L0 24" stroke="#C8102E" stroke-width="2"/><path d="M16 0V24M0 12H32" stroke="#fff" stroke-width="6"/><path d="M16 0V24M0 12H32" stroke="#C8102E" stroke-width="4"/>`;
            text.textContent = 'EN';
        }
    }
}

function toggleLanguage() {
    setLanguage(currentLang === 'es' ? 'en' : 'es');
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function () {
    setLanguage(currentLang);
});
