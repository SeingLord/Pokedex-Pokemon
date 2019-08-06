
<table class="table table-hover">
    <thead>
        <tr>
            <th>Dex</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Type</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $data['pokemons'] as $pokemon): ?>
            <tr>
                <td><?php echo  $pokemon['id']; ?></td>
                <td>
                    <a href="/pokemon/<?php echo $pokemon['url']; ?>">
                    <img class="icon" src="/upload/icon/<?php  echo $pokemon['photoPerfil'];?>" 
                    alt="<?php echo $pokemon['name'];?>">
                        
                    </a>
                </td>
                <td>
                
                    <h3>
                        <a
                            href="/pokemon/<?php echo $pokemon['url']; ?>">
                            <?php echo $pokemon['name'];?>
                        </a>
                    </h3>
                
                </td>
                <td>
                    <a href="/pokemon/<?php echo $pokemon['url']; ?>">
                        <?php foreach($data['types'] as $type):?>
                            <?php if($pokemon['type'] === $type['id']):?>
                                <?php echo $type['type']; ?>
                            <?php endif; ?>
                        <?php endforeach;?> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>