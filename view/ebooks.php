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
                <form action="ebooks.php" method="get">
                    <p>Autor</p>
                        <input type="text" name="autorform" placeholder="Autor del libro..."><br><br>

                        <?php
                            include '../services/connection.php';

                            $pais = mysqli_query($conn, "SELECT Country FROM Authors GROUP BY Country");

                            echo "<label for='seleccion-Pais-BBDD'>País:</label><br><br>";
                            echo "<select name='paisform' value=''>";
                            echo "<option value = ''></option>";
                                foreach ($pais as $reg) {
                                    echo "<option value='{$reg['Country']}'>{$reg['Country']}</option>";
                                }
                            echo "</select><br><br>"
                        ?>
                    <input type="submit" value="Buscar" name="submit">
                </form><br>

                <?php
                    if(isset($_GET['submit'])){
                        $autorform = $_GET['autorform'];
                        $paisform = $_GET['paisform'];

                        $filtroAuthor = mysqli_query($conn, "SELECT a.Name, b.Title, b.Description, a.Country, b.img FROM authors a 
                        INNER JOIN booksauthors bb ON bb.AuthorId=a.Id
                        INNER JOIN books b ON b.Id=bb.BookId
                        WHERE a.Name LIKE '%$autorform%' && a.Country LIKE '%$paisform%';");

                        echo "<table width='100%' border='1' cellpadding='0' cellspacing='0' bordercolor='#117A65'>";
                            echo "<tr style='background-color:#117A65'>";
                                echo "<th>Autor</th>";
                                echo "<th>Título</th>";
                                echo "<th>Descripción</th>";
                                echo "<th>País de autor</th>";
                                echo "<th>Portada</th>";
                            echo "</tr>";
                                foreach ($filtroAuthor as $row) {
                                    echo "<tr>";
                                        echo "<td>".$row['Name']."</td>";
                                        echo "<td>".$row['Title']."</td>";
                                        echo "<td>".$row['Description']."</td>"; //Cogemos la columna Description
                                        echo "<td>".$row['Country']."</td>";
                                        echo "<td>"."<img width='200' src = '../img/".$row['img']."'>";
                                    echo "</tr>";
                                }
                        echo "</table>";
                        
                    }else{
                        echo "<table width='80%' border='1' cellpadding='0' cellspacing='0'>";
                            echo "<tr style='background-color:#117A65' style='color:white'>";
                                echo "<th>Descripción</th>";
                                echo "<th>Foto</th>";
                            echo "</tr>";
                        //include '../services/connection.php';
                        $fotos = mysqli_query($conn, "SELECT Title, Description, img from books");

                        while ($row = mysqli_fetch_array($fotos)) {
                            echo "<tr>";
                                echo "<td>".$row['Description']."</td>"; //Cogemos la columna Description
                                echo "<td>"."<img width='200' src = '../img/".$row['img']."'>";
                            echo "</tr>";
                        }
                        
                        echo "</table>";
                    }
                ?>
                
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