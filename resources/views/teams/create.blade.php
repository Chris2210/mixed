

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
          <h3>Alta nuevo equipo</h3>
        </div>



          <div class="col-12">
            <!-- Default box -->
            <div class="card">

                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('teams.store')}}" method="post">
                            @csrf
                        <div class="row">


                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="hospital">Hospital</label>
                                    <select class="form-control" name="hospital" id="hospital" required>
                                        <option value="">Seleccionar hospital</option>
                                        @foreach($hospitals as $hospital)
                                            <option value="{{ $hospital }}">{{ $hospital }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="seccion">Sección</label>
                                    <select class="form-control" name="section" id="section" required>
                                        <option value="">Seleccionar sección</option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section }}">{{ $section }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="leader">Líder</label>
                                    <select class="form-control" name="leader" id="leader" required>
                                        <option value="">Seleccionar líder</option>
                                        @foreach($leaders as $leader)
                                            <option value="{{ $leader->id }}">{{ $leader->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>




                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                    <input type="submit" class="btn btn-primary btn-block" style="margin-top: 10px;" value="Crear equipo">
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







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  </body>
</html>
