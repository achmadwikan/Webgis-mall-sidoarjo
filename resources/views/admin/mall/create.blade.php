<div class="modal-dialog modal-lg" role="document">
    {!! Form::open(['url' => route('admin.mall.store'), 'method' => 'post', 'files' => true]) !!}
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Tambah Data Mall</h5>
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
                {!! Form::label('alamat', 'Alamat') !!}
                {!! Form::text('alamat', null, ['class' => 'form-control', 'required', 'placeholder' => '', 'oninvalid' => "this.setCustomValidity('Mohon diisi dengan lengkap')", 'oninput' => "this.setCustomValidity('')"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('kontak', 'Kontak') !!}
                {!! Form::text('kontak', null, ['class' => 'form-control', 'required', 'placeholder' => '', 'oninvalid' => "this.setCustomValidity('Mohon diisi dengan lengkap')", 'oninput' => "this.setCustomValidity('')"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('jadwal', 'Jadwal Buka') !!}
                {!! Form::text('jadwal', null, ['class' => 'form-control', 'required', 'placeholder' => '', 'oninvalid' => "this.setCustomValidity('Mohon diisi dengan lengkap')", 'oninput' => "this.setCustomValidity('')"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('jumlah', 'Jumlah Kios') !!}
                {!! Form::number('jumlah', null, ['class' => 'form-control', 'required', 'placeholder' => '', 'oninvalid' => "this.setCustomValidity('Mohon diisi dengan lengkap')", 'oninput' => "this.setCustomValidity('')"]) !!}
            </div>
            <div class="form-group">
                <input class="location" type="radio" name="location" value="selection_location"> Pilih Lokasi Data
            </div>
            <div class="map2"></div>
            <div class="latSearch"></div>
            <div class="lngSearch"></div>

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
            var mymap = {};
                mymap = L.map('mapid2').setView([-7.4478, 112.7183], 13)
                        L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                                maxZoom: 22,
                                subdomains:['mt0','mt1','mt2','mt3'],
                                attribution:'Map data &copy; Google | Map By <a href="https://idraxy.web.app" target="_blank">Draxgist & Team</a>'
                        }).addTo(mymap);

                var xlng = 0.000256;
                var xlat = 0.000220;
                var theMarker = {};
                var print = {};

              mymap.on('click', function(e) {
              //var c = L.circle([e.latlng.lat,e.latlng.lng], {radius: 15}).addTo(mymap);
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