<h2 class="mb-5 p-3">Dados do  
    <?php echo $data['user']['name']; ?></h2>

<div class="row ">
    <div class="col bg-light p-3">
        <dl class="row">
                <dt class="col-sm-4">Nome</dt>
                <dd class="col-sm-8"><?php echo $data['user']['name']; ?></dd>

                <dt class="col-sm-4">Email</dt>
                <dd class="col-sm-8"><?php echo $data['user']['email']; ?></dd>

                <dt class="col-sm-4">Criado em</dt>
                <dd class="col-sm-8"><?php echo $data['user']['created']; ?></dd>

                <dt class="col-sm-4">Ultima atualização</dt>
                <dd class="col-sm-8 mb-5"><?php echo $data['user']['updated']; ?></dd>
                
            </dl>
            
        </div>
    </div>

    <p>
        <a class="btn btn-success" 
        href="/admin/user/<?php echo $data['user']['id']; ?>/edit">
        Editar
        </a>
        <a class="btn btn-warning" 
        href="/admin/user/<?php echo $data['user']['id']; ?>/delete">
        Delete</a>
    </p>
    <a class="btn btn-secondary" href="/admin/users">Voltar</a>
</div>

