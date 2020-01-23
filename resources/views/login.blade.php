<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/app.css">
  <script src="js/app.js"></script>
  <title>Login</title>
</head>

<body>

  <div class="border" style="margin-left:35%;margin-right:35%;margin-top:5%;">
    <h1 class="text-center">Login</h1>
    <form action="#" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="usuario">Usuario:</label>
        <input type="text" class="form-control" placeholder="" id="usuario" name="usuario" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" placeholder="" id="senha" name="senha" required>
      </div>

      <button type="submit" class="btn btn-primary btn-block">Entrar</button>
    </form>
    <br>

    @if (isset($resultado_login))
    <div class="alert alert-danger">
      <strong>{{ $resultado_login }} !</strong>
    </div>
    @endif

  </div>
</body>

</html>