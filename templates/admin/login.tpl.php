<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
     content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"crossorigin="anonymous">
    <link rel="stylesheet" href="/resources/trix/trix.css">
    <link href="https://unpkg.com/pnotify@4.0.0/dist/PNotifyBrightTheme.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    
    <title>Painel admistrativo</title>
  </head>
  <body class='d-flex flex-column bg-danger'>
    <div id="header">
        <nav class="navbar navbar-dark bg-dark">
            <span>
                    <a href="/admin/" class="navbar-brand">Admin</a>
                    <span class="navbar-text">
                        Painel admistrativo
                    </span>
            </span>
        </nav>
    </div>
    <div id="main">
        <div class="row justify-content-center">
            <div id="content" class="col-4 align-self-center">
                <?php include $content ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script 
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
    crossorigin="anonymous"></script>  
    <script src="/js/bootstrap.min.js" 
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous">
    </script>
    <script src="/resources/trix/trix.js"></script>
    <script src="https://unpkg.com/pnotify@4.0.0/dist/umd/PNotify.js"></script>
    <script>

        <?php flash();?>

    </script>
  </body>
</html>