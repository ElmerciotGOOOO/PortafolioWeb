<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAIVE V2 | Enterprise Production Control</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            /* Enterprise Palette */
            --bg-page: #FAFAF9;
            /* Stone 50 */
            --bg-card: #FFFFFF;
            --text-primary: #1C1917;
            /* Stone 900 */
            --text-secondary: #57534E;
            /* Stone 600 */
            --accent-gold: #D97706;
            /* Amber 600 */
            --accent-gold-light: #FEF3C7;
            /* Amber 100 */
            --border-subtle: #E7E5E4;
            /* Stone 200 */
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-page);
            color: var(--text-primary);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }

        /* --- UTILITIES --- */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .grid-bento {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 24px;
            padding: 40px 0;
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border-subtle);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            box-shadow: var(--shadow-lg);
            border-color: #d6d3d1;
        }

        /* --- TYPOGRAPHY --- */
        h1,
        h2,
        h3 {
            letter-spacing: -0.02em;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .badge-gold {
            background: var(--accent-gold-light);
            color: var(--accent-gold);
            border: 1px solid rgba(217, 119, 6, 0.2);
        }

        /* --- HERO SECTION --- */
        .hero {
            padding: 100px 0 60px;
            text-align: center;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 24px;
            background: linear-gradient(to bottom, #1C1917, #44403C);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 1.25rem;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto 40px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #1C1917;
            color: white;
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background: #000;
            transform: translateY(-2px);
        }

        /* --- WINDOW FRAME COMPONENT --- */
        .window-frame {
            background: #1e1e1e;
            /* Dark frame for contrast */
            border-radius: 12px;
            padding: 10px;
            box-shadow: var(--shadow-xl);
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .window-header {
            display: flex;
            gap: 6px;
            margin-bottom: 10px;
            padding-left: 4px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .dot-red {
            background: #FF5F56;
        }

        .dot-yellow {
            background: #FFBD2E;
        }

        .dot-green {
            background: #27C93F;
        }

        .window-content {
            background: white;
            border-radius: 4px;
            overflow: hidden;
            flex-grow: 1;
            position: relative;
        }

        .window-content img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            /* Ensure full image is visible */
            display: block;
        }

        /* Specific tweaks for images that shouldn't be constrained */
        .img-cover {
            object-fit: cover !important;
        }

        /* --- BENTO GRID AREAS --- */
        /* Span utilities */
        .col-span-12 {
            grid-column: span 12;
        }

        .col-span-8 {
            grid-column: span 8;
        }

        .col-span-6 {
            grid-column: span 6;
        }

        .col-span-4 {
            grid-column: span 4;
        }

        @media (max-width: 900px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .col-span-8,
            .col-span-6,
            .col-span-4 {
                grid-column: span 12 !important;
            }
        }

        /* --- SPECIFIC CARD STYLES --- */
        .card-padded {
            padding: 32px;
        }

        .card-header {
            margin-bottom: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .card-desc {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }

        /* --- ANIMATIONS --- */
        .fade-in {
            animation: fadeIn 0.8s ease forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }

        .delay-3 {
            animation-delay: 0.3s;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- HERO -->
        <section class="hero fade-in">
            <span class="badge badge-gold">Sistema de Control Industrial v2.0</span>
            <h1>Control Total.<br>Sin Complicaciones.</h1>
            <p>Laive V2 transforma la gestión de planta eliminando el caos visual. Sincronización en tiempo real y
                persistencia de datos.</p>
            <div>
                <a href="/demo-laive/index.html" target="_blank" class="btn-primary">
                    <i class="fas fa-play"></i> Ver Demo Interactiva
                </a>
            </div>
        </section>

        <!-- MAIN PRODUCTION DISPLAY (Hero Image) -->
        <div class="grid-bento">
            <!-- Main Hero Image -->
            <div class="card col-span-12 fade-in delay-1"
                style="background: transparent; border: none; box-shadow: none;">
                <div class="window-frame">
                    <div class="window-header">
                        <div class="dot dot-red"></div>
                        <div class="dot dot-yellow"></div>
                        <div class="dot dot-green"></div>
                    </div>
                    <div class="window-content" style="aspect-ratio: 16/9; background: #000;">
                        <img src="/laive-assets/inicio.png" alt="Pantalla Principal Laive">
                    </div>
                </div>
            </div>
        </div>

        <!-- BENTO FEATURES GRID -->
        <div class="grid-bento">

            <!-- Real Time Editing -->
            <div class="card col-span-8 card-padded fade-in delay-2">
                <div class="card-header">
                    <div class="badge badge-gold" style="margin-bottom: 12px;">Core Feature</div>
                    <h3 class="card-title">Edición en Tiempo Real</h3>
                    <p class="card-desc">Modifica tiempos y objetivos directamente. El sistema recalcula proyecciones al
                        instante para todos los clientes conectados.</p>
                </div>
                <div class="window-frame" style="height: 400px; box-shadow: var(--shadow-md);">
                    <div class="window-header">
                        <div class="dot dot-red"></div>
                        <div class="dot dot-yellow"></div>
                        <div class="dot dot-green"></div>
                    </div>
                    <div class="window-content" style="background: #f8fafc;">
                        <img src="/laive-assets/edicion en tiempo real.png" alt="Edición Real Time">
                    </div>
                </div>
            </div>

            <!-- Stats/KPI Small Card -->
            <div class="card col-span-4 card-padded fade-in delay-2"
                style="background: #fefce8; border-color: #fcd34d;">
                <h3 class="card-title" style="color: #b45309;">Analítica KPI</h3>
                <p class="card-desc" style="color: #d97706; margin-bottom: 24px;">Visualización de datos críticos.</p>
                <div style="flex-grow: 1; display: flex; align-items: center; justify-content: center;">
                    <img src="/laive-assets/estadisticas.png"
                        style="width: 100%; border-radius: 8px; box-shadow: var(--shadow-md); border: 4px solid white;">
                </div>
            </div>

            <!-- Monitoring Panel -->
            <div class="card col-span-6 card-padded fade-in delay-3">
                <div class="window-frame" style="height: 300px; margin-bottom: 20px;">
                    <div class="window-header">
                        <div class="dot dot-red"></div>
                        <div class="dot dot-yellow"></div>
                        <div class="dot dot-green"></div>
                    </div>
                    <div class="window-content">
                        <img src="/laive-assets/panel.png" alt="Panel de Control">
                    </div>
                </div>
                <h3 class="card-title">Monitoreo Integral</h3>
                <p class="card-desc">Control centralizado para Maquinistas, Ayudantes y Paletizadores.</p>
            </div>

            <!-- Security/Login -->
            <div class="card col-span-6 card-padded fade-in delay-3">
                <div class="window-frame" style="height: 300px; margin-bottom: 20px;">
                    <div class="window-header">
                        <div class="dot dot-red"></div>
                        <div class="dot dot-yellow"></div>
                        <div class="dot dot-green"></div>
                    </div>
                    <div class="window-content">
                        <img src="/laive-assets/login.png" alt="Login Screen">
                    </div>
                </div>
                <h3 class="card-title">Acceso Seguro</h3>
                <p class="card-desc">Autenticación robusta con Firebase y roles de usuario definidos.</p>
            </div>

            <!-- History Full Width -->
            <div class="card col-span-12 card-padded fade-in delay-3">
                <div style="display: flex; gap: 40px; flex-wrap: wrap; align-items: center;">
                    <div style="flex: 1; min-width: 300px;">
                        <h3 class="card-title">Historial Detallado</h3>
                        <p class="card-desc" style="margin-bottom: 20px;">
                            Cada sesión de producción queda registrada con precisión de milisegundos.
                            El sistema genera reportes automáticos de eficiencia.
                        </p>
                        <ul style="list-style: none; color: var(--text-secondary);">
                            <li style="margin-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-check-circle" style="color: var(--accent-gold);"></i> Tiempos Fase 1 y
                                2
                            </li>
                            <li style="margin-bottom: 10px; display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-check-circle" style="color: var(--accent-gold);"></i> Calificación
                                Automática
                            </li>
                            <li style="display: flex; align-items: center; gap: 10px;">
                                <i class="fas fa-check-circle" style="color: var(--accent-gold);"></i> Exportable
                            </li>
                        </ul>
                    </div>
                    <div style="flex: 2; min-width: 300px;">
                        <div class="window-frame">
                            <div class="window-header">
                                <div class="dot dot-red"></div>
                                <div class="dot dot-yellow"></div>
                                <div class="dot dot-green"></div>
                            </div>
                            <div class="window-content" style="max-height: 400px;">
                                <img src="/laive-assets/historial.png" alt="Historial" class="img-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- TECH STACK FOOTER -->
        <div style="text-align: center; padding: 60px 0; border-top: 1px solid var(--border-subtle); margin-top: 40px;">
            <p
                style="text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-secondary); font-size: 0.8rem; margin-bottom: 24px;">
                Powered By</p>
            <div
                style="display: flex; justify-content: center; gap: 30px; font-size: 1.5rem; color: var(--text-primary); flex-wrap: wrap;">
                <span style="display: flex; align-items: center; gap: 8px;"><i class="fab fa-react"
                        style="color: #61DAFB;"></i> React</span>
                <span style="display: flex; align-items: center; gap: 8px;"><i class="fas fa-atom"
                        style="color: #38bdf8;"></i> Electron</span>
                <span style="display: flex; align-items: center; gap: 8px;"><i class="fas fa-bolt"
                        style="color: #eab308;"></i> Vite</span>
                <span style="display: flex; align-items: center; gap: 8px;"><i class="fas fa-fire"
                        style="color: #f59e0b;"></i> Firebase</span>
            </div>

            <p style="margin-top: 60px; color: var(--text-secondary); font-size: 0.9rem;">
                &copy; 2026 Developed by <strong>Elmer Huaynate Trinidad</strong>.
            </p>
        </div>

    </div>

</body>

</html>