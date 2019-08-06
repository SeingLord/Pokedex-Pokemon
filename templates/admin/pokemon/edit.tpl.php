<h3 class="mb-5">Editar <?php echo $data['pokemon']['name']; ?></h3>
<div class="text-center">
<img class="perfil mb-5 img-fluid"
                    src="/upload/icon/<?php echo $data['pokemon']['photoPerfil']; ?>"
                    alt="Foto do <?php echo $data['pokemon']['name']; ?>">
</div>

<form method="POST" enctype="multipart/form-data" id="edit" >
  <label for="name">Nome</label>
  <input  name="name" id="name" type="text" 
  value = "<?php echo $data['pokemon']['name']; ?>" class="form-control mb-3">
  <div class="input-group mb-3 ">
      <div class="input-group-prepend">
        <span class="input-group-text">/</span>
      </div>
      <input  class="form-control" 
        name="url" type="text" id="url"
        class="form-control mb-3" 
        placeholder="Coloque a url do pokemon..."
        required
      >
  </div>              
  
    <div class="input-group mb-4">
    <div class="input-group-prepend">
      <span class="input-group-text">Foto principal</span>
    </div>
    <div class="custom-file">
      <input type="file"
       class="custom-file-input" id="photo" name="photoPerfil"
       >
      <label class="custom-file-label" >Selecionar arquivo</label>
    </div>
  </div>
  <select name="type" 
    class="form-control mb-5" 
    placeholder="Selecione um tipo" multiple>
    <?php foreach($data['types'] as $type): ?> 
      <option value="<?php echo $type['id']; ?>"
        <?php if($type['id'] === $data['pokemon']['type']):?>
            echo selected
        <?php endif; ?>
        >
        <?php echo utf8_encode($type['type']); ?></option>
      <?php endforeach;?>

  </select>
  <div class="form-group">
      <input  type="hidden" name="body" id="pagesBody"  
      value="<?php echo htmlentities($data['pokemon']['body']);?>">
      <trix-editor input="pagesBody"></trix-editor>
  </div>
  <button class="btn btn-danger" type="submit">Salvar</button>
</form>
  <hr>
<a class="btn btn-secondary text-white" href="/admin/pokemon">Voltar</a>