@extends('layouts.main.app')
@section('title', 'Dashboard')
@section('content')
<div id="content" class="app-content">
    <h1 class="page-header mb-3">
        Hi, {{ Auth::user()->name }}. <small>Selamat datang {{ Auth::user()->getRoleNames()->first() }}.</small>
    </h1>
    
    <!-- BEGIN row -->
    <div class="row">
        <!-- BEGIN col-6 -->
        <div class="col-xl-6 mb-3">
            <!-- BEGIN card -->
            <div class="card h-100 overflow-hidden">
                <!-- BEGIN card-img-overlay -->
                <div class="card-img-overlay d-block d-lg-none bg-blue rounded"></div>
                <!-- END card-img-overlay -->
                
                <!-- BEGIN card-img-overlay -->
                <div class="card-img-overlay d-none d-md-block bg-blue rounded mb-n1 mx-n1" style="background-image: url(assets/img/bg/wave-bg.png); background-position: right bottom; background-repeat: no-repeat; background-size: 100%;"></div>
                <!-- END card-img-overlay -->
                
                <!-- BEGIN card-img-overlay -->
                <div class="card-img-overlay d-none d-md-block bottom-0 top-auto">
                    <div class="row">
                        <div class="col-md-8 col-xl-6"></div>
                        <div class="col-md-4 col-xl-6 mb-n2">
                            <img src="assets/img/page/dashboard.svg" alt="" class="d-block ms-n3 mb-5" style="max-height: 310px">
                        </div>
                    </div>
                </div>
                <!-- END card-img-overlay -->
                
                <!-- BEGIN card-body -->
                <div class="card-body position-relative text-white text-opacity-70">
                    <!-- BEGIN row -->
                    <div class="row">
                        <!-- BEGIN col-8 -->
                        <div class="col-md-8">
                            <!-- stat-top -->
                            <div class="d-flex">
                                <div class="me-auto">
                                    <h5 class="text-white text-opacity-80 mb-3">Weekly Earning</h5>
                                </div>
                            </div>
                            <p class="fs-12px   ">
                                Website ini merupakan sebuah sistem manajemen catatan harian pegawai yang dirancang untuk memfasilitasi proses pencatatan aktivitas kerja harian secara digital dan terstruktur berdasarkan hierarki organisasi. Dalam sistem ini, setiap pegawai (staff, manajer, dan direktur) dapat mengunggah catatan harian yang mencakup deskripsi pekerjaan dan dokumentasi berupa foto sebagai bukti aktivitas. Manajer memiliki peran tambahan untuk mereview dan menyetujui catatan dari para staff yang berada di bawah tanggung jawabnya, sedangkan direktur bertanggung jawab untuk meninjau dan menyetujui catatan milik para manajer. Sistem ini juga menyediakan dashboard yang menampilkan rekap data pengguna berdasarkan peran (role), jumlah total pengguna kecuali admin, dan statistik lain yang relevan untuk memantau kinerja harian. Dengan pendekatan Model-View-Controller (MVC) yang rapi, website ini tidak hanya memudahkan proses supervisi dan dokumentasi kinerja, tetapi juga mendukung transparansi, akuntabilitas, dan efisiensi dalam lingkungan kerja.
                            </p>
                        </div>
                        <!-- END col-8 -->
                        
                        <!-- BEGIN col-4 -->
                        <div class="col-md-4 d-none d-md-block" style="min-height: 380px;"></div>
                        <!-- END col-4 -->
                    </div>
                    <!-- END row -->
                </div>
                <!-- END card-body -->
            </div>
            <!-- END card -->
        </div>
        <!-- END col-6 -->
        
        <!-- BEGIN col-6 -->
        <div class="col-xl-6">
            <!-- BEGIN row -->
            <div class="row">
                <!-- BEGIN col-6 -->
                <div class="col-sm-6">
                    <!-- BEGIN card -->
                    <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-orange" style="min-height: 199px;">
                        <!-- BEGIN card-img-overlay -->
                        <div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
                            <img src="assets/img/icon/order.svg" alt="" class="ms-auto d-block mb-n3" style="max-height: 105px">
                        </div>
                        <!-- END card-img-overlay -->
                        
                        <!-- BEGIN card-body -->
                        <div class="card-body position-relative">
                            <h5 class="text-white text-opacity-80 mb-3 fs-16px">Total User</h5>
                            <h3 class="text-white mt-n1">{{$totalUsers}}</h3>
                        </div>
                        <!-- BEGIN card-body -->
                    </div>
                    <!-- END card -->
                    
                    <!-- BEGIN card -->
                    <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-teal" style="min-height: 199px;">
                        <!-- BEGIN card-img-overlay -->
                        <div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
                            <img src="assets/img/icon/visitor.svg" alt="" class="ms-auto d-block mb-n3" style="max-height: 105px">
                        </div>
                        <!-- END card-img-overlay -->
                        
                        <!-- BEGIN card-body -->
                        <div class="card-body position-relative">
                            <h5 class="text-white text-opacity-80 mb-3 fs-16px">Total Staff</h5>
                            <h3 class="text-white mt-n1">{{$totalStaff}}</h3>
                        </div>
                        <!-- END card-body -->
                    </div>
                    <!-- END card -->
                </div>
                <!-- END col-6 -->
                
                <!-- BEGIN col-6 -->
                <div class="col-sm-6">
                    <!-- BEGIN card -->
                    <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-pink" style="min-height: 199px;">
                        <!-- BEGIN card-img-overlay -->
                        <div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
                            <img src="assets/img/icon/email.svg" alt="" class="ms-auto d-block mb-n3" style="max-height: 105px">
                        </div>
                        <!-- END card-img-overlay -->
                        
                        <!-- BEGIN card-body -->
                        <div class="card-body position-relative">
                            <h5 class="text-white text-opacity-80 mb-3 fs-16px">Total Manajer</h5>
                            <h3 class="text-white mt-n1">{{$totalManagers}}</h3>>
                        </div>
                        <!-- END card-body -->
                    </div>
                    <!-- END card -->
                </div>
                <!-- BEGIN col-6 -->
            </div>
            <!-- END row -->
        </div>
        <!-- END col-6 -->
    </div>
    <!-- END row -->
    
</div>
@endsection
