<!DOCTYPE html>
<html>
<head>
    <title>Clasificación con AJAX</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        label { display: block; margin-top: 10px; }
        select { padding: 5px; width: 300px; }
    </style>
</head>
<body>

<h1>🌱 Clasificación Taxonómica</h1>

<form>
    <label>Filo (desde Plantae):</label>
    <select id="phylum" onchange="cargarTaxones(this.value, 'class')">
        <option value="">-- Selecciona un Filo --</option>
    </select>

    <label>Clase:</label>
    <select id="class" onchange="cargarTaxones(this.value, 'order')">
        <option value="">-- Selecciona una Clase --</option>
    </select>

    <label>Orden:</label>
    <select id="order" onchange="cargarTaxones(this.value, 'family')">
        <option value="">-- Selecciona un Orden --</option>
    </select>

    <label>Familia:</label>
    <select id="family">
        <option value="">-- Selecciona una Familia --</option>
    </select>
</form>

<script>
    // Al cargar la página, obtenemos los filos desde Plantae (kingdomKey = 6)
    window.onload = function() {
        cargarTaxones(6, 'phylum');
    };

    function cargarTaxones(parentKey, rank) {
        fetch(`get-taxones.php?parentKey=${parentKey}&rank=${rank}`)
            .then(res => res.json())
            .then(data => {
                const select = document.getElementById(rank);
                select.innerHTML = `<option value="">-- Selecciona ${rank} --</option>`;
                data.forEach(item => {
                    select.innerHTML += `<option value="${item.key}">${item.name}</option>`;
                });

                // Limpiar niveles inferiores
                const niveles = ['phylum', 'class', 'order', 'family'];
                const index = niveles.indexOf(rank);
                for (let i = index + 1; i < niveles.length; i++) {
                    document.getElementById(niveles[i]).innerHTML = `<option value="">-- Selecciona ${niveles[i]} --</option>`;
                }
            });
    }
</script>

</body>
</html>
