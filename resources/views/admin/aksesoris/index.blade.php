@extends('layouts.main')

<div class="wrapper">

    @section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{@$page}}
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> {{@$app}} </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box">
        <div class="box-header">

          <h3 class="box-title">{{@$page}} </h3>

          <button type="button" class="btn btn-box-tool pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>

        </div>
        <div class="box-body">
            <a href="{{ url('aksesoris2/export_excel') }}" class="btn btn-info pull-left">Export</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Model</th>
                <th>Harga</th>
                </tr>
            </thead>
            <tbody>
              @php
              $no = 1;
            @endphp
            @foreach($aksesoris as $index=>$row)
          <tr>
            <td>{{ $index+ $aksesoris->firstItem() }}</td>
            <td>{{@$row->name}}</td>
            <td>{{@$row->model}}</td>
            <td>{{@$row->harga}}</td>
          </tr>
            @endforeach
          </tbody>
            </tbody>
          </table>
        </div>
        <div class="box-footer table-responsive no-padding">
            <br>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="box-tools pull-right">
            <ul class="pagination pagination-sm inline">
              <li><a href="#">&laquo;</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">&raquo;</a></li>
            </ul>
          </div>
      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

@endsection
