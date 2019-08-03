@extends('layouts.app')

@section('content')
<ul class="addstrg" title="Create Report">
  <a href="" class="float" data-toggle="modal"  data-target="#modal_md" data-tooltip="tooltip" title="Add New!">
    <i class="fa fa-plus my-float"></i>
  </a>
</ul>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    List Bapob 
                    <span style="margin-left:85%">
                    <button class="btn btn-info btn-sm" onclick="retrieveData()"><i calss="glyphicon glyphicon-search"></i>Refresh
                    </button>
                    </span>
                </div>
                <div class="card-body">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Bapob</th>
                                <th>Nama Produk</th>
                                <th>Customer</th>
                                <th>Raw Material</th>
                                <th>Revisi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready( function () {
    retrieveData();
} );

function retrieveData(){
    $('#table_id').DataTable().destroy();
    var table = $('#table_id').DataTable({
        "scrollX":true,
		"responsive": true,
        "ajax": {
            "url": "{{ url('listBapob') }}",
            "type": "GET",
            "dataSrc": ""
        },
        "columns": [
            {"data" : null},
            {"data" : "nomor_bapob"},
            {"data" : "nama_produk"},
            {"data" : "customer"},
            {"data" : "raw_material"},
            {"data" : "revisi"},
            { "data": "Action", render: function (data, type, row) {
                return '<button class="btn btn-sm btn-danger" onclick="destroyData('+row.id_bapob_headers+')">Delete</button>'
            }},
        ]
    });

    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
}

function destroyData(id){
    $.ajax({
      "url": "{{ url('destroyBapob') }}"+"/"+id,
      "type": "GET",
      "dataSrc": "",
      "success": 
      function(){
        retrieveData();
      }
    });
}
</script>

@endsection