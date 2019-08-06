<h3 class="mb-5">Adicionar usuários</h3>

<form method="POST" enctype="multipart/form-data" >

  <label for="name">Nome</label>
  <input  name="name" id="name" type="text" 
    class="form-control mb-3" required>

  <label for="email">Email</label>
  <input  name="email" id="email" type="email"
    class="form-control mb-3" required>
 
  <label for="password">Senha</label>
  <input  name="password" id="password" type="password" 
    class="form-control mb-3" required>
    <button class="btn btn-danger" type="submit">Salvar</button>
  
</form>
<hr> 
<a class="btn btn-secondary text-white" href="/admin/users">Voltar</a>