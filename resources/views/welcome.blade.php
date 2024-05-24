<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MerakiHandMadeLove</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('styles/index.css') }}">
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
                <li><a href="{{'/donde'}}">Donde estamos</a></li>
                <li><a href="{{'/contacto'}}">Contacto</a></li>
                <li><a href="{{'/sobre'}}">Quienes Somos</a></li>
                @auth
                <li><a href="{{'/orders'}}">
                        <img class="shoppingCart" src="/assets/svg/shopping_cart_24dp_FILL0_wght400_GRAD0_opsz24 (1).svg">
                    </a></li>
                @endauth
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
    <main class="wraper-cards">
        <section class="s1">
            <div class="ps1">
                <h1 class="h1ps1">Meraki HandMadeLove</h1>
            </div>
        </section>
        <section class="s2">
            <p>MerakiHandMadeLove es una pagina web dedicada a la venta de productos hechos a mano, con amor y
                dedicación. En nuestra tienda encontrarás productos únicos y exclusivos, hechos con los mejores
                materiales y con la mejor calidad. Nuestros productos son ideales para regalar a tus seres queridos, o
                para darte un capricho. Entra en nuestra tienda y descubre todo lo que tenemos para ti.
            </p>
        </section>

        <section class="articles">
            <div class="grid__container">
                <div class="grid__item item_1 ancho"></div>
                <div class="grid__item item_2"></div>
                <div class="grid__item item_3 alto"></div>
                <div class="grid__item item_4"></div>
                <div class="grid__item item_5"></div>
                <div class="grid__item item_6 ancho"></div>
            </div>
        </section>
    </main>
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
                <a href="{{'/contacto'}}">Contactanos</a>
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
</body>

</html>