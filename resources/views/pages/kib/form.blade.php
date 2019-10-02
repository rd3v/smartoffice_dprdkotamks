@extends('template.v1.temp')

@section('title_bar')
 SELAMAT DATANG
@endsection

@section('css')
  <link rel="stylesheet" href="{{URL::asset('assets/v1')}}/plugins/bootstrap-select/css/bootstrap-select.css">
@endsection

@section('konten')

@if(Session::has('message'))
     <script type="text/javascript">
        toastr.success('{{ Session::get('message') }}', 'Success!!', {timeOut: 5000});
      </script>
@endif


<style type="text/css">

.gigo-table {
     border-collapse:collapse;
     width: 100%;
     display: table;
}

.gigo-row th{
    background-color:#3498db;
    text-align:center;
    font-size:12px;
    font-weight:bold;
    color:#fff;
    border: 1px solid #000;
}

.gigo-row td{
    text-align:center;
    font-size:10px;
    background-color:#fff;
    border: 1px solid #000;
}

h4.gigo-header{
      font-family: "Helvetica Neue", Helvetica, Arial;
      color: #3b3b3b;
}

h4.gigo-date{
  font-family: "Helvetica Neue", Helvetica, Arial;
  color: #3b3b3b;
}

.tabel-biasa td{
  border:none;
  text-align:left;
}

#addModal a:link, a:hover, a:active{
  color : #1c82e1;
  background-color :transparent;
  cursor : pointer;
  display :inline-block;
}
</style>

    <section class="content">
        <div class="container-fluid">


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                    <div class="card">
                      <div class="header">
                          <h2>{{ $title }}</h2>
                        <?php if(Session::has('success') or Session::has('error')):  ?>
                            <div class="alert <?php echo Session::has('success') ? 'alert-success':'alert-danger'; ?>">
                              <ul>
                                <li><?php echo Session::has('success') ? Session::get('success'):Session::get('error') ?></li>
                              </ul>
                            </div>
                        <?php endif; ?>
                      </div>
                        <div class="body bg-white">

                          <form action="{{ URL::to('/laporankib') }}" method="post">
                              @csrf
                              <input type="hidden" name="tipe" value="{{ $tipe }}">
                              <?php foreach ($columns as $column):
                                $name = $column['name'];
                                $string = explode('_',$column['name']);
                                    $labelTitle = '';
                                    foreach ($string as $value) {
                                        $labelTitle .= $value." ";
                                    } ?>

                                    <label for="{{ $name }}">{{ strtoupper($labelTitle) }}</label>
                                    <div class="form-group">
                                      <div class="form-line">

                                <?php if ($column['type'] == 'string' or $column['type'] == 'integer'):
                                        if($column['name'] == 'tahun_ajaran'): ?>
                                            <select class="form-control" name="{{ $name }}" required>
                                                <option value="">Pilih {{ $labelTitle }}</option>
                                                <?php foreach ($yearValue as $value): ?>
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php else: ?>
                                          <input type="{{ $column['type'] == 'integer' ? 'number':'text' }}" maxlength="{{ $column['length'] }}" name="{{ $name }}" id="{{ $name }}" class="form-control" placeholder="Masukkan {{ $labelTitle }}" required>
                                        <?php endif; ?>
                                <?php elseif($column['type'] == 'date'): ?>
                                      <select class="form-control" name="{{ $name }}" required>
                                          <option value="">Pilih {{ $labelTitle }}</option>
                                          <?php foreach ($dateValue as $value): ?>
                                              <option value="{{ $value }}">{{ $value }}</option>
                                          <?php endforeach; ?>
                                      </select>
                                <?php endif; ?>

                                      </div>
                                    </div>

                              <?php endforeach; ?>

                              <button type="submit" class="btn btn-primary m-t-15 waves-effect">SIMPAN</button>
                              <button type="reset" class="btn btn-danger m-t-15 waves-effect">BATAL</button>
                          </form>

                        </div>
                    </div>
                </div>
            </div>


            <div class="row clearfix">


            </div>


        </div>
    </section>


@endsection

@section('myScript')
  <script>
      $("#likib").addClass("active");
  </script>
@stop
