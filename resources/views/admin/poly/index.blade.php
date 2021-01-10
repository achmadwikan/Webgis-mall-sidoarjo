@extends('layouts.admin')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title mb-0">Data Mall</h2>
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
                        <button class="btn btn-outline-primary btn-modal" data-href="{{ route('admin.polygon.create') }}"><i class='feather icon-plus'></i> Tambah</button>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped datatable">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Kelurahan</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $value)
                                            <tr>
                                                <td>{{ date('j F Y', strtotime($value->created_at)) }}</td>
                                                <td>{{ $value->nama ?? '' }}</td>
                                                <td>{{ $value->kelurahan->nama ?? '' }}</td>
                                                <td>
                                                    <span class="btn-edit badge badge-pill badge-primary" style="cursor: pointer;" data-href="{{ route('admin.polygon.edit', [$value->id]) }}"><i class="feather icon-edit" title="Edit"> Edit</i></span>
                                                    <span class="action-delete badge badge-pill badge-danger" style="cursor: pointer;" data-href="{{ route('admin.polygon.destroy', [$value->id]) }}"><i class="feather icon-trash" title="Delete"> Delete</i></span>
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
    aria-hidden="true" style="margin-top: -2.5%;">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Detail Data Physical Distancing</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Area</label>
                            <input id="nama" readonly type="text" name="nama" class="form-control border border-light"/>
                        </div>
                        <div class="form-group">
                            <label>Keterangan Area</label>
                            <input id="keterangan" readonly type="text" name="keterangan" class="form-control border border-light"/>
                        </div> <hr>
                    <a><i class="fas fa-map-marker-alt" id="zoom"><small style="font-size: 11px;"> *Click untuk lihat posisi pada peta</small></i></a>

                                    <span id="form_detail"></span>         
                                    <div class="map3"></div>
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

        $('.datatable').on('click', '.action-delete', function(e){
            var btn = $(this);
            e.stopPropagation();
            Swal.fire({
                title: 'Anda yakin?',
                text: "Anda akan menghapus data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: btn.data('href'),
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        success: function(res) {
                            if(res.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: res.message
                                }).then((result) => {
                                    btn.closest('td').parent('tr').fadeOut();
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: res.message
                                })
                            }
                        }
                    })
                }
            })
        });

        $(document).on('click', '.detail', function(){
          $("#alert_results").alert('close');
          $("#mapid3").remove();
          var id = $(this).data('id');
          $('#form_detail').html('');
          $.ajax({
           url:'polygon/' + id,
           dataType:"json",
           success:function(html){
              $('#show').modal('show');
              $('input#nama').val(html.data.nama);
              $('input#keterangan').val(html.data.keterangan);
                $('input#id').val(html.data.id);

            $('#zoom').on('click', function() {
                $("#mapid3").remove();
                    $(".map3").append('<div id="mapid3" style="height: 450px; margin_bottom : 1px;"></div>');

                var map = L.map('mapid3').setView(html.distance[0], 12);
                var polyline = L.polyline(html.distance, {color: 'red', weight: 4, fill:1,opacity: 0.7,smoothFactor: 1, fillColor: '#e36b6b', fillOpacity: 0.2}).addTo(map);

                L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                    maxZoom: 20,
                    subdomains:['mt0','mt1','mt2','mt3'],
                    attribution:'Map data &copy; Google | Map By <a href="https://idraxy.web.app" target="_blank">Draxgist & Team</a>'
                }).addTo(map);

                map.fitBounds(polyline.getBounds());
   
            });

            }
          })
         });
    </script>
@endsection