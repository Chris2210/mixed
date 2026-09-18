

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>

    <title>Laravel 12 Custom Dashboard - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  </head>
  <body>


    @include('shared.menu')






          <div class="col-12">
            <div class="col-sm-12" style="text-align: center; margin-top: 20px;">
          <h1>Actualizar usuario {{$usuario->name}}</h1>
        </div>
            <!-- Default box -->
            <div class="card">

                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('usuarios.update')}}" method="post">
                            @csrf
                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="hospital">Nombre y Apellidos</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$usuario->name}}" required>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="hospital">Correo electrónico</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{$usuario->email}}" required>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="hospital">Teléfono</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{$usuario->phone}}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="hospital">DNI/NIE</label>
                                    <input type="text" class="form-control" name="dni" id="dni" value="{{$usuario->NIE}}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="hospital">Role</label>
                                    <select class="form-control" name="userRole" id="userRole" required>
                                        <option value="">Seleccionar role</option>
                                        @foreach($userRole as $role)
                                            <option value="{{ $role }}" @if($role == $usuario->userRole) selected @endif>{{ $role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="hospital">Estado</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="">Seleccionar estado</option>
                                        <option value="1" @if($usuario->status == 1) selected @endif>Activo</option>
                                        <option value="0" @if($usuario->status == 0) selected @endif>Inactivo</option>
                                    </select>
                                </div>
                            </div>





                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="hospital">Equipo</label>
                                    <select class="form-control" name="team_id" id="team_id">
                                        <option value="">Seleccionar equipo</option>
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}" @if($team->id == $usuario->team_id) selected @endif>{{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                            </div>

                            <input type="hidden" name="id" value="{{$usuario->id}}">

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group"><input type="submit" class="btn btn-primary btn-block" style="margin-top: 10px;" value="Actualizar usuario"></div>

                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group"><a href="{{route('usuarios')}}" class="btn btn-primary btn-block" style="margin-top: 10px;">Volver</a></div>

                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <br>
                            </div>



                        </div>












                    </form>

                </div>
                <!-- /.card-body -->
              </div>
            <!-- /.card -->
          </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  </body>
</html>
