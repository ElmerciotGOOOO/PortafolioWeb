<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Testimonios | Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, #0a0a15 0%, #0f0f1a 50%, #0a0a15 100%);
            min-height: 100vh;
            color: #fff;
        }

        .admin-header {
            background: rgba(15, 15, 25, 0.95);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(10px);
        }

        .admin-header h1 {
            font-size: 1.3rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-header h1 i {
            color: #0050FF;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .user-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0.5rem 1rem;
            background: rgba(0, 80, 255, 0.1);
            border: 1px solid rgba(0, 80, 255, 0.2);
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .btn-logout {
            padding: 0.5rem 1rem;
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 8px;
            color: #ef4444;
            font-family: inherit;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-logout:hover {
            background: rgba(239, 68, 68, 0.25);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.6rem 1.2rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: rgba(255, 255, 255, 0.7);
            font-family: inherit;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: rgba(0, 80, 255, 0.15);
            border-color: rgba(0, 80, 255, 0.4);
            color: #fff;
        }

        .filter-btn .count {
            background: rgba(255, 255, 255, 0.1);
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 0.8rem;
        }

        .filter-btn.pending .count {
            background: rgba(251, 191, 36, 0.3);
            color: #fbbf24;
        }

        .filter-btn.approved .count {
            background: rgba(34, 197, 94, 0.3);
            color: #22c55e;
        }

        .filter-btn.rejected .count {
            background: rgba(239, 68, 68, 0.3);
            color: #ef4444;
        }

        .testimonials-grid {
            display: grid;
            gap: 1.5rem;
        }

        .testimonial-admin-card {
            background: linear-gradient(145deg, rgba(20, 20, 35, 0.95), rgba(15, 15, 25, 0.98));
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 1.5rem;
            display: grid;
            grid-template-columns: auto 1fr auto;
            gap: 1.5rem;
            align-items: start;
        }

        .testimonial-admin-card.pending {
            border-left: 4px solid #fbbf24;
        }

        .testimonial-admin-card.approved {
            border-left: 4px solid #22c55e;
        }

        .testimonial-admin-card.rejected {
            border-left: 4px solid #ef4444;
        }

        .client-photo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.1);
        }

        .testimonial-content {
            flex: 1;
        }

        .testimonial-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.5rem;
            flex-wrap: wrap;
        }

        .client-name {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .project-tag {
            padding: 4px 10px;
            background: rgba(0, 80, 255, 0.15);
            border-radius: 6px;
            font-size: 0.8rem;
            color: #0050FF;
        }

        .status-badge {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-badge.pending {
            background: rgba(251, 191, 36, 0.2);
            color: #fbbf24;
        }

        .status-badge.approved {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
        }

        .status-badge.rejected {
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
        }

        .testimonial-stars {
            display: flex;
            gap: 4px;
            margin-bottom: 0.75rem;
        }

        .testimonial-stars svg {
            width: 18px;
            height: 18px;
        }

        .testimonial-text {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            font-style: italic;
        }

        .testimonial-socials {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.75rem;
        }

        .social-link {
            padding: 6px 12px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 6px;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s;
        }

        .social-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .social-link.tiktok:hover {
            color: #00f2ea;
        }

        .social-link.instagram:hover {
            color: #E1306C;
        }

        .testimonial-date {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.4);
            margin-top: 0.75rem;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .btn-action {
            padding: 0.6rem 1rem;
            border: none;
            border-radius: 8px;
            font-family: inherit;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s;
            white-space: nowrap;
        }

        .btn-approve {
            background: rgba(34, 197, 94, 0.15);
            color: #22c55e;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .btn-approve:hover {
            background: rgba(34, 197, 94, 0.25);
        }

        .btn-reject {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-reject:hover {
            background: rgba(239, 68, 68, 0.25);
        }

        .btn-delete {
            background: rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border-color: rgba(239, 68, 68, 0.3);
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: rgba(255, 255, 255, 0.5);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        .loading {
            text-align: center;
            padding: 4rem;
            color: rgba(255, 255, 255, 0.5);
        }

        .loading i {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .testimonial-admin-card {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .admin-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <header class="admin-header">
        <h1><i class="fas fa-comments"></i> Gestionar Testimonios</h1>
        <div class="header-actions">
            <div class="user-badge" id="userBadge">
                <i class="fas fa-user-shield"></i>
                <span id="userEmail">Cargando...</span>
            </div>
            <button class="btn-logout" onclick="logout()">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </button>
        </div>
    </header>

    <div class="container">
        <div class="filters">
            <button class="filter-btn active" data-filter="all" onclick="filterTestimonials('all')">
                <i class="fas fa-list"></i> Todos <span class="count" id="countAll">0</span>
            </button>
            <button class="filter-btn pending" data-filter="pending" onclick="filterTestimonials('pending')">
                <i class="fas fa-clock"></i> Pendientes <span class="count" id="countPending">0</span>
            </button>
            <button class="filter-btn approved" data-filter="approved" onclick="filterTestimonials('approved')">
                <i class="fas fa-check"></i> Aprobados <span class="count" id="countApproved">0</span>
            </button>
            <button class="filter-btn rejected" data-filter="rejected" onclick="filterTestimonials('rejected')">
                <i class="fas fa-times"></i> Rechazados <span class="count" id="countRejected">0</span>
            </button>
        </div>

        <div class="testimonials-grid" id="testimonialsGrid">
            <div class="loading">
                <i class="fas fa-spinner fa-spin"></i>
                <p>Cargando testimonios...</p>
            </div>
        </div>
    </div>

    <!-- Firebase SDK (Realtime Database) -->
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-database-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-auth-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-storage-compat.js"></script>
    <script src="{{ asset('js/firebase-config.js') }}"></script>
    <script src="{{ asset('js/testimonials.js') }}"></script>

    <script>
        let allTestimonials = [];
        let currentFilter = 'all';

        // Check auth on load
        document.addEventListener('DOMContentLoaded', async () => {
            try {
                const auth = await getAuth();
                const adminEmail = await getAdminEmail();

                auth.onAuthStateChanged(async (user) => {
                    if (!user || user.email !== adminEmail) {
                        window.location.href = '/admin/login';
                        return;
                    }

                    document.getElementById('userEmail').textContent = user.email;
                    await loadTestimonials();
                });
            } catch (error) {
                console.error('Auth error:', error);
                window.location.href = '/admin/login';
            }
        });

        async function logout() {
            const auth = await getAuth();
            await auth.signOut();
            window.location.href = '/admin/login';
        }

        async function loadTestimonials() {
            const grid = document.getElementById('testimonialsGrid');
            grid.innerHTML = '<div class="loading"><i class="fas fa-spinner fa-spin"></i><p>Cargando...</p></div>';

            try {
                allTestimonials = await getAllTestimonials();
                updateCounts();
                renderTestimonialsAdmin();
            } catch (error) {
                grid.innerHTML = '<div class="empty-state"><i class="fas fa-exclamation-triangle"></i><p>Error al cargar testimonios</p></div>';
            }
        }

        function updateCounts() {
            const pending = allTestimonials.filter(t => t.status === 'pending').length;
            const approved = allTestimonials.filter(t => t.status === 'approved').length;
            const rejected = allTestimonials.filter(t => t.status === 'rejected').length;

            document.getElementById('countAll').textContent = allTestimonials.length;
            document.getElementById('countPending').textContent = pending;
            document.getElementById('countApproved').textContent = approved;
            document.getElementById('countRejected').textContent = rejected;
        }

        function filterTestimonials(filter) {
            currentFilter = filter;
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.filter === filter);
            });
            renderTestimonialsAdmin();
        }

        function renderTestimonialsAdmin() {
            const grid = document.getElementById('testimonialsGrid');
            let filtered = allTestimonials;

            if (currentFilter !== 'all') {
                filtered = allTestimonials.filter(t => t.status === currentFilter);
            }

            if (filtered.length === 0) {
                grid.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <p>No hay testimonios ${currentFilter === 'all' ? '' : currentFilter === 'pending' ? 'pendientes' : currentFilter === 'approved' ? 'aprobados' : 'rechazados'}</p>
                    </div>
                `;
                return;
            }

            grid.innerHTML = filtered.map(t => {
                const photoURL = t.photoURL || `https://ui-avatars.com/api/?name=${encodeURIComponent(t.name)}&background=0050FF&color=fff&size=100`;
                const date = t.createdAt ? new Date(t.createdAt.seconds * 1000).toLocaleDateString('es-PE', { day: 'numeric', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' }) : 'Fecha desconocida';

                return `
                    <div class="testimonial-admin-card ${t.status}">
                        <img src="${photoURL}" alt="${escapeHtml(t.name)}" class="client-photo" onerror="this.src='https://ui-avatars.com/api/?name=${encodeURIComponent(t.name)}&background=0050FF&color=fff&size=100'">
                        <div class="testimonial-content">
                            <div class="testimonial-meta">
                                <span class="client-name">${escapeHtml(t.name)}</span>
                                <span class="project-tag">${escapeHtml(t.project)}</span>
                                <span class="status-badge ${t.status}">${t.status === 'pending' ? 'Pendiente' : t.status === 'approved' ? 'Aprobado' : 'Rechazado'}</span>
                            </div>
                            <div class="testimonial-stars">
                                ${generateStarsHTML(t.rating)}
                            </div>
                            <p class="testimonial-text">"${escapeHtml(t.comment)}"</p>
                            ${(t.tiktok || t.instagram) ? `
                                <div class="testimonial-socials">
                                    ${t.tiktok ? `<a href="${escapeHtml(t.tiktok)}" target="_blank" class="social-link tiktok"><i class="fab fa-tiktok"></i> TikTok</a>` : ''}
                                    ${t.instagram ? `<a href="${escapeHtml(t.instagram)}" target="_blank" class="social-link instagram"><i class="fab fa-instagram"></i> Instagram</a>` : ''}
                                </div>
                            ` : ''}
                            <div class="testimonial-date"><i class="far fa-clock"></i> ${date}</div>
                        </div>
                        <div class="action-buttons">
                            ${t.status !== 'approved' ? `<button class="btn-action btn-approve" onclick="approveTestimonial('${t.id}')"><i class="fas fa-check"></i> Aprobar</button>` : ''}
                            ${t.status !== 'rejected' ? `<button class="btn-action btn-reject" onclick="rejectTestimonial('${t.id}')"><i class="fas fa-times"></i> Rechazar</button>` : ''}
                            <button class="btn-action btn-delete" onclick="removeTestimonial('${t.id}')"><i class="fas fa-trash"></i> Eliminar</button>
                        </div>
                    </div>
                `;
            }).join('');
        }

        async function approveTestimonial(id) {
            if (await updateTestimonialStatus(id, 'approved')) {
                const t = allTestimonials.find(t => t.id === id);
                if (t) t.status = 'approved';
                updateCounts();
                renderTestimonialsAdmin();
            }
        }

        async function rejectTestimonial(id) {
            if (await updateTestimonialStatus(id, 'rejected')) {
                const t = allTestimonials.find(t => t.id === id);
                if (t) t.status = 'rejected';
                updateCounts();
                renderTestimonialsAdmin();
            }
        }

        async function removeTestimonial(id) {
            if (!confirm('¿Eliminar este testimonio permanentemente?')) return;

            if (await deleteTestimonial(id)) {
                allTestimonials = allTestimonials.filter(t => t.id !== id);
                updateCounts();
                renderTestimonialsAdmin();
            }
        }
    </script>
</body>

</html>