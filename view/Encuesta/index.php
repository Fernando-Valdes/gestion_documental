<!DOCTYPE html>
<html>
<head>
	<title>Encuesta Helpdesk</title>
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
</head>
<body>

    <div class="container">
        <section class="row">
            <div class="col-md-12">
                <h1 class="text-center">Formato de Encuesta de Satisfaccion.</h1>
            </div>
        </section>
        <hr><br />
        <section class="row">
            <section class="col-md-12">
                <h3>Datos basicos</h3>
                <p></p>
            </section>
        </section>
        <section class="row">
            <section class="col-md-12">
            <section class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombreCompleto">Titulo</label>
                            <input type="text" class="form-control" id="tick_titulo" name="tick_titulo" readonly>
                        </div>
                    </div>
                </section>   
            <section class="row">
                    <div class="col-md-6">
                        <label for="tipoAtencion">Categoria</label>
                        <input type="text" class="form-control" id="cat_nom" name="cat_nom" readonly>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fechaActual">SubCategoria</label>
                            <input type="text" class="form-control" id="cats_nom" name="cats_nom" readonly>
                        </div>
                    </div>
                </section>

            </section>
        </section>
        <hr />

        <section class="row">
            <div class="col-md-12 text-center">
                <input id="input-3" name="input-3" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="0">
            </div>
        </section>


        <!--  Comentarios  -->
        <section class="row">
            <div class="col-md-12">
                <h3>Comentarios.</h3>
                <p></p>
            </div>
        </section>
        <section class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="comment">Comentarios:</label>
                    <textarea class="form-control" rows="6" id="comentarios"></textarea>
                </div>
            </div>
        </section>

        <section class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-info" id="saveForm" onclick="saveForm">Guardar Encuesta</button>
            </div>
        </section>
    </div>

<script>
    $("#input-3").rating({ 
        showCaption: false
    });


    $('#input-3').on('rating.change', function() {
        console.log($('#input-3').val());
    });
</script>
    <script type="text/javascript" src="encuesta.js"></script>
</body>
</html>