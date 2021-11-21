<!DOCTYPE html>
<html lang="en">

<head>
    <title>Re-Read</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="icon" href="./img/icon.png">

</head>

<body>

    <div class="logo">
        <h1>Re-Read</h1>
    </div>

    <div class="header">
        <h1>Re-Read</h1>
        <p>En Re-Read podrás encontrar libros de segunda mano en perfecto estado. También vender los tuyos. Porque siempre hay libros leídos y libros por leer. Por eso Re-compramos y Re-vendemos para que nunca te quedes sin ninguno de los dos.</p>
    </div>

    <div class="row">
        <div class="column middle">
            <div class="topnav">
                <a href="index.php" class="active">Re-Read</a>
                <a href="libros.php">Libros</a>
                <a href="ebooks.php">eBooks</a>
            </div>
            <div class="textpage">
                <h3>Nunca la lectura ha sido tan necesaria</h3>
                <p>En esto tiempos difíciles Re-Read se suma al mensaje de #yomequedoencasa por el bien común de la sociedad.</p>

                <h3>Reduce & Reuse & Read</h3>
                <p>Somos la librería Eco-Friendly – Re-Read nació pensando en verde con el objetivo de compartir una pasión, la lectura y para expresar una preocupación: si queremos construir un futuro sostenible, es necesario que reduzcamos el consumo y
                    que reutilicemos cuantos más objetos materiales mejor.</p>
            </div>
        </div>

        <div class="column side">
            <h2>Top ventas</h2>
            <?php
                // 1. Conexión con la base de datos	
                include '../services/connection.php';

                // 2. Selección y muestra de datos de la base de datos
                $result = mysqli_query($conn, "SELECT Books.Title FROM Books WHERE eBook != '0'");

                if (!empty($result) && mysqli_num_rows($result) > 0) {
                // datos de salida de cada fila (fila = row)
                    while ($row = mysqli_fetch_array($result)) {
                    echo "<p>".$row['Title']."</p>";
                    }
                } else {
                    echo "0 resultados";
                }
            ?>
        </div>
    </div>

</body>

</html>