@extends('template.v1.temp')

@section('title_bar')
 {{ config('app.name') }}
@endsection

@section('css')
<link href="{{ asset('public/assets/v2') }}/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
@endsection

@section('konten')
    
            <div id="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row bg-title" style="background:url({{ asset('public/assets/v2/plugins/images/heading-title-bg.jpg') }}) no-repeat center center /cover;">
                    <div class="col-lg-12">
                        <h4 class="page-title">Jadwal Sidang</h4>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{ url('/') }}">Dashboard</a></li>
                            <li><a href="{{ url('jadwal-sidang') }}">Jadwal Sidang</a></li>
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
                            
                            <div class="row">
                    <div class="col-md-3">
                        <div class="white-box">
                            <h3 class="box-title">Tarik dan lepas untuk menambah jadwal</h3>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div id="calendar-events" class="m-t-20">
                                        <div class="calendar-events" data-class="bg-info"><i class="fa fa-circle text-info"></i> Rapat Paripurna</div>
                                        <div class="calendar-events" data-class="bg-success"><i class="fa fa-circle text-success"></i> Rapat Fraksi</div>
                                        <div class="calendar-events" data-class="bg-danger"><i class="fa fa-circle text-danger"></i> Rapat Pimpinan</div>
                                        <div class="calendar-events" data-class="bg-warning"><i class="fa fa-circle text-warning"></i> Rapat Komisi</div>
                                    </div>
                                    <!-- checkbox -->
                                    <div class="checkbox">
                                        <input id="drop-remove" type="checkbox">
                                        <label for="drop-remove">
                                            Hapus setelah di lepaskan
                                        </label>
                                    </div>
                                    <a href="#" data-toggle="modal" data-target="#add-new-event" class="btn btn-lg m-t-40 btn-danger btn-block waves-effect waves-light">
                                        <i class="ti-plus"></i> Tambah Jadwal
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="white-box">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- BEGIN MODAL -->
                <div class="modal none-border" id="my-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add Event</strong></h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-new-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add</strong> a category</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                                <option value="inverse">Inverse</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                    </div>
                    <div class="col-md-9">
                        <div class="white-box">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2019 &copy; HD Solution</footer>
        </div>
        <!-- /#page-wrapper -->

</div>

@endsection

@section('js')
<script src="{{ asset('public/assets/v2') }}/js/custom.min.js"></script>
<script src="{{ asset('public/assets/v2') }}/js/cbpFWTabs.js"></script>
    <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/calendar/jquery-ui.min.js"></script>
    <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/moment/moment.js"></script>
    <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/calendar/dist/fullcalendar.min.js"></script>
    <script src="{{ asset('public/assets/v2') }}/plugins/bower_components/calendar/dist/cal-init.js"></script>
@endsection

@section('myscript')
    
@endsection

