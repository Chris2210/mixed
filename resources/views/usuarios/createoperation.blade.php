<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administración | Alta nueva operación</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
<script>
  $(function() {
        $('#datepicker').datepicker();
    });
</script>
<style>
    .input-group-append {
  cursor: pointer;
}
</style>
  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->

    <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div> -->

    <section class="content">
        <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-12 mt-12">
        @include('shared.menu')

        <div class="col-sm-12" style="text-align: center; margin-top: 20px;">
          <h1>Alta nueva operación {{$user->name}}</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>
      <div class="container-fluid">
        <div class="row">




          <div class="col-12">
            <!-- Default box -->
            <div class="card">

                <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                            </div>





                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('usuarios.storeoperation')}}" method="post">
                            @csrf
                        <div class="row">


                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="name">Intervencón quirurgica</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Intervencón quirurgica" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <div class="form-group">
                                    <label for="size">Longitud corte(aprox cm.)</label>
                                    <input type="number" class="form-control" name="size" id="size" placeholder="Longitud corte(aprox cm.)" required>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <label for="date" >Fecha</label>
                                <div class="input-group date" id="datepicker">

                                    <input type="text" class="form-control" name="date" required>
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>







                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                            </div>


                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <input type="hidden" name="team_id" value="{{ Auth::user()->team_id }}">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <input type="submit" class="btn btn-primary btn-block" style="margin-top: 10px;" value="Crear nueva operación">
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                                <a href='/usuarios/showpatient/{{$user->id}}' class="btn btn-primary btn-block" style="margin-top: 10px;">Volver</a>

                            </div>



                        </div>












                    </form>

                </div>
                <!-- /.card-body -->
              </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<!-- Page specific script -->


</body>
</html>
