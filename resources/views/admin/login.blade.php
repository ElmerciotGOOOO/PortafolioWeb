<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Elmer Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .login-card {
            background: linear-gradient(145deg, rgba(20, 20, 35, 0.95), rgba(15, 15, 25, 0.98));
            border: 1px solid rgba(0, 80, 255, 0.3);
            border-radius: 24px;
            padding: 3rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header .logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #0050FF, #0040CC);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .login-header h1 {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            margin-top: 0.5rem;
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

        .btn-login {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #0050FF, #0040CC);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-family: inherit;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 80, 255, 0.4);
        }

        .btn-login:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .error-message {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #ef4444;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            display: none;
            font-size: 0.9rem;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #0050FF;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="login-header">
            <div class="logo">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                </svg>
            </div>
            <h1>Panel de Admin</h1>
            <p>Inicia sesión para gestionar testimonios</p>
        </div>

        <div id="errorMessage" class="error-message"></div>

        <form id="loginForm">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="email" placeholder="admin@ejemplo.com" required>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-login" id="loginBtn">Iniciar Sesión</button>
        </form>

        <a href="/" class="back-link">← Volver al Portafolio</a>
    </div>

    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.0/firebase-auth-compat.js"></script>
    <script src="{{ asset('js/firebase-config.js') }}"></script>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const loginBtn = document.getElementById('loginBtn');
            const errorDiv = document.getElementById('errorMessage');

            loginBtn.disabled = true;
            loginBtn.textContent = 'Iniciando...';
            errorDiv.style.display = 'none';

            try {
                const auth = await getAuth();
                const adminEmail = await getAdminEmail();

                // Login with Firebase Auth
                const userCredential = await auth.signInWithEmailAndPassword(email, password);

                // Check if user is admin
                if (userCredential.user.email !== adminEmail) {
                    await auth.signOut();
                    throw new Error('No tienes permisos de administrador');
                }

                // Redirect to admin panel
                window.location.href = '/admin/testimonios';

            } catch (error) {
                let message = 'Error al iniciar sesión';
                if (error.code === 'auth/user-not-found' || error.code === 'auth/wrong-password') {
                    message = 'Email o contraseña incorrectos';
                } else if (error.code === 'auth/too-many-requests') {
                    message = 'Demasiados intentos. Intenta más tarde';
                } else if (error.message) {
                    message = error.message;
                }

                errorDiv.textContent = message;
                errorDiv.style.display = 'block';
            } finally {
                loginBtn.disabled = false;
                loginBtn.textContent = 'Iniciar Sesión';
            }
        });
    </script>
</body>

</html>