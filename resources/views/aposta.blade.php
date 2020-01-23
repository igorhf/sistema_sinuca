<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/app.css">
  <script src="js/app.js"></script>
  <title>Cadastro da partida</title>
</head>

<body>
  <div class="" style="margin-left:30%;margin-right:30%;margin-top:5%">

    <h1 class="text-center">Cadastro da partida</h1>

    <form method="post" action="#">
      {{ csrf_field() }}

      <div class="form-group">
        <label class="">Tipo de partida</label><br>
        <select class="custom-select mr-sm-2" change="name" id="typegame" name="typegame" style="width:15%">
          <option selected value="1">1x1</option>
          <option value="2">2x2</option>
        </select>
        <p id="msg_type" style="color:red"></p>
      </div>

      <div class="form-group">
        <label for="valor">Valor da aposta:</label>
        <input type="number" class="form-control" placeholder="" id="valor" name="valor" required style="width:15%">
      </div>

      <div class="form-group"><br>
        <label for="data">Data da partida:</label>
        <input type="date" name="data">
      </div>

      <button type="submit" class="btn btn-primary">Salvar</button><br><br>

    </form>

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