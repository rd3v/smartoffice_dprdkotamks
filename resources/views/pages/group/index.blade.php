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
                          @if(session('message'))
                            <br>
                            <div class="alert alert-info">
                              {{ session('message') }}
                            </div>
                          @endif
                          <h2>{{ $nama }}</h2>
                          <ul class="header-dropdown m-r--5">
                              <li class="dropdown">
                                  <a href="{{ route('group.create') }}" class="btn btn-primary" name="button">TAMBAH +</a>
                              </li>
                          </ul>
                      </div>
                        <div class="body bg-white">
                              <div class="table-responsive display">

                                  <table class="table table-bordered table-striped table-hover js-exportable dataTable">
                                      <thead>
                                        <tr>
                                            <th>KODE GROUP</th>
                                            <th>NAMA GROUP</th>
                                            <th>ACTION</th>
                                        </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                            <th>KODE GROUP</th>
                                            <th>NAMA GROUP</th>
                                            <th>ACTION</th>
                                        </tr>
                                      </tfoot>
                                      <tbody>
                                            @foreach($data as $value)
                                              <tr>
                                                <td>{{ $value->kode_group }}</td>
                                                <td>{{ $value->nama_group }}</td>
                                                <td>
                                                  <form action="{{ route('group.delete',['kode_group' => $value->kode_group,'nama_group' => $value->nama_group]) }}" method="POST">
                                                    <input name="_method" type="hidden" value="POST">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger">HAPUS</button>
                                                  </form>
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
      $("#ligroup").addClass("active");

          var js_exportable = $('.js-exportable').DataTable({
          responsive: true,
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      });

  </script>
@endsection
