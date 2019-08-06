<?php 
    include __DIR__.'/../admin/pokemon/db.php';
    if(resolve('/')){
        $pokemons = $pokemon_all();
        $types = $types_all();
        render('site/home','site', ['pokemons'=>$pokemons, 'types'=> $types ]);
    }elseif($params = resolve('/pokemon/(\w+)')){
        $pokemon = $pokemon_one($params[1]);
        render('site/pokemon','site', ['pokemon' => $pokemon ]);
    }else{
        http_response_code(404);
        echo 'Página não encontrada';
    }