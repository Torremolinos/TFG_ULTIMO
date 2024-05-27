<!-- resources/views/products/index.blade.php -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MerakiHandMadeLove - Carrito</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('styles/gallery.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    :root {
        --color-white: rgb(216, 186, 147);
        --backgroundBody-color: rgb(216 186 147 / 70%);
        --navbar-toggler-color: white;
        /* Puedes cambiar a black si prefieres */
    }

    body {
        background-color: var(--backgroundBody-color);
    }

    .navbar-custom {
        background-color: var(--color-white);
    }

    .table-custom thead {
        background-color: var(--color-white);
        color: white;
    }

    .table-custom tbody {
        background-color: white;
    }

    .btn-primary-custom {
        background-color: var(--color-white);
        border-color: var(--color-white);
    }

    .btn-primary-custom:hover {
        background-color: rgb(216 186 147 / 70%);;
        border-color: #5a4c14;
    }

    .navbar-toggler {
        border-color: var(--navbar-toggler-color);
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='%23ffffff' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="/">
            <img src="/assets/logo/logo.png" alt="MerakiHandMadeLove" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @if (Route::has('login'))
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hola {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <a class="dropdown-item" href="#"
                                onclick="document.getElementById('logout-form').submit();">Cerrar sesión</a>
                        </form>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Acceder</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                </li>
                @endif
                @endauth
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/orders') }}">
                        <img class="shoppingCart"
                            src="/assets/svg/shopping_cart_24dp_FILL0_wght400_GRAD0_opsz24 (1).svg" alt="Carrito">
                        <span id="cart-count">0</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/products') }}">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/sobre') }}">Quienes somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/donde') }}">Donde estamos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contacto') }}">Contacto</a>
                </li>
                @auth
            
                @endauth
               
            </ul>
        </div>
    </nav>
    <section>
        <div class="main">
            <h1>Nuestros Productos</h1>
            <ul class="cards" id="product-list">
                @foreach ($products as $product)
                @php
                $imagePath = 'storage/' . $product->image;
                @endphp
                <li class="cards_item">
                    <div class="card">
                        <div class="card_image"><img src="{{ asset($imagePath) }}" alt="{{ $product->name }}"></div>
                        <div class="card_content">
                            <h2 class="card_title">{{ $product->name }}</h2>
                            <p class="card_text">{{ $product->description }}</p>
                            <p class="card_text">€{{ $product->price }}</p>
                            @auth
                            <button class="btn card_btn add-to-cart" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}">Comprar</button>
                            @else
                            <p>Por favor, <a href="{{ route('login') }}">inicia sesión</a> o <a href="{{ route('register') }}">regístrate</a> para poder comprar.</p>
                            @endauth
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </section>
    <footer class="pie-pagina">
        <section class="grupo-1">
            <div class="box">
                <figure>
                    <a href="index.html">
                        <img src="/assets/logo/logo.png" alt="Logo MerakiHandMade">
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const price = parseFloat(this.getAttribute('data-price'));

                    const product = { id: parseInt(id), name: name, price: price, quantity: 1 };
                    const existingProduct = cart.find(p => p.id === product.id);

                    if (existingProduct) {
                        existingProduct.quantity += 1;
                    } else {
                        cart.push(product);
                    }

                    localStorage.setItem('cart', JSON.stringify(cart));
                    alert(`${name} agregado al carrito`);
                });
            });
        });
    </script>
</body>
</html>