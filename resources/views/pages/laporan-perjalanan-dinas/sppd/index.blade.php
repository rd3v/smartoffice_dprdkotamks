@extends('template.v1.temp')

@section('title_bar')
 JADWAL SIDANG
@endsection

@section('konten')
<style>

</style>
<div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{ asset('assets/v2/plugins/images/heading-title-bg.jpg') }}) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">Jadwal Sidang</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">SPPD</li>
                        </ol>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <form role="search" class="app-search hidden-xs pull-right">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                        </form>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="white-box p-0">
                           <h3 class="box-title m-b-0">Surat Perintah Perjalanan Dinas</h3>
                            <!-- <p class="text-muted m-b-30"></p> -->
                            <p><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add-contact">Tambah SPPD +</button></p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Tujuan</th>
                                            <th>Lama</th>
                                            <th>Perihal</th>
                                            <th>Surat</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2011/04/25</td>
                                            <td>Bandung</td>
                                            <td>3 Hari</td>
                                            <td>Lorem Ipsum Dolor Sit Amet</td>
                                            <td><a href="{{ asset('assets/v2/images/sppd.jpeg') }}" target="_blank"><img src="{{ asset('assets/v2/images/sppd.jpeg') }}" alt=""></a></td>
                                            <td>Lorem Ipsum Dolor Sit Amet</td>
                                            <td><button title="Lihat" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Surat Perintah Perjalanan Dinas</h4>
			</div>
			<div class="modal-body">
				<from class="form-horizontal form-material">
				<div class="form-group">
					<div class="col-md-12 m-b-20">
						<input type="date" class="form-control" placeholder="Tanggal">
					</div>
					<div class="col-md-12 m-b-20">
						<input type="text" class="form-control" placeholder="Tujuan">
					</div>
					<div class="col-md-12 m-b-20">
						<input type="number" class="form-control" placeholder="Lama (dalam hari)">
					</div>
					<div class="col-md-12 m-b-20">
						<input type="text" class="form-control" placeholder="perihal">
					</div>
                    <div class="col-md-12 m-b-20">
                        <input type="file" class="form-control" placeholder="Surat">
                    </div>
                    <div class="col-md-12 m-b-20">
                       <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Keterangan"></textarea>
                    </div>
				</div>
				</from>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Simpan</button>
				<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

@endsection

@section('myjs')
<script src="{{ asset('assets/v2/plugins/bower_components/datatables/jquery.dataTables.min.js') }}"></script>
@endsection

@section('myscript')
	<script>
		$('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                }
            });

            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
	</script>
@endsection