

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




          <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class='col-md-2 mt-3'>

                    <a href="{{url('usuarios/createuser')}}" class='btn btn-info btn-block' name="buscar" type="submit">Añadir nuevo usuario</a>
            </div>

                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: left;">Id</th>
                        <th style="text-align: left;">Nombre</th>
                        <th style="text-align: left;">Teléfono</th>
                        <th style="text-align: left;">Email</th>
                        <th style="text-align: left;">DNI/NIE</th>
                        <th style="text-align: left;">Tipo Usuario</th>

                        <th style="text-align: left;">Estado</th>
                        <th style="text-align: left;">Acciones</th>
                        <th style="text-align: left;">Ficha</th>

                    </tr>
                    </thead>
                    <tbody>

                        @foreach($usuarios as $user)

                        <tr>
                            <td style="text-align: left;">{{$user->id}}</td>
                            <td style="text-align: left;">{{$user->name}}</td>
                            <td style="text-align: left;">{{$user->phone}}</td>
                            <td style="text-align: left;">{{$user->email}}</td>
                            <td style="text-align: left;">{{$user->nie}}</td>
                            <td style="text-align: left;">{{$user->userRole}}</td>

                            <td style="text-align: left;">
                                <div class="row">


                                @if($user->status==1)
                                <div class="col-12"><a href="{{ url('/usuarios/statususerKO/'. $user->id) }}" class='btn btn-success btn-block'>Activo</a></div>
                                @else
                                <div class="col-12"><a href="{{ url('/usuarios/statususerOK/'. $user->id) }}" class='btn btn-danger btn-block'>Inactivo</a></div>
                                @endif
                               </div>
                            </td>
                            <td>
                                <div class="row">

                                <div class="col-12"><a href="{{ url('/usuarios/showuser/'. $user->id) }}" class='btn btn-info btn-block'>Editar Usuario</a></div>
                               </div>
                            </td>
                            <td>
                                <div class="row">
                                @if($user->userRole == "PACIENTE")
                                <div class="col-12"><a href="{{ url('/usuarios/showpatient/'. $user->id) }}" class='btn btn-primary btn-block'>Ficha {{$user->name}}</a></div>
                                @endif

                               </div>
                            </td>


                        </tr>

                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            <!-- /.card -->
          </div>
        </div>
      </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>

  $(function () {

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]],
        "dom": 'Bfrtip',
            "buttons": [
            {
                extend: 'excel',
                exportOptions: {
                     columns: [0,1,2,3,4,5]
                },

            },
            'pageLength'
            ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,

    });
    $('#example1 thead tr').clone(true).appendTo( '#example thead' );
        $('#example1 thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" class="form-control" style="font-size: 12px;" placeholder="Buscar/'+title+'" />' );

            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            });
        });
  });
</script>
  </body>
</html>
