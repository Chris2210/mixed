

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


<div class="container-fluid">
        <div class="row">
<div class="col-sm-12" style="text-align: center; margin-top: 20px;">
          <h3>Alta nuevo paciente</h3>
        </div>




        </div>
      </div>
      <div class="container-fluid">
        <div class="row">




          <div class="col-12">
            <!-- Default box -->
            <div class="card">

                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
<div class="alert alert-danger" role="alert">
  <h5 style="text-align: center">¡El DNI/NIE se utilizará como contraseña para acceder a la aplicación móvil!</h5>
</div>
                            </div>





                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('usuarios.storeuser')}}" method="post">
                            @csrf
                        <div class="row">


                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="name">Nombre y apellidos</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre y apellidos" required>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="email">Correo electrónico</label>
                                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" name="email" id="email" placeholder="Correo electrónico" required>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="phone">Telefono contacto</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Telefono contacto" required>
                                </div>

                            </div>

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">

                                    <div class="form-group">
                                    <label for="NIE">DNI/NIE</label>
                                    <input type="text" class="form-control" pattern="[A-Z]{1}[0-9]{7}[A-Z]{1}" minlength="9" maxlength="9" name="NIE" id="NIE" placeholder="X1234567Y" required>
                                </div>
                            </div>



                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                            </div>


                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <input type="hidden" name="team_id" value="{{ Auth::user()->team_id }}">
                                    <input type="submit" class="btn btn-primary btn-block" style="margin-top: 10px;" value="Crear nuevo usuario">
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <a href="{{url('usuariosteam/'.Auth::user()->team_id.'')}}" class="btn btn-primary btn-block" style="margin-top: 10px;">Volver</a>
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
