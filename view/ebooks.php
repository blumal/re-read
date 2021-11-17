<!DOCTYPE html>
<html lang="en">

<head>
    <title>Re-Read ebooks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="icon" href="../img/icon.png">

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
                <a href="../index.php">Re-Read</a>
                <a href="libros.php">Libros</a>
                <a href="ebooks.php" class="active">eBooks</a>
            </div>
            <div class="textpage">
                <h3>Toda la actualidad en eBook</h3>
                <div class="gallery">
                    <img src="../img/cell.jpeg" alt="Cell">
                    <div class="desc">A través de los teléfonos móviles se envía un mensaje que convierte a todos en esclavos asesinos...</div>
                </div>

                <div class="gallery">
                    <img src="../img/elciclodelhombrelobo.jpeg" alt="El ciclo del hombre lobo">
                    <div class="desc">Una escalofriante revisión del mito del hombre lobo por el rey de la literatura de terror...</div>
                </div>

                <div class="gallery">
                    <img src="../img/elresplandor.jpeg" alt="El resplandor">
                    <div class="desc">Esa es la palabra que Danny había visto en el espejo. Y, aunque no sabía leer, entendió que era un mensaje de horror...</div>
                </div>

                <div class="gallery clear">
                    <img src="../img/doctorsleep.jpeg" alt="doctorsleep">
                    <div class="desc">Una novela que entusiasmará a los millones de lectores de El resplandor y que encantará...</div>
                </div>

                <div class="gallery">
                    <img src="../img/mientrasescribo.jpeg" alt="Mientras escribo">
                    <div class="desc">Pocas veces un libro sobre el oficio de escribir ha resultado tan clarificador, útil y revelador.</div>
                </div>
                    <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#65D047">
                        <tr>
                            <th>Descripción</th>
                            <th>Foto</th>
                        </tr>
                        
                        <?php
                            include '../services/connection.php';
                            $fotos = mysqli_query($conn, "SELECT Title, Description, img from books");

                            while ($row = mysqli_fetch_array($fotos)) {
                                echo "<tr>";
                                    echo "<td>".$row['Description']."</td>"; //Cogemos la columna Description
                                    echo "<td>"."<img width='200' src = '../img/".$row['img']."'>";
                                echo "</tr>";
                            }
                        ?>

                    </table> 
            </div>
        </div>
        <div class="column side">
            <h2>Top ventas</h2>
            <?php
                // 1. Conexión con la base de datos	
                //include '../services/connection.php';

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