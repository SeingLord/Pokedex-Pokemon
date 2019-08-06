<?php 
    auth_protection();
    
    if(resolve('/admin')){
        render('admin/home','admin');

    }elseif(resolve('/admin/auth.*')){
        include __DIR__.'/auth/routes.php';

    }elseif(resolve('/admin/pokemon.*')){
        include __DIR__.'/pokemon/routes.php';
    }elseif(resolve('/admin/user.*')){
        include __DIR__.'/users/routes.php';
    }elseif (resolve('/admin/upload/image')) {
        $file = $_FILES['file'] ?? null;
        if (!$file) {
            header('location: /admin/pokemons');
        }

        $allowedType =[
            'image/gif',  
            'image/jpg',
            'image/jpeg',
            'image/png',
        ];

        if(!in_array($file['type'], $allowedType)){
            http_response_code(422);
            echo 'Arquivo não permitido, utilize arquivos: gif, jpg, jpeg ou png';
            exit;
        }

        $name = uniqid(rand(), true) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        move_uploaded_file($file['tmp_name'], __DIR__ . '/../public/upload/' . $name);
    
        echo '/upload/' . $name;

    }else{
        http_response_code(404);
        echo 'Página não encontrada';
    }