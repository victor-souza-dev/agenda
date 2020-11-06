<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Agenda PHP</title>
    <!-- CSS do Bootstrap e CSS customizado -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
    include_once "include/menu.php";
    ?>

    <div class="container">
        <h1 class="titulo">Home</h1>

        <div class="row">
            <div class="col-lg-4">
                <h3>Coluna 1</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut dolorem repellendus placeat reprehenderit? Earum libero fugit eveniet commodi ut sunt quia facere repellat, autem expedita illum, quidem, itaque et laboriosam!</p>
            </div>

            <div class="col-lg-4">
                <h3>Coluna 2</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, asperiores odio unde quisquam labore nisi aliquid ullam sed vero, facere, officiis minus itaque quia! Optio fugiat dignissimos facilis ab et.</p>
            </div>

            <div class="col-lg-4">
                <h3>Coluna 2</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum perferendis architecto earum, accusantium, sint inventore sapiente, ratione iusto quibusdam rerum praesentium officiis alias aliquid sequi maiores saepe ullam quaerat itaque.</p>
            </div>
        </div>
    </div> <!-- fecha /container -->

    <!-- jQuery (online) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JavaScript customizado -->
    <script src="js/scripts.js"></script>
</body>
</html>