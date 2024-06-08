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
            border-color: var(--btn-primary-hover-border);
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
            <h2 class="mb-4 text-center">Carrito de Compras</h2>
            <div class="table-responsive">
                <table class="table table-bordered text-center table-custom">
                    <thead class="thead-dark">
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="cart-items">
                        <!-- Aquí se agregarán los productos del carrito -->
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                <h4 id="total-amount">Total: €0.00</h4>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <button class="btn btn-danger btn-primary-custom mr-2" id="empty-cart">Vaciar Carrito</button>
                <button class="btn btn-primary btn-primary-custom" id="proceed-to-reservation">Proceder a la Reserva</button>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            updateCartCount(); // Llamar a la función al cargar la página

            // Renderizar productos del carrito
            cart.forEach(product => {
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td data-label="Producto">${product.name}</td>
                    <td data-label="Precio">${product.price.toFixed(2)}€</td>
                    <td data-label="Cantidad">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary decrease" type="button" data-id="${product.id}">-</button>
                            </div>
                            <input type="number" class="form-control quantity" value="${product.quantity}" min="1" data-id="${product.id}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary increase" type="button" data-id="${product.id}">+</button>
                            </div>
                        </div>
                    </td>
                    <td data-label="Total">€${(product.price * product.quantity).toFixed(2)}</td>
                    <td data-label="Acciones">
                        <button class="btn btn-danger btn-sm remove" data-id="${product.id}">Eliminar</button>
                    </td>
                `;

                cartItems.appendChild(row);
                total += product.price * product.quantity;
            });

            totalAmount.textContent = `Total: €${total.toFixed(2)}`;

            // Eliminar producto del carrito
            document.querySelectorAll('.remove').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    cart = cart.filter(product => product.id != id);
                    localStorage.setItem(cartKey, JSON.stringify(cart));
                    location.reload();
                });
            });

            // Disminuir cantidad de producto
            document.querySelectorAll('.decrease').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const product = cart.find(product => product.id == id);
                    if (product.quantity > 1) {
                        product.quantity--;
                        localStorage.setItem(cartKey, JSON.stringify(cart));
                        updateCartCount();
                        location.reload();
                    }
                });
            });

            // Aumentar cantidad de producto
            document.querySelectorAll('.increase').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const product = cart.find(product => product.id == id);
                    product.quantity++;
                    localStorage.setItem(cartKey, JSON.stringify(cart));
                    updateCartCount();
                    location.reload();
                });
            });

            // Actualizar cantidad de producto
            document.querySelectorAll('.quantity').forEach(input => {
                input.addEventListener('change', function() {
                    const id = this.getAttribute('data-id');
                    const quantity = parseInt(this.value);
                    const product = cart.find(product => product.id == id);
                    product.quantity = quantity;
                    localStorage.setItem(cartKey, JSON.stringify(cart));
                    updateCartCount();
                    location.reload();
                });
            });

            // Proceder a la reserva
            document.getElementById('proceed-to-reservation').addEventListener('click', function() {
                if (cart.length > 0) {
                    fetch("{{ route('orders.store') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            },
                            body: JSON.stringify({
                                cart
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.id) {
                                localStorage.removeItem(cartKey);
                                window.location.href = `/orders/gracias/${data.id}`;
                            } else {
                                alert(data.message || 'Error al procesar el pedido');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                } else {
                    alert('El carrito está vacío');
                }
            });

            // Vaciar el carrito
            emptyCartButton.addEventListener('click', function() {
                cart = [];
                localStorage.setItem(cartKey, JSON.stringify(cart));
                location.reload();
            });
        });
    </script>
</body>
</html>
