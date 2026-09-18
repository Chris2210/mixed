

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello, world!</title>

    <title>Laravel 12 Custom Dashboard - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->

  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

  </head>
  <body>
    <style>
        .transformed {
         /*rotate: 90deg;
        max-height: 378px;
        max-height: 504px;
       width: auto;*/
        height: 341.25px;
	    overflow: hidden;
/*
        transform: rotateZ(90deg);
        width: 360px;
        height: 480px;*/
        }
        .inclu{
            height: 341.25px;

            overflow: hidden;
        }
    </style>


    @include('shared.menu')


<div class="container-fluid">
        <div class="row">
<div class="col-sm-12" style="text-align: center; margin-top: 20px;">
          <h3>Fotos paciente {{ $usuario->name }}<br >
            <span style="font-size: 18px">Operación: {{ $operacion->name }}</span>
          </h3>
        </div>
<div class="container-fluid" style="margin: 20px;">

<div class="row">

@foreach($photos as $photo)
                <div class="col-lg-3 col-md-3 col-sm-12">

                    <div class="card" style="width: 100%;">
                    <div class="inclu">
                        <?php
                                            $file = "$photo->route";  // Dirección de la imagen
                                            $imagen = getimagesize($file);    //Sacamos la información
                                            $ancho = $imagen[0];              //Ancho
                                            $alto = $imagen[1];               //Alto
                                            //echo "Ancho: $ancho, Alto: $alto";
                                            if($ancho > $alto){
                                            ?>

                            <img class="card-img-top" src="{{ asset('uploads/fotos/' . $photo->name) }}" alt="Card image cap">

                            <?php } else {  ?>

                            <img class="card-img-top" src="{{ asset('uploads/fotos/' . $photo->name) }}" alt="Card image cap">
                            <?php }  ?>
                        </div>

                        <?php if($photo->isChecked == 2){ ?>
                        <div class="card-body" style="background-color: #ffa500; color: black;">
                        <?php } else if($photo->isChecked == 3){ ?>
                        <div class="card-body" style="background-color: #08ad08; color: white;">
                        <?php } else if($photo->isChecked == 4){ ?>
                        <div class="card-body" style="background-color: #dc3545; color: white;">
                        <?php } else { ?>
                        <div class="card-body">
                        <?php } ?>
                            <div class="row">
                                <div class="col-4"><p class="card-text">{{ \Carbon\Carbon::parse($photo->date)->format('d/m/Y') }}</p>
                                </div>
                                <div class="col-4"><p class="card-text"><?php if($photo->health == 1){ echo "Sin especificar"; } else if($photo->health == 2){ echo "Muy mal"; }
                                 else if($photo->health == 3){ echo "Mal"; }else if($photo->health == 4){ echo "Regular"; }else if($photo->health == 5){ echo "Bien"; }

                                else { echo "Muy bien"; } ?></p>
                                </div>
                                <div class="col-4"><p class="card-text">
                                    <?php if($photo->isChecked == 2){ ?>
                                        <span class="badge badge-warning">Pendiente de revisar</span>
                                    <?php } else if($photo->isChecked == 3){ ?>
                                        <span class="badge badge-success">Muy bien</span>
                                    <?php } else if($photo->isChecked == 4){ ?>
                                        <span class="badge badge-danger">Mal(¡necesita atención!)</span>
                                    <?php } ?>

                                </p>
                                </div>
                            </div>


                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{ $photo->id }}">
                            Detalles Editar
                            </button>



                    </div>
                </div>


 @endforeach
        </div>
</div>






        </div>
      </div>
      <?php $i = 0; ?>
@foreach($photos as $photo)
<!-- The Modal -->
                                    <div class="modal fade" id="myModal{{ $photo->id }}">
                                        <div class="modal-dialog modal-xl">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                            <h4 class="modal-title">Photo nº <?php $i++; echo $i; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                            <form action="{{route('usuarios.editphoto')}}" method="post">
                                            @csrf
                                            <div class="form-check">
                                            @if($photo->isChecked == 2)
                                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="2" checked>
                                            @else
                                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="2">
                                            @endif
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Pendiente de revisar
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            @if($photo->isChecked == 3)
                                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="3" checked>
                                            @else
                                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="3">
                                            @endif
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Muy bien
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            @if($photo->isChecked == 4)
                                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault3" value="4" checked>
                                            @else
                                            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault3" value="4">
                                            @endif
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                Mal necesita atención
                                            </label>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="hidden" name="id" value="{{ $photo->id }}">

                                    <input type="submit" class="btn btn-primary btn-block" style="margin-top: 10px;" value="Actualizar">
                            </div>
                                            </form>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                            <!--<div id="nutrient" style="width: 100%; height: 100vh;"></div>-->
                                            <img class="card-img-top" src="{{ asset('uploads/fotos/' . $photo->name) }}" alt="Card image cap">
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>

                                            <script type="module">
                                                    import '/assets/nutrient-viewer.js';

                                                    const baseUrl = `${window.location.origin}/assets/`;

                                                    window.addEventListener('DOMContentLoaded', () => {
                                                        NutrientViewer.load({
                                                        baseUrl,
                                                        container: '#nutrient',
                                                        document: '{{ asset('uploads/fotos/' . $photo->name) }}',
                                                        })
                                                        .then((instance) => {
                                                            console.log('Nutrient loaded', instance);
                                                        })
                                                        .catch((error) => {
                                                            console.error(error.message);
                                                        });
                                                    });
                                                    </script>



                                        </div>
                                        </div>
                                    </div>
@endforeach
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>
