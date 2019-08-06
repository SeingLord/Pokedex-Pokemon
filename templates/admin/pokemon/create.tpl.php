<h3 class="mb-5">Adicionar pokémon</h3>

<form method="POST" enctype="multipart/form-data" >
  <label for="name">Nome</label>
  <input  name="name" id="name" type="text" class="form-control mb-3">
  <div class="input-group mb-2">
      <div class="input-group-prepend">
        <span class="input-group-text">/</span>
      </div>
      <input  class="custom-input form-control " name="url" id="url" type="text"
        placeholder="Coloque a url do pokemon..."
      >

  </div>
  <div class="input-group mb-4">
    <div class="input-group-prepend">
      <span class="input-group-text">Foto principal</span>
    </div>
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="photo" name="photoPerfil"
        required>
      <label class="custom-file-label" for="customFile" >Escolha um imagem</label>
    </div>  
    
  </div>
  <select id="type" name="type" class="form-control mb-5" multiple>
      <option  selected disabled hidden>Selecione o tipo...</option>
        <?php foreach($data['types'] as $type):?> 
          <option value='<?php echo $type['id'];?>'>
          <?php echo utf8_encode($type['type']); ?></option>
        <?php endforeach;?>
  </select>

  <div class="form-group">
      <input  type="hidden" name="body" id="pagesbody">
      <trix-editor  input="pagesbody"></trix-editor>
  </div>
  <button class="btn btn-danger" type="submit">Salvar</button>
</form>
  <hr>
 
<a class="btn btn-secondary text-white" href="/admin/pokemon">Voltar</a>