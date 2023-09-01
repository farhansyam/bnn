@extends('layouts.frontend')
@section('content')

<body class="">
    <!-- tap on top starts-->
    <!-- tap on tap ends-->
    <!-- Loader starts-->

    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container" id="pageWrapper">
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->

            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <h3>Museum BNN Deputi Bidang Rehabilitasi </h3>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Starts-->
                <div class="container-fluid knowledge-details">
                    <div class="row">
                        <div class="col-xl-5 xl-35 box-col-60">
                            <div class="blog-single">
                                <div class="blog-box">
                                    <div class="card"><img style="width:350px" class="img-fluid mx-auto" src="../assets/images/LOGO-BNN.png" alt="blog-main"></div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="blog-details">
                                                <h4 class="mt-0">DEPUTI BIDANG REHABILITASI
                                                    BADAN NARKOTIKA NASIONAL RI
                                                </h4>
                                                <div class="single-blog-content-top">
                                                    <p>
                                                        Deputi bidang rehabilitasi merupakan komponen teknis yang mendukung kebijakan Badan Narkotika Nasional dalam mewujudkan masyarakat yang terlindungi dan terselamatkan dari kejahatan narkotika menuju Indonesia maju yang berdaulat, mandiri dan berkepribadian berazaskan gotong royong.
                                                        Untuk mendukung tujuan tersebut Deputi Bidang Rehabilitasi melakukan upaya pemulihan pecandu narkoba melalui layanan rehabilitasi yang komprehensif dan berkelanjutan.

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 xl-65 box-col-40">
                            <div class="blog-single">
                                <div class="blog-box">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="blog-details">
                                                <h4 class="mt-0">Main Menu</h4>
                                                <div class="single-blog-content-top">
                                                    <div class="container mt-5">
                                                        @foreach ($menus as $menu)
                                                        <a href="">
                                                            <button style="width:640px; height:50px ;background-color: #0087de; color:white;" class="btn btn-lg text-left-button">{{$menu->menu_name}}
                                                            </button>
                                                        </a>
                                                        <br>
                                                        <br>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap js-->
    <script src="../assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="../assets/js/scrollbar/simplebar.js"></script>
    <script src="../assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="../assets/js/config.js"></script>
    <script src="../assets/js/sidebar-menu.js"></script>
    <!-- Template js-->
    <script src="../assets/js/script.js"></script>
    <!-- login js-->

</body>
@endsection