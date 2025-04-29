<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/Favicon2.png') }}" type="image/x-icon">
    <title>Sistema Gestión reportes y bajas de ambiente</title>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    
    <!-- Scripts cargados de forma diferida -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    
    <style>
        :root {
            --primary-color: #10273c;
            --secondary-color: #1a3a5f;
            --accent-color: #f39c12;
            --dark-color: #10273c;
            --light-color: #f4f6f9;
        }
        
        body {
            background: linear-gradient(135deg, var(--light-color) 0%, #e9ecef 100%);
            min-height: 100vh;
            position: relative;
            padding-bottom: 60px;
        }
        
        /* Estilos para el preloader/animación inicial - NUEVA ANIMACIÓN */
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--dark-color);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.8s ease-out, visibility 0.8s;
        }
        
        .preloader.hidden {
            opacity: 0;
            visibility: hidden;
        }
        
        .loader-container {
            position: relative;
            width: 250px;
            height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        .loader-icon {
            width: 150px;
            height: 150px;
            position: relative;
            margin-bottom: 20px;
        }
        
        /* NUEVO ICONO GIRATORIO - CUBO 3D */
        .cube-container {
            width: 100px;
            height: 100px;
            perspective: 800px;
            position: relative;
            margin: 0 auto;
        }
        
        .cube {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            transform: translateZ(-50px);
            animation: rotate-cube 8s infinite linear;
        }
        
        .cube-face {
            position: absolute;
            width: 100px;
            height: 100px;
            border: 2px solid var(--accent-color);
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(16, 39, 60, 0.8);
            box-shadow: inset 0 0 15px rgba(243, 156, 18, 0.3);
        }
        
        .cube-face.front {
            transform: rotateY(0deg) translateZ(50px);
        }
        
        .cube-face.back {
            transform: rotateY(180deg) translateZ(50px);
        }
        
        .cube-face.right {
            transform: rotateY(90deg) translateZ(50px);
        }
        
        .cube-face.left {
            transform: rotateY(-90deg) translateZ(50px);
        }
        
        .cube-face.top {
            transform: rotateX(90deg) translateZ(50px);
        }
        
        .cube-face.bottom {
            transform: rotateX(-90deg) translateZ(50px);
        }
        
        @keyframes rotate-cube {
            0% {
                transform: translateZ(-50px) rotateX(0deg) rotateY(0deg) rotateZ(0deg);
            }
            100% {
                transform: translateZ(-50px) rotateX(360deg) rotateY(720deg) rotateZ(360deg);
            }
        }
        
        /* Iconos dentro del cubo */
        .cube-icon {
            font-size: 40px;
            color: var(--accent-color);
            text-shadow: 0 0 10px rgba(243, 156, 18, 0.7);
        }
        
        /* Partículas de datos alrededor del cubo */
        .data-particles {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200px;
            height: 200px;
            transform: translate(-50%, -50%);
        }
        
        .particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background-color: var(--accent-color);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--accent-color);
            opacity: 0;
            animation: particle-animation 3s infinite;
        }
        
        @keyframes particle-animation {
            0% {
                transform: translate(0, 0) scale(0);
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                transform: translate(
                    calc(cos(var(--angle)) * 100px),
                    calc(sin(var(--angle)) * 100px)
                ) scale(0);
                opacity: 0;
            }
        }
        
        /* Círculos concéntricos */
        .circle-container {
            position: absolute;
            width: 210px;
            height: 210px;
            border-radius: 50%;
            border: 2px dashed rgba(255, 255, 255, 0.2);
            animation: spin 20s linear infinite;
        }
        
        .circle-inner {
            position: absolute;
            width: 170px;
            height: 170px;
            border-radius: 50%;
            border: 2px dashed rgba(255, 255, 255, 0.15);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: spin-reverse 15s linear infinite;
        }
        
        /* Anillos de energía */
        .energy-ring {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            border: 4px solid transparent;
            border-top: 4px solid var(--accent-color);
            border-bottom: 4px solid var(--accent-color);
            opacity: 0.7;
            box-shadow: 0 0 20px rgba(243, 156, 18, 0.3);
        }
        
        .ring-1 {
            width: 140px;
            height: 140px;
            animation: spin 6s linear infinite;
        }
        
        .ring-2 {
            width: 180px;
            height: 180px;
            animation: spin-reverse 8s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }
        
        @keyframes spin-reverse {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(-360deg); }
        }
        
        /* Texto de carga */
        .loader-text {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 22px;
            color: white;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 20px;
            text-align: center;
            opacity: 0.9;
        }
        
        .loader-text span {
            display: inline-block;
            animation: bounce 1.5s infinite;
        }
        
        .loader-text span:nth-child(2) {
            animation-delay: 0.1s;
        }
        
        .loader-text span:nth-child(3) {
            animation-delay: 0.2s;
        }
        
        .loader-text span:nth-child(4) {
            animation-delay: 0.3s;
        }
        
        .loader-text span:nth-child(5) {
            animation-delay: 0.4s;
        }
        
        .loader-text span:nth-child(6) {
            animation-delay: 0.5s;
        }
        
        .loader-text span:nth-child(7) {
            animation-delay: 0.6s;
        }
        
        .loader-text span:nth-child(8) {
            animation-delay: 0.7s;
        }
        
        .loader-text span:nth-child(9) {
            animation-delay: 0.8s;
        }
        
        .loader-subtext {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            margin-top: 5px;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .progress-bar {
            width: 200px;
            height: 4px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 2px;
            margin-top: 15px;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            width: 0%;
            background-color: var(--accent-color);
            animation: fillProgress 3s forwards;
        }
        
        @keyframes fillProgress {
            0% { width: 0%; }
            100% { width: 100%; }
        }
        
        /* Estilos originales de la plantilla */
        .navbar {
            background-color: var(--dark-color);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .hero-section {
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }
        
        .floating-image {
            position: absolute;
            right: -100px;
            top: 50%;
            transform: translateY(-50%);
            width: 500px;
            height: 500px;
            animation: float 6s ease-in-out infinite;
            z-index: -1;
            opacity: 0.8;
        }
        
        @keyframes float {
            0% {
                transform: translateY(-50%) translateX(0);
            }
            50% {
                transform: translateY(-50%) translateX(-20px) rotate(3deg);
            }
            100% {
                transform: translateY(-50%) translateX(0);
            }
        }
        
        .hero-content {
            background-color: rgba(255, 255, 255, 0.85);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            backdrop-filter: blur(5px);
            border-left: 5px solid var(--primary-color);
        }
        
        .hero-content h1 {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
        }
        
        .hero-content h1:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 4px;
            background-color: var(--accent-color);
        }
        
        .hero-content p {
            color: #555;
            font-size: 1.2rem;
            margin-bottom: 25px;
        }
        
        .feature-card {
            background-color: white;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            min-height: 240px;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .feature-card i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        .feature-card h3 {
            color: var(--dark-color);
            font-size: 1.5rem;
            margin-bottom: 15px;
        }
        
        .feature-card p {
            color: #666;
        }
        
        .login-section {
            padding: 40px 0;
            text-align: center;
        }
        
        .btn-login {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 12px 30px;
            font-size: 1.1rem;
            transition: all 0.3s;
            color: white;
        }
        
        .btn-login:hover {
            background-color: var(--secondary-color);
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(16, 39, 60, 0.3);
        }
        
        footer {
            background-color: var(--dark-color) !important;
            color: white;
            padding: 15px 20px !important;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        
        footer a {
            color: var(--accent-color) !important;
            text-decoration: none;
        }
        
        footer a:hover {
            color: #ffb74d !important;
        }
        
        /* Animaciones adicionales */
        .fade-in {
            animation: fadeIn 1s ease-in;
        }
        
        .slide-up {
            animation: slideUp 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
    </style>
</head>
<body class="hold-transition layout-navbar-fixed">
    <!-- Preloader / Animación Inicial - NUEVA ANIMACIÓN -->
    <div class="preloader">
        <div class="loader-container">
            <div class="loader-icon">
                <!-- Nuevo cubo 3D giratorio -->
                <div class="cube-container">
                    <div class="cube">
                        <div class="cube-face front">
                            <i class="fas fa-server cube-icon"></i>
                        </div>
                        <div class="cube-face back">
                            <i class="fas fa-database cube-icon"></i>
                        </div>
                        <div class="cube-face right">
                            <i class="fas fa-cogs cube-icon"></i>
                        </div>
                        <div class="cube-face left">
                            <i class="fas fa-laptop-code cube-icon"></i>
                        </div>
                        <div class="cube-face top">
                            <i class="fas fa-network-wired cube-icon"></i>
                        </div>
                        <div class="cube-face bottom">
                            <i class="fas fa-shield-alt cube-icon"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Anillos de energía -->
                <div class="energy-ring ring-1"></div>
                <div class="energy-ring ring-2"></div>
                
                <!-- Partículas de datos -->
                <div class="data-particles">
                    <div class="particle" style="--angle: 0deg; animation-delay: 0s;"></div>
                    <div class="particle" style="--angle: 45deg; animation-delay: 0.3s;"></div>
                    <div class="particle" style="--angle: 90deg; animation-delay: 0.6s;"></div>
                    <div class="particle" style="--angle: 135deg; animation-delay: 0.9s;"></div>
                    <div class="particle" style="--angle: 180deg; animation-delay: 1.2s;"></div>
                    <div class="particle" style="--angle: 225deg; animation-delay: 1.5s;"></div>
                    <div class="particle" style="--angle: 270deg; animation-delay: 1.8s;"></div>
                    <div class="particle" style="--angle: 315deg; animation-delay: 2.1s;"></div>
                </div>
            </div>
            <div class="loader-text">
                <span>I</span>
                <span>n</span>
                <span>i</span>
                <span>c</span>
                <span>i</span>
                <span>a</span>
                <span>n</span>
                <span>d</span>
                <span>o</span>
            </div>
            <div class="loader-subtext">Cargando Sistema de Gestión</div>
            <div class="progress-bar">
                <div class="progress-fill"></div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('login') }}" class="nav-link">Inicio</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
            @auth
                @if(checkRol('sibaf.admin'))
                    <li class="nav-item d-none d-sm-inline-block" style="margin-right: 80px;">
                        <a href="{{ route('sibaf.admin.welcome') }}" 
                           class="nav-link @if(Route::is('sibaf.admin.*')) active @endif">
                            Administrador
                        </a>
                    </li>
                @endif
            @endauth
            </li>
            <li class="nav-item d-none d-sm-inline-block">
            @auth
                @if(checkRol('sibaf.soporte'))
                    <li class="nav-item d-none d-sm-inline-block" style="margin-right: 80px;">
                        <a href="{{ route('sibaf.soporte.welcomesoporte') }}" 
                           class="nav-link @if(Route::is('sibaf.soporte.*')) active @endif">
                            Mesa Ayuda
                        </a>
                    </li>
                @endif
            @endauth
            </li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <div class="container-fluid">
        <!-- Sección Hero con imagen flotante -->
        <section class="hero-section">
            <div class="floating-image">
                <img src="/api/placeholder/500/500" alt="Sistema de Gestión" style="width: 100%; height: 100%; object-fit: contain;">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="hero-content fade-in">
                            <h1 class="display-4">Sistema de Gestión de Reportes y Bajas de Ambiente</h1>
                            <p class="lead">
                                Una solución integral para la administración eficiente de reportes y procesos de baja de equipos. 
                                Optimiza tus procesos, incrementa la productividad y mejora el control de inventario en tu organización.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de características -->
        <section class="features-section py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 slide-up" style="animation-delay: 0.2s;">
                        <div class="feature-card text-center">
                            <i class="fas fa-clipboard-list"></i>
                            <h3>Gestión de Reportes</h3>
                            <p>Administra de manera eficiente todos los reportes de incidencias. Seguimiento en tiempo real y estadísticas detalladas.</p>
                        </div>
                    </div>
                    <div class="col-md-4 slide-up" style="animation-delay: 0.4s;">
                        <div class="feature-card text-center">
                            <i class="fas fa-laptop-code"></i>
                            <h3>Control de Equipos</h3>
                            <p>Sistema integral para el control de inventario de equipos tecnológicos, con historial completo y seguimiento.</p>
                        </div>
                    </div>
                    <div class="col-md-4 slide-up" style="animation-delay: 0.6s;">
                        <div class="feature-card text-center">
                            <i class="fas fa-chart-line"></i>
                            <h3>Reportes Analíticos</h3>
                            <p>Obtén informes detallados y estadísticas que te ayudarán a tomar decisiones estratégicas basadas en datos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección de login -->
        <section class="login-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        @auth
                            <a href="{{ route('login') }}" class="btn btn-login btn-lg">
                                <i class="fas fa-sign-in-alt mr-2"></i> Acceder al Sistema
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <strong>Copyright &copy; 2023-2025 <a href="#">GDF</a>.</strong> Todos los derechos reservados.
        <div class="float-right d-none d-sm-inline-block">
            <b>Versión</b> 3.2.0
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/dist/js/adminlte.js') }}"></script>
    
    <!-- Script para las animaciones -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mostrar el preloader por 3.5 segundos
            setTimeout(function() {
                const preloader = document.querySelector('.preloader');
                preloader.classList.add('hidden');
                
                // Eliminar completamente el preloader después de la transición
                setTimeout(function() {
                    preloader.style.display = 'none';
                }, 800);
            }, 3500);
            
            // Animación para la imagen flotante
            setInterval(function() {
                const floatingImg = document.querySelector('.floating-image');
                if (floatingImg) {
                    floatingImg.style.animation = 'none';
                    setTimeout(function() {
                        floatingImg.style.animation = 'float 6s ease-in-out infinite';
                    }, 10);
                }
            }, 6000);
            
            // Crear partículas de datos dinámicamente
            setInterval(function() {
                const particles = document.querySelectorAll('.particle');
                particles.forEach(function(particle) {
                    particle.style.animation = 'none';
                    setTimeout(function() {
                        particle.style.animation = 'particle-animation 3s infinite';
                    }, 10);
                });
            }, 3000);
        });
    </script>
</body>
</html>