<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAIVE V2 | Sistema de Control de Producción Industrial</title>
    <meta name="description" content="Sistema avanzado de control y monitoreo de producción industrial en tiempo real.">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            /* Paleta Laive - Yogurt Cremoso */
            --bg-cream: #FFFDF7;
            --bg-white: #FFFFFF;
            --bg-yellow-soft: #FEF9E7;
            --bg-yellow-accent: #FFF8DC;

            --primary: #D4A012;
            --primary-dark: #B8860B;
            --primary-light: #F5DEB3;

            --text-dark: #2D2A26;
            --text-medium: #5C5750;
            --text-light: #8C877D;

            --border: #EDE8DC;
            --border-light: #F5F2EB;

            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.04);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-cream);
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* ============================================
           CONTAINER
        ============================================ */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ============================================
           NAVIGATION
        ============================================ */
        .nav {
            background: var(--bg-white);
            border-bottom: 1px solid var(--border);
            padding: 16px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-logo {
            display: flex;
            align-items: center;
        }

        .nav-logo img {
            height: 44px;
            width: auto;
        }

        .nav-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .nav-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        /* ============================================
           HERO SECTION
        ============================================ */
        .hero {
            padding: 80px 0 60px;
            background: linear-gradient(180deg, var(--bg-white) 0%, var(--bg-cream) 100%);
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 60px;
            align-items: center;
        }

        .hero-text h1 {
            font-size: 2.75rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 20px;
            color: var(--text-dark);
        }

        .hero-text h1 span {
            color: var(--primary);
        }

        .hero-text p {
            font-size: 1.1rem;
            color: var(--text-medium);
            margin-bottom: 32px;
            line-height: 1.7;
        }

        .hero-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--primary);
            color: white;
            padding: 14px 28px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(212, 160, 18, 0.25);
        }

        .hero-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212, 160, 18, 0.35);
        }

        .hero-image {
            position: relative;
        }

        .hero-frame {
            background: #1a1a1a;
            border-radius: 12px;
            padding: 8px;
            box-shadow: var(--shadow-lg);
        }

        .hero-frame-header {
            display: flex;
            gap: 6px;
            padding: 8px 12px;
        }

        .frame-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .frame-dot.red {
            background: #ff5f56;
        }

        .frame-dot.yellow {
            background: #ffbd2e;
        }

        .frame-dot.green {
            background: #27c93f;
        }

        .hero-frame img {
            width: 100%;
            border-radius: 6px;
            display: block;
        }

        /* ============================================
           FEATURES SECTION
        ============================================ */
        .features {
            padding: 80px 0;
            background: var(--bg-white);
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 12px;
        }

        .section-header p {
            font-size: 1.05rem;
            color: var(--text-medium);
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .feature-card {
            background: var(--bg-cream);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 32px;
            transition: all 0.2s ease;
        }

        .feature-card:hover {
            box-shadow: var(--shadow-md);
            border-color: var(--primary-light);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            background: var(--bg-yellow-accent);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: var(--primary);
            font-size: 1.25rem;
        }

        .feature-card h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .feature-card p {
            font-size: 0.95rem;
            color: var(--text-medium);
            line-height: 1.6;
        }

        /* ============================================
           SCREENSHOTS SECTION
        ============================================ */
        .screenshots {
            padding: 80px 0;
            background: var(--bg-yellow-soft);
        }

        .screenshots-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 32px;
        }

        .screenshot-card {
            background: var(--bg-white);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.2s ease;
        }

        .screenshot-card:hover {
            box-shadow: var(--shadow-md);
        }

        .screenshot-card.full-width {
            grid-column: span 2;
        }

        .screenshot-content {
            padding: 28px;
        }

        .screenshot-badge {
            display: inline-block;
            background: var(--bg-yellow-accent);
            color: var(--primary-dark);
            padding: 4px 12px;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            margin-bottom: 12px;
        }

        .screenshot-content h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--text-dark);
        }

        .screenshot-content p {
            font-size: 0.95rem;
            color: var(--text-medium);
            line-height: 1.6;
        }

        .screenshot-image {
            background: #f5f5f5;
            padding: 16px;
        }

        .screenshot-frame {
            background: #1a1a1a;
            border-radius: 8px;
            padding: 6px;
        }

        .screenshot-frame-header {
            display: flex;
            gap: 5px;
            padding: 6px 10px;
        }

        .screenshot-frame img {
            width: 100%;
            border-radius: 4px;
            display: block;
        }

        /* Full width card layout */
        .screenshot-card.full-width .screenshot-inner {
            display: grid;
            grid-template-columns: 1fr 1.8fr;
            align-items: center;
        }

        .screenshot-card.full-width .screenshot-image {
            border-radius: 0 16px 16px 0;
        }

        .feature-list {
            list-style: none;
            margin-top: 20px;
        }

        .feature-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 0;
            font-size: 0.95rem;
            color: var(--text-medium);
        }

        .feature-list li i {
            color: var(--primary);
            font-size: 0.9rem;
        }

        /* ============================================
           HOW IT WORKS
        ============================================ */
        .how-it-works {
            padding: 80px 0;
            background: var(--bg-white);
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            margin-top: 60px;
        }

        .step {
            text-align: center;
        }

        .step-number {
            width: 56px;
            height: 56px;
            background: var(--primary);
            color: white;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 800;
            margin: 0 auto 20px;
        }

        .step h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .step p {
            font-size: 0.95rem;
            color: var(--text-medium);
            line-height: 1.6;
        }

        /* ============================================
           TECH STACK
        ============================================ */
        .tech-stack {
            padding: 60px 0;
            background: var(--bg-cream);
            border-top: 1px solid var(--border);
        }

        .tech-label {
            text-align: center;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-light);
            margin-bottom: 24px;
        }

        .tech-grid {
            display: flex;
            justify-content: center;
            gap: 32px;
            flex-wrap: wrap;
        }

        .tech-item {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--bg-white);
            border: 1px solid var(--border);
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 500;
            color: var(--text-dark);
        }

        .tech-item i {
            font-size: 1.4rem;
        }

        /* ============================================
           CTA SECTION
        ============================================ */
        .cta {
            padding: 80px 0;
            background: var(--bg-white);
            text-align: center;
        }

        .cta h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 16px;
            color: var(--text-dark);
        }

        .cta p {
            font-size: 1.05rem;
            color: var(--text-medium);
            max-width: 500px;
            margin: 0 auto 32px;
        }

        /* ============================================
           FOOTER
        ============================================ */
        .footer {
            padding: 40px 0;
            background: var(--bg-cream);
            border-top: 1px solid var(--border);
            text-align: center;
        }

        .footer-logo {
            margin-bottom: 16px;
        }

        .footer-logo img {
            height: 40px;
            width: auto;
        }

        .footer p {
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .footer strong {
            color: var(--text-medium);
        }

        /* ============================================
           RESPONSIVE
        ============================================ */
        @media (max-width: 900px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .hero-text h1 {
                font-size: 2rem;
            }

            .hero-btn {
                width: 100%;
                justify-content: center;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .screenshots-grid {
                grid-template-columns: 1fr;
            }

            .screenshot-card.full-width {
                grid-column: span 1;
            }

            .screenshot-card.full-width .screenshot-inner {
                grid-template-columns: 1fr;
            }

            .screenshot-card.full-width .screenshot-image {
                border-radius: 0 0 16px 16px;
            }

            .steps-grid {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .section-header h2 {
                font-size: 1.75rem;
            }

            .cta h2 {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 600px) {
            .nav-content {
                flex-direction: column;
                gap: 16px;
            }

            .nav-btn {
                width: 100%;
                justify-content: center;
            }

            .hero {
                padding: 40px 0;
            }

            .tech-grid {
                flex-direction: column;
                align-items: center;
            }

            .tech-item {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="nav">
        <div class="container">
            <div class="nav-content">
                <div class="nav-logo">
                    <img src="/laive-assets/LogoLaive.png" alt="Laive Logo">
                </div>
                <a href="/demo-laive/index.html" target="_blank" class="nav-btn">
                    <i class="fas fa-play"></i> Ver Demo
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Control de Producción <span>Simple y Eficiente</span></h1>
                    <p>
                        Sistema de monitoreo industrial en tiempo real. Gestiona tiempos,
                        analiza rendimiento y optimiza tu línea de producción desde una
                        interfaz clara y profesional.
                    </p>
                    <a href="/demo-laive/index.html" target="_blank" class="hero-btn">
                        <i class="fas fa-play"></i> Ver Demo Interactiva
                    </a>
                </div>
                <div class="hero-image">
                    <div class="hero-frame">
                        <div class="hero-frame-header">
                            <div class="frame-dot red"></div>
                            <div class="frame-dot yellow"></div>
                            <div class="frame-dot green"></div>
                        </div>
                        <img src="/laive-assets/inicio.png" alt="Pantalla Principal">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-header">
                <h2>Características Principales</h2>
                <p>Herramientas diseñadas para optimizar cada aspecto de tu producción industrial.</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-clock"></i></div>
                    <h3>Cronómetro Inteligente</h3>
                    <p>Control preciso del tiempo de producción con alertas automáticas. Medición de Fase 1 y Fase 2.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-sync-alt"></i></div>
                    <h3>Sincronización en Tiempo Real</h3>
                    <p>Los cambios se reflejan instantáneamente en todos los dispositivos conectados a la red.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-chart-bar"></i></div>
                    <h3>Estadísticas y KPIs</h3>
                    <p>Visualización de métricas críticas con análisis de rendimiento y calificación automática.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-users"></i></div>
                    <h3>Gestión Multi-Rol</h3>
                    <p>Control para Maquinistas, Ayudantes y Paletizadores con tiempos configurables.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-history"></i></div>
                    <h3>Historial Completo</h3>
                    <p>Registro detallado de cada sesión con exportación de reportes automáticos.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                    <h3>Acceso Seguro</h3>
                    <p>Autenticación con Firebase, licencias por tiempo y bloqueo por dispositivo.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Screenshots Section -->
    <section class="screenshots">
        <div class="container">
            <div class="section-header">
                <h2>Interfaz Profesional</h2>
                <p>Diseño optimizado para pantallas industriales con modo oscuro que reduce fatiga visual.</p>
            </div>

            <div class="screenshots-grid">
                <!-- Real-time Editing -->
                <div class="screenshot-card">
                    <div class="screenshot-content">
                        <span class="screenshot-badge">Edición</span>
                        <h3>Modificación en Tiempo Real</h3>
                        <p>Ajusta tiempos y objetivos directamente. El sistema recalcula proyecciones al instante.</p>
                    </div>
                    <div class="screenshot-image">
                        <div class="screenshot-frame">
                            <div class="screenshot-frame-header">
                                <div class="frame-dot red"></div>
                                <div class="frame-dot yellow"></div>
                                <div class="frame-dot green"></div>
                            </div>
                            <img src="/laive-assets/edicion en tiempo real.png" alt="Edición en Tiempo Real">
                        </div>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="screenshot-card">
                    <div class="screenshot-content">
                        <span class="screenshot-badge">Analytics</span>
                        <h3>Analítica de Producción</h3>
                        <p>Datos críticos y métricas de rendimiento para tomar decisiones informadas.</p>
                    </div>
                    <div class="screenshot-image">
                        <div class="screenshot-frame">
                            <div class="screenshot-frame-header">
                                <div class="frame-dot red"></div>
                                <div class="frame-dot yellow"></div>
                                <div class="frame-dot green"></div>
                            </div>
                            <img src="/laive-assets/estadisticas.png" alt="Estadísticas">
                        </div>
                    </div>
                </div>

                <!-- Control Panel -->
                <div class="screenshot-card">
                    <div class="screenshot-content">
                        <span class="screenshot-badge">Monitoreo</span>
                        <h3>Panel de Control</h3>
                        <p>Vista centralizada de todos los operadores con tiempos individuales.</p>
                    </div>
                    <div class="screenshot-image">
                        <div class="screenshot-frame">
                            <div class="screenshot-frame-header">
                                <div class="frame-dot red"></div>
                                <div class="frame-dot yellow"></div>
                                <div class="frame-dot green"></div>
                            </div>
                            <img src="/laive-assets/panel.png" alt="Panel de Control">
                        </div>
                    </div>
                </div>

                <!-- Login -->
                <div class="screenshot-card">
                    <div class="screenshot-content">
                        <span class="screenshot-badge">Seguridad</span>
                        <h3>Acceso Protegido</h3>
                        <p>Sistema de autenticación con control de licencias y verificación de dispositivo.</p>
                    </div>
                    <div class="screenshot-image">
                        <div class="screenshot-frame">
                            <div class="screenshot-frame-header">
                                <div class="frame-dot red"></div>
                                <div class="frame-dot yellow"></div>
                                <div class="frame-dot green"></div>
                            </div>
                            <img src="/laive-assets/login.png" alt="Login">
                        </div>
                    </div>
                </div>

                <!-- History - Full Width -->
                <div class="screenshot-card full-width">
                    <div class="screenshot-inner">
                        <div class="screenshot-content">
                            <span class="screenshot-badge">Registros</span>
                            <h3>Historial Detallado</h3>
                            <p>Registro de cada sesión de producción con precisión de milisegundos.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> Tiempos Fase 1 y Fase 2</li>
                                <li><i class="fas fa-check"></i> Calificación Automática</li>
                                <li><i class="fas fa-check"></i> Exportable a Excel/CSV</li>
                                <li><i class="fas fa-check"></i> Filtros por fecha y modo</li>
                            </ul>
                        </div>
                        <div class="screenshot-image">
                            <div class="screenshot-frame">
                                <div class="screenshot-frame-header">
                                    <div class="frame-dot red"></div>
                                    <div class="frame-dot yellow"></div>
                                    <div class="frame-dot green"></div>
                                </div>
                                <img src="/laive-assets/historial.png" alt="Historial">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works">
        <div class="container">
            <div class="section-header">
                <h2>¿Cómo Funciona?</h2>
                <p>Configuración simple, resultados inmediatos.</p>
            </div>

            <div class="steps-grid">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Instalación</h3>
                    <p>Descarga e instala en tus equipos Windows. Optimizado para pantallas TV.</p>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Configuración</h3>
                    <p>Define tiempos objetivo, roles y parámetros según tu línea de producción.</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Producción</h3>
                    <p>Inicia el cronómetro y el sistema monitorea, alerta y registra automáticamente.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tech Stack -->
    <section class="tech-stack">
        <div class="container">
            <p class="tech-label">Tecnologías Utilizadas</p>
            <div class="tech-grid">
                <div class="tech-item">
                    <i class="fab fa-react" style="color: #61DAFB;"></i>
                    <span>React</span>
                </div>
                <div class="tech-item">
                    <i class="fas fa-atom" style="color: #47848f;"></i>
                    <span>Electron</span>
                </div>
                <div class="tech-item">
                    <i class="fas fa-bolt" style="color: #646CFF;"></i>
                    <span>Vite</span>
                </div>
                <div class="tech-item">
                    <i class="fas fa-fire" style="color: #FFCA28;"></i>
                    <span>Firebase</span>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>¿Listo para Optimizar tu Producción?</h2>
            <p>Prueba la demo interactiva y descubre cómo puede transformar tu planta industrial.</p>
            <a href="/demo-laive/index.html" target="_blank" class="hero-btn">
                <i class="fas fa-rocket"></i> Probar Demo
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-logo">
                <img src="/laive-assets/LogoLaive.png" alt="Laive Logo">
            </div>
            <p>© 2026 Desarrollado por <strong>Elmer Huaynate Trinidad</strong></p>
        </div>
    </footer>

</body>

</html>