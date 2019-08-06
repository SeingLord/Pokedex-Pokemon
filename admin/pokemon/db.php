<?php
    function pages_get_data($redirectOnError){
        $name = filter_input(INPUT_POST,'name');
        $url = filter_input(INPUT_POST,'url');
        $type   = filter_input(INPUT_POST,'type');
        $body = filter_input(INPUT_POST,'body');

        if(!$name){
            flash("Informe o nome do pokémon",'error');
            header('location: '. $redirectOnError);
            die();
        }
        

        return compact('name', 'url', 'type', 'body');
    }
    $types_all = function() use ($conn){
        $sql = 'SELECT * FROM types';
        $result = $conn->query($sql);
        
        return $result->fetch_all(MYSQLI_ASSOC);
    };
    $type_one = function($id) use ($conn){
        $sql = "SELECT * FROM types WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    };

    $pokemon_all = function () use ($conn){
        $sql = "SELECT * FROM pokemons";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    };
    
    $pokemon_one = function ($id) use ($conn){
        $sql = 'SELECT * FROM pokemons WHERE url = ?';
        if(intval($id)){
            $sql = 'SELECT * FROM pokemons WHERE id = ?';
        }
        $stmt = $conn->prepare($sql);
        if(intval($id)){
            $stmt->bind_param('i', $id);
        }

        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();      

    };

    $pokemon_create = function() use($conn){
        $data = pages_get_data('/admin/pokemon/create');
        
        $file =  $_FILES['photoPerfil'];

        $allowedTypes = [
            'image/jpg',
            'image/jpeg',
            'image/png',
        ];
    
        if (!in_array($file['type'], $allowedTypes)) {
            http_response_code(422);
            echo 'Arquivo não permitido';
            exit;
        }
    
        $name = uniqid(rand(), true) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        
        move_uploaded_file($file['tmp_name'], __DIR__ . 
        '/../../public/upload/icon/' . $name);

        $sql = ' INSERT INTO pokemons'
        .' (name,url, type, body, photoPerfil, created, updated)'
        .' VALUES ( ?, ?, ?, ?, ?, NOW(), NOW());';

        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss', $data['name'], $data['url'], 
        $data['type'],$data['body'], $name);
        
        
        flash("Seu pokémon foi criado com sucesso!", "success");
        return $stmt->execute();
    
    };

    $pokemon_update = function($id) use($conn){
        $data = pages_get_data('/admin/pages'.$id.'/edit');

        $file =  $_FILES['photoPerfil'];
        $allowedType = [
            'image/gif',  
            'image/jpg',
            'image/jpeg',
            'image/png'
        ];

        if(!in_array($file['type'], $allowedType) ){
            http_response_code(422);
            echo 'Arquivo não permitido, utilize arquivos: gif, jpg, jpeg ou png';
            exit;
        }

    
        $name = uniqid(rand(), true) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        
        move_uploaded_file($file['tmp_name'], __DIR__ . 
        '/../../public/upload/icon/' . $name);

        $sql = 'UPDATE pokemons SET name = ?, url = ?, type = ?,'
        .' body = ?, photoPerfil = ?, updated = NOW()'
        .' WHERE id = ?';

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssssi', $data['name'], $data['url'], $data['type'],
        $data['body'], $name,
        $id );

        flash('Atualização feita com sucesso!', 'success');
        
        return $stmt->execute();

    };

    $pokemon_delete = function($id) use ($conn){
        $sql = 'DELETE FROM pokemons WHERE id = ?';
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$id);
        flash("Exclusão feita com sucesso!", 'success');
        return $stmt->execute();
    };