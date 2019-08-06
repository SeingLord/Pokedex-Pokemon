<h3 class="mb-5">Admistração de pokémon</h3>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $data['pokemons'] as $pokemon): ?>
            <tr>
                <td><?php echo  $pokemon['id']; ?></td>
                <td>
                    <a href="/admin/pokemon/<?php echo $pokemon['id']; ?>">
                        <?php echo $pokemon['name'];?>
                    </a>
                </td>
                <td class="text-right">
                    <a href="/admin/pokemon/<?php echo $pokemon['id']; ?>" class="btn btn-secondary">Ver</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="/admin/pokemon/create" class="btn btn-danger">Novo</a>