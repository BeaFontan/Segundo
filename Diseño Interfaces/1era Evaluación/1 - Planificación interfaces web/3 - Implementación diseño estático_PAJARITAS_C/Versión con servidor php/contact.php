<!DOCTYPE html>
<html lang="es">
<head>
    <title>Bow Tie Club - Contact</title>
    <?php include 'modules/head.html'; ?>
</head>
<body>
    <?php include 'modules/header.html'; ?>

    <main class="fondoContacto">
        <div class="contacto">
            <h1>Contacto</h1>
            <form action="#" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
    
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" placeholder="Tu correo" required>
    
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí" required></textarea>
    
                <button type="submit">Enviar</button>
            </form>
        </div>
    </main>
    
    <?php include 'modules/footer.html'; ?>
</body>
</html>
