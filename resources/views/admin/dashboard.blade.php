@extends('layouts.admin')

@section('title',"PVKTI Admin Panel")

@section('content')


<div class="content-header row">
</div>
<div class="content-body">
    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card bg-analytics text-white">
                    <div class="card-content">
                        <div class="card-body text-center">
                            <img src="{{ asset('pvktii/admin/app-assets/images/elements/decore-left.png')}}" class="img-left" alt="
card-img-left">
                            <img src="{{ asset('pvktii/admin/app-assets/images/elements/decore-right.png')}}" class="img-right" alt="
card-img-right">
                            <div class="avatar avatar-xl bg-primary shadow mt-0">
                                <div class="avatar-content">
                                    <i class="feather icon-award white font-large-1"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="mb-2 text-black">Selamat datang {{auth()->user()->name}},</h1>
                                
                                <h6 class="m-auto w-90 text-success">Semoga hari anda menyenangkan.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           

            <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-success p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-user-check text-success font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">{{App\Kecamatan::get()->count()}}</h2>
                        <p class="mb-0">Kecamatan</p>
                    </div>
                    <div class="card-content">
                        <div id="subscribe-gain-chart"></div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-book text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">{{App\Mall::get()->count()}}</h2>
                        <p class="mb-0">Mall</p>
                    </div>
                    <div class="card-content">
                        <div id="subscribe-gain-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-warning p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-user-x text-warning font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">{{App\Kelurahan::get()->count()}}</h2>
                        <p class="mb-0">Kelurahan</p>
                    </div>
                    <div class="card-content">
                        <div id="orders-received-chart"></div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-danger p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-image text-danger font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">{{App\Poly::get()->count()}}</h2>
                        <p class="mb-0">Sample Polyline</p>
                    </div>
                    <div class="card-content">
                        <div id="subscribe-gain-chart"></div>
                    </div>
                </div>
            </div>
           
        </div>
        
    </section>
    <!-- Dashboard Analytics end -->

<div class="modal fade action-modal" id="xlarge" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true"></div>

</div>
<!-- END: Content-->

@endsection

@section('js')
    <script>

        $('.btn-confirm').on('click', function(e){
            var t = $('.action-modal');
            $.ajax({
                url: $(this).data('href'),
                dataType: "html",
                success: function(e) {
                    $(t).html(e).modal("show")
                }
            })
        })

     </script>
@endsection