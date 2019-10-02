@extends('template.v1.temp')

@section('title_bar')
 Anggota Komisi
@endsection

@section('css')
  
@endsection

@section('konten')
<style>

</style>
<div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{ asset('public/assets/v2/plugins/images/heading-title-bg.jpg') }}) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">Anggota Komisi</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Anggota Komisi</li>
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
                    <div class="col-md-12">
                        <div class="white-box p-0">
                            <!-- .left-right-aside-column-->
                            <div class="page-aside">
                                <!-- .left-aside-column-->
                                <div class="left-aside">
                                    <div class="scrollable">
                                        <ul class="list-style-none">
                                            <li class="box-label"><a href="javascript:void(0)">Semua Anggota <span>10</span></a></li>
                                            <li class="divider"></li>
                                            <li><a href="javascript:void(0)">Nasdem <span>4</span></a></li>
                                            <li><a href="javascript:void(0)">Golkar <span>2</span></a></li>
                                            <li><a href="javascript:void(0)">PPP <span>1</span></a></li>
                                            <li><a href="javascript:void(0)">PDI <span>3</span></a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.left-aside-column-->
                                <div class="right-aside">
                                    <div class="right-page-header">
                                        <div class="pull-right">
                                            <input type="text" id="demo-input-search2" placeholder="Cari anggota" class="form-control">
                                        </div>
                                        <h3>Daftar Anggota Komisi A </h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="scrollable">
                                        <div class="table-responsive">
                                            <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Telepon</th>
                                                        <th>Partai</th>
                                                        <th>Jumlah perjalanan dinas</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/plugins/images/users/genu.jpg') }}" alt="user" class="img-circle" /> Genelia Deshmukh</a>
                                                        </td>
                                                        <td>genelia@gmail.com</td>
                                                        <td>+123 456 789</td>
                                                        <td><span class="label label-danger">PDI</span> </td>
                                                        <td>23</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>
                                                            <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/plugins/images/users/arijit.jpg') }}" alt="user" class="img-circle" /> Arijit Singh</a>
                                                        </td>
                                                        <td>arijit@gmail.com</td>
                                                        <td>+234 456 789</td>
                                                        <td><span class="label label-info">Nasdem</span> </td>
                                                        <td>26</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>
                                                            <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/plugins/images/users/govinda.jpg') }}" alt="user" class="img-circle" /> Govinda jalan</a>
                                                        </td>
                                                        <td>govinda@gmail.com</td>
                                                        <td>+345 456 789</td>
                                                        <td><span class="label label-success">PPP</span></td>
                                                        <td>28</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>
                                                            <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/plugins/images/users/hritik.jpg') }}" alt="user" class="img-circle" /> Hritik Roshan</a>
                                                        </td>
                                                        <td>hritik@gmail.com</td>
                                                        <td>+456 456 789</td>
                                                        <td><span class="label label-warning">Golkar</span></td>
                                                        <td>25</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>
                                                            <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/plugins/images/users/john.jpg') }}" alt="user" class="img-circle" /> John Abraham</a>
                                                        </td>
                                                        <td>john@gmail.com</td>
                                                        <td>+567 456 789</td>
                                                        <td><span class="label label-danger">PDI</span></td>
                                                        <td>23</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>
                                                            <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/plugins/images/users/pawandeep.jpg') }}" alt="user" class="img-circle" /> Pawandeep kumar</a>
                                                        </td>
                                                        <td>pawandeep@gmail.com</td>
                                                        <td>+678 456 789</td>
                                                        <td><span class="label label-warning">Golkar</span></td>
                                                        <td>29</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>
                                                            <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/plugins/images/users/ritesh.jpg') }}" alt="user" class="img-circle" /> Ritesh Deshmukh</a>
                                                        </td>
                                                        <td>ritesh@gmail.com</td>
                                                        <td>+123 456 789</td>
                                                        <td><span class="label label-danger">PDI</span></td>
                                                        <td>35</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>8</td>
                                                        <td>
                                                            <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/plugins/images/users/salman.jpg') }}" alt="user" class="img-circle" /> Salman Khan</a>
                                                        </td>
                                                        <td>salman@gmail.com</td>
                                                        <td>+234 456 789</td>
                                                        <td><span class="label label-info">Nasdem</span></td>
                                                        <td>27</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>9</td>
                                                        <td>
                                                            <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/plugins/images/users/govinda.jpg') }}" alt="user" class="img-circle" /> Govinda jalan</a>
                                                        </td>
                                                        <td>govinda@gmail.com</td>
                                                        <td>+345 456 789</td>
                                                        <td><span class="label label-success">PPP</span></td>
                                                        <td>18</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>10</td>
                                                        <td>
                                                            <a href="contact-detail.html"><img src="{{ asset('public/assets/v2/plugins/images/users/sonu.jpg') }}" alt="user" class="img-circle" /> Sonu Nigam</a>
                                                        </td>
                                                        <td>sonu@gmail.com</td>
                                                        <td>+456 456 789</td>
                                                        <td><span class="label label-info">Nasdem</span></td>
                                                        <td>36</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="2">
                                                            <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact">Tambah Anggota Komisi</button>
                                                        </td>
<div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title" id="myModalLabel">Tambah Anggota Komisi</h4>
</div>
<div class="modal-body">
<from class="form-horizontal form-material">
<div class="form-group">
<div class="col-md-12 m-b-20">
<input type="text" class="form-control" placeholder="Nama">
</div>
<div class="col-md-12 m-b-20">
<input type="text" class="form-control" placeholder="Email">
</div>
<div class="col-md-12 m-b-20">
<input type="text" class="form-control" placeholder="Telepon">
</div>
<div class="col-md-12 m-b-20">
<input type="text" class="form-control" placeholder="Partai">
</div>
<div class="col-md-12 m-b-20">
<input type="number" class="form-control" placeholder="Jumlah Perjalanan Dinas">
</div>
<div class="col-md-12 m-b-20">
<div class="fileupload btn btn-danger btn-rounded waves-effect waves-light"><span><i class="ion-upload m-r-5"></i>Foto</span>
                    <input type="file" class="upload">
                                                                    </div>
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
                                        <td colspan="7">
                                            <div class="text-right">
                                                <ul class="pagination">
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- .left-aside-column-->
            </div>
            <!-- /.left-right-aside-column-->
        </div>
    </div>
</div>

</div>
<!-- /.row -->
@stop

@section('js')
<script src="{{ asset('public/assets/v2') }}/js/custom.min.js"></script>
<script src="{{ asset('public/assets/v2') }}/js/cbpFWTabs.js"></script>
@endsection


@section('myscript')

@endsection