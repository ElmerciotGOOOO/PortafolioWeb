<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fluxy - La Plataforma Definitiva de Automatización para Streams de TikTok">
    <title>Fluxy | Automatización para TikTok Live</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fluxy.css') }}">
</head>

<body class="fluxy-page dark-theme">
    <!-- Fondo animado -->
    <div class="fluxy-bg-grid"></div>
    <div class="fluxy-glow fluxy-glow-1"></div>
    <div class="fluxy-glow fluxy-glow-2"></div>
    <div class="fluxy-glow fluxy-glow-3"></div>

    <!-- Navegación simple con logo -->
    <nav class="fluxy-nav">
        <div class="fluxy-nav-logo">
            <img src="{{ asset('img/LogoFluxy.webp') }}" alt="Fluxy Logo">
        </div>
        <div class="fluxy-nav-links">
            <a href="#features">Funciones</a>
            <a href="#coming-soon">Próximamente</a>
            <a href="#install">Instalación</a>
            <a href="#creator">Contacto</a>
        </div>
    </nav>

    <!-- Hero Section - Principal -->
    <section class="fluxy-hero">
        <div class="fluxy-hero-content">
            <div class="fluxy-hero-badge">
                <svg class="badge-icon" viewBox="0 0 24 24" fill="none" width="18" height="18">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" />
                    <path d="M8 12L11 15L16 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                Aplicación de Escritorio para Windows
            </div>
            <h1 class="fluxy-hero-title">
                <img src="{{ asset('img/LogoFluxy.webp') }}" alt="Fluxy" class="fluxy-title-logo">
            </h1>
            <p class="fluxy-hero-subtitle">La Plataforma de Automatización para TikTok Live</p>
            <p class="fluxy-hero-description">
                Transforma tu stream con interacciones automáticas: música a pedido,
                bots inteligentes, recompensas por donaciones y mucho más.
            </p>
            <div class="fluxy-hero-buttons">
                <a href="https://drive.google.com/file/d/1cql5v-FyKCxWV2joXz6C9SFo1OrmeNOw/view?usp=sharing"
                    class="fluxy-btn fluxy-btn-primary">
                    <svg viewBox="0 0 24 24" fill="none" width="22" height="22">
                        <path d="M12 3V16M12 16L7 11M12 16L17 11" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5 21H19" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" />
                    </svg>
                    <span>Descargar Gratis</span>
                </a>
                <a href="#features" class="fluxy-btn fluxy-btn-secondary">
                    <svg viewBox="0 0 24 24" fill="none" width="22" height="22">
                        <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>Ver Funciones</span>
                </a>
                <span class="fluxy-btn fluxy-btn-disabled">
                    <svg viewBox="0 0 24 24" fill="none" width="22" height="22">
                        <rect x="3" y="3" width="7" height="7" stroke="currentColor" stroke-width="2" />
                        <rect x="14" y="3" width="7" height="7" stroke="currentColor" stroke-width="2" />
                        <rect x="3" y="14" width="7" height="7" stroke="currentColor" stroke-width="2" />
                        <rect x="14" y="14" width="7" height="7" stroke="currentColor" stroke-width="2" />
                    </svg>
                    <span>Portafolio Web</span>
                    <small>Próximamente</small>
                </span>
            </div>
            <div class="fluxy-hero-stats">
                <div class="fluxy-stat">
                    <svg viewBox="0 0 24 24" fill="none" width="24" height="24">
                        <path d="M12 22C12 22 20 18 20 12V5L12 2L4 5V12C4 18 12 22 12 22Z" fill="url(#shield-grad)" />
                        <defs>
                            <linearGradient id="shield-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#FF0033" />
                                <stop offset="100%" stop-color="#0055FF" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <span class="fluxy-stat-number">Seguro</span>
                </div>
                <div class="fluxy-stat">
                    <svg viewBox="0 0 24 24" fill="none" width="24" height="24">
                        <rect x="3" y="4" width="18" height="16" rx="2" stroke="url(#win-grad)" stroke-width="2" />
                        <path d="M3 10H21" stroke="url(#win-grad)" stroke-width="2" />
                        <defs>
                            <linearGradient id="win-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#FF0033" />
                                <stop offset="100%" stop-color="#0055FF" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <span class="fluxy-stat-number">Win 10/11</span>
                </div>
                <div class="fluxy-stat">
                    <svg viewBox="0 0 24 24" fill="none" width="24" height="24">
                        <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" fill="url(#bolt-grad)" />
                        <defs>
                            <linearGradient id="bolt-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#FF0033" />
                                <stop offset="100%" stop-color="#0055FF" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <span class="fluxy-stat-number">Ultra Rápido</span>
                </div>
            </div>
        </div>
        <div class="fluxy-hero-visual">
            <div class="fluxy-app-showcase">
                <!-- Anillos decorativos -->
                <div class="showcase-ring ring-1"></div>
                <div class="showcase-ring ring-2"></div>
                <div class="showcase-ring ring-3"></div>

                <!-- Logo central grande -->
                <div class="showcase-logo-container">
                    <img src="{{ asset('img/LogoFluxy.webp') }}" alt="Fluxy" class="showcase-main-logo">
                    <div class="logo-glow"></div>
                </div>

                <!-- Features orbitando -->
                <div class="showcase-orbit">
                    <div class="orbit-item item-1">
                        <svg viewBox="0 0 24 24" fill="none" width="28" height="28">
                            <path d="M9 18V5L21 3V16" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <circle cx="6" cy="18" r="3" stroke="currentColor" stroke-width="2" />
                            <circle cx="18" cy="16" r="3" stroke="currentColor" stroke-width="2" />
                        </svg>
                        <span>Música</span>
                    </div>
                    <div class="orbit-item item-2">
                        <svg viewBox="0 0 24 24" fill="none" width="28" height="28">
                            <path d="M20 12V22H4V12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M22 7H2V12H22V7Z" stroke="currentColor" stroke-width="2" />
                            <path d="M12 22V7" stroke="currentColor" stroke-width="2" />
                        </svg>
                        <span>Gifts</span>
                    </div>
                    <div class="orbit-item item-3">
                        <svg viewBox="0 0 24 24" fill="none" width="28" height="28">
                            <rect x="3" y="11" width="18" height="10" rx="2" stroke="currentColor" stroke-width="2" />
                            <circle cx="9" cy="16" r="1" fill="currentColor" />
                            <circle cx="15" cy="16" r="1" fill="currentColor" />
                            <path d="M12 3V1M12 3C9.79 3 8 4.79 8 7V11H16V7C16 4.79 14.21 3 12 3Z" stroke="currentColor"
                                stroke-width="2" />
                        </svg>
                        <span>Bot</span>
                    </div>
                    <div class="orbit-item item-4">
                        <svg viewBox="0 0 24 24" fill="none" width="28" height="28">
                            <path d="M6 11H10M8 9V13" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <circle cx="15" cy="12" r="1" fill="currentColor" />
                            <circle cx="18" cy="10" r="1" fill="currentColor" />
                            <path
                                d="M17.32 5H6.68C5.19 5 3.93 6.1 3.68 7.57L2 18C2 19.1 2.9 20 4 20H7L8 16H16L17 20H20C21.1 20 22 19.1 22 18L20.32 7.57C20.07 6.1 18.81 5 17.32 5Z"
                                stroke="currentColor" stroke-width="2" />
                        </svg>
                        <span>Gaming</span>
                    </div>
                </div>

                <!-- TikTok badge -->
                <div class="tiktok-badge">
                    <svg viewBox="0 0 24 24" fill="none" width="20" height="20">
                        <path
                            d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.298-.002.595.042.88.13V9.4a6.33 6.33 0 0 0-7.18 9.4 6.34 6.34 0 0 0 11.14-4.13V9.41a8.16 8.16 0 0 0 4.77 1.53v-3.4a4.85 4.85 0 0 1-.5-.85z"
                            fill="currentColor" />
                    </svg>
                    <span>TikTok Live</span>
                </div>
            </div>
        </div>
    </section>


    <!-- Funciones Actuales -->
    <section class="fluxy-section fluxy-features" id="features">
        <div class="fluxy-container">
            <div class="fluxy-section-header">
                <span class="fluxy-tag">
                    <svg viewBox="0 0 24 24" fill="none" width="16" height="16">
                        <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" stroke="currentColor" stroke-width="2" />
                    </svg>
                    Funciones Disponibles
                </span>
                <h2 class="fluxy-section-title">Todo lo que <span>Fluxy</span> puede hacer</h2>
            </div>

            <div class="fluxy-features-grid">
                <!-- Music Request -->
                <div class="fluxy-feature-card featured">
                    <div class="fluxy-feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" width="32" height="32">
                            <path d="M9 18V5L21 3V16" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <circle cx="6" cy="18" r="3" stroke="currentColor" stroke-width="2.5" />
                            <circle cx="18" cy="16" r="3" stroke="currentColor" stroke-width="2.5" />
                        </svg>
                    </div>
                    <h3 class="fluxy-feature-title">Music Request</h3>
                    <p class="fluxy-feature-desc">Tu audiencia pide canciones en el chat con comandos como
                        <code>!song</code>. Búsqueda automática en YouTube con audio de alta calidad.
                    </p>
                    <ul class="fluxy-feature-list">
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" width="18" height="18">
                                <path d="M5 12L10 17L20 7" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Cola de hasta 50 canciones
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" width="18" height="18">
                                <path d="M5 12L10 17L20 7" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Permisos por rol (subs, mods)
                        </li>
                        <li>
                            <svg viewBox="0 0 24 24" fill="none" width="18" height="18">
                                <path d="M5 12L10 17L20 7" stroke="currentColor" stroke-width="2.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Anti-spam inteligente
                        </li>
                    </ul>
                </div>

                <!-- Integración TikTok -->
                <div class="fluxy-feature-card">
                    <div class="fluxy-feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" width="32" height="32">
                            <path
                                d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.298-.002.595.042.88.13V9.4a6.33 6.33 0 0 0-7.18 9.4 6.34 6.34 0 0 0 11.14-4.13V9.41a8.16 8.16 0 0 0 4.77 1.53v-3.4a4.85 4.85 0 0 1-.5-.85z"
                                fill="currentColor" />
                        </svg>
                    </div>
                    <h3 class="fluxy-feature-title">TikTok Live</h3>
                    <p class="fluxy-feature-desc">Conexión directa a tu live con solo tu username. Detecta seguidores,
                        suscriptores, mods y top gifters automáticamente.</p>
                </div>

                <!-- Comandos -->
                <div class="fluxy-feature-card">
                    <div class="fluxy-feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" width="32" height="32">
                            <path d="M4 17L10 11L4 5" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12 19H20" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" />
                        </svg>
                    </div>
                    <h3 class="fluxy-feature-title">Comandos Personalizables</h3>
                    <p class="fluxy-feature-desc">Cambia <code>!song</code> por <code>!musica</code> o lo que quieras.
                        Tú decides cómo interactúa tu audiencia.</p>
                </div>

                <!-- Seguridad -->
                <div class="fluxy-feature-card">
                    <div class="fluxy-feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" width="32" height="32">
                            <path d="M12 22C12 22 20 18 20 12V5L12 2L4 5V12C4 18 12 22 12 22Z" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h3 class="fluxy-feature-title">Seguro y Ligero</h3>
                    <p class="fluxy-feature-desc">Licencia vinculada a tu PC. Consume mínimos recursos para que tu juego
                        o stream no se vea afectado.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Próximamente -->
    <section class="fluxy-section fluxy-coming-soon" id="coming-soon">
        <div class="fluxy-container">
            <div class="fluxy-section-header">
                <span class="fluxy-tag coming">
                    <svg viewBox="0 0 24 24" fill="none" width="16" height="16">
                        <path
                            d="M12 2V6M12 18V22M4.93 4.93L7.76 7.76M16.24 16.24L19.07 19.07M2 12H6M18 12H22M4.93 19.07L7.76 16.24M16.24 7.76L19.07 4.93"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    Próximamente
                </span>
                <h2 class="fluxy-section-title">Lo que viene para <span>Fluxy</span></h2>
            </div>

            <div class="fluxy-coming-grid">
                <!-- Bot Chat -->
                <div class="fluxy-coming-card">
                    <div class="fluxy-coming-icon">
                        <svg viewBox="0 0 24 24" fill="none" width="36" height="36">
                            <rect x="3" y="11" width="18" height="10" rx="2" stroke="currentColor" stroke-width="2" />
                            <circle cx="9" cy="16" r="1" fill="currentColor" />
                            <circle cx="15" cy="16" r="1" fill="currentColor" />
                            <path d="M8 11V7C8 4.79 9.79 3 12 3C14.21 3 16 4.79 16 7V11" stroke="currentColor"
                                stroke-width="2" />
                            <path d="M12 3V1" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="fluxy-coming-badge">En Desarrollo</div>
                    <h3>Bot Chat con Personajes</h3>
                    <p>Personajes personalizados que responden automáticamente en tu chat con personalidad única.</p>
                </div>

                <!-- Gifts/Donaciones -->
                <div class="fluxy-coming-card">
                    <div class="fluxy-coming-icon">
                        <svg viewBox="0 0 24 24" fill="none" width="36" height="36">
                            <path d="M20 12V22H4V12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M22 7H2V12H22V7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12 22V7" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <path
                                d="M12 7H7.5C6.83696 7 6.20107 6.73661 5.73223 6.26777C5.26339 5.79893 5 5.16304 5 4.5C5 3.83696 5.26339 3.20107 5.73223 2.73223C6.20107 2.26339 6.83696 2 7.5 2C11 2 12 7 12 7Z"
                                stroke="currentColor" stroke-width="2" />
                            <path
                                d="M12 7H16.5C17.163 7 17.7989 6.73661 18.2678 6.26777C18.7366 5.79893 19 5.16304 19 4.5C19 3.83696 18.7366 3.20107 18.2678 2.73223C17.7989 2.26339 17.163 2 16.5 2C13 2 12 7 12 7Z"
                                stroke="currentColor" stroke-width="2" />
                        </svg>
                    </div>
                    <div class="fluxy-coming-badge">Próximo</div>
                    <h3>Recompensas por Donaciones</h3>
                    <p>Automatiza reacciones especiales cuando recibas gifts. Sonidos, alertas y acciones
                        personalizadas.</p>
                </div>

                <!-- Teclas Automáticas -->
                <div class="fluxy-coming-card">
                    <div class="fluxy-coming-icon">
                        <svg viewBox="0 0 24 24" fill="none" width="36" height="36">
                            <rect x="2" y="6" width="20" height="12" rx="2" stroke="currentColor" stroke-width="2" />
                            <path d="M6 10H6.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <path d="M10 10H10.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <path d="M14 10H14.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <path d="M18 10H18.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <path d="M8 14H16" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="fluxy-coming-badge">Próximo</div>
                    <h3>Teclas Automáticas</h3>
                    <p>Tu chat puede controlar acciones en tus juegos con comandos que presionan teclas automáticamente.
                    </p>
                </div>

                <!-- Stickers con Audio -->
                <div class="fluxy-coming-card">
                    <div class="fluxy-coming-icon">
                        <svg viewBox="0 0 24 24" fill="none" width="36" height="36">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" />
                            <path d="M8 14s1.5 2 4 2 4-2 4-2" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" />
                            <path d="M9 9H9.01" stroke="currentColor" stroke-width="3" stroke-linecap="round" />
                            <path d="M15 9H15.01" stroke="currentColor" stroke-width="3" stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="fluxy-coming-badge">Próximo</div>
                    <h3>Stickers con Audio</h3>
                    <p>Efectos de sonido y stickers animados que tu audiencia puede activar durante el stream.</p>
                </div>

                <!-- Interacciones Gaming -->
                <div class="fluxy-coming-card">
                    <div class="fluxy-coming-icon">
                        <svg viewBox="0 0 24 24" fill="none" width="36" height="36">
                            <path d="M6 11H10M8 9V13" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <path d="M15 12H15.01" stroke="currentColor" stroke-width="3" stroke-linecap="round" />
                            <path d="M18 10H18.01" stroke="currentColor" stroke-width="3" stroke-linecap="round" />
                            <path
                                d="M17.32 5H6.68C5.19 5 3.93 6.1 3.68 7.57L2 18C2 19.1 2.9 20 4 20H7L8 16H16L17 20H20C21.1 20 22 19.1 22 18L20.32 7.57C20.07 6.1 18.81 5 17.32 5Z"
                                stroke="currentColor" stroke-width="2" />
                        </svg>
                    </div>
                    <div class="fluxy-coming-badge">Próximo</div>
                    <h3>Interacciones Gaming</h3>
                    <p>Tu audiencia puede afectar tu juego en tiempo real. Spawns, efectos, y más controlado por el
                        chat.</p>
                </div>

                <!-- Más por venir -->
                <div class="fluxy-coming-card mystery">
                    <div class="fluxy-coming-icon">
                        <svg viewBox="0 0 24 24" fill="none" width="36" height="36">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" />
                            <path
                                d="M9 9C9 7.89543 10.3431 7 12 7C13.6569 7 15 7.89543 15 9C15 10.1046 13.6569 11 12 11V13"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <circle cx="12" cy="16" r="1" fill="currentColor" />
                        </svg>
                    </div>
                    <h3>Y mucho más...</h3>
                    <p>Estamos trabajando en más funciones para hacer de Fluxy la herramienta definitiva de streaming.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Instalación -->
    <section class="fluxy-section fluxy-install" id="install">
        <div class="fluxy-container">
            <div class="fluxy-section-header">
                <span class="fluxy-tag">
                    <svg viewBox="0 0 24 24" fill="none" width="16" height="16">
                        <path d="M12 3V16M12 16L7 11M12 16L17 11" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5 21H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    Instalación
                </span>
                <h2 class="fluxy-section-title">Cómo <span>Instalar</span></h2>
            </div>

            <div class="fluxy-install-steps">
                <!-- Paso 1 -->
                <div class="fluxy-install-step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>Descarga el Archivo</h3>
                        <p>Presiona el botón <strong>"Descargar Gratis"</strong> y obtendrás el instalador
                            <code>Fluxy-Setup-1.0.4.exe</code>.
                        </p>
                        <div class="step-image">
                            <img src="{{ asset('img/paso1.webp') }}" alt="Paso 1 - Descarga el archivo" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Paso 2 -->
                <div class="fluxy-install-step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>Ejecuta como Administrador</h3>
                        <p>Haz clic derecho en el archivo descargado <code>Fluxy-Setup-1.0.4.exe</code>, luego
                            selecciona <strong>"Ejecutar como administrador"</strong>.</p>
                        <div class="step-warning warning-info">
                            <svg viewBox="0 0 24 24" fill="none" width="20" height="20">
                                <path
                                    d="M12 16V12M12 8H12.01M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                            <span><strong>¿Por qué Windows dice que es peligroso?</strong> Mi app NO tiene virus. Como
                                desarrollador independiente no tengo la licencia de Microsoft que cuesta miles de
                                dólares. La app es completamente segura.</span>
                        </div>
                        <div class="step-image">
                            <img src="{{ asset('img/paso3.png') }}" alt="Paso 2 - Ejecuta como administrador"
                                loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Paso 3 -->
                <div class="fluxy-install-step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>Windows Protegió su PC</h3>
                        <p>Te aparecerá un mensaje de Windows SmartScreen. Haz clic en <strong>"Más
                                información"</strong> y luego en <strong>"Ejecutar de todos modos"</strong>.</p>
                        <div class="step-image">
                            <img src="{{ asset('img/paso4.png') }}" alt="Paso 3 - Windows protegió su PC"
                                loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Paso 4 -->
                <div class="fluxy-install-step">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h3>Acepta la Licencia</h3>
                        <p>Te aparecerá la licencia de Fluxy. Dale <strong>"Aceptar"</strong>, elige la carpeta donde
                            quieres instalar y la app se instalará automáticamente.</p>
                        <div class="step-image">
                            <img src="{{ asset('img/paso5.png') }}" alt="Paso 4 - Acepta la licencia" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Paso 5 -->
                <div class="fluxy-install-step">
                    <div class="step-number">5</div>
                    <div class="step-content">
                        <h3>Ejecuta Fluxy</h3>
                        <p>Al finalizar la instalación, dale <strong>"Ejecutar"</strong>. Se abrirá la aplicación y
                            deberás iniciar sesión con tu usuario y contraseña.</p>
                        <div class="step-image">
                            <img src="{{ asset('img/paso6.webp') }}" alt="Paso 5 - Ejecuta Fluxy" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Paso 6 -->
                <div class="fluxy-install-step">
                    <div class="step-number">6</div>
                    <div class="step-content">
                        <h3>Conecta tu TikTok</h3>
                        <p>Pon tu <strong>usuario de TikTok</strong> (ejemplo: @elmernew6) y ya podrás conectar con tu
                            cuenta para empezar a usar las funciones.</p>
                        <div class="step-image">
                            <img src="{{ asset('img/paso7.jpg') }}" alt="Paso 6 - Conecta tu TikTok" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Paso 7 - ¡Listo! -->
                <div class="fluxy-install-step step-success">
                    <div class="step-number">✓</div>
                    <div class="step-content">
                        <h3>¡Listo para Usar!</h3>
                        <p>Ya puedes ver el chat en tiempo real, cambiar comandos personalizados y configurar quiénes
                            pueden usar los comandos.</p>
                        <div class="step-image">
                            <img src="{{ asset('img/paso8.webp') }}" alt="Paso 7 - Listo para usar" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Recomendación Importante -->
                <div class="fluxy-recommendation">
                    <div class="recommendation-header">
                        <svg viewBox="0 0 24 24" fill="none" width="28" height="28">
                            <path
                                d="M12 16V12M12 8H12.01M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        <h3>Recomendación Importante</h3>
                    </div>
                    <p>Si vas a <strong>cerrar la app y abrirla de nuevo</strong> mientras estás en LIVE:</p>
                    <ol>
                        <li>Antes de conectar tu usuario, ve a <strong>Configuración</strong></li>
                        <li>Configura que <strong>nadie pueda poner música</strong> temporalmente</li>
                        <li>Conecta tu usuario de TikTok</li>
                        <li>Espera a que aparezca el chat y esté conectado</li>
                        <li>Ahora sí ve a Configuración y activa quiénes pueden usar el comando</li>
                    </ol>
                    <p class="recommendation-reason">Esto evita que se detecten comentarios antiguos y puedan malograr
                        tu stream.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Creador y Contacto -->
    <section class="fluxy-section fluxy-creator" id="creator">
        <div class="fluxy-container">
            <div class="fluxy-section-header">
                <span class="fluxy-tag">
                    <svg viewBox="0 0 24 24" fill="none" width="16" height="16">
                        <path d="M20 21V19C20 17.9 19.1 17 18 17H14C12.9 17 12 17.9 12 19V21" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" />
                        <circle cx="16" cy="11" r="4" stroke="currentColor" stroke-width="2" />
                        <path d="M4 21V19C4 17.9 4.9 17 6 17H8" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" />
                        <circle cx="8" cy="11" r="4" stroke="currentColor" stroke-width="2" />
                    </svg>
                    Creador
                </span>
                <h2 class="fluxy-section-title">Conoce al <span>Desarrollador</span></h2>
            </div>

            <div class="fluxy-creator-card">
                <div class="creator-layout">
                    <!-- Foto vertical -->
                    <div class="creator-photo-section">
                        <div class="photo-frame">
                            <img src="{{ asset('img/carta1_optimized.webp') }}" alt="Rafael Elmer - elmerciot">
                            <div class="photo-glow"></div>
                        </div>
                        <div class="creator-badge">
                            <svg viewBox="0 0 24 24" fill="none" width="14" height="14">
                                <path
                                    d="M12 2L14.09 8.26L21 9.27L16 14.14L17.18 21.02L12 17.77L6.82 21.02L8 14.14L3 9.27L9.91 8.26L12 2Z"
                                    fill="currentColor" />
                            </svg>
                            <span>Disponible</span>
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="creator-info-section">
                        <div class="creator-name-row">
                            <h2>Rafael Elmer Huaynate</h2>
                            <span class="creator-alias">@elmerciot</span>
                        </div>

                        <p class="creator-title">Full Stack Developer & AI Specialist</p>

                        <div class="creator-skills">
                            <span class="skill-tag">Python</span>
                            <span class="skill-tag">PHP</span>
                            <span class="skill-tag">React</span>
                            <span class="skill-tag">Laravel</span>
                            <span class="skill-tag">Electron</span>
                            <span class="skill-tag">IA</span>
                        </div>

                        <p class="creator-bio">
                            Desarrollo sistemas web, aplicaciones de escritorio y APKs integrando
                            <strong>Inteligencia Artificial</strong>. Creador de herramientas
                            profesionales para automatización y productividad.
                        </p>

                        <div class="creator-stats-row">
                            <div class="creator-stat">
                                <span class="stat-value">2+</span>
                                <span class="stat-label">Años Exp.</span>
                            </div>
                            <div class="creator-stat">
                                <span class="stat-value">5+</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="creator-stat">
                                <span class="stat-value">100%</span>
                                <span class="stat-label">Compromiso</span>
                            </div>
                        </div>

                        <div class="fluxy-social-buttons">
                            <a href="#" class="fluxy-social-btn tiktok">
                                <svg viewBox="0 0 24 24" fill="none" width="20" height="20">
                                    <path
                                        d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.298-.002.595.042.88.13V9.4a6.33 6.33 0 0 0-7.18 9.4 6.34 6.34 0 0 0 11.14-4.13V9.41a8.16 8.16 0 0 0 4.77 1.53v-3.4a4.85 4.85 0 0 1-.5-.85z"
                                        fill="currentColor" />
                                </svg>
                                <span>TikTok</span>
                            </a>
                            <a href="#" class="fluxy-social-btn instagram">
                                <svg viewBox="0 0 24 24" fill="none" width="20" height="20">
                                    <rect x="2" y="2" width="20" height="20" rx="5" stroke="currentColor"
                                        stroke-width="2" />
                                    <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2" />
                                    <circle cx="18" cy="6" r="1" fill="currentColor" />
                                </svg>
                                <span>Instagram</span>
                            </a>
                            <a href="#" class="fluxy-social-btn whatsapp">
                                <svg viewBox="0 0 24 24" fill="none" width="20" height="20">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"
                                        fill="currentColor" />
                                    <path
                                        d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.657 1.438 5.168L2 22l4.832-1.438A9.955 9.955 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2z"
                                        stroke="currentColor" stroke-width="2" />
                                </svg>
                                <span>WhatsApp</span>
                            </a>
                            <span class="fluxy-social-btn disabled">
                                <svg viewBox="0 0 24 24" fill="none" width="20" height="20">
                                    <rect x="3" y="3" width="7" height="7" stroke="currentColor" stroke-width="2" />
                                    <rect x="14" y="3" width="7" height="7" stroke="currentColor" stroke-width="2" />
                                    <rect x="3" y="14" width="7" height="7" stroke="currentColor" stroke-width="2" />
                                    <rect x="14" y="14" width="7" height="7" stroke="currentColor" stroke-width="2" />
                                </svg>
                                <span>Portafolio</span>
                                <small>Próximamente</small>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal de Advertencia de Descarga -->
    <div id="downloadModal" class="download-modal-overlay">
        <div class="download-modal">
            <div class="download-modal-icon">
                <svg viewBox="0 0 24 24" fill="none" width="40" height="40">
                    <path
                        d="M12 9V13M12 17H12.01M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
            <h3>¡Importante antes de descargar!</h3>
            <p>
                Por favor, <strong>sigue los pasos de instalación</strong> y <strong>lee los avisos importantes</strong>
                sobre Windows SmartScreen. La app es 100% segura pero Windows puede mostrar advertencias
                porque no tengo licencia de desarrollador empresarial.
            </p>
            <div class="download-modal-buttons">
                <a href="#install" class="modal-btn modal-btn-secondary" onclick="closeModal()">
                    Ver Pasos de Instalación
                </a>
                <a href="https://drive.google.com/uc?export=download&id=14eTdIjBZLJw_5-v99Yk3glMViuyTDl3Z"
                    class="modal-btn modal-btn-primary" onclick="closeModal()">
                    Descargar Ahora
                </a>
            </div>
        </div>
    </div>

    <!-- Footer simple -->
    <footer class="fluxy-footer-simple">
        <p>© 2024 Fluxy by @elmerciot</p>
    </footer>

    <script>
        // Modal de descarga
        const downloadBtn = document.querySelector('.fluxy-btn-primary');
        const modal = document.getElementById('downloadModal');

        if (downloadBtn) {
            downloadBtn.addEventListener('click', function (e) {
                e.preventDefault();
                modal.classList.add('active');
            });
        }

        function closeModal() {
            modal.classList.remove('active');
        }

        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            });
        });

        // Animaciones de entrada
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fluxy-visible');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fluxy-section, .fluxy-feature-card, .fluxy-coming-card').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>

</html>