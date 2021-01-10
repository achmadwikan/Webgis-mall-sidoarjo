@extends('layouts.admin')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title mb-0">Data Kecamatan</h2>
            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- Data list view starts -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-outline-warning btn-modal disabled" data-href="" disabled><i class='feather icon-plus'></i> Tambah</button>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Jumlah Kelurahan</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $value)
                                            <tr>
                                                <td>{{ date('j F Y', strtotime($value->created_at)) }}</td>
                                                <td>{{ $value->nama ?? '' }}</td>
                                                <td>{{ $value->kelurahan->count() }} Kelurahan</td>
                                                <td>
                                                    <span class="detail badge badge-pill badge-danger" style="cursor: pointer;"><a class="detail" data-id="{{$value->id}}" data-toggle="modal"><i class="feather icon-map" title="Detail"></i>Detail</a></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Data list view end -->

    <div class="modal fade action-modal" id="xlarge" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true"></div>


    <div class="modal fade bs-example-modal-center" id="show" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Detail Data Kecamatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="form_detail"></span>
                        <div class="form-group">
                            <label>Nama Kecamatan</label>
                            <input id="nama" readonly type="text" name="nama" class="form-control border border-light"/>
                        </div>
                        <hr>     
                        <a><i class="fas fa-map-marker-alt" id="zoom"><small style="font-size: 11px;"> *Click untuk lihat posisi pada peta</small></i></a>

                                    <span id="form_detail"></span>         
                                    <div class="map3"></div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>
@endsection

@section('js')
    <script>
        $('.datatable').DataTable();

        $('.datatable').on('click', '.btn-edit', function(e){
            var t = $('.action-modal');
            $.ajax({
                url: $(this).data('href'),
                dataType: "html",
                success: function(e) {
                    $(t).html(e).modal("show")
                }
            })
        })

        $(document).on('click', '.detail', function(){
          $("#alert_results").alert('close');
          $("#mapid3").remove();
          var id = $(this).data('id');
          $('#form_detail').html('');
          $.ajax({
            url:'kecamatan/' + id,
           dataType:"json",
           success:function(html){
              $('#show').modal('show');
              $('input#nama').val(html.data.nama);
            $('input#id').val(html.data.id);

            $('#zoom').on('click', function() {
                $("#mapid3").remove();
                    $(".map3").append('<div id="mapid3" style="height: 350px; margin_bottom : 1px;"></div>');

                var latval = html.data.lat;
                var lngval = html.data.lng;
                var mymap = {};
                
                var latlng = new L.LatLng(latval, lngval);
                    
                   mymap = L.map('mapid3').setView(latlng, 14)
                            L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                                    maxZoom: 22,
                                    subdomains:['mt0','mt1','mt2','mt3'],
                                    attribution:'Map data &copy; Google | Map By <a href="https://idraxy.web.app" target="_blank">Draxgist & Team</a>'
                            }).addTo(mymap);

                  var marker = L.circle(latlng, 1200).setStyle({ 
                                    color: "red"
                                }).addTo(mymap);
             });

            }
          })
         });
    </script>
@endsection