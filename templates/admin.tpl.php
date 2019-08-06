<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset=utf-8″>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/resources/trix/trix.css">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://unpkg.com/pnotify@4.0.0/dist/PNotifyBrightTheme.css"
    rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Painel administrativo</title>
  </head>
  <body class="d-flex flex-column">    
    <div id="header">
        <nav class="navbar  navbar-dark bg-dark">
            <a href="/admin" class="navbar-brand">Pokedex</a>
            <span class="navbar-text">
                Painel administrativo
            </span>
            <span class="navbar-text">
                <a href="/admin/auth/logout" class="btn btn-primary">Sair</a>
            </span>    
        </nav>
        
    </div>
    <div id="main">
        <div class="row">
            <div class="col">
                <ul id="main-menu" class="nav flex-column nav-pills bg-danger text-white p-2">
                    <li class="nav-item">
                        <span href="" class="nav-link text-light"><small>MENU</small></span>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/pokemons" class="nav-link 
                        <?php if(resolve('/admin/pokemon.*')): ?>
                                active
                        <?php endif; ?>
                        
                        ">Pókemons</a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/users" class="nav-link
                            <?php if(resolve('/admin/user.*')): ?>
                                active
                            <?php endif; ?>
                        ">Usuários</a>
                    </li>
                </ul>
            </div>
            <div id="content" class="col-10">
                <?php include $content ?>
            </div>
        </div>
    </div>
    <?php flash();?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>  
    <script src="/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/resources/trix/trix.js"></script>
    <script src="https://unpkg.com/pnotify@4.0.0/dist/umd/PNotify.js"></script>
    <script>
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

           document.addEventListener('trix-attachment-add', function () {
            const attachment = event.attachment;
            if (!attachment.file) {
                console.log("Vazio");
                return;
            }

            const form = new FormData();
            form.append('file', attachment.file);
            $.ajax({
                url: '/admin/upload/image',
                method: 'POST',
                data: form,
                contentType: false,
                processData: false,
                xhr: function () {
                    const xhr = $.ajaxSettings.xhr();
                    xhr.upload.addEventListener('progress', function (e) {
                        let progress = e.loaded / e.total * 100;
                        attachment.setUploadProgress(progress);
                    })
                    return xhr;
                }
            }).done(function (response) {
                console.log(response);
                attachment.setAttributes({
                    url: response,
                    href: response
                });
            }).fail(function (e) {
                console.log('deu errado');
            });
        });

        <?php flash();?>
        const confirmEl = document.querySelector('.confirm');
        if(confirmEl){
            confirmEl.addEventListener('click', function(e){
                e.preventDefault();
                if(confirm('Tem certeza que deseja fazer isso?')){
                    
                    window.location  = e.target.getAttribute('href');
                }
            }) ;
        }
    </script>
  </body>
</html>