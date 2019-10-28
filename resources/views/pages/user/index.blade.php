@extends('template.v1.temp')

@section('title_bar')
 MANAJEMEN USER
@endsection

@section('css')
<link href="{{ asset('public/assets/v2') }}/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('konten')

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{ asset('public/assets/v2/plugins/images/heading-title-bg.jpg') }}) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">Manajemen User</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="active">Manajemen User</li>
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
                    <div class="col-sm-12">
                        <div class="white-box">
                        
                            <button class="btn btn-success" style="float:right"><i class="fa fa-user-plus"></i> TAMBAH USER</button>
                            
                            <h3 class="box-title m-b-0">Data User</h3>
                            <p class="text-muted m-b-30"></p>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Telepon</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Telepon</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($users as $key => $value)
                                        <tr>
                                            <td class="text-center">{{ ($key+1) }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->username }}</td>
                                            <td>{{ $value->telepon }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->level }}</td>
                                            <td><button class="btn {{ $value->active == 1 ? 'btn-success':'btn-danger' }}">{{ $value->active == 1 ? "AKTIF":"NON AKTIF" }}</button></td>
                                            <td><button title="Hapus user {{ $value->name }}" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
@endsection

@section('js')
<script src="{{ asset('public/assets/v2') }}/js/custom.min.js"></script>
<script src="{{ asset('public/assets/v2') }}/js/cbpFWTabs.js"></script>
<script src="{{ asset('public/assets/v2') }}/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
@endsection

@section('myscript')
	<script>

        $(document).ready(function() {
               $('#example23').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
        });
        
         (function() {

            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });

        })();

	</script>
@endsection