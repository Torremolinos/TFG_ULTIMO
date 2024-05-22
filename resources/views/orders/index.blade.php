<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MerakiHandMadeLove - Carrito</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
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
                <li><a href="{{'/contacto'}}">Donde estamos</a></li>
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
        <div class="container py-5">
            <h2 class="mb-4">Carrito de Compras</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
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
                <button class="btn btn-primary" id="proceed-to-reservation">Proceder a la Reserva</button>
            </div>
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
                <a href="{{'/sobre'}}">Quienes Somos</a>
                <a href="{{'/donde'}}">Donde estamos</a>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartItems = document.getElementById('cart-items');
            const totalAmount = document.getElementById('total-amount');
            let total = 0;

            // Renderizar productos del carrito
            cart.forEach(product => {
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td>${product.name}</td>
                    <td>€${product.price}</td>
                    <td>
                        <input type="number" class="form-control quantity" value="${product.quantity}" min="1" data-id="${product.id}">
                    </td>
                    <td>€${(product.price * product.quantity).toFixed(2)}</td>
                    <td>
                        <button class="btn btn-danger btn-sm remove" data-id="${product.id}">Eliminar</button>
                    </td>
                `;

                cartItems.appendChild(row);
                total += product.price * product.quantity;
            });

            totalAmount.textContent = `Total: €${total.toFixed(2)}`;

            // Eliminar producto del carrito
            document.querySelectorAll('.remove').forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    cart = cart.filter(product => product.id != id);
                    localStorage.setItem('cart', JSON.stringify(cart));
                    location.reload();
                });
            });

            // Actualizar cantidad de producto
            document.querySelectorAll('.quantity').forEach(input => {
                input.addEventListener('change', function () {
                    const id = this.getAttribute('data-id');
                    const quantity = parseInt(this.value);
                    const product = cart.find(product => product.id == id);
                    product.quantity = quantity;
                    localStorage.setItem('cart', JSON.stringify(cart));
                    location.reload();
                });
            });

            // Proceder a la reserva
            document.getElementById('proceed-to-reservation').addEventListener('click', function () {
                if (cart.length > 0) {
                    fetch('/reserve', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ cart })
                    })
                    .then(response => response.json())
                    .then(data => {
                        localStorage.removeItem('cart');
                        window.location.href = `/reservation/${data.id}`;
                    });
                } else {
                    alert('El carrito está vacío');
                }
            });
        });
    </script>
</body>
</html>
