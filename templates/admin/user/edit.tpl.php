<h3 class="mb-5">Editar usuarios</h3>

<form method="POST" enctype="multipart/form-data" >
  <label for="name">Nome</label>
  <input  name="name" id="name" type="text" 
    class="form-control mb-3" required value="<?php echo $data['user']['name']?>">
  <label for="email">Email</label>
  <input  name="email" id="email" type="email"
    class="form-control mb-3" required value="<?php echo $data['user']['email']?>">
 
  <label for="password">Senha</label>
  <input  name="password" id="password" type="password" 
    class="form-control mb-3">
 

  <button class="btn btn-danger" type="submit">Salvar</button>
</form>
  <hr>
 
<a class="btn btn-secondary text-white" href="/admin/usuario">Voltar</a>