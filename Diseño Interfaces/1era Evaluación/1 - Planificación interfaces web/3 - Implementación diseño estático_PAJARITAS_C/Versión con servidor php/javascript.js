//Función para desplegar menú hamburguesa
function toggleMenu() {
    var menu = document.getElementById('menu');
    menu.classList.toggle('show');
}

//Función para el carousel
document.addEventListener("DOMContentLoaded", () => {
    const track = document.querySelector('.carousel-track');
    const slides = Array.from(track.children);
    const nextButton = document.getElementById('next');
    const prevButton = document.getElementById('prev');
    let currentIndex = 0;

    function updateSlidePosition() {
        track.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    nextButton.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % slides.length;
        updateSlidePosition();
    });

    prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        updateSlidePosition();
    });
});


//Script para controles de carrito
document.addEventListener("DOMContentLoaded", () => {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartCountBadge = document.getElementById('cart-count');
    const cartPanel = document.getElementById('cartPanel');
    const cartButton = document.querySelector('.dd-to-cart');
    const cartContent = document.getElementById('cartContent');
    const overlay = document.getElementById('overlay');
    let cartCount = 0;
    let cartItems = [];

    // Evento para agregar productos al carrito
    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            cartCount++;
            cartCountBadge.textContent = cartCount;
            cartCountBadge.style.display = 'block';

            const name = button.getAttribute('data-name') || 'Producto';
            const price = button.getAttribute('data-price') || '0.00';
            const image = button.getAttribute('data-image') || 'imagenes/default.jpg';

            cartItems.push({ name, price, image });
            updateCartContent();

            // Mostrar el panel deslizante y el overlay
            cartPanel.classList.add('open');
            overlay.classList.add('open');
        });
    });

    // Actualizar el contenido del carrito
    function updateCartContent() {
        cartContent.innerHTML = cartItems.map((item, index) => `
            <div class="cart-item">
                <img src="${item.image}" alt="${item.name}">
                <div>
                    <p>${item.name}</p>
                    <p>${item.price} €</p>
                </div>
                <button class="remove-item" data-index="${index}">Eliminar</button>
            </div>
        `).join('');

        // Calcular el total
        const total = cartItems.reduce((sum, item) => sum + parseFloat(item.price), 0).toFixed(2);
        cartContent.innerHTML += `
            <div class="cart-total">
                <strong>Total: ${total} €</strong>
            </div>
        `;

        // Asignar evento a los botones de eliminar
        const removeButtons = document.querySelectorAll('.remove-item');
        removeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const index = button.getAttribute('data-index');
                cartItems.splice(index, 1);
                cartCount--;
                cartCountBadge.textContent = cartCount;
                if (cartCount === 0) {
                    cartCountBadge.style.display = 'none';
                }
                updateCartContent();
            });
        });
    }

    // Evento para abrir o cerrar el panel del carrito al hacer clic en el botón del carrito
    cartButton.addEventListener('click', (e) => {
        e.stopPropagation();
        cartPanel.classList.toggle('open');
        overlay.classList.toggle('open');
    });

    // Cerrar el panel y el overlay cuando se hace clic en el overlay
    overlay.addEventListener('click', () => {
        cartPanel.classList.remove('open');
        overlay.classList.remove('open');
    });

    // Evitar que el panel del carrito se cierre si se hace clic dentro de él
    cartPanel.addEventListener('click', (e) => {
        e.stopPropagation();
    });
});


