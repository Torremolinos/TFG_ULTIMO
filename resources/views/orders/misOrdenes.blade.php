<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MerakiHandMadeLove - Mis Pedidos</title>
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

        .table-custom thead {
            background-color: var(--color-white);
            color: white;
        }

        .table-custom tbody {
            background-color: white;
        }

        .btn-primary-custom {
            background-color: var(--btn-primary-bg);
            border-color: var(--btn-primary-border);
            color: white;
        }

        .btn-primary-custom:hover {
            background-color: var(--btn-primary-hover-bg);
            border-color: var (--btn-primary-hover-border);
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

        .table td,
        .table th {
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
        @media (max-width: 768px) {
            .navbar-nav {
                text-align: center;
            }

            .navbar-nav .nav-item {
                margin-bottom: 10px;
            }

            .table-responsive {
                overflow-x: auto;
            }

            .footer .grupo-1 {
                flex-direction: column;
                align-items: center;
            }

            .footer .box {
                width: 100%;
                text-align: center;
                margin-bottom: 20px;
            }
        }

        /* Styles for making table responsive */
        @media (max-width: 600px) {
            .table-responsive {
                border: 0;
            }

            .table-responsive table {
                border-collapse: collapse;
                width: 100%;
            }

            .table-responsive table thead {
                display: none;
            }

            .table-responsive table tr {
                display: block;
                margin-bottom: 10px;
                border: 1px solid #ddd;
                padding: 10px;
                border-radius: 10px;
                background-color: white;
            }

            .table-responsive table td {
                display: block;
                text-align: right;
                font-size: 13px;
                border-bottom: 1px dotted #ccc;
                padding: 5px;
                position: relative;
            }

            .table-responsive table td::before {
                content: attr(data-label);
                float: left;
                text-transform: uppercase;
                font-weight: bold;
            }

            .table-responsive table td:last-child {
                border-bottom: 0;
            }

            .table-responsive table ul {
                padding-left: 0;
                list-style: none;
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
    <section class="main-content">
        <div class="container py-5">
            <h2 class="mb-4 text-center">Mis Pedidos</h2>
            <div class="table-responsive">
                <table class="table table-bordered text-center table-custom">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre del Usuario</th>
                            <th>Número del Pedido</th>
                            <th>Productos</th>
                            <th>Fecha de Realización</th>
                            <th>Fecha de Expiración</th>
                            <th>Precio Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td data-label="Nombre del Usuario">{{ $order->user->name }}</td>
                            <td data-label="Número del Pedido">{{ $order->order_number }}</td>
                            <td data-label="Productos">
                                <ul>
                                    @foreach ($order->orderItems as $item)
                                    <li>{{ $item->product->name }} ({{ $item->quantity }} x €{{ $item->unit_amount }})</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td data-label="Fecha de Realización">{{ $order->created_at}}</td>
                            <td data-label="Fecha de Expiración">
                                <?php
                                    $expirationDate = date('Y-m-d', strtotime($order->created_at. ' + 7 days'));
                                    echo $expirationDate;
                                ?>
                            </td>
                            <td data-label="Precio Total">€{{ $order->order->total_price }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
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
    <script>
        const userId = document.querySelector('meta[name="user-id"]').getAttribute('content');
        const cartKey = `cart_${userId}`;
        let cart = userId ? JSON.parse(localStorage.getItem(cartKey)) || [] : [];
        const cartItems = document.getElementById('cart-items');
        const totalAmount = document.getElementById('total-amount');
        const cartCount = document.getElementById('cart-count');
        const emptyCartButton = document.getElementById('empty-cart');
        let total = 0;

        // Actualizar el contador del carrito
        function updateCartCount() {
            const itemCount = cart.reduce((count, product) => count + product.quantity, 0);
            cartCount.textContent = itemCount;
        }

        updateCartCount();
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
