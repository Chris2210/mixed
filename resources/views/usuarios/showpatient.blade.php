

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
            <div class="col-sm-12" style="text-align: center; margin-top: 20px;">
          <h3>Ficha del paciente {{$usuario->name}}</h3> <br>
        </div>

        <div class="row">

            <div class="col-12 col-sm-12 col-md-3 col-lg-3"><p> </p></div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3"></div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3"></div>
<div class="col-12">
            <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre y apellidos:</th>
      <th scope="col">Correo electrónico</th>
      <th scope="col">DNI/NIE</th>
      <th scope="col">Telefono contacto</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>{{$usuario->name}}</td>
      <td>{{$usuario->email}}</td>
      <td>{{$usuario->NIE}}</td>
      <td>{{$usuario->phone}}</td>
    </tr>

  </tbody>
</table>
</div>

<div class="col-12 col-sm-12 col-md-12 col-lg-12"></div>

          <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class='col-md-2 mt-3'>

                    <a href="{{url('usuarios/createoperation/'.$usuario->id)}}" class='btn btn-info btn-block' name="buscar" type="submit">Añadir nueva interveción</a>
            </div>


                <!-- /.card-header -->
                <div class="card-body">
                    @if(!empty($operaciones))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: left;">Id</th>
                        <th style="text-align: left;">Intervención</th>
                        <th style="text-align: left;">Fecha</th>
                        <th style="text-align: left;">Días</th>
                        <th style="text-align: left;">Estado</th>
                        <th style="text-align: left;">Numero fotos subidas</th>
                        <th style="text-align: left;">Acciónes</th>


                    </tr>
                    </thead>
                    <tbody>


                        @foreach($operaciones as $op)
                        <tr>
                            <td style="text-align: left;">{{$op->id}}</td>
                            <td style="text-align: left;">{{$op->name}}</td>
                            <td style="text-align: left;">{{ \Carbon\Carbon::parse($op->date)->format('d/m/Y') }}</td>
                            <td style="text-align: left;">{{ round(\Carbon\Carbon::parse($op->date)->diffInDays())  }} días</td>
                            <td style="text-align: left;">
                            @php
                            if($op->isActive == 1){
                            @endphp
                            Activo
                            @php
                            }
                            @endphp
                            @php
                            if($op->isActive == 2){
                            @endphp
                            Inactivo
                            @php
                            }
                            @endphp
                            </td>
                            <td style="text-align: left;">{{ $op->numFotos }}</td>
                            <td>
                                @if($op->numFotos > 0)
                                <a href="{{ url('/usuarios/showphotos/'. $op->id) }}" class='btn btn-info btn-block'>Ver Fotos</a>
                                @else
                                <a href="{{ url('/usuarios/showphotos/'. $op->id) }}" class='btn btn-info btn-block disabled'>Ver Fotos</a>
                                @endif
                            </td>



                        </tr>
                        @endforeach

                    </tbody>
                  </table>
                  @else
                  <h5>Sin data</h5>
                  @endif
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

