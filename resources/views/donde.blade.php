<!DOCTYPE html>
<html lang="en">

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
                <li><a href="{{'/contacto'}}">Contacto</a></li>
                <li><a href="{{'/nosotros'}}">Quienes Somos</a></li>
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
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-12 mb-4">
                    <h2>Ubicación</h2>
                </div>
                <div class="col-md-8">
                    <div class="embed-responsive embed-responsive-16by9 mb-4">
                        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3519.7524093101006!2d-16.739850223939698!3d28.093094208371493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc6a974dbc22e5ab%3A0x8742816c5e098a4b!2sAv.%20de%20Bruselas%2C%2017%2C%2038660%20Costa%20Adeje%2C%20Santa%20Cruz%20de%20Tenerife!5e0!3m2!1ses!2ses!4v1716322599717!5m2!1ses!2ses" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-md-8">
                    <h2>Horario de Atención</h2>
                    <p>Lunes a Viernes: 9:00 AM - 6:00 PM</p>
                    <p>Sábado: 10:00 AM - 4:00 PM</p>
                    <p>Domingo: Cerrado</p>
                </div>
            </div>
        </div>
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
                <a href="{{'/donde'}}">>Donde estamos</a>
                <a href="{{'/contacto'}}">Contáctanos</a>
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
</body>

</html>