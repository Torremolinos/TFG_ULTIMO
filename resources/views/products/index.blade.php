<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MerakiHandMadeLove</title>
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
                <li><a href="{{'/order'}}">
                        <img class="shoppingCart" src="/assets/svg/shopping_cart_24dp_FILL0_wght400_GRAD0_opsz24 (1).svg">
                    </a></li>
                    <li><a href="{{'/contacto'}}">Contacto</a></li>
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
    <section>
        <div class="main">
            <h1>Nuestros Productos</h1>
            <ul class="cards">
                <li class="cards_item">
                    <div class="card">
                        <div class="card_image"><img src="/assets/llaveros/LetraA1.jpeg"></div>
                        <div class="card_content">
                            <h2 class="card_title">Card Grid Layout</h2>
                            <p class="card_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam odit expedita, quia assumenda sint cupiditate a saepe laborum molestias iure, blanditiis minus. Culpa aliquid nam voluptate quos assumenda enim temporibus.</p>
                            <button class="btn card_btn">Comprar</button>
                        </div>
                    </div>
                </li>
                <li class="cards_item">
                    <div class="card">
                        <div class="card_image"><img src="/assets/llaveros/LetraA1.jpeg"></div>
                        <div class="card_content">
                            <h2 class="card_title">Card Grid Layout</h2>
                            <p class="card_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate itaque consectetur esse quod tempora! Numquam corporis sapiente aliquid quidem provident! Porro iste ipsa blanditiis error in odit maiores, provident cupiditate?</p>
                            <button class="btn card_btn">Comprar</button>
                        </div>
                    </div>
                </li>
                <li class="cards_item">
                    <div class="card">
                        <div class="card_image"><img src="/assets/llaveros/LetraA1.jpeg"></div>
                        <div class="card_content">
                            <h2 class="card_title">Card Grid Layout</h2>
                            <p class="card_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate itaque consectetur esse quod tempora! Numquam corporis sapiente aliquid quidem provident! Porro iste ipsa blanditiis error in odit maiores, provident cupiditate?</p>
                            <button class="btn card_btn">Comprar</button>
                        </div>
                    </div>
                </li>
                <li class="cards_item">
                    <div class="card">
                        <div class="card_image"><img src="/assets/llaveros/LetraA1.jpeg"></div>
                        <div class="card_content">
                            <h2 class="card_title">Card Grid Layout</h2>
                            <p class="card_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate itaque consectetur esse quod tempora! Numquam corporis sapiente aliquid quidem provident! Porro iste ipsa blanditiis error in odit maiores, provident cupiditate?</p>
                            <button class="btn card_btn">Comprar</button>
                        </div>
                    </div>
                </li>
                <li class="cards_item">
                    <div class="card">
                        <div class="card_image"><img src="/assets/llaveros/LetraA1.jpeg"></div>
                        <div class="card_content">
                            <h2 class="card_title">Card Grid Layout</h2>
                            <p class="card_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate itaque consectetur esse quod tempora! Numquam corporis sapiente aliquid quidem provident! Porro iste ipsa blanditiis error in odit maiores, provident cupiditate?</p>
                            <button class="btn card_btn">Comprar</button>
                        </div>
                    </div>
                </li>
                <li class="cards_item">
                    <div class="card">
                        <div class="card_image"><img src="/assets/llaveros/LetraA1.jpeg"></div>
                        <div class="card_content">
                            <h2 class="card_title">Card Grid Layout</h2>
                            <p class="card_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate itaque consectetur esse quod tempora! Numquam corporis sapiente aliquid quidem provident! Porro iste ipsa blanditiis error in odit maiores, provident cupiditate?</p>
                            <button class="btn card_btn">Comprar</button>
                        </div>
                    </div>
                </li>
            </ul>
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
                <a href="https://www.instagram.com/meraki_handmadelove/?hl=es">Quienes Somos</a>
                <a href="https://larian.com/playtest">Donde estamos</a>
                <a href="https://larian.com/careers">Contactanos</a>
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