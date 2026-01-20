<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Testimonio | Elmer Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
            padding: 2rem;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.9rem;
            margin-bottom: 2rem;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #0050FF;
        }

        .form-card {
            background: linear-gradient(145deg, rgba(20, 20, 35, 0.95), rgba(15, 15, 25, 0.98));
            border: 1px solid rgba(0, 80, 255, 0.2);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #fff, #0050FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-header p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .form-group label .required {
            color: #FF3366;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: #fff;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #0050FF;
            box-shadow: 0 0 0 3px rgba(0, 80, 255, 0.2);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        select.form-control {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='rgba(255,255,255,0.5)' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 3rem;
        }

        select.form-control option {
            background: #1a1a2e;
            color: #fff;
            padding: 0.5rem;
        }

        /* Star Rating */
        .star-rating {
            display: flex;
            gap: 8px;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            cursor: pointer;
            font-size: 2rem;
            color: rgba(255, 255, 255, 0.2);
            transition: all 0.2s;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input:checked~label {
            color: #fbbf24;
            text-shadow: 0 0 20px rgba(251, 191, 36, 0.5);
        }

        /* Photo Upload */
        .photo-options {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .photo-option {
            flex: 1;
            padding: 0.75rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s;
        }

        .photo-option:hover,
        .photo-option.active {
            border-color: #0050FF;
            background: rgba(0, 80, 255, 0.1);
        }

        .photo-option input[type="radio"] {
            display: none;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .file-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 2px dashed rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .file-label:hover {
            border-color: #0050FF;
            background: rgba(0, 80, 255, 0.1);
        }

        /* Social inputs */
        .social-input {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            font-size: 1.2rem;
        }

        .social-icon.tiktok {
            color: #00f2ea;
        }

        .social-icon.instagram {
            color: #E1306C;
        }

        .social-input .form-control {
            flex: 1;
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, #0050FF, #0040CC);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-family: inherit;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s;
            margin-top: 2rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 80, 255, 0.4);
        }

        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* Success/Error Messages */
        .message {
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: none;
        }

        .message.success {
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: #22c55e;
            display: block;
        }

        .message.error {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #ef4444;
            display: block;
        }

        /* Photo Preview */
        .photo-preview {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #0050FF;
            margin-top: 1rem;
            display: none;
        }

        .photo-preview.visible {
            display: block;
        }

        /* Responsive */
        @media (max-width: 600px) {
            body {
                padding: 1rem;
            }

            .form-card {
                padding: 1.5rem;
            }

            .photo-options {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="/" class="back-link">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5M12 19l-7-7 7-7" />
            </svg>
            Volver al Portafolio
        </a>

        <div class="form-card">
            <div class="form-header">
                <h1>✨ Deja tu Testimonio</h1>
                <p>Tu opinión es muy valiosa para mí. ¡Gracias por compartir tu experiencia!</p>
            </div>

            <div id="successMessage" class="message"></div>

            <form id="testimonialForm">
                <div class="form-group">
                    <label>Nombre de Usuario <span class="required">*</span></label>
                    <input type="text" class="form-control" id="name" placeholder="Tu nombre o @usuario" required>
                </div>

                <div class="form-group">
                    <label>¿Qué proyecto te gustó? <span class="required">*</span></label>
                    <select class="form-control" id="project" required>
                        <option value="">Selecciona un proyecto</option>
                        <option value="Fluxy - Music Request">Fluxy - Music Request</option>
                        <option value="Laive V2">Laive V2</option>
                        <option value="Portafolio Web">Portafolio Web</option>
                        <option value="Otro">Otro proyecto</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Calificación <span class="required">*</span></label>
                    <div class="star-rating">
                        <input type="radio" name="rating" id="star5" value="5">
                        <label for="star5">★</label>
                        <input type="radio" name="rating" id="star4" value="4">
                        <label for="star4">★</label>
                        <input type="radio" name="rating" id="star3" value="3">
                        <label for="star3">★</label>
                        <input type="radio" name="rating" id="star2" value="2">
                        <label for="star2">★</label>
                        <input type="radio" name="rating" id="star1" value="1">
                        <label for="star1">★</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Tu Comentario <span class="required">*</span></label>
                    <textarea class="form-control" id="comment" placeholder="Cuéntanos tu experiencia..."
                        required></textarea>
                </div>

                <div class="form-group">
                    <label>Foto de Perfil (Opcional)</label>
                    <div class="photo-options">
                        <label class="photo-option active" id="optUpload">
                            <input type="radio" name="photoType" value="upload" checked>
                            <i class="fas fa-upload"></i> Subir foto
                        </label>
                        <label class="photo-option" id="optUrl">
                            <input type="radio" name="photoType" value="url">
                            <i class="fas fa-link"></i> URL de imagen
                        </label>
                    </div>
                    <div id="uploadSection">
                        <div class="file-input-wrapper">
                            <div class="file-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span id="fileName">Haz clic para subir una imagen</span>
                            </div>
                            <input type="file" id="photoFile" accept="image/*">
                        </div>
                    </div>
                    <div id="urlSection" style="display: none;">
                        <input type="url" class="form-control" id="photoUrl"
                            placeholder="https://ejemplo.com/tu-foto.jpg">
                    </div>
                    <img id="photoPreview" class="photo-preview" alt="Preview">
                </div>

                <div class="form-group">
                    <label>Redes Sociales (Opcional)</label>
                    <div class="social-input" style="margin-bottom: 0.75rem;">
                        <div class="social-icon tiktok"><i class="fab fa-tiktok"></i></div>
                        <input type="url" class="form-control" id="tiktok" placeholder="https://tiktok.com/@tuusuario">
                    </div>
                    <div class="social-input">
                        <div class="social-icon instagram"><i class="fab fa-instagram"></i></div>
                        <input type="url" class="form-control" id="instagram"
                            placeholder="https://instagram.com/tuusuario">
                    </div>
                </div>

                <button type="submit" class="btn-submit" id="submitBtn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z" />
                    </svg>
                    Enviar Testimonio
                </button>
            </form>
        </div>
    </div>

    <!-- Firebase SDK (Realtime Database) -->
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-database-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-storage-compat.js"></script>
    <script src="{{ asset('js/firebase-config.js') }}"></script>
    <script src="{{ asset('js/testimonials.js') }}"></script>

    <script>
        // Photo type toggle
        const photoOptions = document.querySelectorAll('.photo-option');
        const uploadSection = document.getElementById('uploadSection');
        const urlSection = document.getElementById('urlSection');
        const photoPreview = document.getElementById('photoPreview');

        photoOptions.forEach(option => {
            option.addEventListener('click', () => {
                photoOptions.forEach(o => o.classList.remove('active'));
                option.classList.add('active');

                const type = option.querySelector('input').value;
                if (type === 'upload') {
                    uploadSection.style.display = 'block';
                    urlSection.style.display = 'none';
                } else {
                    uploadSection.style.display = 'none';
                    urlSection.style.display = 'block';
                }
            });
        });

        // File input preview
        document.getElementById('photoFile').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                document.getElementById('fileName').textContent = file.name;
                const reader = new FileReader();
                reader.onload = (e) => {
                    photoPreview.src = e.target.result;
                    photoPreview.classList.add('visible');
                };
                reader.readAsDataURL(file);
            }
        });

        // URL preview
        document.getElementById('photoUrl').addEventListener('change', function (e) {
            if (e.target.value) {
                photoPreview.src = e.target.value;
                photoPreview.classList.add('visible');
            }
        });

        // Form submission
        document.getElementById('testimonialForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            const messageDiv = document.getElementById('successMessage');

            // Validate rating
            const rating = document.querySelector('input[name="rating"]:checked');
            if (!rating) {
                messageDiv.className = 'message error';
                messageDiv.textContent = '⚠️ Por favor selecciona una calificación';
                return;
            }

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';

            try {
                // Handle photo
                let photoURL = '';
                const photoType = document.querySelector('input[name="photoType"]:checked').value;

                if (photoType === 'upload') {
                    const file = document.getElementById('photoFile').files[0];
                    if (file) {
                        const uploadResult = await uploadProfilePhoto(file);
                        if (uploadResult.success) {
                            photoURL = uploadResult.url;
                        }
                    }
                } else {
                    photoURL = document.getElementById('photoUrl').value;
                }

                // Submit testimonial
                const result = await submitTestimonial({
                    name: document.getElementById('name').value,
                    project: document.getElementById('project').value,
                    rating: rating.value,
                    comment: document.getElementById('comment').value,
                    photoURL: photoURL,
                    tiktok: document.getElementById('tiktok').value,
                    instagram: document.getElementById('instagram').value
                });

                if (result.success) {
                    messageDiv.className = 'message success';
                    messageDiv.innerHTML = '✅ <strong>¡Gracias por tu testimonio!</strong><br>Será revisado y publicado pronto.';
                    document.getElementById('testimonialForm').reset();
                    photoPreview.classList.remove('visible');
                    document.getElementById('fileName').textContent = 'Haz clic para subir una imagen';
                } else {
                    throw new Error(result.error);
                }
            } catch (error) {
                messageDiv.className = 'message error';
                messageDiv.textContent = '❌ Error al enviar: ' + error.message;
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg> Enviar Testimonio`;
            }
        });
    </script>
</body>

</html>