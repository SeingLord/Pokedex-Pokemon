<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokemons</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">

</head>
<body>
<header id="header">
    <img class="img" src="/img/arceus.jpg" alt="Imagem do pokémon criador">
    <nav class="navbar navbar-dark bg-dark">
        <a class="text-white" href="/">Pokedex</a>
    </nav>
</header>
<div class="main">
    <?php include $content ?>
</div>

<footer class="bg-dark text-white p-2">
    <p class="text-center"><small><?php echo date('Y'); ?> - Pokedex</small></p>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/pnotify@4.0.0/dist/umd/PNotify.js"></script>
    <script>
        <?php flash(); ?>
    </script>
</body>
</html>