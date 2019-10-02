@extends('template.v1.temp')

@section('title_bar')
 DATA CENTER MARIO DAVID
@endsection

@section('css')
  <link rel="stylesheet" href="{{URL::asset('assets/v1')}}/plugins/bootstrap-select/css/bootstrap-select.css">
  <link rel="stylesheet" href="{{ asset('assets/v1/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}">
@endsection

@section('konten')

@if(Session::has('message'))
     <script type="text/javascript">
        toastr.success('{{ Session::get('message') }}', 'Success!!', {timeOut: 5000});
      </script>
@endif


<style type="text/css">

tbody input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }

</style>

    <section class="content">
        <div class="container-fluid">
        

            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <div class="card">
                      <div class="header">
                          <h2>TAMBAH DUKUNGAN</h2>
                          @if(session('message'))
                            <br>
                            <div class="alert alert-info">
                              {{ session('message') }}
                            </div>
                          @endif
                      </div>
                      <div class="body">
                          <form action="{{ route('group.store') }}" method="post">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="nama_group" class="form-control" required value="">
                                            <label class="form-label">NAMA GROUP</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    
                                  <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                                    SIMPAN
                                  </button>
                                  <a href="{{ URL::previous() }}" class="btn btn-danger m-t-15 waves-effect">
                                    BATAL
                                  </a>
                                
                                </div>

                            </div>
                        </form>

                      </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('js')
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/jquery.dataTables.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

   <!-- <script src="{{ URL::asset('assets/v1')}}/js/pages/tables/jquery-datatable.js"></script> -->
@stop

@section('myScript')
  <script>
      $("#lihome").addClass("active");

  </script>
@endsection
