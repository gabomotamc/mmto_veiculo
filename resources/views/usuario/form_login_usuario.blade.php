<form action="{{ url('/auth_usuario') }}" method="POST">
  @csrf <!-- {{ csrf_field() }} -->

  <div class="mb-3">
    <label for="correio" class="form-label">Correio</label>
    <input type="email" class="form-control" id="correio" name="correio" aria-describedby="emailHelp"  required="required">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Senha</label>
    <input type="password" name="senha" class="form-control" id="exampleInputPassword1" required="required">
  </div>

  <!--<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>-->
  <button type="submit" class="btn btn-primary">Login</button>
</form>