<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/app.css">
  <script src="js/app.js"></script>
  <title>Home</title>
</head>

<body>
  <div class="container" style="margin-top:5%">

    <h1 class="text-center">Sistema de Sinuca</h1>

    <nav class="navbar navbar-expand-sm navbar-light border" style="background-color: #e3f2fd;">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home</a>
        </li>
        @if (session()->has('id'))
        <li class="nav-item">
          <a class="nav-link" href="aposta" target="_blank">Adicionar partida</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="deslogar">Deslogar</a>
        </li>
        <li>
          <a class="nav-link active text-success" href="#">Usuario conectado: {{ session()->get('usuario') }} </a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="cadastro" target="_blank">Cadastrar-se</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login">Login</a>
        </li>
        @endif
      </ul>
    </nav>

    @if (session()->has('id'))
    <form action="" method="post">
      {{ csrf_field() }}

      <div class="form-group"><br>
        <label for="data">Pesquisar as partidas por um determinado período:</label>
        <input type="date" name="data">
        <button type="submit" class="btn btn-primary">Pesquisar</button>
      </div>

      @isset($pesquisa)
      <div class="alert alert-info" role="alert">
        Numero de vitoria por determinado período !
      </div>
      <div class="container">
        <div class="row">
          <div class="col">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">DIREITA</th>
                  <th scope="col">VS</th>
                  <th scope="col">ESQUERDA</th>
                  <th scope="col">DATA DE PARTIDA</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pesquisa as $val)
                @if ($val->partida == 1)
                <tr>
                  <td>
                    <a class="nav-link">
                      @if ($val->jogador1 == 1)
                      <span style="color:green">
                        JOGADOR 1
                      </span>
                      @else
                      <span style="color:red">
                        JOGADOR 1
                      </span>
                      @endif
                    </a>
                  </td>
                  <td>
                    X
                  </td>
                  <td>
                    <a class="nav-link">
                      @if ($val->jogador2 == 1)
                      <span style="color:green">
                        JOGADOR 2
                      </span>
                      @else
                      <span style="color:red">
                        JOGADOR 2
                      </span>
                      @endif
                    </a>
                  </td>
                  @else

                <tr>
                  <td>
                    <a class="nav-link">
                      @if ($val->jogador1 == 1)
                      <span style="color:green">
                        JOGADOR 1<BR>
                        JOGADOR 2
                      </span>
                      @else
                      <span style="color:red">
                        JOGADOR 1<BR>
                        JOGADOR 2
                      </span>
                      @endif

                    </a>
                  </td>
                  <td>
                    X
                  </td>
                  <td>
                    <a class="nav-link">
                      @if ($val->jogador3 == 1)
                      <span style="color:green">
                        JOGADOR 3<BR>
                        JOGADOR 4
                      </span>
                      @else
                      <span style="color:red">
                        JOGADOR 3<BR>
                        JOGADOR 4
                      </span>
                      @endif
                    </a>
                  </td>
                  @endif
                  <td>{{$val->data}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="col">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">JOGADOR 1</th>
                  <th scope="col">JOGADOR 2</th>
                  <th scope="col">JOGADOR 3</th>
                  <th scope="col">JOGADOR 4</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">VITÓRIA</th>
                  <td>{{$jogador_1}}</td>
                  <td>{{$jogador_2}}</td>
                  <td>{{$jogador_3}}</td>
                  <td>{{$jogador_4}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        @endisset

    </form>
    <table class="table table-hover" style="margin-top:0%">
      @if (isset($dados))
      <div class="alert alert-info" role="alert">
        Selecione direita ou esquerda na tabela abaixo para atribuir a vitória!<br>
        Somente quem esta com status em andamento pode ser atribuido a vitória!
      </div>
      <thead>
        <tr>
          <th scope="col">DIREITA</th>
          <th scope="col">VS</th>
          <th scope="col">ESQUERDA</th>
          <th scope="col">VALOR DA APOSTA</th>
          <th scope="col">DATA DA PARTIDA</th>
          <th scope="col">STATUS</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($dados as $item)
        @if ($item->is_vitoria != 0)
        @if ($item->partida == 1)
        <tr>

          <td>
            <a class="nav-link">
              @if ($item->jogador1 == 1)
              <span style="color:green">
                JOGADOR 1
              </span>
              @else
              <span style="color:red">
                JOGADOR 1
              </span>
              @endif
            </a>
          </td>

          <td>
            X
          </td>

          <td>
            <a class="nav-link">
              @if ($item->jogador2 == 1)
              <span style="color:green">
                JOGADOR 2
              </span>
              @else
              <span style="color:red">
                JOGADOR 2
              </span>
              @endif
            </a>
          </td>

          <td>{{$item->valor}} </td>

          <td>{{$item->data}}</td>

          <td><span style="color:green">FINALIZADO</span></td>

        </tr>
        @else
        <tr>
          <td>
            <a class="nav-link">
              @if ($item->jogador1 == 1)
              <span style="color:green">
                JOGADOR 1<BR>
                JOGADOR 2
              </span>
              @else
              <span style="color:red">
                JOGADOR 1<BR>
                JOGADOR 2
              </span>
              @endif

            </a>
          </td>
          <td>
            X
          </td>
          <td>
            <a class="nav-link">
              @if ($item->jogador3 == 1)
              <span style="color:green">
                JOGADOR 3<BR>
                JOGADOR 4
              </span>
              @else
              <span style="color:red">
                JOGADOR 3<BR>
                JOGADOR 4
              </span>
              @endif
            </a>
          </td>
          <td>{{$item->valor}} </td>
          <td>{{$item->data}}</td>
          <td><span style="color:green">FINALIZADO</span></td>
        </tr>
        @endif
        @else
        @if ($item->partida == 1)
        <tr>
          <td>
            <a class="nav-link" href='vencedor/?time=1&id={{$item->id}}is_vitoria=1'>
              JOGADOR 1
            </a>
          </td>
          <td>
            X
          </td>
          <td>
            <a class="nav-link" href="vencedor/?time=2&id={{$item->id}}&is_vitoria=1">
              JOGADOR 2
            </a>
          </td>
          <td>{{$item->valor}} </td>
          <td>{{$item->data}}</td>
          <td>
            <span style="color:red">EM ANDAMENTO</span>
          </td>
        </tr>
        @else
        <tr>
          <td>
            <a class="nav-link" href='vencedor/?time=3&id={{$item->id}}is_vitoria=1'>
              JOGADOR 1<BR>
              JOGADOR 2
            </a>
          </td>
          <td>
            X
          </td>
          <td>
            <a class="nav-link" href="vencedor/?time=4&id={{$item->id}}&is_vitoria=1">
              JOGADOR 3<BR>
              JOGADOR 4
            </a>
          </td>
          <td>{{$item->valor}} </td>
          <td>{{$item->data}}</td>
          <td><span style="color:red">EM ANDAMENTO</span></td>
        </tr>
        @endif


        @endif
        @endforeach
      </tbody>
      @endif
    </table>
    @else
    <div class="alert alert-danger" role="alert">
      Realize o login, caso não tenha um usuario crie um !
    </div>
    @endif

  </div>
</body>

</html>