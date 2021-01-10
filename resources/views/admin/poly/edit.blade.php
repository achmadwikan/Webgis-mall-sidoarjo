<div class="modal-dialog modal-lg" role="document">
    {!! Form::open(['url' => route('admin.polygon.update', [$data->id]), 'method' => 'put', 'files' => true]) !!}
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Edit Data Area Polygon ({{$data->nama}})</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                {!! Form::label('nama', 'Nama') !!}
                {!! Form::text('nama', $data->nama, ['class' => 'form-control', 'required', 'placeholder' => '', 'oninvalid' => "this.setCustomValidity('Mohon diisi dengan lengkap')", 'oninput' => "this.setCustomValidity('')"]) !!}
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

            </div>
            <div class="form-group">
                {!! Form::label('keterangan', 'Keterangan') !!}
                {!! Form::text('keterangan', $data->keterangan, ['class' => 'form-control', 'required', 'placeholder' => '', 'oninvalid' => "this.setCustomValidity('Mohon diisi dengan lengkap')", 'oninput' => "this.setCustomValidity('')"]) !!}
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
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

    $('.location').on('change', function() {

        $("#mapid").remove();
        $(".map2").append('<div id="mapid2" style="height: 350px;"></div>');

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

            var latval = "<?php echo str_replace(",",".",$data->lat); ?>";
            var lngval = "<?php echo str_replace(",",".",$data->lng); ?>";

            var latlng = new L.LatLng(latval, lngval);
            console.log(latlng);
            var mymap = {};
                mymap = L.map('mapid2').setView(latlng, 13)
                        L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                                maxZoom: 22,
                                subdomains:['mt0','mt1','mt2','mt3'],
                                attribution:'Map data &copy; Google | Map By <a href="https://idraxy.web.app" target="_blank">Draxgist & Team</a>'
                        }).addTo(mymap);

                var marker = L.marker(latlng).addTo(mymap);

                var xlng = 0.000256;
                var xlat = 0.000220;
                var theMarker = {};
                var print = {};

              mymap.on('click', function(e) {
              //var c = L.circle([e.latlng.lat,e.latlng.lng], {radius: 15}).addTo(mymap);
                mymap.removeLayer(marker);
                if (theMarker != undefined) {
                    mymap.removeLayer(theMarker);
                };

                    console.log(e.latlng.lat,e.latlng.lng);
                    theMarker = L.marker([e.latlng.lat,e.latlng.lng]).addTo(mymap);

                    lat = $(".latSearch");
                    lng = $(".lngSearch");
                    var append1 = '<input type="hidden" id="latSearch" name="latSearch[]" value="'+e.latlng.lat+'"/>';
                    var append2 = '<input type="hidden" id="lngSearch" name="lngSearch[]" value="'+e.latlng.lng+'"/>';
                        
                        lat.append(append1);
                        lng.append(append2); 
                  
                });

            }

        function fail() {
            alert("Browser not supported");
        }
    });

    </script>