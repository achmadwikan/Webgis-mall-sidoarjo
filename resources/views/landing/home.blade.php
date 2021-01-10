
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <title>Peta SIG Mall di Sidoarjo</title>
    
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.1/dist/leaflet.css" />
        <link rel="stylesheet" href="https://leaflet.github.io/Leaflet.markercluster/dist/MarkerCluster.css" />
        <link rel="stylesheet" href="https://leaflet.github.io/Leaflet.markercluster/dist/MarkerCluster.Default.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="https://cdn.leafletjs.com/leaflet-0.7.2/leaflet.ie.css" /><![endif]-->
    
        
        <link rel="stylesheet" href="https://turbo87.github.io/sidebar-v2/css/leaflet-sidebar.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-pulse-icon@0.1.0/src/L.Icon.Pulse.css" />
        {{-- <link rel="stylesheet" href="https://marslan390.github.io/BeautifyMarker/leaflet-beautify-marker-icon.css" /> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.71.1/dist/L.Control.Locate.min.css" />

        
        <link href="{{ asset ('theme/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset ('theme/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset ('theme/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset ('theme/css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Unlock&display=swap" rel="stylesheet">
    
        <style>
            body {
                padding: 0;
                margin: 0;
            }
    
            html, body, #peta-mall {
                height: 100%;
                font: 10pt "Helvetica Neue", Arial, Helvetica, sans-serif;
            }

            #peta-persebatan{
                position: absolute;
            }
    
    
    #splashscreen{
        height: 100%;
        width: 100%;
        background-color: #181B2E;
        
    }

    @keyframes fade { 
  from { opacity: 0.5; } 
}

.blinking {
  animation: fade 1s infinite alternate;
}

    #splash{
        position: absolute;
        z-index: 2001;
    }

    html, body {
    height: 100%;
}

.pulse {
  animation: pulse 1s infinite;
  animation-direction: alternate;
  -webkit-animation-name: pulse;
  animation-name: pulse;
}

@-webkit-keyframes pulse {
  0% {
    -webkit-transform: scale(1);
  }
  50% {
    -webkit-transform: scale(1.1);
  }
  100% {
    -webkit-transform: scale(1);
  }
}

@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.1);
  }
  100% {
    transform: scale(1);
  }
}

.location-pin img {
  width: 24px;
  height: 24px;
  margin: -26px 0 0 -13px;
  z-index: 10;
  position: absolute;
  border-radius: 50%;
  animation: pulse 1s infinite;
}

.fixed-bottom{
    bottom: -24px;
}

.container-fluid{
    padding-left: 0;
    padding-right: 0;
}

.select2{
    min-width: 100%;
    height: 33px;
}
.card{
    border-radius: 0px;
}
.card-body{
    padding: 0px 1.25rem 0px 1.25rem;
}

.modal .modal-content{
overflow:hidden;
}
.modal-body{
overflow-y:scroll; // to get scrollbar only for y axis
}
        </style>
    </head>
    <body>
        
        <div id="splash" class="container-fluid h-100" style="background-color: #181B2E;"> 
            <div class="row h-100 justify-content-center align-items-center"> 
                <form class="col-md-12"> 
                    <div class="text-center">
                        <h2 style="color: #ffd700;">SIG MALL di SIDOARJO</h2>          
                    </div>
                </form> 
            </div> 
        </div>

        <div class="fixed-top animated faster" id="atas">
            <div class="container-fluid">
                <div class="card" style="z-index: 2002;">
                    <div class="card-body" >
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="card-title">Kategori</h6>
                                    <div class="form-group">
                                        <select class="select2" id="kategori">
                                            <option value="layer_mall">Mall</option>
                                            <option value="layer_pd">Polygon</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h6 class="card-title">Wilayah</h6>
                                    <div class="form-group">
                                        <select class="select2" id="kecamatan">
                                            <option value="kota">Kabupaten Sidoarjo</option>
                                            @foreach ($kecamatan as $k)
                                        <option value="{{ $k->nama }}" data-id="{{ $k->id }}">{{ $k->nama }}</option>
                                            @endforeach
                                        
                                        </select>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
            </div>
        </div>

        <div class="fixed-bottom animated faster" id="bawah">
            <div class="container-fluid">
                <div class="card " style="z-index: 200002; margin-bottom: 24px;">
                    <div class="card-body text-center">
                        <h6 class="card-title " id="judulData">Kabupaten Sidoarjo</h6>
                        <div class="row">
                            <div class="col-12 text-center text-white" style="padding-bottom: 12px;">
                                <b >Mall</b> : <span id="mall">0</span>  |  <b>Polygon</b> : <span id="poly">0</span>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>

        <div id="warning" class="fixed-bottom animated faster " style="bottom: 60px; z-index:2000; padding-right: 12px; padding-left: 12px;">
               <div class="container">
                <div class="alert alert-danger">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ asset('leaflet/icons/my_location.png') }}" width="32px">Dalam radius 50m di dekat anda ada sebuah Mall.
                        </div>
                    </div>
                </div>
               </div>
        </div>

        <div id="peta-mall" class="sidebar-map"></div>
        
        
        <script src="https://unpkg.com/leaflet@1.0.1/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
        <script src="https://turbo87.github.io/sidebar-v2/js/leaflet-sidebar.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.71.1/src/L.Control.Locate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/leaflet-pulse-icon@0.1.0/src/L.Icon.Pulse.min.js"></script>
        <script src="https://unpkg.com/beautifymarker@1.0.7/leaflet-beautify-marker-icon.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
        <script> 
        $('a').click(function (e){  
            if (e.ctrlKey) {
                return false;
            }
        });
        var mapPadding = [];
            if (window.matchMedia("(max-width: 767px)").matches) 
            { 
                mapPadding = [24,24]
                // The viewport is less than 768 pixels wide 
                console.log("This is a mobile device."); 
            } else { 
                mapPadding = [90,90]
                // The viewport is at least 768 pixels wide 
                console.log("This is a tablet or desktop."); 
            } 
        </script> 

        <script type="text/javascript">
            $(document).ready(function() {
               $('.select2').select2();
           });
        </script>
            <script type="text/javascript">
                    $('.leaflet-control-layers').animate({
                        bottom: "-72px"
                    })
                    $('#warning').hide();
                    $('#splash').hide()
                    $('#atas').hide()
                    $('#bawah').hide()
                    $('#splash').fadeIn(500).delay(2000).fadeOut(500, function(){
                        tambahKelas();
                    });
                    // $('#peta-persebaran').hide().delay(2501).fadeIn(500);
                    
                    function tambahKelas(){
                        $('#atas').show()
                        $('#atas').addClass('fadeInDown');
                        $('#bawah').show()
                        $('#bawah').addClass('fadeInUp');
                        $('.leaflet-control-layers').animate({
                            bottom: "64px"
                        })
                    }
                    
            </script>

        <script>
            
   
        var basemaps={
            "Google Satelite":L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
                    // maxZoom: 20,
                    subdomains:['mt0','mt1','mt2','mt3'],
                    attribution:'Map data &copy; Google | Map By <a href="https://idraxy.web.app" target="_blank">Draxgist & Team</a>'
            }),
            "Esri World Dark":L.tileLayer('https://server.arcgisonline.com/arcgis/rest/services/Canvas/World_Dark_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ | Map By <a href="https://idraxy.web.app" target="_blank">Draxgist & Team</a>',
            }),
            "OSM":L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
              attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }),
            "Esri World Gray":L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ | Map By <a href="https://idraxy.web.app" target="_blank">Draxgist & Team</a>',
                maxZoom: 16
            }),
            "Google Street":L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                    maxZoom: 20,
                    subdomains:['mt0','mt1','mt2','mt3'],
                    attribution:'Map data &copy; Google | Map By <a href="https://idraxy.web.app" target="_blank">Draxgist & Team</a>'
            }),
            "Google Hybrid":L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                    maxZoom: 20,
                    subdomains:['mt0','mt1','mt2','mt3'],
                    attribution:'Map data &copy; Google | Map By <a href="https://idraxy.web.app" target="_blank">Draxgist & Team</a>'
            }),
            "Google Traffic":L.tileLayer('https://{s}.google.com/vt/lyrs=m@221097413,traffic&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                min5oom: 2,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                attribution:'Map data &copy; Google | Map By <a href="https://idraxy.web.app" target="_blank">Draxgist & Team</a>'
            }),
             "Google Terrain":L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
                 maxZoom: 20,
                 subdomains:['mt0','mt1','mt2','mt3'],
                 attribution:'Map data &copy; Google | Map By <a href="https://idraxy.web.app" target="_blank">Draxgist & Team</a>'
            }),
            // "Stadia OSMBright":L.tileLayer('https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.png',{
            //      attribution:'&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
            // }),
            "CYL" : L.tileLayer('https://dev.{s}.tile.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {
                maxZoom: 20,
                attribution: '<a href="https://github.com/cyclosm/cyclosm-cartocss-style/releases" title="CyclOSM - Open Bicycle render">CyclOSM</a> | Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            })
        }
    var map = L.map('peta-mall', {
        center: [-7.4478, 112.7183],
        zoom: 12,
        preferCanvas:true,
        // wheelPxPerZoomLevel: 110,
        //zoomDelta: 0.2,
        //zoomSnap: 0.2,
        bounceAtZoomLimits:false,
        minZoom: 8,
        // maxZoom: 15,
            maxBounds:[
                [-9.319,110.868],
                [-5.713,116.103]
            ],
        zoomControl:false,
        layers: [
        //      basemaps["Esri World Gray"]
        //      basemaps["OSM"]
        //      basemaps["Esri World Dark"]
            basemaps["CYL"]
        ],
    });
    L.control.layers(basemaps, null, {position: 'bottomright'}).addTo(map);
    var myIcon = L.icon({
        iconUrl: "{{ asset('leaflet/icons/my_location.png') }}",
        // className: 'pulse',
        iconSize:     [50, 50], // size of the icon
        iconAnchor:   [25, 45], // point of the icon which will correspond to marker's location
        popupAnchor:  [0, -35] // point from which the popup should open relative to the iconAnchor
    });    

    var mall = {!! $mall !!};
    var poly = {!! $poly !!};

    var layer_mall= L.markerClusterGroup({ disableClusteringAtZoom: 8 });
    var layer_pd= L.markerClusterGroup({ disableClusteringAtZoom: 8 });

    function routeTo(lat1, lon1, lat2, lon2) {
      var route = L.Routing.control({
        waypoints: [
        L.latLng(lat1, lon1),
        L.latLng(lat2, lon2)
        ]}).addTo(map);

      return route;
    }

    mall.map(p=>{
        
            if(true){
                if(p.lat != null)
                {
            var imgLocation = "{{ asset('leaflet/icons/mall.png') }}";
            
            var pos=L.latLng(p.lat, p.lng);
            
            var marker=L.marker(pos,{icon: L.divIcon({
                                className: 'location-pin',
                                html: '<img src="'+imgLocation+'">',
                                iconAnchor:   [0, -12], 
                                popupAnchor: [0, -12]
                            }), draggable: false
                        })

            var bindPopUpHtml;            
            var latlng;        

            marker.on('click', function(e){

                navigator.geolocation.getCurrentPosition(function(location) {
                    latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
                });

                var distance = distanceKm(latlng.lat,latlng.lng,p.lat,p.lng);

                bindPopUpHtml =  `
                    <h4>Mall ${p.nama}</h4>
                    <span>Alamat: <b>${p.alamat}</b></span><br>
                    <span>Kontak: <b>${p.kontak}</b></span><br>
                    <span>Jam Buka: <b>${p.jadwal}</b></span><br>
                    <span>Jumlah Kios: <b>${p.jumlah}</b></span><br>
                    <span id="distance">Jarak Anda: `+parseInt(distance)+` km<b></b></span><br>
                `;
                
                console.log(distance);

                marker.bindPopup(bindPopUpHtml);
                map.setView([e.latlng.lat, e.latlng.lng], 12);
                
                var route = L.Routing.control({
                            waypoints: [
                            L.latLng(latlng.lat,latlng.lng),
                            L.latLng(p.lat,p.lng)
                            ],
                            // routeWhileDragging: true
                            }).addTo(layer_mall);

            });
                      
            marker.addTo(layer_mall);
                }
        }
    })

    
    poly.map(p=>{
        
        var polyline = p.polyline;
        var arr = polyline.split(",");

        var polylineSatuRs = [];
        var latlng = [];
        var lng = false;
        var loop = 1;
        for(var i = 0; i < arr.length; i++)
        {
            if(loop == 1)
            latlng.push(parseFloat(arr[i])*-1)
            else
            latlng.push(parseFloat(arr[i]))

            loop++;

            if(latlng.length == 2)
            {
                polylineSatuRs.push(latlng)
                latlng = [];
                loop = 1;
            }
            
        }
        console.log(polylineSatuRs);
        var myPoly = L.polyline(polylineSatuRs, {color: 'blue', weight: 2});
        myPoly.on('click', function(e){
            map.fitBounds(myPoly.getBounds(),{
                padding: mapPadding
            });
        });
        bindPopUpHtml = `
                <h4>${p.nama}</h4><br>
                <span>${p.keterangan}</span>
            `;
        myPoly.bindPopup(bindPopUpHtml);
        layer_pd.addLayer(myPoly);
    })

    map.addLayer(layer_pd)
    
    function onMapClick(e) {
        var atas = $('#atas');
        if(atas.hasClass('fadeInDown'))
        {
            
            $('#warning').animate({
                bottom: '8px'
            })
            
            $('.leaflet-control-layers').animate({
                bottom: "-72px"
            })
            atas.removeClass('fadeInDown').addClass('fadeOutUp')
        }
        else if(atas.hasClass('fadeOutUp'))
        {
            $('#warning').animate({
                bottom: '60px'
            })
            
            $('.leaflet-control-layers').animate({
                bottom: "64px"
            })
            atas.removeClass('fadeOutUp').addClass('fadeInDown')
        }

        var bawah = $('#bawah');
        if(bawah.hasClass('fadeInUp'))
        bawah.removeClass('fadeInUp').addClass('fadeOutDown')
        else if(bawah.hasClass('fadeOutDown'))
        bawah.removeClass('fadeOutDown').addClass('fadeInUp')
    }

    $('#kategori').on('change', function(){
        gantiLayer($(this).val());
    });

    //daftar layer yang ada
    var semuaLayer = ['layer_mall','layer_pd'];
    var copySemuaLayer = [];
    Array.prototype.remove = function() {
        var what, a = arguments, L = a.length, ax;
        while (L && this.length) {
            what = a[--L];
            while ((ax = this.indexOf(what)) !== -1) {
                this.splice(ax, 1);
            }
        }
        return this;
    };

    gantiLayer('layer_mall');

    function gantiLayer(layerTampil){
        console.log(layerTampil);
        for(var i = 0; i < semuaLayer.length; i++)
        {
            copySemuaLayer.push(semuaLayer[i]);
        }
        
        copySemuaLayer.remove(layerTampil);

        for(var i = 0; i < copySemuaLayer.length; i++)
        {
            // console.log('yang dihapus '+copySemuaLayer[i])
            if(map.hasLayer(window[copySemuaLayer[i]]))
            map.removeLayer(window[copySemuaLayer[i]]);
        }

        copySemuaLayer = [];

        map.addLayer(window[layerTampil]);
    }

    map.on('click', onMapClick);
    

map.on('locationfound', onLocationFound);
map.on('locationerror', onLocationError);


    $('#kecamatan').on('change', function(){
        // getKecamatan();

        var val = $(this).val()
        
        
        $('#judulData').text( val != 'kota' ? 'Kecamatan '+$(this).val() : 'Kota Sidoarjo')
        fokusKec(val);
        // var kecamatan = dataKecamatan.find(x => x.id === $(this).val()).kelurahan;
        setJumlahKecamatan($(this).find(':selected').data('id'))
    })
    var curLayerKec;
    function fokusKec(kec){


        layer_kec.eachLayer(function(l){
            //set current layer to invisible
            if(l.feature.properties.kecamatan.toLowerCase() == curLayerKec)
            {
                l.setStyle({
                    weight: 0,
                    fillOpacity: 0
                })
            }
            //set selected layer to visible
            if(l.feature.properties.kecamatan.toLowerCase() == kec.toLowerCase())
            {
                l.setStyle({
                    fillColor: "red",
                    fillOpacity: 0.1,
                    weight: 1
                })
                map.fitBounds(l.getBounds(), {
                    padding: mapPadding
                })
            }
        })
        curLayerKec = kec.toLowerCase()
    }

    var layer_kec = new L.FeatureGroup();

    getKecamatan();
    function getKecamatan(){

              $.getJSON("{{ asset('leaflet/kecamatan_sda.json') }}",function(data){
                var datalayer = L.geoJson(data ,{
                onEachFeature: function(feature, featureLayer) {
                //   featureLayer.on('click', function(e){
                //     // alert('polygon clicked');
                //     map.fitBounds(e.target.getBounds(), {
                //       padding: mapPadding
                //     })
                //     // map.removeLayer(kotaGroup);
                //   });

                  featureLayer.setStyle({
                    // fillColor: warnaKlien,
                    fillOpacity: 0,
                    color: 'red',
                    weight:  0
                  });

                  layer_kec.addLayer(featureLayer)
                }
                });
            });
            map.addLayer(layer_kec)

            
            // console.log(layer_kec.getBounds())
    }

    

    function loadLayer(layername){
        // console.log(window[layername])
        if(!window[layername]){
            datalayer[layername]()
        }else{
            map.addLayer(window[layername])
        }
        
    }
    
    function changeLayer(layername,value){
        // console.log(window[layername],value);
        if(value){
            loadLayer(layername);
        }else{
            map.removeLayer(window[layername])
        }
    }
    
    function moveLayer(layers){
        layers.eachLayer(function(layer){
            var rand=layer.getLatLng();
            var randLatLng= [
                rand.lat+(Math.random()-.5)/10000,
                rand.lng+(Math.random()-.5)/10000
            ];
            setTimeout(()=>layer.setLatLng(randLatLng),Math.random()*1000);
            
        })
        if (map.getZoom() >12){
            setTimeout(()=>moveLayer(layers),1000);
        }
    }
       
    var lokasimu=L.featureGroup();
   
    function distanceKm(lat1, lon1, lat2, lon2) {
      var R = 6371; // km
      var dLat = toRad(lat2-lat1);
      var dLon = toRad(lon2-lon1);
      var lat1 = toRad(lat1);
      var lat2 = toRad(lat2);
    
      var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
      var d = R * c;
      return d;
    }
    
    // Converts numeric degrees to radians
    function toRad(Value) {
        return Value * Math.PI / 180;
    }
    function dynamicSort(property) {
        var sortOrder = 1;
        if(property[0] === "-") {
            sortOrder = -1;
            property = property.substr(1);
        }
        return function (a,b) {
            var result = (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
            return result * sortOrder;
        }
    }
    
    var markerposisi;

    var jumlahPerKecamatan = {!! $kecamatan !!};
    var jumlahSidoarjo = {'mall':0,'poly':0}
    var jenisData = ['mall','poly']
    var firstLoad = true;
    
    setJumlah();
    function setJumlah(){

        mall.forEach(e => {
            for(var i = 0 ; i < jumlahPerKecamatan.length; i++)
            {
                if(e.kec_id == jumlahPerKecamatan[i]['id'])
                {
                    jumlahPerKecamatan[i]['mall'] = jumlahPerKecamatan[i]['mall']+1;
                    
                    if(firstLoad)
                    jumlahSidoarjo['mall']+=1;

                    break;
                }
            }
        });
        
        poly.forEach(e => {
            for(var i = 0 ; i < jumlahPerKecamatan.length; i++)
            {
                if(e.kec_id == jumlahPerKecamatan[i]['id'])
                {
                    jumlahPerKecamatan[i]['poly'] = jumlahPerKecamatan[i]['poly']+1;
                    
                    if(firstLoad)
                    jumlahSidoarjo['poly']+=1;

                    break;
                }
            }
        });

        firstLoad = false;

        setJumlahKota();
    }

    function setJumlahKota(){
        for(e in jumlahSidoarjo)
        {
            $('#'+e).text(jumlahSidoarjo[e])
        }
    }

    function setJumlahKecamatan(kec_id){
        
        for(var i = 0; i < jumlahPerKecamatan.length; i++)
        {
            if(jumlahPerKecamatan[i]['id'] == kec_id)
            {
                jenisData.forEach(e => {
                    console.log(jumlahPerKecamatan[i][e])
                    $('#'+e).text(jumlahPerKecamatan[i][e])
                });
            }
        }
    }

    function onLocationFound(e) {
    var radius = e.accuracy;
    var pos=L.latLng(e.latlng);

    console.log(e.latlng);

    // L.marker(e.latlng, {icon: myIcon}).addTo(map)
    //     .bindPopup("You are within " + radius + " meters from this point").openPopup();

        var jumlahpos={ma:0,po:0};
        var jarakpos = mall.map(p=>{
            if(p.lat!=''){
                var dist=distanceKm(e.latlng.lat,e.latlng.lng,p.lat,p.lng)
                // console.log(dist)
                if(dist<=.05){
                    jumlahpos.ma+=1;
                }
                if(dist<=.5){
                    jumlahpos.ma+=1;
                }
                if(dist<=1){
                    jumlahpos.ma+=1;
                }
            }
        })

        //jika pasien berada pada 50 meter akan menampilkan warning
        if(jumlahpos.a > 0)
        {
            $('#warning').show();
        }

          
        L.circle(pos, 50).setStyle({ 
            color: "red"
        }).addTo(lokasimu);
        L.circle(pos, 500).setStyle({ 
            color: "orange"
        }).addTo(lokasimu);
        L.circle(pos, 1000).setStyle({ 
            color: "yellow"
        }).addTo(lokasimu);
        // console.log(jarakpos,jumlahpos);
        markerposisi=L.marker(pos,{draggable:false}).addTo(lokasimu)
            .bindPopup(`
            <div class="text-center">
                <h4><b>Anda berada di titik ini!</b></h4>
                <h5><b>Mall di Dekat Anda</b></h5>
                <b>Di radius 1km ada <br> Mall : ${jumlahpos.ma} </b><br><br>
                
            </div>`).openPopup();

}
                map.addLayer(lokasimu);
                map.locate({setView: true, maxZoom: 14.5});


function onLocationError(e) {
    alert(e.message);
}

    
    </script>
    
    </body>
    </html>
    