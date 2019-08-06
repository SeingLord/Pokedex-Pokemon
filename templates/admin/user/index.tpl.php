<h3 class="mb-5">Admistração dos administradores</h3>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $data['users'] as $user): ?>
            <tr>
                <td>
                <td>
                    <a href="/admin/user/<?php echo $user['id']; ?>">
                        <?php echo $user['name'];?>
                    </a>
                </td>
                <td>
                    <a href="/admin/user/<?php echo $user['id']; ?>">
                        <?php echo $user['email'];?>
                    </a>
                </td>
                <td class="text-right">
                    <a href="/admin/user/<?php echo $user['id']; ?>" 
                    class="btn btn-secondary">Ver</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="/admin/user/create" class="btn btn-danger">Novo</a>