<div id="page-wrapper" style="overflow: auto;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    <i class="mdi-maps-map "></i> POI's
                </h3>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?= site_url(array('admin')) ?>">Admin</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-bar-chart-o"></i> POI
                    </li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">

            <div class="col-lg-12">

                <div id="basicMap" class='map'></div>

            </div>
            <div style="display: none;">
                <div id="popup" title="Coordenadas"></div>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
</div>
</div>

<!--FORMULARIO MODAL -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg"role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">POI Nuevo</h4>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('adminPOI/do_upload'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="inputError inputSuccess">Nombre: </label>
                            <input type='text' class='form-control floating-label' placeholder='Nombre' id='Nombre' name='Nombre'> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="inputError">Imagen: </label>
                            <input type="file" name="Imagen" id='Imagen' accept=".png" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="inputError">Word File: </label>
                            <input type="file" name="geolocalizacion" id='geolocalizacion' accept=".pgw">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="inputError">Tipo: </label>
                            <select class="form-control" id="slt_tipo" name="slt_tipo"><option value='-1'>Seleciona..-</option></select> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="inputError">Configuraci&oacute;n: </label>
                            <select class="form-control" id="slt_configur" name="slt_configur"><option value='-1'>Seleciona..-</option></select> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="inputError">Cultura: </label>
                            <select class="form-control" id="slt_bando" name="slt_bando"><option value='-1'>Seleciona..-</option></select> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="inputError">Coordenada X: </label>
                            <input type='text' class='form-control floating-label' placeholder='X' id='CoorX' name='CoorX' readonly> 
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="inputError">Coordenada Y: </label>
                            <input type='text' class='form-control' placeholder='Y' id='CoorY' name='CoorY' readonly> 
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="inputError">Edad M&iacute;nima: </label>
                            <input type='text' class='form-control' placeholder='Año Minimo' id='MinEdad' name='MinEdad' readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" for="inputError">Edad M&aacute;xima: </label>
                            <input type='text' class='form-control' placeholder='Año Maximo' id='MaxEdad' name='MaxEdad' readonly> 
                            <input type='hidden' name='id_poi'  id='id_poi' value='-1'> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id='slider-range' style="margin-top: 10px;"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            <?php form_close() ?>
        </div>
    </div>
</div>

<!--LEYENDA MODAL -->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Borrar POI</h4>
            </div>
            <div class="modal-body">
                ¿Esta seguro de Borrar este POI?
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Si</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary">No</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" id="leyenda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document" id='contentLeyenda'>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titleConfirm">Leyenda</h4>
            </div>
            <div class="modal-body" id='bodyConfirm'>


            </div>
            <div class="modal-footer">


            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    /**variables Globales**/
    var configSelect = -1;
    var arrayBandos = [];
    var arrayTipos = [];
    var arrayEdad = [];
    /**CONTROL DE LA LEYENDA***/

    /**
     * Define a namespace for the application.
     */
    window.app = {};
    var app = window.app;

    /**
     * @constructor
     * @extends {ol.control.Control}
     * @param {Object=} opt_options Control options.
     */
    app.LeyendaControl = function (opt_options) {

        var options = opt_options || {};



        var onClickTipos = function (e) {
            consultarTipos();
            $('#leyenda').modal('toggle');
        };
        var onClickBandos = function (e) {
            consultarBandos();
            $('#leyenda').modal('toggle');
        };
        var onClickConfiguracion = function (e) {
            consultarConfiguracion();
            $('#leyenda').modal('toggle');
        };
        var onClickInformacion = function (e) {
            consultarInformacion();
            $('#leyenda').modal('toggle');
        };
        var buttonTipos = document.createElement('button');
        buttonTipos.innerHTML = '';
        buttonTipos.title = 'Tipos';
        buttonTipos.className = 'TipoButton mdi-maps-pin-drop';
        buttonTipos.addEventListener('click', onClickTipos, false);
        buttonTipos.addEventListener('touchend ', onClickTipos, false);

        var buttonBandos = document.createElement('button');
        buttonBandos.innerHTML = '';
        buttonBandos.title = 'Cultura';
        buttonBandos.className = 'BandoButton mdi-image-assistant-photo';
        buttonBandos.addEventListener('click', onClickBandos, false);
        buttonBandos.addEventListener('touchend ', onClickBandos, false);

        var buttonConfiguracion = document.createElement('button');
        buttonConfiguracion.innerHTML = '';
        buttonConfiguracion.title = 'Configuracion ';
        buttonConfiguracion.className = 'ConfiButton mdi-action-settings';
        buttonConfiguracion.addEventListener('click', onClickConfiguracion, false);
        buttonConfiguracion.addEventListener('touchend ', onClickConfiguracion, false);

        //mdi-action-info-outline
        var buttonInfo = document.createElement('button');
        buttonInfo.innerHTML = '';
        buttonInfo.title = 'Informacion ';
        buttonInfo.className = 'InfoButton mdi-action-info-outline';
        buttonInfo.addEventListener('click', onClickInformacion, false);
        buttonInfo.addEventListener('touchend ', onClickInformacion, false);

        var element = document.createElement('div');
        element.className = 'leyendaControl ol-unselectable ol-control';
        element.title = 'Tipos';
        element.appendChild(buttonConfiguracion);
        element.appendChild(buttonTipos);
        element.appendChild(buttonBandos);
        element.appendChild(buttonInfo);

        ol.control.Control.call(this, {
            element: element,
            target: options.target
        });

    };
    ol.inherits(app.LeyendaControl, ol.control.Control);

    //Ocultar/Mostrar Menu
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    //Proyeccion Mapa EPSG:23030
    proj4.defs("EPSG:23030", "+proj=utm +zone=30 +ellps=intl" +
            " +towgs84=-131,-100.3,-163.4,-1.244,-0.020,-1.144,9.39 " +
            " +units=m +no_defs");
    var wgs84Projection = ol.proj.get("EPSG:4326");
    var utmProjection = ol.proj.get("EPSG:23030");
    var proje = ol.proj.get('EPSG:3857');


    //CREACION DE LOS MARKERT 
    //CONSULTAMOS MEDIANTE AJAX LA LISTA DE POIS


    var vectorSource = new ol.source.Vector({
        //create empty vector
    });


    var iconStyle = new ol.style.Style({
        image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
            anchor: [1, 1],
            anchorXUnits: 'fraction',
            anchorYUnits: 'fraction',
            opacity: 1,
            src: '<?= asset_url(); ?>img/castle.png'//'http://ol3js.org/en/master/examples/data/icon.png'
        }))
    });
    //CREAMOS LA CAPA DE MARKETS
    var marketsLayer = new ol.layer.Vector({
        source: vectorSource,
    });

    //CAPA DE OPEN STREEP MAP	
    var layer2 = new ol.layer.Tile({
        source: new ol.source.OSM()
    });
    //CREACION DEL MAPA
    var map = new ol.Map({
        layers: [
            layer2,
            marketsLayer
        ],
        target: 'basicMap',
        controls: ol.control.defaults({
            attributionOptions: /** @type {olx.control.AttributionOptions} */ ({
                collapsible: false
            })
        }).extend([
            new app.LeyendaControl()
        ]),
        view: new ol.View({
            projection: proje,
            center: [-423014.1592, 4546636.6720],
            zoom: 7
        })
    });
    var popup = new ol.Overlay({
        element: document.getElementById('popup')
    });
    map.addOverlay(popup);
    map.on('click', function (evt) {
        var element = popup.getElement();
        $(element).popover('destroy');
        var feature = map.forEachFeatureAtPixel(evt.pixel,
                function (feature, layer) {
                    return feature;
                });

        if (feature) {

            var geometry = feature.getGeometry();
            var coord = geometry.getCoordinates();
            var id = feature.get('id');

            $(element).popover({
                'placement': 'top',
                'animation': false,
                'html': true,
                'content': '<button type="button" class="btn btn-warning"  onClick="editar(' + id + ')"><span class="glyphicon glyphicon-edit"></span> Editar</button> <button type="button" class="btn btn-danger"  onClick="borrar(' + id + ')"><span class="glyphicon glyphicon-trash"></span> Borrar</button>'
            });
            $('#id_poi').val(id);
            $("#popup").attr("title", feature.name);
            popup.setPosition(coord);
            $(element).popover('show');
            $('.popover-title').html(feature.q.name);
        } else {
            var coordinate = evt.coordinate;
            $('#CoorX').val(coordinate[0]);
            $('#CoorY').val(coordinate[1]);
            var hdms = ol.proj.transform(coordinate, 'EPSG:3857', 'EPSG:23030');



            // the keys are quoted to prevent renaming in ADVANCED mode.
            $(element).popover({
                'placement': 'top',
                'animation': false,
                'html': true,
                'content': '<p>Coordenadas en ED50, UTM USO 30:</p><code>X:' + hdms[0] + '</code></BR><code>Y:' + hdms[1] + '</code></BR><button type="button" class="btn btn-primary"  onClick="nuevo()">Nuevo</button> '
            });
            $("#popup").attr("title", "nuevo POI");
            $('#id_poi').val(-1);
            popup.setPosition(coordinate);
            $(element).popover('show');
            $('.popover-title').html("Nuevo POI");
        }
    });

    // change mouse cursor when over marker
    map.on('pointermove', function (e) {
        var element = popup.getElement();
        if (e.dragging) {
            $(element).popover('destroy');
            return;
        }
        var pixel = map.getEventPixel(e.originalEvent);
        var hit = map.hasFeatureAtPixel(pixel);
        map.getTargetElement().style.cursor = hit ? 'pointer' : '';
    });
    //Tooltip de los botones de la leyenda, a la derecha
    $('.TipoButton, .ConfiButton, .BandoButton, .InfoButton').tooltip({
        placement: 'right'
    });
    //FUNCION PARA VALIDAR EL FORMULARIO *******************************/
    $("form").submit(function (event) {
        //VALIDADMOS LOS SELECT
        var enviar = true;
        var mensaje = "";
        //SELECT BANDO
        if ($('#slt_bando').val() == -1) {
            $('#slt_bando').parent().addClass('has-error');
            enviar = false;
        } else {
            $('#slt_bando').parent().removeClass('has-error');
            $('#slt_bando').parent().addClass('has-success');
        }
        //SELECT CONFIGURACION
        if ($('#slt_configur').val() == -1) {
            $('#slt_configur').parent().addClass('has-error');
            enviar = false;
        } else {
            $('#slt_configur').parent().removeClass('has-error');
            $('#slt_configur').parent().addClass('has-success');
        }
        //SELECT TIPO POI
        if ($('#slt_tipo').val() == -1) {
            $('#slt_tipo').parent().addClass('has-error');
            enviar = false;
        } else {
            $('#slt_tipo').parent().removeClass('has-error');
            $('#slt_tipo').parent().addClass('has-success');
        }
        //INPUT NOMBRE POI
        if ($('#Nombre').val() == "") {
            $('#Nombre').parent().removeClass('has-success');
            $('#Nombre').parent().addClass('has-error');
            enviar = false;
        } else {
            $('#Nombre').parent().removeClass('has-error');
            $('#Nombre').parent().addClass('has-success');
        }
        //MINIMAD EDAD
        if ($('#MinEdad').val() == "") {
            $('#MinEdad').parent().addClass('has-error');
            enviar = false;
        } else {
            $('#MinEdad').parent().removeClass('has-error');
            $('#MinEdad').parent().addClass('has-success');
        }
        //MAXIMA EDAD
        if ($('#MaxEdad').val() == "") {
            $('#MaxEdad').parent().addClass('has-error');
            enviar = false;
        } else {
            $('#MaxEdad').parent().removeClass('has-error');
            $('#MaxEdad').parent().addClass('has-success');
        }
        //IMAGEN
        if ($('#id_poi').val() == -1) {
            if ($('#Imagen').val() == "") {
                $('#Imagen').parent().addClass('has-error');
                enviar = false;
            } else {
                $('#Imagen').parent().removeClass('has-error');
                $('#Imagen').parent().addClass('has-success');
            }
            //ARCHIVO WORD
            if ($('#geolocalizacion').val() == "") {
                $('#geolocalizacion').parent().addClass('has-error');
                enviar = false;
            } else {
                $('#geolocalizacion').parent().removeClass('has-error');
                $('#geolocalizacion').parent().addClass('has-success');
            }
        }
        //CAMBIAMOS LA URL SEGUN SEA PARA EDITAR O PARA CREAR
        if ($('#id_poi').val() != -1) {
            $('form').attr('action', "<?= site_url(array('adminPOI', 'edit')) ?>");
        } else {
            $('form').attr('action', "<?= site_url(array('adminPOI', 'do_upload')) ?>");
        }
        if (enviar) {
            return;
        }
        event.preventDefault();
    });

    var slider = document.getElementById('slider-range');
    noUiSlider.create(slider, {
        start: [0, 100], // Handle start position
        step: 10,
        connect: true, // Display a colored bar between the handles
        behaviour: 'tap-drag', // Move handle on tap, bar is draggable
        range: {// Slider can select '0' to '100'
            'min': 0,
            'max': 100
        }
    });

    //FUNICON NUEVO**********
    function nuevo() {
        //RESETEAMOS EL FORMULARIO
        var element = popup.getElement();
        $(element).popover('destroy');
        $('#Nombre').val("");
        $('#Nombre').parent().removeClass('has-error');
        $('#Nombre').parent().removeClass('has-success');
        $('#slt_bando').val(-1);
        $('#slt_bando').parent().removeClass('has-error');
        $('#slt_bando').parent().removeClass('has-success');
        $('#slt_configur').val(configSelect);
        $('#slt_configur').parent().removeClass('has-error');
        $('#slt_configur').parent().removeClass('has-success');
        $('#slt_tipo').val(-1);
        $('#slt_tipo').parent().removeClass('has-error');
        $('#slt_tipo').parent().removeClass('has-success');
        $('#MinEdad').val("");
        $('#MinEdad').parent().removeClass('has-error');
        $('#MinEdad').parent().removeClass('has-success');
        $('#MaxEdad').val("");
        $('#MaxEdad').parent().removeClass('has-error');
        $('#MaxEdad').parent().removeClass('has-success');
        $('#Imagen').val("");
        $('#Imagen').parent().removeClass('has-error');
        $('#Imagen').parent().removeClass('has-success');
        $('#geolocalizacion').val("");
        $('#geolocalizacion').parent().removeClass('has-error');
        $('#geolocalizacion').parent().removeClass('has-success');
        $('#id_poi').val(-1);
        if (configSelect != -1) {
            var URL = "<?= site_url(array('adminConfiguracion', 'get_configuration_json')) ?>";//CONSULTAMOS LA CONFIGURACION MEDIANTE AJAX Y JSON
            $.ajax({
                type: "GET",
                url: URL,
                data: {conf: configSelect},
                async: false, //lo ponemos sincrono para que slider se cree y luego cambiemos su valor
                dataType: "json",
                success: function (data) {
                    crearSlider(data);
                }
            });
            $('#myModal').modal('toggle');
            $('.modal-title').html('POI Nuevo');
        } else {
            var textoHtml = 'Selecciona una configuracion primero';
            $('#leyenda').removeClass();
            $('#contentLeyenda').removeClass();
            $('#leyenda').addClass('modal fade bs-example-modal-sm');
            $('#contentLeyenda').addClass('modal-dialog modal-sm');
            $('#bodyConfirm').html(textoHtml);
            $('#titleConfirm').html("ERROR");
            $('#leyenda').modal('toggle');
        }
    }
    //FUNCION EDITAR+++++++
    function editar(id) {
        var element = popup.getElement();
        $(element).popover('destroy');
        var URL = "<?= site_url(array('adminPOI', 'get_poiById_json')) ?>/" + id;
        $.getJSON(URL)
                .done(function (data) {
                    $('#Nombre').val(data.poi_des);
                    $('#slt_bando').val(data.id_bando);
                    $('#slt_configur').val(data.id_conf);
                    $('#slt_tipo').val(data.id_tipo);
                    $('#MaxEdad').val(data.MaxEdad);
                    $('#MinEdad').val(data.MinEdad);
                    $('#myModal').modal('toggle');
                    $('.modal-title').html('Editar POI');
                    $('#CoorX').val(data.posX);
                    $('#id_poi').val(id);
                    $('#CoorY').val(data.posY);
                    var URL = "<?= site_url(array('adminConfiguracion', 'get_configuration_json')) ?>";//CONSULTAMOS LA CONFIGURACION MEDIANTE AJAX Y JSON
                    $.ajax({
                        type: "GET",
                        url: URL,
                        data: {conf: data.id_conf},
                        async: false, //lo ponemos sincrono para que slider se cree y luego cambiemos su valor
                        dataType: "json",
                        success: function (data) {
                            crearSlider(data);
                        }
                    });
                    var slider = document.getElementById('slider-range');
                    slider.noUiSlider.set([Number(data.MinEdad), Number(data.MaxEdad)]);
                });
    }

    //FUNCION borrar+++++++
    $('#slt_configur').change(function () {
        var id = $(this).val();
        if (id != -1) {
            var URL = "<?= site_url(array('adminConfiguracion', 'get_configuration_json')) ?>";//CONSULTAMOS LA CONFIGURACION MEDIANTE AJAX Y JSON
            $.ajax({
                type: "GET",
                url: URL,
                data: {conf: id},
                async: false, //lo ponemos sincrono para que slider se cree y luego cambiemos su valor
                dataType: "json",
                success: function (data) {
                    crearSlider(data);
                }
            });
        }

    });
    /**DESTRUYE EL SLIDER Y CREA UNO NUEVO CON LA CONFIGURACION PASADA POR PARAMETRO***/
    function crearSlider(json) {
        // var URL = "<?= site_url(array('adminConfiguracion', 'get_configuration_json')) ?>";//CONSULTAMOS LA CONFIGURACION MEDIANTE AJAX Y JSON
        // $.getJSON(URL, { conf: id}, function(json) {

        var slider = document.getElementById('slider-range');
        slider.noUiSlider.destroy();
        noUiSlider.create(slider, {
            start: [json.min_edad, json.max_edad], // Handle start position
            step: 10,
            margin: 10,
            connect: true, // Display a colored bar between the handles
            behaviour: 'tap-drag', // Move handle on tap, bar is draggable
            range: {// Slider can select '0' to '100'
                'min': Number(json.min_edad),
                'max': Number(json.max_edad)
            }
        });
        //**LINSTENER DEL SLIDER****/
        var MinInput = document.getElementById('MinEdad'),
                MaxInput = document.getElementById('MaxEdad');
        var max = Number(MaxInput.value);
        var min = Number(MinInput.value)
        // When the slider value changes, update the input and span
        slider.noUiSlider.on('update', function (values, handle) {

            if (handle) {
                MaxInput.value = values[handle];
            } else {
                MinInput.value = values[handle];
            }

        });
        slider.noUiSlider.set([min, max]);

    }
    function borrar(id) {
        var element = popup.getElement();
        $(element).popover('destroy');
        $('#confirm').modal('toggle');
        /**/
    }
    $('#delete').click(function () {
        var id = $('#id_poi').val();
        var URL = "<?= site_url(array('adminPOI', 'delete')) ?>/" + id;

        var feature = vectorSource.getFeatureById(id);
        vectorSource.removeFeature(feature);
    });
    //Funcion de carga de los Select
    $(document).ready(function () {
        var URL = "<?= site_url(array('adminBandos', 'get_bandos_json')) ?>";
        $.getJSON(URL)
                .done(function (data) {
                    $.each(data, function (i, item) {
                        var nuevaFila = "<option value='" + item.ban_id + "'>" + item.ban_des + "</option>";
                        $(nuevaFila).appendTo('#slt_bando');

                    });
                });
        URL = "<?= site_url(array('adminConfiguracion', 'get_configurations_json')) ?>";
        $.getJSON(URL)
                .done(function (data) {
                    $.each(data, function (i, item) {
                        var nuevaFila = "<option value='" + item.conf_id + "'>" + item.conf_des + "</option>";
                        $(nuevaFila).appendTo('#slt_configur');

                    });
                });
        URL = "<?= site_url(array('adminTipoPOI', 'get_tipoPOIs_json')) ?>";
        $.getJSON(URL)
                .done(function (data) {
                    $.each(data, function (i, item) {
                        var nuevaFila = "<option value='" + item.tipo_id + "'>" + item.tipo_des + "</option>";
                        $(nuevaFila).appendTo('#slt_tipo');

                    });
                });
    });
    function consultarBandos() {
        var textoHtml = "";
        for (i = 0; i < arrayBandos.length; i++) {
            if (arrayBandos[i].seleccionado)
                textoHtml += "<div><button type='button' class='btn' id='buttonBandos_" + arrayBandos[i].id + "'  style='background:" + arrayBandos[i].color_bando + "; padding: 10px;' onClick='cambioBandos(" + arrayBandos[i].id + ");'></button> " + arrayBandos[i].des_bando + "</div>";
            else
                textoHtml += "<div><button type='button' class='btn buttonDeselec' id='buttonBandos_" + arrayBandos[i].id + "'  style='background:" + arrayBandos[i].color_bando + "; padding: 10px;' onClick='cambioBandos(" + arrayBandos[i].id + ");'></button> " + arrayBandos[i].des_bando + "</div>";
        }
        if (arrayBandos.length == 0) {
            textoHtml = 'Selecciona una configuracion primero';
        }
        $('#leyenda').removeClass();
        $('#contentLeyenda').removeClass();
        $('#leyenda').addClass('modal fade bs-example-modal-sm');
        $('#contentLeyenda').addClass('modal-dialog modal-sm');
        $('#bodyConfirm').html(textoHtml);
        $('#titleConfirm').html("Leyenda Bandos");


    }
    /********FUNCIONES DE APOYO********/

    /**
     Contulta los bando mediante AJAX y lo coloca en la leyenda
     */
    function consultarTipos() {

        var textoHtml = "";
        for (i = 0; i < arrayTipos.length; i++) {
            if (arrayTipos[i].seleccionado)
                textoHtml += "<div><button type='button' class='btn' id='buttonTipos_" + arrayTipos[i].id + "'  style='background: url(<?= asset_url(); ?>img/IconsPOIs/tipoPOI_" + arrayTipos[i].id_tipo + ".png);background-size: 30px 30px; background-repeat: no-repeat; padding: 15px;' onClick='cambioTipos(" + arrayTipos[i].id + ");'></button> " + arrayTipos[i].des_tipo + "</div>";
            else
                textoHtml += "<div><button type='button' class='btn buttonDeselec' id='buttonTipos_" + arrayTipos[i].id + "'  style='background: url(<?= asset_url(); ?>img/IconsPOIs/tipoPOI_" + arrayTipos[i].id_tipo + ".png);background-size: 30px 30px; background-repeat: no-repeat; padding: 15px;' onClick='cambioTipos(" + arrayTipos[i].id + ");'></button> " + arrayTipos[i].des_tipo + "</div>";
        }
        if (arrayTipos.length == 0) {
            textoHtml = 'Selecciona una configuracion primero';
        }
        $('#leyenda').removeClass();
        $('#contentLeyenda').removeClass();
        $('#leyenda').addClass('modal fade bs-example-modal-sm');
        $('#contentLeyenda').addClass('modal-dialog modal-sm');
        $('#bodyConfirm').html(textoHtml);
        $('#titleConfirm').html("Leyenda Tipos POI's");
    }
    function consultarConfiguracion() {

        var URL = "<?= site_url(array('adminConfiguracion', 'get_configurations_json')) ?>";
        $.getJSON(URL)
                .done(function (data) {
                    var textoHtml = '<div class="btn-group" data-toggle="buttons">';
                    $.each(data, function (i, item) {
                        if (item.conf_id == configSelect) {
                            textoHtml += '<div><label class="btn active ">';
                            textoHtml += '<input type="radio" name="confOptions" id="option_' + item.conf_id + '" autocomplete="off" value="' + item.conf_id + '" checked> ' + item.conf_des + ' ';
                            textoHtml += '</label></div>';
                        } else {
                            textoHtml += '<div><label class="btn  ">';
                            textoHtml += '<input type="radio" name="confOptions" id="option_' + item.conf_id + '" autocomplete="off" value="' + item.conf_id + '"> ' + item.conf_des + ' ';
                            textoHtml += '</label></div>';
                        }



                    });
                    textoHtml += '</div>';
                    '</ul>';
                    $('#leyenda').removeClass();
                    $('#contentLeyenda').removeClass();
                    $('#leyenda').addClass('modal fade bs-example-modal-sm');
                    $('#contentLeyenda').addClass('modal-dialog modal-sm');
                    $('#bodyConfirm').html(textoHtml);
                    $('#titleConfirm').html("Leyenda Configuraciones");
                    $("input[name=confOptions]:radio").bind("change", function () {
                        cambioConfiguracion($(this).val());
                    });
                });

    }
    function consultarInformacion() {
        var textoHtml = '<ul>' +
                '<li><i class="mdi-action-settings"></i> Muestra las configuraciones posibles para poder elegirlas</li>' +
                '<li><i class="mdi-image-assistant-photo"></i> Muestra las culturas posibles para poder elegirlas</li>' +
                '<li><i class="mdi-maps-pin-drop"></i> Muestra los Tipos POI posibles para poder elegirlos</li>' +
                '<li>Para editar/borrar POIs pulsar cualquiera.</li>' +
                '</ul>';
        $('#leyenda').removeClass();
        $('#contentLeyenda').removeClass();
        $('#leyenda').addClass('modal fade');
        $('#contentLeyenda').addClass('modal-dialog');
        $('#bodyConfirm').html(textoHtml);
        $('#titleConfirm').html("Informaci&oacute;n");

    }
    function cambioConfiguracion(id) {
        configSelect = id;
        arrayBandos.splice(0, arrayBandos.length);//Eliminamos todos los elementos
        arrayTipos.splice(0, arrayTipos.length);//Eliminamos todos los elementos
        arrayEdad.splice(0, arrayEdad.length);//Eliminamos todos los elementos
        var URL = "<?= site_url(array('adminPOI', 'cambioConfiguracion')) ?>";
        $.getJSON(URL, {conf: id}, function (json) {

            for (i = 0; i < json.bandos.length; i++) {
                var bando = {id: i, id_bando: Number(json.bandos[i].ban_id), des_bando: json.bandos[i].ban_des, color_bando: json.bandos[i].ban_color, seleccionado: true};
                arrayBandos.push(bando);
            }
            for (i = 0; i < json.tipoPOIs.length; i++) {
                var tipo = {id: i, id_tipo: Number(json.tipoPOIs[i].tipo_id), des_tipo: json.tipoPOIs[i].tipo_des, seleccionado: true};
                arrayTipos.push(tipo);
            }
            actualizarCapas();
        });

    }
    function cambioBandos(id) {
        $('#buttonBandos_' + id).toggleClass("buttonDeselec");
        arrayBandos[id].seleccionado = !(arrayBandos[id].seleccionado);
        actualizarCapas();

    }
    function cambioTipos(id) {
        $('#buttonTipos_' + id).toggleClass("buttonDeselec");
        arrayTipos[id].seleccionado = !(arrayTipos[id].seleccionado);
        actualizarCapas();

    }

    function actualizarCapas() {
        var URL = "<?= site_url(array('adminPOI', 'get_poiByData_json')) ?>";
        //Limpiamos las capas
        vectorSource.clear();

        $.post(URL, {conf: configSelect, bandos: arrayBandos, tipos: arrayTipos}, function (json) {
            var rJson = JSON.parse(json);
            $.each(rJson.POIs, function (i, item) {
                var coordinates = [item.poi_X, item.poi_Y];
                var iconFeature = new ol.Feature({
                    geometry: new ol.geom.Point(coordinates),
                    name: item.poi_des,
                    population: 4000,
                    rainfall: 500
                });
                var iconStyle2 = new ol.style.Style({
                    image: new ol.style.Icon(/** @type {olx.style.IconOptions} */ ({
                        anchor: [1, 1],
                        anchorXUnits: 'pixels',
                        anchorYUnits: 'pixels',
                        opacity: 1,
                        src: '<?= asset_url(); ?>img/IconsPOIs/tipoPOI_' + item.tipo_id + '.png'//'http://ol3js.org/en/master/examples/data/icon.png'
                    }))
                });
                iconFeature.set('id', item.poi_id);
                iconFeature.setId(item.poi_id);
                iconFeature.setStyle(iconStyle2);
                //CREAMOS EL ARRAY DE iconFeatures			
                vectorSource.addFeature(iconFeature);
                console.log(item.tipo_id);

            });
        });

    }
</script>