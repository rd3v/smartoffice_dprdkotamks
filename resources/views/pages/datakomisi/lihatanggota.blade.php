@extends('template.v1.temp')

@section('title_bar')
 {{ config('app.name') }}
@endsection

@section('css')

@endsection

@section('konten')
	
	        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{ asset('public/assets/v2/plugins/images/heading-title-bg.jpg') }}) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">Lihat Anggota</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                            <li><a href="{{ url('data-komisi') }}">Data Komisi</a></li>
                            <li class="active">Lihat Anggota</li>
                        </ol>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <form role="search" class="app-search hidden-xs pull-right">
                            <input type="text" placeholder="Cari..." class="form-control">
                            <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">

                    <p><a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a></p>

                        <div class="row">
                    

                    <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/images/user-male.png') }}" alt="user" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="box-title m-b-0">Abdi Asmara</h3>
                                    <small>Demokrat</small>
                                    <p>
                                        <address>
                                            Ketua
                                            <br/>
                                            <br/>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!-- .col -->
                    <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/images/user-male.png') }}" alt="user" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="box-title m-b-0">Abdul Wahab Tahir</h3>
                                    <small>Golkar</small>
                                    <p>
                                        <address>
                                            Wakil Ketua
                                            <br/>
                                            <br/>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!-- .col -->
                    <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/images/user-male.png') }}" alt="user" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="box-title m-b-0">Mario David</h3>
                                    <small>NasDem</small>
                                    <p>
                                        <address>
                                            Sekretaris
                                            <br/>
                                            <br/>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/images/user-male.png') }}" alt="user" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="box-title m-b-0">Haji Andi Hasir</h3>
                                    <small>-</small>
                                    <p>
                                        <address>
                                            Anggota
                                            <br/>
                                            <br/>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!-- .col -->
                    <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/images/user-male.png') }}" alt="user" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="box-title m-b-0">Syarifuddin Badollahi</h3>
                                    <small>-</small>
                                    <p>
                                        <address>
                                            Anggota
                                            <br/>
                                            <br/>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!-- .col -->
                    <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/images/user-male.png') }}" alt="user" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="box-title m-b-0">Lisdayanti Sabri</h3>
                                    <small>-</small>
                                    <p>
                                        <address>
                                            Anggota
                                            <br/>
                                            <br/>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/images/user-male.png') }}" alt="user" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="box-title m-b-0">Busranuddin Baso Tika</h3>
                                    <small>-</small>
                                    <p>
                                        <address>
                                            Anggota
                                            <br/>
                                            <br/>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!-- .col -->
                    <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/images/user-male.png') }}" alt="user" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="box-title m-b-0">Jufri Pabe</h3>
                                    <small>-</small>
                                    <p>
                                        <address>
                                            Anggota
                                            <br/>
                                            <br/>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!-- .col -->
                    <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/images/user-male.png') }}" alt="user" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="box-title m-b-0">Haslinda</h3>
                                    <small>-</small>
                                    <p>
                                        <address>
                                            Anggota
                                            <br/>
                                            <br/>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-4 col-sm-4">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/images/user-male.png') }}" alt="user" class="img-circle img-responsive"></a>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <h3 class="box-title m-b-0">Zaenal Dg Beta</h3>
                                    <small>-</small>
                                    <p>
                                        <address>
                                            Anggota
                                            <br/>
                                            <br/>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    
                </div>

                        </div>
                    </div>
                </div>

</div>

@endsection

@section('js')
<script src="{{ asset('public/assets/v2') }}/js/custom.min.js"></script>
<script src="{{ asset('public/assets/v2') }}/js/cbpFWTabs.js"></script>
@endsection

@section('myscript')

@endsection

