  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <script src="js/app.js"></script>
    <title>Cadastro</title>
  </head>

  <body>

    <div class="border" style="margin-left:35%;margin-right:35%;margin-top:5%">
      <h1 class="text-center">Cadastro Usuario</h1>
      <form action="#" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="email">Usuario:</label>
          <input type="text" class="form-control" placeholder="" id="usuario" name="usuario" required>
        </div>
        <div class="form-group">
          <label for="pwd">Senha:</label>
          <input type="password" class="form-control" placeholder="" id="senha" name="senha" required>
        </div>
        <div class="form-group">
          <label for="cf_pwd">Confirmar Senha:</label>
          <input type="password" class="form-control" placeholder="" id="cf_senha" name="cf_senha" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
      </form>
      <br>

      @if (isset($resultado_cadastro))
      @if ($msg == "sucesso" )
      <div class="alert alert-success">
        <strong>{{ $resultado_cadastro }} !</strong>
      </div>
      @else
      <div class="alert alert-danger">
        <strong>{{ $resultado_cadastro }} !</strong>
      </div>
      @endif
      @endif

    </div>
  </body>

  </html>