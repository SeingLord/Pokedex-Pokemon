<h3 class="mb-5">Admistração do <?php echo $data['pokemon']['name']; ?></h3>
<div class="row">
    <div class="col-3">
        <dl class="row">
        <dt class="col-sm-4 ">Perfil</dt>
                <dd class="col-sm-8 ">
                    <img class="perfil mb-5"
                    src="/upload/icon/<?php echo $data['pokemon']['photoPerfil']; ?>" 
                    alt="Foto do <?php echo utf8_encode($data['pokemon']['name']); ?>">
                 </dd>
                <dt class="col-sm-4">Nome</dt>
                <dd class="col-sm-8"><?php echo utf8_encode($data['pokemon']['name']); ?></dd>

                <dt class="col-sm-4">Tipo</dt>
                <dd class="col-sm-8">
                    <?php foreach($data['types'] as $type):?>
                        <?php if($data['pokemon']['type'] === $type['id']):?>
                            <?php echo utf8_encode($type['type']); ?>
                        <?php endif; ?>
                    <?php endforeach;?> 
                <?php echo $data['pokemon']['type']; ?></dd>
                <dt class="col-sm-4">URL</dt>
                <dd class="col-sm-8"><?php echo $data['pokemon']['url']; ?>
                    <a class="btn btn-primary" href="
                    <?php echo '/pokemon/'.$data['pokemon']['url']; ?>">Ver</a>
                </dd>

                <dt class="col-sm-4">Criado em</dt>
                <dd class="col-sm-8"><?php echo $data['pokemon']['created']; ?></dd>

                <dt class="col-sm-4">Ultima atualização</dt>
                <dd class="col-sm-8 mb-5"><?php echo $data['pokemon']['updated']; ?></dd>
                
            </dl>
            
        </div>
        <div class="col bg-light">
            <?php echo $data['pokemon']['body']; ?>
        </div>
    </div>

    <p>
        <a class="btn btn-success" 
        href="/admin/pokemon/<?php echo $data['pokemon']['id']; ?>/edit">
        Editar
        </a>
        <a class="btn btn-warning" 
        href="/admin/pokemon/<?php echo $data['pokemon']['id']; ?>/delete">
        Delete</a>
    </p>
    <a class="btn btn-secondary" href="/admin/pokemons">Voltar</a>
</div>

