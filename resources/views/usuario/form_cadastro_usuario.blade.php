<form action="{{ url('/store_usuario') }}" method="POST">
  @csrf <!-- {{ csrf_field() }} -->

  <div class="mb-3">
    <label for="correio" class="form-label">Correio</label>
    <input type="email" class="form-control" id="correio" name="correio" aria-describedby="emailHelp"  required="required">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Senha</label>
    <input type="password" name="senha" class="form-control" id="exampleInputPassword1" required="required">
  </div>

  <div class="mb-3">
    <label for="nomeCampo" class="form-label">Nome</label>
    <input type="text" class="form-control" id="nomeCampo" name="nome" required="required">
  </div>

  <div class="mb-3">
    <label for="sobrenomeCampo" class="form-label">Sobrenome</label>
    <input type="text" class="form-control" id="sobrenomeCampo" name="sobrenome" required="required">
  </div>
      
  <button type="submit" class="btn btn-primary">Criar conta</button>
</form>