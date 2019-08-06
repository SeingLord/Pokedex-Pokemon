<?php 
    include __DIR__ .'/db.php';

    if(resolve('/admin/users')){
        $users = $users_all();
        render('admin/user/index','admin', ['users'=> $users]);
    }elseif($params = resolve('/admin/user/(\d+)'))
    {   
        $user = $user_one($params[1]);
        render('admin/user/view','admin', ['user'=> $user]);

    }elseif($params = resolve('/admin/user/create'))
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $user = $user_create();
            header('location: /admin/users');
        }
        render('admin/user/create', 'admin');

    }elseif($params = resolve('/admin/user/(\d+)/edit')){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $user_update($params[1]);
            header('location: /admin/user/'.$params[1]);
        }

        $user = $user_one($params[1]);

        render('admin/user/edit','admin',['user'=> $user]);

    }elseif($params =  resolve('/admin/user/(\d+)/delete'))
    {
        $user_delete($params[1]);
        header('location: /admin/users');
        
    }else{
        http_response_code(404);
        echo 'Página não encontrada';
        
    }