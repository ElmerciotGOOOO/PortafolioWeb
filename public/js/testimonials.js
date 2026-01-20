/**
 * Testimonials System - Realtime Database Version
 * CRUD operations for testimonials with Firebase Realtime Database
 * @author Elmer - AI Software Engineer
 */

const DB_PATH = 'testimonials';

/**
 * Submit a new testimonial (status: pending)
 */
async function submitTestimonial(data) {
    try {
        console.log('📤 Starting testimonial submission...');
        const db = await getDatabase();

        if (!db) {
            throw new Error('Database not initialized');
        }

        console.log('📍 Database connected, creating reference...');
        const newRef = db.ref(DB_PATH).push();

        const testimonial = {
            id: newRef.key,
            name: data.name.trim(),
            project: data.project,
            rating: parseInt(data.rating),
            comment: data.comment.trim(),
            photoURL: data.photoURL || '',
            tiktok: data.tiktok || '',
            instagram: data.instagram || '',
            status: 'pending',
            createdAt: Date.now()
        };

        console.log('💾 Saving testimonial:', testimonial);

        // Add timeout wrapper
        const timeoutPromise = new Promise((_, reject) =>
            setTimeout(() => reject(new Error('Timeout: La base de datos no responde. Verifica las reglas de Firebase.')), 10000)
        );

        await Promise.race([newRef.set(testimonial), timeoutPromise]);

        console.log('✅ Testimonial submitted:', newRef.key);
        return { success: true, id: newRef.key };
    } catch (error) {
        console.error('❌ Error submitting testimonial:', error);
        return { success: false, error: error.message };
    }
}

/**
 * Get all approved testimonials for public display
 */
async function getApprovedTestimonials() {
    try {
        const db = await getDatabase();
        const snapshot = await db.ref(DB_PATH)
            .orderByChild('status')
            .equalTo('approved')
            .once('value');

        const testimonials = [];
        snapshot.forEach(child => {
            testimonials.push({ id: child.key, ...child.val() });
        });

        // Sort by createdAt descending
        testimonials.sort((a, b) => (b.createdAt || 0) - (a.createdAt || 0));

        return testimonials.slice(0, 10);
    } catch (error) {
        console.error('❌ Error fetching testimonials:', error);
        return [];
    }
}

/**
 * Get all testimonials (for admin panel)
 */
async function getAllTestimonials(statusFilter = null) {
    try {
        const db = await getDatabase();
        let query = db.ref(DB_PATH);

        if (statusFilter) {
            query = query.orderByChild('status').equalTo(statusFilter);
        }

        const snapshot = await query.once('value');
        const testimonials = [];

        snapshot.forEach(child => {
            testimonials.push({ id: child.key, ...child.val() });
        });

        // Sort by createdAt descending
        testimonials.sort((a, b) => (b.createdAt || 0) - (a.createdAt || 0));

        return testimonials;
    } catch (error) {
        console.error('❌ Error fetching all testimonials:', error);
        return [];
    }
}

/**
 * Update testimonial status (approve/reject)
 */
async function updateTestimonialStatus(id, status) {
    try {
        const db = await getDatabase();
        await db.ref(`${DB_PATH}/${id}`).update({
            status: status,
            updatedAt: Date.now()
        });
        console.log(`✅ Testimonial ${id} status updated to: ${status}`);
        return { success: true };
    } catch (error) {
        console.error('❌ Error updating testimonial:', error);
        return { success: false, error: error.message };
    }
}

/**
 * Delete a testimonial
 */
async function deleteTestimonial(id) {
    try {
        const db = await getDatabase();
        await db.ref(`${DB_PATH}/${id}`).remove();
        console.log(`✅ Testimonial ${id} deleted`);
        return { success: true };
    } catch (error) {
        console.error('❌ Error deleting testimonial:', error);
        return { success: false, error: error.message };
    }
}

/**
 * Upload profile photo to Firebase Storage
 */
async function uploadProfilePhoto(file) {
    try {
        const storage = await getStorage();
        const fileName = `testimonials/${Date.now()}_${file.name}`;
        const storageRef = storage.ref(fileName);

        const snapshot = await storageRef.put(file);
        const downloadURL = await snapshot.ref.getDownloadURL();

        console.log('✅ Photo uploaded:', downloadURL);
        return { success: true, url: downloadURL };
    } catch (error) {
        console.error('❌ Error uploading photo:', error);
        return { success: false, error: error.message };
    }
}

/**
 * Generate star rating HTML
 */
function generateStarsHTML(rating) {
    let html = '';
    for (let i = 1; i <= 5; i++) {
        if (i <= rating) {
            html += `<svg viewBox="0 0 24 24" fill="#fbbf24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>`;
        } else {
            html += `<svg viewBox="0 0 24 24" fill="none" stroke="#fbbf24" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>`;
        }
    }
    return html;
}

/**
 * Render testimonials to the page
 */
async function renderTestimonials(containerId = 'testimonials-container') {
    const container = document.getElementById(containerId);
    if (!container) return;

    // Show loading state
    container.innerHTML = `
        <div class="testimonials-placeholder">
            <div style="width: 40px; height: 40px; border: 3px solid rgba(255,255,255,0.1); border-top-color: #0050FF; border-radius: 50%; animation: spin 1s linear infinite;"></div>
            <p style="margin-top: 1rem; color: rgba(255,255,255,0.5);">Cargando testimonios...</p>
        </div>
    `;

    try {
        await initFirebase();
        const testimonials = await getApprovedTestimonials();

        if (testimonials.length === 0) {
            // Clean empty state - no duplicate button needed as it's outside the container
            container.innerHTML = `
                <div class="testimonials-placeholder">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="rgba(0, 80, 255, 0.4)" stroke-width="1.5">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                    </svg>
                    <h4>Aún no hay testimonios</h4>
                    <p>¡Sé el primero en compartir tu experiencia!</p>
                </div>
            `;
            return;
        }

        let html = '';
        testimonials.forEach(t => {
            const photoURL = t.photoURL || `https://ui-avatars.com/api/?name=${encodeURIComponent(t.name)}&background=0050FF&color=fff&size=100`;

            html += `
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="client-avatar">
                            <img src="${photoURL}" alt="${escapeHtml(t.name)}" onerror="this.src='https://ui-avatars.com/api/?name=${encodeURIComponent(t.name)}&background=0050FF&color=fff&size=100'">
                        </div>
                        <div class="client-info">
                            <h4 class="client-name">${escapeHtml(t.name)}</h4>
                            <span class="client-app">${escapeHtml(t.project)}</span>
                        </div>
                    </div>
                    <div class="testimonial-stars">
                        ${generateStarsHTML(t.rating)}
                    </div>
                    <p class="testimonial-text">"${escapeHtml(t.comment)}"</p>
                    <div class="client-socials">
                        ${t.tiktok ? `<a href="${escapeHtml(t.tiktok)}" target="_blank" class="client-social tiktok" title="TikTok"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg></a>` : ''}
                        ${t.instagram ? `<a href="${escapeHtml(t.instagram)}" target="_blank" class="client-social instagram" title="Instagram"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a>` : ''}
                    </div>
                </div>
            `;
        });

        container.innerHTML = html;

    } catch (error) {
        console.error('Error rendering testimonials:', error);
        container.innerHTML = `
            <div class="testimonials-error" style="grid-column: 1 / -1; text-align: center; padding: 2rem; color: rgba(255,255,255,0.5);">
                <p>Error cargando testimonios. Por favor recarga la página.</p>
            </div>
        `;
    }
}

/**
 * Escape HTML to prevent XSS
 */
function escapeHtml(text) {
    if (!text) return '';
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

// Auto-render on page load if container exists
document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('testimonials-container')) {
        renderTestimonials();
        initSliderNavigation();
    }
});

/**
 * Initialize slider navigation buttons
 */
function initSliderNavigation() {
    const slider = document.getElementById('testimonials-container');
    const prevBtn = document.getElementById('testimonialsPrev');
    const nextBtn = document.getElementById('testimonialsNext');

    if (!slider || !prevBtn || !nextBtn) return;

    const scrollAmount = 350; // Approximate card width + gap

    prevBtn.addEventListener('click', () => {
        slider.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });

    nextBtn.addEventListener('click', () => {
        slider.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });

    // Update button states based on scroll position
    function updateButtonStates() {
        prevBtn.disabled = slider.scrollLeft <= 0;
        nextBtn.disabled = slider.scrollLeft >= slider.scrollWidth - slider.clientWidth - 10;
    }

    slider.addEventListener('scroll', updateButtonStates);

    // Initial state check after content loads
    setTimeout(updateButtonStates, 500);
}
