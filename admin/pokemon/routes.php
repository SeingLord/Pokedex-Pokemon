<?php 
    include __DIR__.'/db.php';

    if(resolve('/admin/pokemons')){
        $pokemons = $pokemon_all();
        
        flash('Pokemon com sucesso', 'success');

        render('admin/pokemon/index','admin', ['pokemons'=> $pokemons]);
        
    }elseif(resolve('/admin/pokemon/create')){  
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $pokemon_create();        
            header('location: /admin/pokemon');
        }
        
        $types = $types_all();
        render('admin/pokemon/create','admin', ['types'=>$types]);
        
    }elseif($params = resolve('/admin/pokemon/(\d+)/edit')){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $pokemon_update($params[1]);
            header('location: /admin/pokemon/'.$params[1]);
        }
        $types = $types_all();
        $pokemon = $pokemon_one($params[1]);
        render('admin/pokemon/edit','admin', 
            ['pokemon'=>$pokemon, 'types'=>$types]
        );
        
    }elseif($params = resolve('/admin/pokemon/(\d+)/delete')){
        $pokemon_delete($params[1]);
        header('location: /admin/pokemons');
        
    }elseif($params = resolve('/admin/pokemon/(\d+)')){
        $pokemon = $pokemon_one($params[1]);
        $types = $types_all();
        render('admin/pokemon/view','admin',
        ['pokemon'=> $pokemon, 'types'=> $types]);
        
    }