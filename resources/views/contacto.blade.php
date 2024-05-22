<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MerakiHandMadeLove</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('styles/gallery.css') }}">
</head>

<body>
    <header>
        <a href="/">
            <img src="/assets/logo/logo.png" alt="" class="logo">
        </a>
        <button id="abrir" class="abrir-menu"><i class="bi bi-list"></i></button>
        <nav class="nav" id="nav">
            <button class="cerrar-menu" id="cerrar"><i class="bi bi-x"></i></button>
            <ul class="nav-list">
                <li><a href="{{'/'}}">Inicio</a></li>
                <li><a href="{{'/products'}}">Productos</a></li>
                <li><a href="{{'/sobre'}}">Quienes Somos</a></li>
                <li><a href="{{'/orders'}}">
                        <img class="shoppingCart" src="/assets/svg/shopping_cart_24dp_FILL0_wght400_GRAD0_opsz24 (1).svg">
                    </a></li>
                @if (Route::has('login'))
                @auth
                <li class="auth-container">
                    <span>Hola {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="#" onclick="document.getElementById('logout-form').submit();" class="logout-link">
                            Cerrar sesión
                        </a>
                    </form>
                </li>
                @else
                <li><a href="{{ route('login') }}" class="auth-link">Acceder</a></li>
                @if (Route::has('register'))
                <li><a href="{{ route('register') }}" class="auth-link">Registrarse</a></li>
                @endif
                @endauth
                @endif
                <li></li>
            </ul>
        </nav>
    </header>

    <section class="d-flex flex-column align-items-center py-5">
        <form class="w-50" id="contactForm">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required pattern="[A-Z][a-zA-Z\s]*" title="La primera letra debe ser mayúscula.">
            </div>
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="tel" class="form-control" id="phone" name="phone" required pattern="(\+34|0034|34)?[6|7][0-9]{8}" title="Número de teléfono válido de España.">
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" title="Correo electrónico válido.">
            </div>
            <div class="form-group">
                <label for="message">Mensaje</label>
                <textarea class="form-control" id="message" name="message" rows="4" required minlength="30" title="El mensaje debe tener al menos 30 caracteres."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </section>

    <footer class="pie-pagina">
        <section class="grupo-1">
            <div class="box">
                <figure>
                    <a href="index.html">
                        <img src=/assets/logo/logo.png alt="Logo MerakiHandMade">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>SOBRE NOSOTROS</h2>
                <a href="{{'/sobre'}}">Quienes Somos</a>
                <a href="{{'/donde'}}">Donde estamos</a>
                <a href="{{'/sobre'}}">Contáctanos</a>
            </div>
            <div class="box">
                <div class="red-social">
                    <h2>REDES SOCIALES</h2>
                    <a href="#"><img src="/assets/icons/5296520_bubble_chat_mobile_whatsapp_whatsapp logo_icon.png" alt=""></a>
                    <a href="https://www.instagram.com/meraki_handmadelove/?hl=es"><img src="/assets/icons/5296500_fb_social media_facebook_facebook logo_social network_icon.png" alt=""></a>
                    <a href="https://www.linkedin.com/showcase/meraki-boutiques/about/"><img src="/assets/icons/5296501_linkedin_network_linkedin logo_icon.png" alt=""></a>
                    <a href="https://www.instagram.com/meraki_handmadelove/?hl=es"><img src="/assets/icons/5296765_camera_instagram_instagram logo_icon.png" alt=""></a>
                </div>
            </div>
        </section>
        <div class="grupo-2">
            © 2024 MerakiHandMadeLove. Todos los derechos reservados.</div>
    </footer>

    <script src="/scripts/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Formulario enviado');
            window.location.href = '/';
        });
    </script>
</body>

</html>