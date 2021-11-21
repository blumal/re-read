<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Zona Admin</title>
    <link rel="shortcut icon" href="../img/book-dead-solid.svg" type="image/x-icon">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include '../services/connection.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!isset($_SESSION['email'])) {
        header('Location: login.html');
    }
    ?>
    <ul class="padding-lat">
        <li><a>Hola <?php echo $_SESSION['email'];?></a></li>
        <li class="right">
            <a href="../processes/logout.proc.php">Logout</a>
        </li>
    </ul>
    <div class="row padding-top padding-lat">
        <div class="column-2">
            <form action="" method="post">
                <input type="submit" value="añadir libro">
            </form>
        </div>
        <div class="column-2" id="filter">
            <form action="zona.admin.php" method="post">
                <input type="text" placeholder="buscar por título..." name="titulo">
                <input type="submit" value="filtrar" name="filtro">
            </form>
        </div>
    </div>

    <div class="row padding-top-less padding-lat">
        <div class="column-1">
            <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#65D047">
                <tr>
                    <th>Titulo</th>
                    <th>Descripción</th>
                    <th>Autor</th>
                </tr>
                
                <!-- Recoger libros de la base de datos -->
                <?php
                //La primera vez titulo no estará defino, entrará por aquí, si la definimos $titulo = $_POST['titulo']; saltará un error de undefined
                    if (!isset($_POST['titulo'])){
                        $result = mysqli_query($conn, "SELECT b.Title, b.Description, a.Name 
                        From booksauthors INNER JOIN books b on b.Id=booksauthors.BookId
                        INNER JOIN authors a on booksauthors.AuthorId=a.Id;");//Variable que contiene la conexión con la BBDD + la query

                        foreach ($result as $row) {
                            echo "<tr>";
                                echo "<td>".$row['Title']."</td>"; //Cogemos la columa title 
                                echo "<td>".$row['Description']."</td>"; //Cogemos la columna Description
                                echo "<td>".$row['Name']."</td>";
                            echo "</tr>";
                        }
                    }else{
                        $titulo = $_POST['titulo'];
                        $result2 = mysqli_query($conn, "SELECT b.Title, b.Description, a.Name 
                        From booksauthors INNER JOIN books b on b.Id=booksauthors.BookId
                        INNER JOIN authors a on booksauthors.AuthorId=a.Id Where b.Title like '%$titulo%';");//Variable que contiene la conexión con la BBDD + la query
                        //Where b.Title = '$titulo', esta búsqueda, será precisa, si falta algo no defino en la BBDD no devolverá nada
                        foreach ($result2 as $row) {
                            echo "<tr>";
                                echo "<td>".$row['Title']."</td>"; //Cogemos la columa title 
                                echo "<td>".$row['Description']."</td>"; //Cogemos la columna Description
                                echo "<td>".$row['Name']."</td>";
                            echo "</tr>";
                        }
                    }
                    //Libro
                ?>

            </table>
        </div>
    </div>
</body>

</html>
