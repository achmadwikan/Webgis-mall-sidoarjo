<div class="modal-dialog modal-lg" role="document">
    {!! Form::open(['url' => route('admin.polygon.store'), 'method' => 'post', 'files' => true]) !!}
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Tambah Data Area Polygon</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                {!! Form::label('nama', 'Nama') !!}
                {!! Form::text('nama', null, ['class' => 'form-control', 'required', 'placeholder' => '', 'oninvalid' => "this.setCustomValidity('Mohon diisi dengan lengkap')", 'oninput' => "this.setCustomValidity('')"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('kelurahan', 'Kelurahan', ['class' => 'control-label']) !!}
                {!! Form::select('kelurahan', $kelurahan, old('kelurahan'), ['class' => 'form-control select2 kelurahan', 'style' => 'width: 100%;' ]) !!}
                <p class="help-block"></p>
                @if($errors->has('kelurahan'))
                    <p class="help-block">
                        {{ $errors->first('kelurahan') }}
                    </p>
                @endif

                <div class="latKel"></div>
                <div class="lngKel"></div>
            </div>
            <div class="form-group">
                {!! Form::label('keterangan', 'Keterangan') !!}
                {!! Form::text('keterangan', null, ['class' => 'form-control', 'required', 'placeholder' => '', 'oninvalid' => "this.setCustomValidity('Mohon diisi dengan lengkap')", 'oninput' => "this.setCustomValidity('')"]) !!}
            </div>
            <div class="form-group">
                <input class="location" type="radio" name="location" value="multiple"> Gambar Area Polygon
            </div>
            <div class="map2"></div>
            <div class="poly"></div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button id="resetmap" type="reset" class="btn btn-danger" style="margin-left: 4%;">
                Reset
            </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>

<script>
    $("#selectbtn-tag").click(function(){
        $("#selectall-tag > option").prop("selected","selected");
        $("#selectall-tag").trigger("change");
    });
    $("#deselectbtn-tag").click(function(){
        $("#selectall-tag > option").prop("selected","");
        $("#selectall-tag").trigger("change");
    });

    $(document).ready(function () {
        $('.select2').select2({
            placeholder: "Select tags here......",
            maximumSelectionLength: 4
        });
    });


    $('.kelurahan').on('change', function() {
        var kel_id = $(".kelurahan").val();

        console.log(kel_id);
        <?php
            $a = "<script>document.writeln(kel_id)</script>";
        ?>

        if (kel_id != '') {

            var lat="<?php echo App\Kelurahan::select('lat')->where('id', $a)->first(); ?>";
            var lng="<?php echo App\Kelurahan::select('lng')->where('id', $a)->first(); ?>";
        }

        console.log(lat, lng);
    });


    $('.location').on('change', function() {
        var filBy = $("input[name='location']:checked").val();

        if(filBy == 'multiple') {
            $(".map2").append('<div id="mapid2" style="height: 450px; margin_bottom : 1px;"></div>');

             $(document).ready(function() {
                    geoLocationInit();
                });
                function geoLocationInit() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(success, fail);
                    } else {
                        alert("Browser not supported");
                    }
                }

            function success(position) {
                var latval = position.coords.latitude;
                var lngval = position.coords.longitude;
                var latlng = new L.LatLng(latval, lngval);

                    map = L.map('mapid2').setView(latlng, 15)
                        satelit =  L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                                    maxZoom: 22,
                                    subdomains:['mt0','mt1','mt2','mt3'],
                                    attribution:'Map data &copy; Google | Map By <a href="https://idraxy.web.app" target="_blank">Draxgist & Team</a>'
                            });

                          drawnItems = L.featureGroup().addTo(map);

                          L.control.layers({
                                'satelit': satelit.addTo(map),
                                "osm": L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
                                    maxZoom: 20,
                                    attribution:'&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                })
                            }, { 'drawlayer': drawnItems }, { position: 'topleft', collapsed: false }).addTo(map);            

                map.addControl(new L.Control.Draw({
                    draw: {
                        polyline: {
                            allowIntersection: false,
                            showArea: true
                        },
                        marker: false,
                        polygon: false,
                        rectangle: false,
                        circle: false
                    }
                }));

                map.on(L.Draw.Event.CREATED, function (e) {
                        drawnItems.addLayer(e.layer);
                        var points = e.layer.getLatLngs();
                      puncte1=points.join(',');
                      puncte1=puncte1.toString();
                      //puncte1 = puncte1.replace(/[{}]/g, '');
                      puncte1=points.join(',').match(/([\d\.]+)/g).join(',')
                    //this is the field where u want to add the coordinates
                    
                     var poly = $(".poly").append('<input type="hidden" id="poly" name="poly[]" value="'+puncte1+'"/>');

                    //console.log(layer.getLatLngs());
                });

            }

            function fail() {
                    alert("Browser not supported");
                }
        }
    }); 

        $('#resetmap').click(function () {
            $("#poly").remove();
            $("#mapid2").remove();
          });
</script>