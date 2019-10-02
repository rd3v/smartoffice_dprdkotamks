@extends('template.v1.temp')

@section('title_bar')
 {{ $title }}
@stop

@section('css')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('assets/v1/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}">
@stop

@section('konten')

@if(Session::has('message'))
     <script>
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
                          <ul class="header-dropdown m-r--5">
                              <li class="dropdown">
                                  <a href="{{ URL::to('/laporankib/create/'.$tipe) }}" class="btn btn-primary" name="button">TAMBAH +</a>
                                  <!-- <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                      <i class="material-icons">more_vert</i>
                                  </a>
                                  <ul class="dropdown-menu pull-right">
                                      <li><a href="javascript:void(0);">Action</a></li>
                                      <li><a href="javascript:void(0);">Another action</a></li>
                                      <li><a href="javascript:void(0);">Something else here</a></li>
                                  </ul> -->
                              </li>
                          </ul>
                      </div>
                        <div class="body bg-white">
                              <div class="table-responsive">

                                  <table class="table table-bordered table-striped table-hover js-exportable dataTable">
                                      <thead>
                                        <tr>
                                    @foreach ($cols as $field)
                                          <th class="text-center">{{ strtoupper($field) }}</th>
                                    @endforeach
                                          <th class="text-center">AKSI</th>
                                        </tr>
                                      </thead>
                                      <tfoot>
                                    @foreach ($cols as $field)
                                        <th class="text-center">{{ strtoupper($field) }}</th>
                                    @endforeach
                                        <th class="text-center">AKSI</th>
                                      </tfoot>
                                      <tbody>
                                    @foreach($data as $value)
                                        <tr>
                                          @foreach($columns as $subvalue)
                                            <td>{{ is_int($value->$subvalue) ? number_format($value->$subvalue) : strtoupper($value->$subvalue) }}</td>
                                          @endforeach
                                            <td>
                                              <button type="button" data-toggle="modal" data-target="#lihatData" title="Lihat Data" data-nps="{{ $value->nomor_pokok_sekolah }}" data-nm_barang="{{ $value->nama_barang }}" data-tipe="{{ $tipe }}" data-kode_barang="{{ $value->kode_barang }}" class="btn btnView btn-primary"><i class="material-icons">visibility</i></button>
                                              <button type="button" data-toggle="modal" data-target="#editData" title="Edit Data" class="btn btnEdit btn-info" data-nps="{{ $value->nomor_pokok_sekolah }}" data-nm_barang="{{ $value->nama_barang }}" data-kode_barang="{{ $value->kode_barang }}" data-tipe="{{ $tipe }}"><i class="material-icons">border_color</i></button>
                                              <button type="button" data-toggle="modal" data-target="#deleteData" title="Hapus Data" class="btn btnDelete btn-danger" data-nps="{{ $value->nomor_pokok_sekolah }}" data-nm_barang="{{ $value->nama_barang }}" data-kode_barang="{{ $value->kode_barang }}" data-tipe="{{ $tipe }}"><i class="material-icons">delete</i></button>
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
            </div>


            <div class="row clearfix">


            </div>


        </div>
    </section>


    <!-- Modals -->
    @include('pages.kib.modal.view')
    @include('pages.kib.modal.edit')
    @include('pages.kib.modal.delete')


@stop

@section('js')
<!-- Jquery DataTable Plugin Js -->
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/jquery.dataTables.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
   <script src="{{ URL::asset('assets/v1')}}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

   <script src="{{ URL::asset('assets/v1')}}/js/pages/tables/jquery-datatable.js"></script>
@stop

@section('myScript')
  <script>
    // btnView Click
    $("#likib").addClass("active");

    $(".btnView").click(function() {

        var nps = $(this).data("nps");
        var nm_barang = $(this).data("nm_barang");
        var tipe = $(this).data("tipe");
        var pkey = {nps:nps,nm_barang:nm_barang,tipe:tipe};


        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
            url:"/laporankibview",
            type:"post",
            data:pkey,
            dataType:"json"
        }).done(function(res) {
            $("#modalLihatTitle").text("DETAIL " + res.nama_barang.toString().toUpperCase());

            var modalLihatHead = "";

            for (var member in res) {
                modalLihatHead += "<tr>";
                modalLihatHead += "<th>" + member.toString().toUpperCase() + "</th>";
                modalLihatHead += "<th>" + res[member].toString().toUpperCase() + "</th>";
                modalLihatHead += "</tr>";
            }

            $("#modalLihatHead").html(modalLihatHead);

        }).fail(function(res) {
            console.log(res);
        });

    });

    $(".btnEdit").click(function() {
        $("#modalEditTitle").text("EDIT DATA " + $(this).data("nm_barang").toString().toUpperCase());
        $("input[name=editTipe]").val($(this).data("tipe"));
        $("#eBody").html("");

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        var nps = $(this).data("nps");
        var nm_barang = $(this).data("nm_barang");
        var kode_barang = $(this).data("kode_barang");
        var tipe = $(this).data("tipe");
        var pkeyEdit = {nps:nps,nm_barang:nm_barang,kd_barang:kode_barang,tipe:tipe};

        $.ajax({
            url:"/laporankib/edit",
            type:"post",
            data:pkeyEdit,
            dataType:"json"
        }).done(function(res) {
            console.log(res.data);
            var html = $("#eBody");
            for (var i = 0; i < res.data.length; i++) {
              var name = res.data[i]['name'];
              var string = name.split("_");
              var labelTitle = '';
              for (var str = 0; str < string.length; str++) {
                  labelTitle += string[str] + " ";
              }

              html.append("<label for='"+res.data[i]['name']+"'>"+labelTitle.toString().toUpperCase()+"</label>");
              if(res.data[i]['type'] == "string" || res.data[i]['type'] == "integer") {
                  if(res.data[i]['name'] == "tahun_ajaran") {
                    html.append(function() {
                        html.append("<select name='"+name+"' class='form-control' id='"+name+"' required></select>");
                        var container = $("select#"+name);
                        $.each(res.yearValue, function(val) {
                            container.append("<option value='"+res.yearValue[val]+"'>"+res.yearValue[val]+"</option>");
                        });
                    });

                    $("select#"+name).val(res.data[i]['value']).change();


                  } else {
                    html.append("<input type='"+(res.data[i]['type'] == "integer" ? "number":"text")+"' class='form-control' name='"+res.data[i]['name']+"' placeholder'Masukkan "+labelTitle+"' value='"+res.data[i]['value']+"' required>");
                  }
              } else if(res.data[i]['type'] == "date") {

                html.append(function() {
                  html.append("<select name='"+name+"' class='form-control' id='"+name+"' required></select>");
                  var container = $("select#"+name);
                  $.each(res.dateValue, function(val) {
                    container.append("<option value='"+res.dateValue[val]+"'>"+res.dateValue[val]+"</option>");
                  });
                });

                $("select#"+name).val(res.data[i]['value']).change();
              }

            }

        }).fail(function(res) {
            console.log(res);
        });

    });

    $("#formEdit").submit(function(event) {
        event.preventDefault();

        $("#btnUpdate").button('loading');

        var formData = $(this).serialize();
        formData.tipe = $("input#editTipe").val();
        $.ajax({
            url:"/laporankibupdate",
            type:"post",
            data:formData,
            dataType:"json"
        }).done(function(res) {
            $("#btnUpdate").button('reset');
            if(res.status) {
                $("#editStatus").addClass("alert alert-success");
                $("#editStatus").text(res.message);
                $("#editStatus").fadeIn('fast','swing',function() {
                    $(this).css('display','');
                });

                setTimeout(function() {
                    $('#editStatus').fadeOut('slow','swing',function() {
                        $(this).css('display','none');
                    });

                    location.reload();
                    // $("#editData").modal({
                    //     backdrop:true,
                    //     keyboard:true
                    // });

                //     setTimeout(function() {
                //
                //       $("#editData").modal('toggle');
                //       js_exportable.clear().draw();
                //
                //       $.ajax({
                //         url:"/laporankibget",
                //         type:"post",
                //         data:{tipe:res.tipe},
                //         dataType:"json"
                //       }).done(function(res) {
                //
                //       }).fail(function(res) {
                //
                //       });
                //     },500);
                //
                },1500);


            } else {
                $("#editStatus").addClass("alert alert-danger");
                $("#editStatus").text(res.message);
            }

        }).fail(function(res) {
            console.log(res);
        });

    });

    // btnEditClick

    // btnDeleteClick
    var pkeyD = {};
    $(".btnDelete").click(function() {
        $("#dNPS").text("Nomor Pokok Sekolah : "+$(this).data("nps"));
        $("#dNamaBarang").text("Nama Barang : "+$(this).data("nm_barang"));

        var nps = $(this).data("nps");
        var nm_barang = $(this).data("nm_barang");
        var tipe = $(this).data("tipe");
        pkeyD.nps = nps;
        pkeyD.nm_barang = nm_barang;
        pkeyD.tipe = tipe;

    });

    $("#btnDeleteCommit").click(function() {

        $(this).button("loading");

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
            url:"/laporankibdelete",
            type:"post",
            data:pkeyD,
            dataType:"json"
        }).done(function(res) {
            console.log(res);
        }).fail(function(res) {
            console.log(res);
        });

        setTimeout(function() {
          location.reload();
          // $("#btnDeleteCommit").button("reset");
          // $("#deleteData").modal({
          //   backdrop:true,
          //   keyboard:true
          // });
          // $("#deleteData").modal('toggle');

        },3000);

    });

  </script>
@stop
