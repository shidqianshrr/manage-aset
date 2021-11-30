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

      <!-- SELECT2 -->
      <div class="box">
        <div class="box-header">

          <h3 class="box-title">{{@$page}} </h3>

          <button type="button" class="btn btn-box-tool pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>

        </div>
        <div class="box-body">
            <a href="{{ url('elektronik2/export_excel') }}" class="btn btn-info pull-left">Export Excel</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Model</th>
                <th>Date</th>
                </tr>
            </thead>
            <tbody>
              @php
                $no = 1;
              @endphp
              @foreach($elektronik as $index=>$row)
            <tr>
              <td>{{ $index+ $elektronik->firstItem() }}</td>
              <td>{{@$row->name}}</td>
              <td>{{@$row->model}}</td>
              <td>{{@$row->date}}</td>
            </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="box-footer table-responsive no-padding">
            <br>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

@endsection
