<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Bow Tie Club - Productos</title>
        <?php include 'modules/head.html'; ?>
    </head>
<body>
    <?php include 'modules/header.html'; ?>

    <main class="productosMain">
        <section class="frontal"></section>

        <section class="filtro">
            <button>Pajaritas temáticas</button>
            <button>Pajaritas formales</button>
            <button>Pajaritas personalizables</button>
            <input type="text" placeholder="Buscar...">
        </section>

        <section class="productos">
            <div class="producto-card">
                <img src="imagenes/p1.jpg" alt="Pajarita Elegante">
                <h2>Pajarita Azul Seda</h2>
                <p>Materiales: Seda</p>
                <p>Precio: 25.00 €</p>
                <button>Comprar ahora</button>
                <button class="add-to-cart" data-name="Pajarita Elegante" data-price="25.00" data-image="imagenes/p1.jpg">Agregar al carrito <span class="icono">🛒</span></button>
                <button>Ver más detalles</button>
            </div>
            <div class="producto-card">
                <img src="imagenes/p2.jpg" alt="Pajarita Elegante">
                <h2>Pajarita Azul Seda</h2>
                <p>Materiales: Seda</p>
                <p>Precio: 25.00 €</p>
                <button>Comprar ahora</button>
                <button class="add-to-cart" data-name="Pajarita Elegante" data-price="25.00" data-image="imagenes/p2.jpg">Agregar al carrito <span class="icono">🛒</span></button>
                <button>Ver más detalles</button>
            </div>
            <div class="producto-card">
                <img src="imagenes/p3.jpg" alt="Pajarita Elegante">
                <h2>Pajarita Azul Seda</h2>
                <p>Materiales: Seda</p>
                <p>Precio: 25.00 €</p>
                <button>Comprar ahora</button>
                <button class="add-to-cart" data-name="Pajarita Elegante" data-price="25.00" data-image="imagenes/p3.jpg">Agregar al carrito <span class="icono">🛒</span></button>
                <button>Ver más detalles</button>
            </div>
            <div class="producto-card">
                <img src="imagenes/p4.jpg" alt="Pajarita Elegante">
                <h2>Pajarita Azul Seda</h2>
                <p>Materiales: Seda</p>
                <p>Precio: 25.00 €</p>
                <button>Comprar ahora</button>
                <button class="add-to-cart" data-name="Pajarita Elegante" data-price="25.00" data-image="imagenes/p4.jpg">Agregar al carrito <span class="icono">🛒</span></button>
                <button>Ver más detalles</button>
            </div>
            <div class="producto-card">
                <img src="imagenes/p5.jpg" alt="Pajarita Elegante">
                <h2>Pajarita Azul Seda</h2>
                <p>Materiales: Seda</p>
                <p>Precio: 25.00 €</p>
                <button>Comprar ahora</button>
                <button class="add-to-cart" data-name="Pajarita Elegante" data-price="25.00" data-image="imagenes/p5.jpg">Agregar al carrito <span class="icono">🛒</span></button>
                <button>Ver más detalles</button>
            </div>
            <div class="producto-card">
                <img src="imagenes/p6.jpg" alt="Pajarita Elegante">
                <h2>Pajarita Azul Seda</h2>
                <p>Materiales: Seda</p>
                <p>Precio: 25.00 €</p>
                <button>Comprar ahora</button>
                <button class="add-to-cart" data-name="Pajarita Elegante" data-price="25.00" data-image="imagenes/p6.jpg">Agregar al carrito <span class="icono">🛒</span></button>
                <button>Ver más detalles</button>
            </div>

            <div id="overlay" class="overlay"></div>
            <div class="cart-panel" id="cartPanel">
                <div class="cart-panel-header">Tu carrito</div>
                <div class="cart-panel-content" id="cartContent">
                    <p>El carrito está vacío.</p>
                </div>
            </div>
    </main>

    <?php include 'modules/footer.html'; ?>
</body>
</html>
