<?php
    function users_get_data($redirectOnError){
        $name = filter_input(INPUT_POST,'name');
        $email = filter_input(INPUT_POST,'email');
        $password = filter_input(INPUT_POST,'password');
        
        if(!$name){
            flash("Informe o nome do usuarios");
            header('location: '.$redirectOnError);
            die();
        }
        return compact('name', 'email', 'password');
    }

    $users_all = function () use ($conn){
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    };

    $user_one = function ($id) use ($conn){
        $sql = 'SELECT * FROM users where id = ?';
        $stmt = $conn->prepare($sql);
    
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();      

    };

    $user_create = function() use($conn){
        $data = users_get_data('/admin/user/create');

        $sql = 'INSERT INTO users'
            .' (email, name, password, created, updated)'
            .' VALUES ( ?, ?, ?, NOW(), NOW())';
        
        if(is_null($data['password'])){
            flash('Informe o campo senha', 'error');
            header('location: /admin/user/create');
            die();
        }
        $data['password']= password_hash($data['password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $data['email'], $data['name'], 
        $data['password']);
        flash("O usúario foi criado com sucesso!", "success");
        return $stmt->execute();
    };

    $user_update = function($id) use($conn){
        $data = users_get_data('/admin/user/'.$id.'/edit');

        $sql = 'UPDATE users SET email = ?,  name = ?,'
                .' updated = NOW() WHERE id = ?';

        if($data['password'])
        {          
            $sql = 'UPDATE users SET email = ?, name = ?, password= ?,'
            .' updated = NOW()'
            .' WHERE id = ?';
        }
        
        $stmt = $conn->prepare($sql);

        if($data['password']){
            $data['password']  = password_hash($data['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sssi', $data['email'], $data['name'],
            $data['password'], $id);

        }else{
            $stmt->bind_param('ssi', $data['email'], $data['name'], $id);
        }
        flash('Atualização feita com sucesso!', 'success');
        
        return $stmt->execute();

    };
    $user_delete = function($id) use($conn){
        $sql = 'DELETE FROM users WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        flash("Removido com sucesso!", 'success');
        return $stmt->execute();
    };