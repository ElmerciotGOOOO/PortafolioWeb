<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portafolio de Elmer - Desarrollador Web">
    <title>Elmer | Portfolio</title>
    <!-- Preconnect para cargar recursos externos más rápido -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <!-- Preload de recursos críticos -->
    <link rel="preload" href="{{ asset('img/logoempresa.webp') }}" as="image" type="image/webp">
    <link rel="preload" href="{{ asset('css/style.css') }}" as="style">
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;600;700&family=JetBrains+Mono:wght@400;500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Defer scripts pesados para no bloquear renderizado -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/matter-js/0.19.0/matter.min.js"></script>
</head>

<body class="protected dark-theme">
    <!-- Fondo animado oscuro -->
    <div class="bg-grid-dark"></div>
    <div class="bg-glow bg-glow-1"></div>
    <div class="bg-glow bg-glow-2"></div>
    <div class="planets-bg" id="planetsBg"></div>

    <div class="loading-screen" id="loadingScreen">
        <!-- Mismo fondo que la página principal -->
        <div class="loading-bg-grid"></div>
        <div class="loading-glow loading-glow-1"></div>
        <div class="loading-glow loading-glow-2"></div>

        <!-- Terminales de código grandes -->
        <div class="code-terminal code-left" id="codeLeft"></div>
        <div class="code-terminal code-right" id="codeRight"></div>

        <!-- Contenedor principal centrado -->
        <div class="loading-main">
            <!-- Iconos superiores animados -->
            <div class="loading-icons-row">
                <div class="loading-icon-item">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M16 18L22 12L16 6M8 6L2 12L8 18" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14 4L10 20" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <span>Código</span>
                </div>
                <div class="loading-icon-item">
                    <svg viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2" />
                        <path d="M4 21C4 17.134 7.58172 14 12 14C16.4183 14 20 17.134 20 21" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <span>Perfil</span>
                </div>
                <div class="loading-icon-item">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path
                            d="M12 2C6.477 2 2 6.477 2 12C2 16.418 4.865 20.166 8.839 21.489C9.339 21.579 9.521 21.271 9.521 21.007C9.521 20.768 9.513 20.058 9.508 19.192C6.726 19.8 6.139 17.782 6.139 17.782C5.685 16.618 5.029 16.312 5.029 16.312C4.121 15.698 5.098 15.711 5.098 15.711C6.101 15.781 6.629 16.734 6.629 16.734C7.521 18.237 8.97 17.809 9.539 17.554C9.631 16.895 9.889 16.468 10.175 16.22C7.954 15.97 5.619 15.099 5.619 11.307C5.619 10.207 6.009 9.307 6.649 8.607C6.546 8.355 6.203 7.332 6.747 5.961C6.747 5.961 7.587 5.693 9.497 6.977C10.313 6.756 11.161 6.645 12.003 6.641C12.845 6.645 13.693 6.756 14.509 6.977C16.417 5.693 17.255 5.961 17.255 5.961C17.801 7.332 17.458 8.355 17.355 8.607C17.997 9.307 18.383 10.207 18.383 11.307C18.383 15.109 16.044 15.966 13.815 16.212C14.173 16.519 14.495 17.125 14.495 18.048C14.495 19.366 14.483 20.427 14.483 21.007C14.483 21.274 14.663 21.585 15.173 21.486C19.141 20.162 22 16.416 22 12C22 6.477 17.523 2 12 2Z"
                            fill="currentColor" />
                    </svg>
                    <span>GitHub</span>
                </div>
            </div>

            <!-- Logo con anillo de progreso -->
            <div class="progress-ring-container">
                <svg class="progress-ring" viewBox="0 0 200 200">
                    <defs>
                        <linearGradient id="progressGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" stop-color="#0050FF" />
                            <stop offset="50%" stop-color="#00AAFF" />
                            <stop offset="100%" stop-color="#0050FF" />
                        </linearGradient>
                    </defs>
                    <circle class="progress-ring-bg" cx="100" cy="100" r="90" />
                    <circle class="progress-ring-fill" id="progressRing" cx="100" cy="100" r="90" />
                </svg>
                <div class="loading-logo-center">
                    <img src="img/logoempresa.webp" alt="Logo">
                </div>
            </div>

            <!-- Bienvenido grande -->
            <h1 class="loading-title">Bienvenido a mi Portafolio</h1>

            <!-- Porcentaje -->
            <div class="loading-percentage" id="loadingPercent">0%</div>

            <!-- Estado -->
            <div class="loading-status-text">
                <span class="status-dot"></span>
                <span id="loadingStatus">Inicializando...</span>
            </div>

            <!-- Barra de progreso -->
            <div class="loading-progress-bar">
                <div class="loading-bar-fill" id="loadingBar"></div>
            </div>
        </div>

        <!-- Marca inferior -->
        <p class="loading-brand">ELMER • DEVELOPER</p>
    </div>

    <div class="main-content" id="mainContent">
        <!-- Header vacío, solo para detectar scroll -->
        <header class="header header-premium"></header>

        <!-- Language Toggle -->
        <button id="langToggle" onclick="toggleLanguage()"
            style="position: fixed; top: 80px; right: 20px; z-index: 9998; display: flex; align-items: center; gap: 8px; padding: 8px 14px; background: rgba(10, 10, 20, 0.9); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.15); border-radius: 30px; cursor: pointer; transition: all 0.3s ease;"
            onmouseover="this.style.borderColor='rgba(0, 80, 255, 0.5)'; this.style.boxShadow='0 5px 20px rgba(0, 80, 255, 0.2)';"
            onmouseout="this.style.borderColor='rgba(255, 255, 255, 0.15)'; this.style.boxShadow='none';">
            <svg class="lang-flag" width="20" height="15" viewBox="0 0 32 24" style="border-radius: 3px;">
                <rect width="32" height="24" fill="#AA151B" />
                <rect y="6" width="32" height="12" fill="#F1BF00" />
            </svg>
            <span class="lang-text"
                style="color: #fff; font-size: 0.8rem; font-weight: 600; letter-spacing: 0.5px;">ES</span>
        </button>

        <!-- Nav izquierdo - independiente -->
        <div class="nav-left">
            <a href="#inicio" class="nav-link active">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="homeGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#0050FF" />
                            <stop offset="100%" style="stop-color:#0040CC" />
                        </linearGradient>
                    </defs>
                    <path
                        d="M3 12L5 10M5 10L12 3L19 10M5 10V20C5 20.5523 5.44772 21 6 21H9M19 10L21 12M19 10V20C19 20.5523 18.5523 21 18 21H15M9 21C9.55228 21 10 20.5523 10 20V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V20C14 20.5523 14.4477 21 15 21M9 21H15"
                        stroke="url(#homeGrad)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span data-i18n="nav.home">Inicio</span>
            </a>
            <a href="#about" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="userGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#0050FF" />
                            <stop offset="100%" style="stop-color:#0040CC" />
                        </linearGradient>
                    </defs>
                    <path
                        d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                        stroke="url(#userGrad)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="url(#userGrad)"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span data-i18n="nav.about">Acerca</span>
            </a>
        </div>

        <!-- Logo centrado - independiente -->
        <div class="nav-logo">
            <img src="img/logoempresa.webp" alt="Logo">
        </div>

        <!-- Nav derecho - independiente -->
        <div class="nav-right">
            <a href="#projects" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="codeGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#FF0000" />
                            <stop offset="100%" style="stop-color:#FF3333" />
                        </linearGradient>
                    </defs>
                    <path d="M8 9L4 12L8 15M16 9L20 12L16 15M14 4L10 20" stroke="url(#codeGrad)" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span data-i18n="nav.projects">Proyectos</span>
            </a>
            <a href="#contact" class="nav-link">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="contactGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" style="stop-color:#0050FF" />
                            <stop offset="50%" style="stop-color:#FF0000" />
                            <stop offset="100%" style="stop-color:#FF3333" />
                        </linearGradient>
                    </defs>
                    <path
                        d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z"
                        stroke="url(#contactGrad)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span data-i18n="nav.contact">Contacto</span>
            </a>
        </div>

        <section class="hero" id="inicio">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-left">
                        <div class="hero-badge"><span class="dot"></span><span data-i18n="hero.badge">Disponible para
                                proyectos</span></div>
                        <h1 class="hero-title"><span data-i18n="hero.title">Hola, soy</span> <span
                                class="name">Elmer</span></h1>
                        <div class="hero-subtitle"><span id="typewriter"></span><span class="cursor">|</span></div>
                        <p class="hero-description" data-i18n="hero.description">Transformo ideas en software de alto
                            nivel mediante IA avanzada.
                            Desarrollo desde sistemas web y automatizaciones en Python hasta aplicaciones APK y de
                            escritorio. Mi enfoque: código inteligente, desarrollo acelerado y experiencias digitales de
                            impacto.</p>
                        <div class="hero-buttons">
                            <a href="javascript:void(0)" onclick="openCVModal()" class="btn btn-primary">
                                <svg class="btn-icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <defs>
                                        <linearGradient id="cvIconGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#ffffff" />
                                            <stop offset="100%" stop-color="#e0e0ff" />
                                        </linearGradient>
                                    </defs>
                                    <path
                                        d="M14 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8L14 2Z"
                                        stroke="url(#cvIconGrad)" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M14 2V8H20" stroke="url(#cvIconGrad)" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12 11V17M12 17L9 14M12 17L15 14" stroke="url(#cvIconGrad)"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span data-i18n="hero.btn.cv">Descargar CV</span>
                            </a>
                            <a href="#contact" class="btn btn-secondary">
                                <svg class="btn-icon" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <defs>
                                        <linearGradient id="contactIconGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                            <stop offset="0%" stop-color="#0050FF" />
                                            <stop offset="50%" stop-color="#00AAFF" />
                                            <stop offset="100%" stop-color="#FF3333" />
                                        </linearGradient>
                                    </defs>
                                    <path
                                        d="M21 11.5C21.0034 12.8199 20.6951 14.1219 20.1 15.3C19.3944 16.7118 18.3098 17.8992 16.9674 18.7293C15.6251 19.5594 14.0782 19.9994 12.5 20C11.1801 20.0035 9.87812 19.6951 8.7 19.1L3 21L4.9 15.3C4.30493 14.1219 3.99656 12.8199 4 11.5C4.00061 9.92179 4.44061 8.37488 5.27072 7.03258C6.10083 5.69028 7.28825 4.6056 8.7 3.90003C9.87812 3.30496 11.1801 2.99659 12.5 3.00003H13C15.0843 3.11502 17.053 3.99479 18.5291 5.47089C20.0052 6.94699 20.885 8.91568 21 11V11.5Z"
                                        stroke="url(#contactIconGrad)" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <circle cx="8.5" cy="11.5" r="1" fill="url(#contactIconGrad)" />
                                    <circle cx="12.5" cy="11.5" r="1" fill="url(#contactIconGrad)" />
                                    <circle cx="16.5" cy="11.5" r="1" fill="url(#contactIconGrad)" />
                                </svg>
                                <span data-i18n="hero.btn.contact">Contactar</span>
                            </a>
                        </div>
                        <!-- Redes Sociales -->
                        <div class="hero-social-bar hero-social-left">
                            <a href="https://www.tiktok.com/@elmernew6?is_from_webapp=1&sender_device=pc"
                                target="_blank" class="social-icon tiktok" title="TikTok">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z" />
                                </svg>
                                <span class="social-tooltip">TikTok</span>
                            </a>
                            <a href="https://wa.me/51961349020" target="_blank" class="social-icon whatsapp"
                                title="WhatsApp">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                <span class="social-tooltip">WhatsApp</span>
                            </a>
                            <a href="https://www.instagram.com/elmerciot?igsh=MWFtcWI3czgyZjc5cA==" target="_blank"
                                class="social-icon instagram" title="Instagram">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                                <span class="social-tooltip">Instagram</span>
                            </a>
                            <a href="https://www.facebook.com/share/1PQMWqSxJK/" target="_blank"
                                class="social-icon facebook" title="Facebook">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                                <span class="social-tooltip">Facebook</span>
                            </a>
                            <a href="https://github.com/ElmerciotGOOOO" target="_blank" class="social-icon github"
                                title="GitHub">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                </svg>
                                <span class="social-tooltip">GitHub</span>
                            </a>
                            <a href="mailto:elmeroff.dc@gmail.com" class="social-icon email" title="Email">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                                <span class="social-tooltip">Email</span>
                            </a>
                        </div>
                    </div>
                    <div class="hero-right">
                        <div class="video-container">
                            <video class="hero-showcase-video" autoplay muted loop playsinline disablePictureInPicture
                                preload="metadata">
                                <source src="{{ asset('video/hero-bg.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="stats">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-item reveal">
                        <div class="stat-number" data-target="2">0</div>
                        <div class="stat-label" data-i18n="stats.years">Años Exp.</div>
                    </div>
                    <div class="stat-item reveal">
                        <div class="stat-number" data-target="5" id="projectCount">0</div>
                        <div class="stat-label" data-i18n="stats.projects">Proyectos</div>
                    </div>
                    <div class="stat-item reveal">
                        <div class="stat-number" data-target="0">0</div>
                        <div class="stat-label" data-i18n="stats.clients">Clientes</div>
                    </div>
                    <div class="stat-item reveal">
                        <div class="stat-number" data-target="100">0</div>
                        <div class="stat-label" data-i18n="stats.commitment">% Compromiso</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about" id="about">
            <div class="container">
                <div class="section-header reveal"><span class="section-tag" data-i18n="about.tag">Conóceme</span>
                    <h2 class="section-title"><span data-i18n="about.title">Acerca de</span> <span
                            data-i18n="about.title.span">Mí</span></h2>
                </div>
                <div class="about-grid">
                    <!-- Tarjeta de Perfil Profesional -->
                    <article class="profile-card-new reveal" id="profileCard">
                        <div class="card-spotlight"></div>

                        <!-- Sección Imagen -->
                        <div class="image-section">
                            <div class="image-glow"></div>
                            <img src="img/carta1_optimized.webp" alt="Rafael Elmer Huaynate Trinidad"
                                class="profile-image">
                        </div>

                        <!-- Sección Contenido -->
                        <div class="content-section">
                            <div class="status-badge-new">
                                <svg class="badge-icon" viewBox="0 0 24 24" fill="none" width="14" height="14">
                                    <path
                                        d="M12 2L14.09 8.26L21 9.27L16 14.14L17.18 21.02L12 17.77L6.82 21.02L8 14.14L3 9.27L9.91 8.26L12 2Z"
                                        fill="currentColor" />
                                </svg>
                                <span class="dot-new"></span>
                                <span data-i18n="about.status">Disponible para Desarrollo con IA Avanzada</span>
                            </div>

                            <h1 class="profile-name">Rafael Elmer<br>Huaynate Trinidad</h1>

                            <p class="profile-title">
                                <span>AI Software Engineer</span>
                                <span class="title-divider"></span>
                                <span>Full Stack & Automation Dev</span>
                            </p>

                            <p class="profile-description" data-i18n="about.bio">
                                Ingeniero de Software especializado en <strong>AI-Driven Development</strong>.
                                Utilizo Claude API, Gemini y técnicas avanzadas de Prompt Engineering para
                                construir software de complejidad industrial en tiempo récord. Creo interfaces
                                premium con Canvas y renderizado optimizado, sin depender de software pesado.
                            </p>

                            <!-- Info de Contacto Compacta -->
                            <div class="profile-contact-bar">
                                <a href="tel:+51961349020" class="contact-chip">
                                    <svg viewBox="0 0 24 24" fill="currentColor" width="14" height="14">
                                        <path
                                            d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                    </svg>
                                    <span>+51 961 349 020</span>
                                </a>
                                <a href="mailto:elmeroff.dc@gmail.com" class="contact-chip">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        width="14" height="14">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                        <polyline points="22,6 12,13 2,6" />
                                    </svg>
                                    <span>elmeroff.dc@gmail.com</span>
                                </a>
                                <div class="contact-chip location">
                                    <svg viewBox="0 0 24 24" fill="currentColor" width="14" height="14">
                                        <path
                                            d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                    </svg>
                                    <span data-i18n="about.location">Ate, Lima, Perú</span>
                                </div>
                            </div>

                            <!-- Stats principales -->
                            <div class="stats-row-new">
                                <div class="stat-item-new">
                                    <svg class="stat-icon" viewBox="0 0 24 24" fill="none" width="18" height="18">
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                                            fill="url(#aiGrad)" />
                                        <defs>
                                            <linearGradient id="aiGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" stop-color="#6366f1" />
                                                <stop offset="100%" stop-color="#06b6d4" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <span class="stat-number-new">100%</span>
                                    <span class="stat-label-new">AI-Driven</span>
                                </div>
                                <div class="stat-item-new">
                                    <svg class="stat-icon" viewBox="0 0 24 24" fill="none" width="18" height="18">
                                        <path
                                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"
                                            stroke="url(#ecoGrad)" stroke-width="1.5" fill="none" />
                                        <defs>
                                            <linearGradient id="ecoGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" stop-color="#22c55e" />
                                                <stop offset="100%" stop-color="#06b6d4" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <span class="stat-number-new">Full Stack</span>
                                    <span class="stat-label-new">Web+App+Desktop</span>
                                </div>
                                <div class="stat-item-new">
                                    <svg class="stat-icon" viewBox="0 0 24 24" fill="none" width="18" height="18">
                                        <path
                                            d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"
                                            stroke="url(#codeGrad2)" stroke-width="1.5" fill="none" />
                                        <defs>
                                            <linearGradient id="codeGrad2" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" stop-color="#f59e0b" />
                                                <stop offset="100%" stop-color="#ef4444" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <span class="stat-number-new">Automation</span>
                                    <span class="stat-label-new">Python+PHP</span>
                                </div>
                            </div>


                        </div>

                        <!-- Sección Tecnologías con Física -->
                        <div class="tech-physics-section" id="techPhysicsContainer">
                            <canvas id="techPhysicsCanvas"></canvas>
                        </div>

                        <div class="decorative-line"></div>
                    </article>

                    <div class="about-card side timezone-card reveal">
                        <h3 class="about-card-title timezone-title-enhanced">
                            <!-- Icono de reloj personalizado con gradiente -->
                            <svg class="timezone-icon-clock" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <defs>
                                    <linearGradient id="clockGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#0050FF" />
                                        <stop offset="100%" stop-color="#FF3333" />
                                    </linearGradient>
                                </defs>
                                <circle cx="12" cy="12" r="10" stroke="url(#clockGradient)" stroke-width="2"
                                    fill="none" />
                                <path d="M12 6V12L16 14" stroke="url(#clockGradient)" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span data-i18n="about.timezone.title">Mi Zona Horaria</span>
                        </h3>
                        <div class="timezone-card-content">
                            <div class="stars-container" id="starsContainer"></div>
                            <div class="timezone-info timezone-info-enhanced">
                                <div class="country-row">
                                    <!-- Icono de bandera personalizado -->
                                    <svg class="country-icon" width="28" height="20" viewBox="0 0 28 20" fill="none">
                                        <rect x="0" y="0" width="9" height="20" fill="#D91023" />
                                        <rect x="9" y="0" width="10" height="20" fill="#FFFFFF" />
                                        <rect x="19" y="0" width="9" height="20" fill="#D91023" />
                                        <rect x="0" y="0" width="28" height="20" rx="3" stroke="rgba(255,255,255,0.3)"
                                            stroke-width="0.5" fill="none" />
                                    </svg>
                                    <span class="country-name" data-i18n="about.timezone.country">Perú</span>
                                </div>
                                <div class="time-display" id="currentTime">00:00</div>
                                <div class="zone-row">
                                    <!-- Icono de ubicación personalizado -->
                                    <svg class="location-icon" width="16" height="16" viewBox="0 0 24 24" fill="none">
                                        <defs>
                                            <linearGradient id="locationGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" stop-color="#0050FF" />
                                                <stop offset="50%" stop-color="#00AAFF" />
                                                <stop offset="100%" stop-color="#0050FF" />
                                            </linearGradient>
                                        </defs>
                                        <path
                                            d="M12 2C8.13 2 5 5.13 5 9C5 14.25 12 22 12 22C12 22 19 14.25 19 9C19 5.13 15.87 2 12 2ZM12 11.5C10.62 11.5 9.5 10.38 9.5 9C9.5 7.62 10.62 6.5 12 6.5C13.38 6.5 14.5 7.62 14.5 9C14.5 10.38 13.38 11.5 12 11.5Z"
                                            fill="url(#locationGradient)" />
                                    </svg>
                                    <span class="zone-text" data-i18n="about.timezone.city">Lima, América</span>
                                </div>
                            </div>
                            <!-- Animated Astronaut with Peru Flag -->
                            <div class="astronaut-container">
                                <div class="astronaut">
                                    <svg viewBox="0 0 100 120" xmlns="http://www.w3.org/2000/svg">
                                        <!-- Flag Pole -->
                                        <rect class="flag-pole" x="75" y="25" width="3" height="50" rx="1" />
                                        <!-- Peru Flag (waving) -->
                                        <g class="peru-flag">
                                            <rect x="78" y="25" width="8" height="5" fill="#D91023" />
                                            <rect x="86" y="25" width="8" height="5" fill="#FFFFFF" />
                                            <rect x="94" y="25" width="8" height="5" fill="#D91023" />
                                            <rect x="78" y="30" width="8" height="5" fill="#D91023" />
                                            <rect x="86" y="30" width="8" height="5" fill="#FFFFFF" />
                                            <rect x="94" y="30" width="8" height="5" fill="#D91023" />
                                            <rect x="78" y="35" width="8" height="5" fill="#D91023" />
                                            <rect x="86" y="35" width="8" height="5" fill="#FFFFFF" />
                                            <rect x="94" y="35" width="8" height="5" fill="#D91023" />
                                        </g>
                                        <!-- Helmet -->
                                        <ellipse class="astro-helmet" cx="40" cy="25" rx="18" ry="20" />
                                        <!-- Visor -->
                                        <ellipse cx="40" cy="25" rx="12" ry="14" fill="url(#visorGradient)" />
                                        <defs>
                                            <linearGradient id="visorGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#4a9eff;stop-opacity:0.8" />
                                                <stop offset="50%" style="stop-color:#1a1a3e;stop-opacity:0.9" />
                                                <stop offset="100%" style="stop-color:#06b6d4;stop-opacity:0.7" />
                                            </linearGradient>
                                        </defs>
                                        <!-- Visor shine -->
                                        <ellipse cx="35" cy="20" rx="4" ry="6" fill="rgba(255,255,255,0.4)" />
                                        <!-- Body -->
                                        <ellipse class="astro-suit" cx="40" cy="58" rx="22" ry="25" />
                                        <!-- Backpack -->
                                        <rect class="astro-suit" x="55" y="45" width="12" height="25" rx="3" />
                                        <!-- Red detail stripe -->
                                        <rect class="astro-detail" x="30" y="50" width="20" height="4" rx="2" />
                                        <!-- Arms -->
                                        <ellipse class="astro-suit" cx="15" cy="55" rx="8" ry="12"
                                            transform="rotate(-20 15 55)" />
                                        <ellipse class="astro-suit" cx="68" cy="50" rx="8" ry="12"
                                            transform="rotate(30 68 50)" />
                                        <!-- Gloves -->
                                        <circle cx="10" cy="65" r="5" fill="#e0e0e0" stroke="#999" stroke-width="0.5" />
                                        <circle cx="76" cy="45" r="5" fill="#e0e0e0" stroke="#999" stroke-width="0.5" />
                                        <!-- Legs -->
                                        <ellipse class="astro-suit" cx="30" cy="90" rx="9" ry="15" />
                                        <ellipse class="astro-suit" cx="50" cy="90" rx="9" ry="15" />
                                        <!-- Boots -->
                                        <ellipse cx="30" cy="102" rx="10" ry="6" fill="#666" stroke="#444"
                                            stroke-width="0.5" />
                                        <ellipse cx="50" cy="102" rx="10" ry="6" fill="#666" stroke="#444"
                                            stroke-width="0.5" />
                                        <!-- Helmet ring -->
                                        <ellipse cx="40" cy="42" rx="16" ry="4" fill="none" stroke="#888"
                                            stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                            <div class="globe-container">
                                <canvas id="earthGlobe"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Tarjeta de Experiencia - Rediseñada -->
                    <div class="about-card side expertise-card-new reveal">
                        <h3 class="about-card-title expertise-title">
                            <!-- Icono de código personalizado -->
                            <svg class="expertise-title-icon" width="22" height="22" viewBox="0 0 24 24" fill="none">
                                <defs>
                                    <linearGradient id="expTitleGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#F59E0B" />
                                        <stop offset="100%" stop-color="#EF4444" />
                                    </linearGradient>
                                </defs>
                                <path d="M8 9L4 12L8 15M16 9L20 12L16 15M14 4L10 20" stroke="url(#expTitleGrad)"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span data-i18n="about.expertise.title">Mi Experiencia</span>
                        </h3>
                        <div class="expertise-grid-new">
                            <!-- AI & Automation -->
                            <div class="expertise-item-new">
                                <div class="expertise-icon-new ai-gradient">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="expertise-text">
                                    <strong>AI & Automation</strong>
                                    <span>Prompt Engineering, IA Agents, Voces RVC</span>
                                </div>
                            </div>

                            <!-- Desktop Apps -->
                            <div class="expertise-item-new">
                                <div class="expertise-icon-new desktop-gradient">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <rect x="2" y="3" width="20" height="14" rx="2" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <path d="M8 21H16M12 17V21" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                    </svg>
                                </div>
                                <div class="expertise-text">
                                    <strong>Desktop Apps</strong>
                                    <span>Electron.js v40, ASAR, Auto-updates</span>
                                </div>
                            </div>

                            <!-- Web Development -->
                            <div class="expertise-item-new">
                                <div class="expertise-icon-new web-gradient">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                                        <path
                                            d="M2 12H22M12 2C14.5 4.5 16 8 16 12C16 16 14.5 19.5 12 22C9.5 19.5 8 16 8 12C8 8 9.5 4.5 12 2Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                </div>
                                <div class="expertise-text">
                                    <strong>Web Dev</strong>
                                    <span>Laravel, React v18, Vite, Node.js</span>
                                </div>
                            </div>

                            <!-- Networking & Data -->
                            <div class="expertise-item-new">
                                <div class="expertise-icon-new network-gradient">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="5" r="3" stroke="currentColor" stroke-width="1.5" />
                                        <circle cx="5" cy="19" r="3" stroke="currentColor" stroke-width="1.5" />
                                        <circle cx="19" cy="19" r="3" stroke="currentColor" stroke-width="1.5" />
                                        <path d="M12 8V12M12 12L5 16M12 12L19 16" stroke="currentColor"
                                            stroke-width="1.5" />
                                    </svg>
                                </div>
                                <div class="expertise-text">
                                    <strong>Networking</strong>
                                    <span>Socket.io, Firebase, MySQL, SQLite</span>
                                </div>
                            </div>

                            <!-- Diseño Digital -->
                            <div class="expertise-item-new">
                                <div class="expertise-icon-new design-gradient">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <path d="M12 19L19 12L22 15L15 22L12 19Z" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M18 13L16.5 5.5L2 2L5.5 16.5L13 18L18 13Z" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <circle cx="8" cy="8" r="2" stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                </div>
                                <div class="expertise-text">
                                    <strong data-i18n="about.expertise.design">Diseño Digital</strong>
                                    <span data-i18n="about.expertise.design.desc">UI/UX, Assets premium, Canvas</span>
                                </div>
                            </div>

                            <!-- Game Dev -->
                            <div class="expertise-item-new">
                                <div class="expertise-icon-new game-gradient">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <rect x="2" y="6" width="20" height="12" rx="3" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <circle cx="8" cy="12" r="2" stroke="currentColor" stroke-width="1.5" />
                                        <circle cx="16" cy="10" r="1" fill="currentColor" />
                                        <circle cx="16" cy="14" r="1" fill="currentColor" />
                                        <circle cx="14" cy="12" r="1" fill="currentColor" />
                                        <circle cx="18" cy="12" r="1" fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="expertise-text">
                                    <strong>Game Dev</strong>
                                    <span>Unreal Engine C++, Python, C#</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="projects" id="projects">
            <div class="container">
                <div class="section-header reveal"><span class="section-tag" data-i18n="projects.tag">Portafolio</span>
                    <h2 class="section-title"><span data-i18n="projects.title">Mis</span> <span
                            data-i18n="projects.title.span">Proyectos</span></h2>
                </div>

                <!-- Slider Container -->
                <div class="projects-slider-container">
                    <button class="slider-btn slider-prev" onclick="slideProjects(-1)">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M15 18L9 12L15 6" />
                        </svg>
                    </button>

                    <div class="projects-slider">
                        <div class="projects-track" style="display: flex; gap: 2rem; justify-content: center;">
                            <!-- Fluxy Card -->
                            <div class="project-card reveal"
                                style="flex: 0 0 380px; max-width: 400px; background: linear-gradient(145deg, rgba(15, 15, 30, 0.95), rgba(10, 10, 25, 0.98)); border: 1px solid rgba(255, 51, 102, 0.3); border-radius: 20px; overflow: hidden;">
                                <div class="project-image"
                                    style="height: 200px; background: linear-gradient(135deg, #1a0a1a 0%, #0a0a15 100%); display: flex; align-items: center; justify-content: center; position: relative;">
                                    <i class="fab fa-tiktok"
                                        style="font-size: 4rem; background: linear-gradient(135deg, #25F4EE, #FE2C55, #000); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>
                                    <div class="project-overlay" style="position: absolute; top: 12px; right: 12px;">
                                        <span class="project-status"
                                            style="background: linear-gradient(135deg, #22c55e, #16a34a); padding: 6px 14px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; color: #fff; box-shadow: 0 4px 12px rgba(34, 197, 94, 0.4);"
                                            data-i18n="projects.fluxy.status">Completado</span>
                                    </div>
                                </div>
                                <div class="project-content" style="padding: 1.5rem;">
                                    <h3 class="project-title"
                                        style="font-size: 1.4rem; font-weight: 700; color: #fff; margin-bottom: 0.75rem;">
                                        Fluxy - Music Request</h3>
                                    <p class="project-description" data-i18n="projects.fluxy.desc"
                                        style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.75); line-height: 1.6; margin-bottom: 1.25rem;">
                                        App de escritorio para streamers de TikTok. Tu audiencia pide música desde el
                                        chat en tiempo real.</p>
                                    <div class="project-tech"
                                        style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1.25rem;">
                                        <span class="tech-tag"
                                            style="padding: 6px 12px; background: rgba(255, 51, 102, 0.15); border: 1px solid rgba(255, 51, 102, 0.3); border-radius: 8px; font-size: 0.75rem; color: #ff6b8a; font-weight: 600;">Electron</span>
                                        <span class="tech-tag"
                                            style="padding: 6px 12px; background: rgba(97, 218, 251, 0.1); border: 1px solid rgba(97, 218, 251, 0.3); border-radius: 8px; font-size: 0.75rem; color: #61dafb; font-weight: 600;">React</span>
                                        <span class="tech-tag"
                                            style="padding: 6px 12px; background: rgba(255, 196, 0, 0.1); border: 1px solid rgba(255, 196, 0, 0.3); border-radius: 8px; font-size: 0.75rem; color: #ffc400; font-weight: 600;">Firebase</span>
                                    </div>
                                    <a href="/fluxy" target="_blank" class="project-link"
                                        style="display: inline-flex; align-items: center; gap: 8px; color: #FF3366; font-size: 0.9rem; font-weight: 600; text-decoration: none; transition: gap 0.3s ease;"><span
                                            data-i18n="projects.view">Ver
                                            Proyecto</span> <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>

                            <!-- Laive V2 Card -->
                            <div class="project-card reveal"
                                style="flex: 0 0 380px; max-width: 400px; background: linear-gradient(145deg, rgba(20, 18, 12, 0.98), rgba(15, 13, 8, 0.98)); border: 1px solid rgba(212, 160, 18, 0.4); border-radius: 20px; overflow: hidden;">
                                <div class="project-image"
                                    style="height: 200px; background: linear-gradient(135deg, #1a1508 0%, #0f0e08 100%); display: flex; align-items: center; justify-content: center; position: relative;">
                                    <!-- Logo grande centrado -->
                                    <img src="/laive-assets/LogoLaive.png" alt="Laive Logo"
                                        style="width: 100px; height: 100px; object-fit: contain; filter: drop-shadow(0 4px 20px rgba(212, 160, 18, 0.4));">
                                    <!-- Badges -->
                                    <div style="position: absolute; top: 12px; left: 12px;">
                                        <span data-i18n="projects.laive.badge"
                                            style="background: linear-gradient(135deg, #D4A012, #F59E0B); padding: 6px 12px; border-radius: 20px; font-size: 0.7rem; font-weight: 700; color: #fff; box-shadow: 0 4px 12px rgba(212, 160, 18, 0.4);">Personal</span>
                                    </div>
                                    <div class="project-overlay" style="position: absolute; top: 12px; right: 12px;">
                                        <span class="project-status" data-i18n="projects.laive.status"
                                            style="background: linear-gradient(135deg, #22c55e, #16a34a); padding: 6px 14px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; color: #fff; box-shadow: 0 4px 12px rgba(34, 197, 94, 0.4);">Completado</span>
                                    </div>
                                </div>
                                <div class="project-content" style="padding: 1.5rem;">
                                    <h3 class="project-title"
                                        style="font-size: 1.4rem; font-weight: 700; color: #fff; margin-bottom: 0.75rem;">
                                        Laive V2</h3>
                                    <p class="project-description" data-i18n="projects.laive.desc"
                                        style="font-size: 0.9rem; color: rgba(255, 255, 255, 0.75); line-height: 1.6; margin-bottom: 1.25rem;">
                                        Sistema de control de producción industrial. Cronómetro inteligente, KPIs en
                                        tiempo real y sincronización multi-dispositivo.</p>
                                    <div class="project-tech"
                                        style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1.25rem;">
                                        <span class="tech-tag"
                                            style="padding: 6px 12px; background: rgba(212, 160, 18, 0.15); border: 1px solid rgba(212, 160, 18, 0.3); border-radius: 8px; font-size: 0.75rem; color: #D4A012; font-weight: 600;">Electron</span>
                                        <span class="tech-tag"
                                            style="padding: 6px 12px; background: rgba(97, 218, 251, 0.1); border: 1px solid rgba(97, 218, 251, 0.3); border-radius: 8px; font-size: 0.75rem; color: #61dafb; font-weight: 600;">React</span>
                                        <span class="tech-tag"
                                            style="padding: 6px 12px; background: rgba(255, 196, 0, 0.1); border: 1px solid rgba(255, 196, 0, 0.3); border-radius: 8px; font-size: 0.75rem; color: #ffc400; font-weight: 600;">Firebase</span>
                                    </div>
                                    <a href="/laive" target="_blank" class="project-link"
                                        style="display: inline-flex; align-items: center; gap: 8px; color: #D4A012; font-size: 0.9rem; font-weight: 600; text-decoration: none; transition: gap 0.3s ease;"><span
                                            data-i18n="projects.view">Ver
                                            Proyecto</span> <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="slider-btn slider-next" onclick="slideProjects(1)">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M9 18L15 12L9 6" />
                        </svg>
                    </button>
                </div>

                <!-- Las dos tarjetas ya están visibles, no necesita slider -->
            </div>
        </section>

        <section class="clients" id="testimonials">
            <div class="container">
                <div class="section-header reveal"><span class="section-tag"
                        data-i18n="testimonials.tag">Testimonios</span>
                    <h2 class="section-title"><span data-i18n="testimonials.title">Clientes y</span> <span
                            data-i18n="testimonials.title.span">Usuarios</span></h2>
                </div>

                <!-- Testimonials Slider -->
                <div class="testimonials-slider-wrapper reveal">
                    <button class="slider-nav slider-prev" id="testimonialsPrev" aria-label="Anterior">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M15 18l-6-6 6-6" />
                        </svg>
                    </button>

                    <div class="testimonials-slider" id="testimonials-container">
                        <!-- Will be populated by JavaScript -->
                    </div>

                    <button class="slider-nav slider-next" id="testimonialsNext" aria-label="Siguiente">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M9 18l6-6-6-6" />
                        </svg>
                    </button>
                </div>

                <!-- Submit testimonial button -->
                <div class="testimonial-cta reveal" style="text-align: center; margin-top: 2rem;">
                    <a href="/testimonios/enviar" class="btn btn-secondary"
                        style="display: inline-flex; align-items: center; gap: 10px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M12 5v14M5 12h14" />
                        </svg>
                        <span data-i18n="testimonials.submit">Dejar mi Testimonio</span>
                    </a>
                </div>
            </div>

            <style>
                @keyframes spin {
                    to {
                        transform: rotate(360deg);
                    }
                }

                .testimonials-slider-wrapper {
                    position: relative;
                    display: flex;
                    align-items: center;
                    gap: 1rem;
                }
                
                .testimonials-slider {
                    display: flex;
                    gap: 1.5rem;
                    overflow: hidden;
                    scroll-behavior: smooth;
                    flex: 1;
                    padding: 1rem 0;
                }
                
                .testimonials-slider .testimonial-card {
                    flex: 0 0 calc(33.333% - 1rem);
                    min-width: 300px;
                }
                
                @media (max-width: 1024px) {
                    .testimonials-slider .testimonial-card {
                        flex: 0 0 calc(50% - 0.75rem);
                    }
                }
                
                @media (max-width: 768px) {
                    .testimonials-slider .testimonial-card {
                        flex: 0 0 85%;
                    }
                    .slider-nav { display: none !important; }
                    .testimonials-slider {
                        overflow-x: auto;
                        scroll-snap-type: x mandatory;
                        -webkit-overflow-scrolling: touch;
                    }
                    .testimonials-slider .testimonial-card { scroll-snap-align: start; }
                }
                
                .slider-nav {
                    width: 48px;
                    height: 48px;
                    border-radius: 50%;
                    background: rgba(0, 80, 255, 0.1);
                    border: 1px solid rgba(0, 80, 255, 0.3);
                    color: #0050FF;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: all 0.3s;
                    flex-shrink: 0;
                }
                
                .slider-nav:hover {
                    background: rgba(0, 80, 255, 0.2);
                    transform: scale(1.1);
                }
                
                .slider-nav:disabled {
                    opacity: 0.3;
                    cursor: not-allowed;
                    transform: none;
                }
                
                .testimonials-placeholder {
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    padding: 3rem 2rem;
                    background: linear-gradient(145deg, rgba(20, 20, 35, 0.5), rgba(15, 15, 25, 0.5));
                    border: 1px dashed rgba(0, 80, 255, 0.3);
                    border-radius: 20px;
                    min-height: 200px;
                }
                
                .testimonials-placeholder h4 {
                    color: rgba(255, 255, 255, 0.7);
                    font-size: 1.1rem;
                    margin-bottom: 0.5rem;
                }
                
                .testimonials-placeholder p {
                    color: rgba(255, 255, 255, 0.4);
                    font-size: 0.9rem;
                }
            </style>
        </section>

        <section class="services">
            <div class="container">
                <div class="section-header reveal"><span class="section-tag" data-i18n="services.tag">Servicios</span>
                    <h2 class="section-title"><span data-i18n="services.title">Lo que</span> <span
                            data-i18n="services.title.span">Ofrezco</span></h2>
                </div>
                <div class="services-grid">
                    <!-- Desarrollo Web Full Stack -->
                    <div class="service-card reveal">
                        <div class="service-icon-new">
                            <svg viewBox="0 0 24 24" fill="none" width="32" height="32">
                                <defs>
                                    <linearGradient id="webGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#0050FF" />
                                        <stop offset="100%" stop-color="#00AAFF" />
                                    </linearGradient>
                                </defs>
                                <rect x="2" y="3" width="20" height="14" rx="2" stroke="url(#webGrad)"
                                    stroke-width="2" />
                                <path d="M8 21h8M12 17v4" stroke="url(#webGrad)" stroke-width="2"
                                    stroke-linecap="round" />
                                <path d="M8 10l-2 2 2 2M16 10l2 2-2 2M13 8l-2 6" stroke="url(#webGrad)"
                                    stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </div>
                        <h3 class="service-title" data-i18n="services.web.title">Desarrollo Web Full Stack</h3>
                        <p class="service-description" data-i18n="services.web.desc">Sitios web y aplicaciones completas
                            con Laravel, React, Vue.js y
                            bases de datos. Desde landing pages hasta sistemas complejos.</p>
                    </div>

                    <!-- Apps de Escritorio -->
                    <div class="service-card reveal">
                        <div class="service-icon-new">
                            <svg viewBox="0 0 24 24" fill="none" width="32" height="32">
                                <defs>
                                    <linearGradient id="desktopGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#6366F1" />
                                        <stop offset="100%" stop-color="#0050FF" />
                                    </linearGradient>
                                </defs>
                                <rect x="2" y="4" width="20" height="12" rx="2" stroke="url(#desktopGrad)"
                                    stroke-width="2" />
                                <path d="M12 16v4M8 20h8" stroke="url(#desktopGrad)" stroke-width="2"
                                    stroke-linecap="round" />
                                <circle cx="12" cy="10" r="3" stroke="url(#desktopGrad)" stroke-width="1.5" />
                            </svg>
                        </div>
                        <h3 class="service-title" data-i18n="services.desktop.title">Apps de Escritorio</h3>
                        <p class="service-description" data-i18n="services.desktop.desc">Aplicaciones nativas con
                            Electron y Python. Instaladores
                            profesionales, actualizaciones automáticas y rendimiento óptimo.</p>
                    </div>

                    <!-- Automatización con IA -->
                    <div class="service-card reveal">
                        <div class="service-icon-new">
                            <svg viewBox="0 0 24 24" fill="none" width="32" height="32">
                                <defs>
                                    <linearGradient id="aiGradService" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#FF3333" />
                                        <stop offset="100%" stop-color="#FF6B6B" />
                                    </linearGradient>
                                </defs>
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"
                                    stroke="url(#aiGradService)" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <h3 class="service-title" data-i18n="services.ai.title">Automatización con IA</h3>
                        <p class="service-description" data-i18n="services.ai.desc">Integración de Claude API, Gemini y
                            OpenAI. Bots inteligentes,
                            procesamiento de datos y flujos automatizados.</p>
                    </div>

                    <!-- Apps para Streamers -->
                    <div class="service-card reveal">
                        <div class="service-icon-new">
                            <svg viewBox="0 0 24 24" fill="none" width="32" height="32">
                                <defs>
                                    <linearGradient id="streamGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#25F4EE" />
                                        <stop offset="100%" stop-color="#FE2C55" />
                                    </linearGradient>
                                </defs>
                                <circle cx="12" cy="12" r="10" stroke="url(#streamGrad)" stroke-width="2" />
                                <polygon points="10,8 16,12 10,16" fill="url(#streamGrad)" />
                            </svg>
                        </div>
                        <h3 class="service-title" data-i18n="services.stream.title">Apps para Streamers</h3>
                        <p class="service-description" data-i18n="services.stream.desc">Herramientas personalizadas para
                            TikTok Live, Twitch y YouTube.
                            Comandos de chat, música interactiva y overlays.</p>
                    </div>

                    <!-- Diseño UI Premium -->
                    <div class="service-card reveal">
                        <div class="service-icon-new">
                            <svg viewBox="0 0 24 24" fill="none" width="32" height="32">
                                <defs>
                                    <linearGradient id="uiGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#00AAFF" />
                                        <stop offset="100%" stop-color="#00FF88" />
                                    </linearGradient>
                                </defs>
                                <rect x="3" y="3" width="18" height="18" rx="3" stroke="url(#uiGrad)"
                                    stroke-width="2" />
                                <path d="M3 9h18M9 9v12" stroke="url(#uiGrad)" stroke-width="2" />
                                <circle cx="15" cy="15" r="3" stroke="url(#uiGrad)" stroke-width="1.5" />
                            </svg>
                        </div>
                        <h3 class="service-title" data-i18n="services.ui.title">Diseño UI Premium</h3>
                        <p class="service-description" data-i18n="services.ui.desc">Interfaces modernas sin Photoshop.
                            Diseño con código, animaciones
                            CSS y experiencias visuales de alto impacto.</p>
                    </div>

                    <!-- APIs & Backend -->
                    <div class="service-card reveal">
                        <div class="service-icon-new">
                            <svg viewBox="0 0 24 24" fill="none" width="32" height="32">
                                <defs>
                                    <linearGradient id="apiGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#F59E0B" />
                                        <stop offset="100%" stop-color="#EF4444" />
                                    </linearGradient>
                                </defs>
                                <rect x="4" y="4" width="6" height="6" rx="1" stroke="url(#apiGrad)" stroke-width="2" />
                                <rect x="14" y="4" width="6" height="6" rx="1" stroke="url(#apiGrad)"
                                    stroke-width="2" />
                                <rect x="4" y="14" width="6" height="6" rx="1" stroke="url(#apiGrad)"
                                    stroke-width="2" />
                                <rect x="14" y="14" width="6" height="6" rx="1" stroke="url(#apiGrad)"
                                    stroke-width="2" />
                                <path d="M10 7h4M10 17h4M7 10v4M17 10v4" stroke="url(#apiGrad)" stroke-width="1.5"
                                    stroke-linecap="round" />
                            </svg>
                        </div>
                        <h3 class="service-title">APIs & Backend</h3>
                        <p class="service-description">APIs RESTful con Laravel y Python. Autenticación, bases de datos,
                            webhooks y arquitectura escalable.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="nova-section" id="contact">
            <div class="container">
                <div class="section-header reveal"><span class="section-tag" data-i18n="nova.tag">Asistente IA</span>
                    <h2 class="section-title"><span data-i18n="nova.title">Conoce a</span> <span>CLICber</span></h2>
                </div>

                <div class="nova-container reveal">
                    <!-- Nova Avatar Side -->
                    <div class="nova-avatar-side">
                        <div class="nova-avatar" id="novaAvatar">
                            <div class="nova-glow"></div>
                            <svg class="nova-icon" id="novaFace" viewBox="0 0 100 100" fill="none">
                                <!-- Outer ring -->
                                <circle cx="50" cy="50" r="45" stroke="url(#novaGrad1)" stroke-width="2" fill="none"
                                    opacity="0.5" />
                                <!-- Inner ring with animation -->
                                <circle class="nova-ring" cx="50" cy="50" r="38" stroke="url(#novaGrad2)"
                                    stroke-width="3" fill="none" />
                                <!-- Core/Head -->
                                <circle class="nova-head" cx="50" cy="50" r="28" fill="url(#novaCore)" />

                                <!-- Face Group (moves with cursor) -->
                                <g id="novaFaceGroup">
                                    <!-- Eyebrows - más suaves y tiernas -->
                                    <path id="novaBrowLeft" class="nova-brow" d="M34 40 Q38 38 42 40" stroke="#00AAFF"
                                        stroke-width="1.5" stroke-linecap="round" fill="none" />
                                    <path id="novaBrowRight" class="nova-brow" d="M58 40 Q62 38 66 40" stroke="#00AAFF"
                                        stroke-width="1.5" stroke-linecap="round" fill="none" />

                                    <!-- Left Eye - más grande y tierno -->
                                    <g class="nova-eye-group" id="novaEyeLeft">
                                        <ellipse class="nova-eye-white" cx="40" cy="48" rx="7" ry="8" fill="#fff" />
                                        <ellipse class="nova-pupil" id="novaPupilLeft" cx="40" cy="48" rx="4" ry="5"
                                            fill="#1a1a3e" />
                                        <ellipse class="nova-pupil-inner" cx="40" cy="48" rx="2" ry="2.5"
                                            fill="#0a0a1a" />
                                        <ellipse class="nova-eye-shine" cx="37" cy="45" rx="2" ry="2"
                                            fill="rgba(255,255,255,0.95)" />
                                        <ellipse class="nova-eye-shine-small" cx="42" cy="51" rx="1" ry="1"
                                            fill="rgba(255,255,255,0.6)" />
                                    </g>

                                    <!-- Right Eye - más grande y tierno -->
                                    <g class="nova-eye-group" id="novaEyeRight">
                                        <ellipse class="nova-eye-white" cx="60" cy="48" rx="7" ry="8" fill="#fff" />
                                        <ellipse class="nova-pupil" id="novaPupilRight" cx="60" cy="48" rx="4" ry="5"
                                            fill="#1a1a3e" />
                                        <ellipse class="nova-pupil-inner" cx="60" cy="48" rx="2" ry="2.5"
                                            fill="#0a0a1a" />
                                        <ellipse class="nova-eye-shine" cx="57" cy="45" rx="2" ry="2"
                                            fill="rgba(255,255,255,0.95)" />
                                        <ellipse class="nova-eye-shine-small" cx="62" cy="51" rx="1" ry="1"
                                            fill="rgba(255,255,255,0.6)" />
                                    </g>

                                    <!-- Mouth - sonrisa simple y amigable -->
                                    <path class="nova-mouth" id="novaMouth" d="M43 61 Q50 67 57 61" stroke="#fff"
                                        stroke-width="2.5" stroke-linecap="round" fill="none" />

                                    <!-- Blush/Mejillas - sutil -->
                                    <ellipse class="nova-blush" id="novaBlushLeft" cx="30" cy="55" rx="4" ry="2.5"
                                        fill="rgba(255, 150, 180, 0.15)" />
                                    <ellipse class="nova-blush" id="novaBlushRight" cx="70" cy="55" rx="4" ry="2.5"
                                        fill="rgba(255, 150, 180, 0.15)" />
                                </g>

                                <defs>
                                    <linearGradient id="novaGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#0050FF" />
                                        <stop offset="100%" stop-color="#FF3333" />
                                    </linearGradient>
                                    <linearGradient id="novaGrad2" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" stop-color="#00AAFF" />
                                        <stop offset="50%" stop-color="#0050FF" />
                                        <stop offset="100%" stop-color="#FF3333" />
                                    </linearGradient>
                                    <radialGradient id="novaCore" cx="50%" cy="50%" r="50%">
                                        <stop offset="0%" stop-color="#1a1a3e" />
                                        <stop offset="100%" stop-color="#0a0a1a" />
                                    </radialGradient>
                                </defs>
                            </svg>
                        </div>
                        <h3 class="nova-name">CLICber</h3>
                        <div class="nova-badge"
                            style="display: inline-flex; align-items: center; gap: 10px; padding: 8px 20px; border-radius: 50px; background: rgba(0, 80, 255, 0.03); border: 1px solid rgba(0, 80, 255, 0.15); box-shadow: 0 0 20px rgba(0, 80, 255, 0.05); margin-bottom: 24px;">
                            <i class="fas fa-microchip" style="color: #0080FF;"></i>
                            <span
                                style="font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase; font-size: 0.8rem; background: linear-gradient(90deg, #0080FF, #FF3333); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Tu
                                Asistente Personal</span>
                        </div>
                        <div class="nova-status" style="margin-bottom: 30px;">
                            <span class="status-dot"
                                style="background-color: #ef4444; box-shadow: 0 0 10px rgba(239, 68, 68, 0.5);"></span>
                            <span style="color: #cbd5e1;">Fuera de línea</span>
                        </div>
                        <div class="nova-description-list" style="text-align: left; padding: 0 5px; opacity: 0.9;">
                            <div style="display: flex; align-items: flex-start; gap: 15px; margin-bottom: 16px;">
                                <div
                                    style="min-width: 6px; height: 6px; margin-top: 8px; border-radius: 50%; background: linear-gradient(to bottom, #0050FF, #FF3333);">
                                </div>
                                <span style="color: #cbd5e1; font-size: 1.05rem; line-height: 1.5;">Soy <strong
                                        style="color: #fff; font-weight: 600;">CLICber Nova</strong>, tu guía
                                    inteligente.</span>
                            </div>
                            <div style="display: flex; align-items: flex-start; gap: 15px; margin-bottom: 16px;">
                                <div
                                    style="min-width: 6px; height: 6px; margin-top: 8px; border-radius: 50%; background: linear-gradient(to bottom, #0050FF, #FF3333);">
                                </div>
                                <span style="color: #94a3b8; line-height: 1.5;">Conozco todos los detalles sobre los
                                    proyectos y habilidades de Elmer.</span>
                            </div>
                            <div style="display: flex; align-items: flex-start; gap: 15px;">
                                <div
                                    style="min-width: 6px; height: 6px; margin-top: 8px; border-radius: 50%; background: linear-gradient(to bottom, #0050FF, #FF3333);">
                                </div>
                                <span style="color: #94a3b8; line-height: 1.5;">Estoy en constante aprendizaje para
                                    brindarte la mejor información.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Chat Area -->
                    <div class="nova-chat" style="position: relative; overflow: hidden; border-radius: 20px;">
                        <!-- Maintenance Overlay -->
                        <div class="maintenance-overlay"
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(5, 5, 16, 0.98); z-index: 50; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center;">

                            <div class="maintenance-icon"
                                style="margin-bottom: 1.5rem; width: 70px; height: 70px; display: flex; align-items: center; justify-content: center; border-radius: 16px; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.05);">
                                <i class="fas fa-sliders-h"
                                    style="font-size: 2rem; background: linear-gradient(135deg, #0050FF 0%, #FF3333 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;"></i>
                            </div>

                            <h3
                                style="font-size: 1.4rem; font-weight: 700; margin-bottom: 0.8rem; letter-spacing: -0.5px; color: #fff;">
                                EN MANTENIMIENTO</h3>

                            <p
                                style="color: #64748b; font-size: 0.9rem; font-weight: 500; text-transform: uppercase; letter-spacing: 1px; background: linear-gradient(90deg, #94a3b8, #cbd5e1); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                Sistema en Entrenamiento</p>
                        </div>

                        <div class="chat-messages" id="chatMessages"
                            style="opacity: 0.0; pointer-events: none; filter: blur(5px);">
                            <!-- Welcome message -->
                            <div class="chat-message nova-message">
                                <div class="message-avatar">
                                    <svg viewBox="0 0 40 40" fill="none">
                                        <circle cx="20" cy="20" r="18" fill="url(#msgNovaGrad)" />
                                        <ellipse cx="15" cy="18" rx="2" ry="2.5" fill="#fff" />
                                        <ellipse cx="25" cy="18" rx="2" ry="2.5" fill="#fff" />
                                        <path d="M15 24 Q20 28 25 24" stroke="#fff" stroke-width="2"
                                            stroke-linecap="round" fill="none" />
                                        <defs>
                                            <linearGradient id="msgNovaGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" stop-color="#0050FF" />
                                                <stop offset="100%" stop-color="#00AAFF" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="message-content">
                                    <span class="message-name">Nova</span>
                                    <p>¡Hola! 👋 Soy Nova, el asistente virtual de Elmer. ¿En qué puedo ayudarte hoy?
                                        Puedes preguntarme sobre:</p>
                                    <div class="suggestion-chips">
                                        <button class="chip" onclick="askNova('¿Cuáles son los proyectos de Elmer?')">📁
                                            Proyectos</button>
                                        <button class="chip" onclick="askNova('¿Qué tecnologías domina?')">💻
                                            Tecnologías</button>
                                        <button class="chip" onclick="askNova('¿Cómo puedo contactar a Elmer?')">📧
                                            Contacto</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="chat-input-area">
                            <input type="text" id="novaInput" class="chat-input" placeholder="Escribe tu pregunta..."
                                onkeypress="handleNovaKeypress(event)">
                            <button class="chat-send" onclick="sendToNova()">
                                <svg viewBox="0 0 24 24" fill="none" width="20" height="20">
                                    <path d="M22 2L11 13M22 2L15 22L11 13M22 2L2 9L11 13" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer"
            style="padding: 25px 0; border-top: 1px solid rgba(255, 255, 255, 0.1); margin-top: 40px; position: relative; z-index: 10;">
            <div class="container" style="display: flex; justify-content: center; align-items: center;">
                <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.9rem; margin: 0;">
                    © 2026 <span
                        style="background: linear-gradient(90deg, #0050FF, #FF3333); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 700;">Rafael
                        Elmer</span>
                </p>
            </div>
        </footer>
    </div>

    <script defer src="{{ asset('js/app.js') }}"></script>
    <script defer src="{{ asset('js/globe.js') }}"></script>
    <script defer src="{{ asset('js/techPhysics.js') }}"></script>
    <script src="{{ asset('js/i18n.js') }}"></script>

    <!-- Modal CV -->
    <div id="cvModal"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.8); backdrop-filter: blur(8px); z-index: 9999; align-items: center; justify-content: center;">
        <div
            style="background: linear-gradient(145deg, rgba(15, 15, 30, 0.98), rgba(8, 8, 20, 0.98)); border: 1px solid rgba(0, 80, 255, 0.3); border-radius: 20px; padding: 2rem; max-width: 400px; width: 90%; position: relative; box-shadow: 0 25px 80px rgba(0, 0, 0, 0.5), 0 0 60px rgba(0, 80, 255, 0.1);">
            <!-- Botón cerrar -->
            <button onclick="closeCVModal()"
                style="position: absolute; top: 15px; right: 15px; background: none; border: none; cursor: pointer; padding: 5px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.5)"
                    stroke-width="2">
                    <path d="M18 6L6 18M6 6L18 18" />
                </svg>
            </button>

            <!-- Título -->
            <div style="text-align: center; margin-bottom: 1.5rem;">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" style="margin-bottom: 0.5rem;">
                    <path
                        d="M14 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8L14 2Z"
                        stroke="url(#modalCvGrad)" stroke-width="2" />
                    <path d="M14 2V8H20" stroke="url(#modalCvGrad)" stroke-width="2" />
                    <defs>
                        <linearGradient id="modalCvGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#0050FF" />
                            <stop offset="100%" stop-color="#00AAFF" />
                        </linearGradient>
                    </defs>
                </svg>
                <h3 style="color: #fff; font-size: 1.25rem; font-weight: 600; margin: 0;">Selecciona el idioma</h3>
            </div>

            <!-- Opciones -->
            <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                <!-- Español -->
                <a href="{{ asset('downloads/cv-espanol.pdf') }}" download
                    style="display: flex; align-items: center; gap: 1rem; padding: 1rem 1.25rem; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 12px; text-decoration: none; transition: all 0.3s ease;"
                    onmouseover="this.style.background='rgba(0, 80, 255, 0.1)'; this.style.borderColor='rgba(0, 80, 255, 0.4)';"
                    onmouseout="this.style.background='rgba(255, 255, 255, 0.03)'; this.style.borderColor='rgba(255, 255, 255, 0.1)';">
                    <!-- Bandera España SVG -->
                    <svg width="32" height="24" viewBox="0 0 32 24"
                        style="border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.3);">
                        <rect width="32" height="24" fill="#AA151B" />
                        <rect y="6" width="32" height="12" fill="#F1BF00" />
                    </svg>
                    <div>
                        <span style="color: #fff; font-weight: 600; font-size: 1rem; display: block;">Español</span>
                        <span style="color: rgba(255,255,255,0.5); font-size: 0.8rem;">Currículum en español</span>
                    </div>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)"
                        stroke-width="2" style="margin-left: auto;">
                        <path d="M12 5V19M12 19L5 12M12 19L19 12" />
                    </svg>
                </a>

                <!-- Inglés -->
                <a href="{{ asset('downloads/cv-ingles.pdf') }}" download
                    style="display: flex; align-items: center; gap: 1rem; padding: 1rem 1.25rem; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 12px; text-decoration: none; transition: all 0.3s ease;"
                    onmouseover="this.style.background='rgba(0, 80, 255, 0.1)'; this.style.borderColor='rgba(0, 80, 255, 0.4)';"
                    onmouseout="this.style.background='rgba(255, 255, 255, 0.03)'; this.style.borderColor='rgba(255, 255, 255, 0.1)';">
                    <!-- Bandera UK SVG -->
                    <svg width="32" height="24" viewBox="0 0 32 24"
                        style="border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.3);">
                        <rect width="32" height="24" fill="#012169" />
                        <path d="M0 0L32 24M32 0L0 24" stroke="#fff" stroke-width="4" />
                        <path d="M0 0L32 24M32 0L0 24" stroke="#C8102E" stroke-width="2" />
                        <path d="M16 0V24M0 12H32" stroke="#fff" stroke-width="6" />
                        <path d="M16 0V24M0 12H32" stroke="#C8102E" stroke-width="4" />
                    </svg>
                    <div>
                        <span style="color: #fff; font-weight: 600; font-size: 1rem; display: block;">English</span>
                        <span style="color: rgba(255,255,255,0.5); font-size: 0.8rem;">Resume in English</span>
                    </div>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.4)"
                        stroke-width="2" style="margin-left: auto;">
                        <path d="M12 5V19M12 19L5 12M12 19L19 12" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <script>
        function openCVModal() {
            document.getElementById('cvModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeCVModal() {
            document.getElementById('cvModal').style.display = 'none';
            document.body.style.overflow = '';
        }

        // Cerrar al hacer clic fuera
        document.getElementById('cvModal').addEventListener('click', function (e) {
            if (e.target === this) closeCVModal();
        });

        // Cerrar con Escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeCVModal();
        });

        // Contador dinámico de proyectos
        document.addEventListener('DOMContentLoaded', function () {
            const projectCards = document.querySelectorAll('.project-card');
            const projectCounter = document.getElementById('projectCount');
            if (projectCounter && projectCards.length > 0) {
                projectCounter.setAttribute('data-target', projectCards.length);
            }
        });
    </script>

    <!-- Firebase SDK for Testimonials (Realtime Database) -->
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-database-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-storage-compat.js"></script>
    <script src="{{ asset('js/firebase-config.js') }}"></script>
    <script src="{{ asset('js/testimonials.js') }}"></script>
</body>

</html>