<!DOCTYPE html>
<html lang="es">
<head>
    <title>Bow Tie Club - Inicio</title>
    <?php include 'modules/head.html'; ?>
</head>
<body>
    <?php include 'modules/header.html'; ?>
    <main>
        <section class="frontal"></section>

        <div class="presentacion-container">
            <div class="carousel">
                <div class="carousel-track">
                    <div class="carousel-slide">
                        <img src="imagenes/p1.jpg" alt="Pajarita Clásica">
                    </div>
                    <div class="carousel-slide">
                        <img src="imagenes/p2.jpg" alt="Pajarita Moderna">
                    </div>
                    <div class="carousel-slide">
                        <img src="imagenes/p3.jpg" alt="Pajarita de Madera">
                    </div>
                </div>
                <div class="carousel-buttons">
                    <button class="carousel-button" id="prev">&#10094;</button>
                    <button class="carousel-button" id="next">&#10095;</button>
                </div>
            </div>
            <div class="video-container">
                <video controls muted autoplay>
                    <source src="video/nudo.mp4" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
            </div>
        </div>
    </main>

    <?php include 'modules/footer.html'; ?>
</body>
</html>
