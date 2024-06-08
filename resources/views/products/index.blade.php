<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MerakiHandMadeLove - Carrito</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('styles/gallery.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ auth()->user()->id ?? '' }}">
    <style>
        :root {
            --color-white: rgb(216, 186, 147);
            --backgroundBody-color: rgb(216 186 147 / 70%);
            --navbar-toggler-color: white;
            --btn-primary-bg: rgb(216, 186, 147);
            --btn-primary-border: rgb(216, 186, 147);
            --btn-primary-hover-bg: rgb(185, 159, 125);
            --btn-primary-hover-border: rgb(185, 159, 125);
        }

        body {
            background-color: var(--backgroundBody-color);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar-custom {
            background-color: var(--color-white);
            padding: 0 20px;
        }

        .navbar-toggler {
            border-color: var(--navbar-toggler-color);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='%23ffffff' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .main-content {
            flex: 1;
        }

        .footer {
            margin-top: auto;
        }

        .table td, .table th {
            vertical-align: middle;
        }

        .btn-group-vertical .btn {
            margin-bottom: 5px;
        }

        .btn-group-vertical .btn:last-child {
            margin-bottom: 0;
        }

        a {
            color: black;
        }

        .footer .grupo-1 {
            display: flex;
            justify-content: center;
            text-align: center;
        }

        .footer .box {
            margin: 0 20px;
        }

        .footer .box h2 {
            text-align: center;
        }

        .footer .box a {
            display: block;
            margin-bottom: 10px;
        }

        /* Responsiveness */
        @media (max-width: 767px) {
            .navbar-brand img {
                max-width: 100px;
            }

            .navbar-nav {
                text-align: center;
            }

            .navbar-collapse {
                background-color: var(--color-white);
            }

            .cards {
                display: flex;
                flex-direction: column;
                padding: 0;
                margin: 0;
            }

            .cards_item {
                width: 100%;
                margin-bottom: 20px;
            }

            .card {
                margin-bottom: 20px;
            }

            .table-responsive {
                overflow-x: auto;
            }

            .table thead {
                display: none;
            }

            .table tr {
                display: block;
                margin-bottom: 15px;
                border: 1px solid #ddd;
                padding: 10px;
                border-radius: 10px;
                background-color: white;
            }

            .table td {
                display: block;
                text-align: right;
                font-size: 13px;
                border: none;
                position: relative;
                padding-left: 50%;
            }

            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
                font-weight: bold;
            }

            .table td:last-child {
                border-bottom: 0;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="/">
            <img src="/assets/logo/logo.png" alt="MerakiHandMadeLove" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @if (Route::has('login'))
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hola {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit();">Cerrar sesión</a>
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
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/orders') }}">
                        <img class="shoppingCart" src="/assets/svg/shopping_cart_24dp_FILL0_wght400_GRAD0_opsz24 (1).svg" alt="Carrito">
                        <span id="cart-count">0</span>
                    </a>
                </li>
                @endauth
                @endif
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/orders/misOrdenes') }}">Mis Pedidos</a>
                </li>
                @endauth
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
        <div class="container mt-3">
            <div id="alert-container" class="alert-container"></div>
        </div>
        <div class="main">
            <h1 class="text-center">Nuestros Productos</h1>
            <ul class="cards" id="product-list">
                @foreach ($products as $product)
                @php
                $imagePath = 'storage/' . $product->image;
                @endphp
                <li class="cards_item">
                    <div class="card">
                        <div class="card_image">
                            <a href="#" data-toggle="modal" data-target="#imageModal" data-image="{{ asset($imagePath) }}">
                                <img src="{{ asset($imagePath) }}" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="card_content">
                            <h2 class="card_title">{{ $product->name }}</h2>
                            <p class="card_text">{{ $product->description }}</p>
                            <div class="price-container">
                                <p class="card_text">€{{ $product->price }}</p>
                            </div>
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
        <div class="pagination-container">
         {{ $products->links('pagination::bootstrap-5') }}   
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <img id="modalImage" src="" class="img-fluid" alt="Product Image">
                </div>
            </div>
        </div>
    </div>

    <footer class="footer pie-pagina">
        <section class="grupo-1">
            <div class="box">
                <figure>
                    <a href="{{'/'}}">
                        <img src="/assets/logo/logo.png" alt="Logo MerakiHandMade">
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userIdMeta = document.querySelector('meta[name="user-id"]');
            if (!userIdMeta) return;

            const userId = userIdMeta.getAttribute('content');
            const cartKey = `cart_${userId}`;
            let cart = JSON.parse(localStorage.getItem(cartKey)) || [];
            const cartCount = document.getElementById('cart-count');
            const productList = document.getElementById('product-list');
            const alertContainer = document.getElementById('alert-container');

            function updateCartCount() {
                const itemCount = cart.reduce((count, product) => count + product.quantity, 0);
                cartCount.textContent = itemCount;
            }

            function showAlert(message, type = 'success') {
                const alert = document.createElement('div');
                alert.className = `alert alert-${type} alert-dismissible fade show alert-float`;
                alert.role = 'alert';
                alert.innerHTML = `
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;
                alertContainer.appendChild(alert);

                setTimeout(() => {
                    alert.classList.remove('show');
                    alert.classList.add('hide');
                    setTimeout(() => alert.remove(), 500);
                }, 3000);
            }

            updateCartCount();

            productList.addEventListener('click', function(event) {
                if (event.target.classList.contains('add-to-cart')) {
                    const button = event.target;
                    const id = button.getAttribute('data-id');
                    const name = button.getAttribute('data-name');
                    const price = parseFloat(button.getAttribute('data-price'));

                    const product = { id: parseInt(id), name: name, price: price, quantity: 1 };
                    const existingProduct = cart.find(p => p.id === product.id);

                    if (existingProduct) {
                        existingProduct.quantity += 1;
                    } else {
                        cart.push(product);
                    }

                    localStorage.setItem(cartKey, JSON.stringify(cart));
                    updateCartCount();
                    showAlert(`${name} agregado exitosamente`);
                }
            });

            $('#imageModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var imageSrc = button.data('image');
                var modal = $(this);
                modal.find('.modal-body #modalImage').attr('src', imageSrc);
            });
        });
    </script>
</body>
</html>
