@extends('layouts.main')

<div class="wrapper">

    @section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Type
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Normal </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box">
        <div class="box-header">

          <h3 class="box-title">Dashboard </h3>

          <button type="button" class="btn btn-box-tool pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>

        </div>
        <div class="box-body">
            <a href="{{ url('type/create') }}" class="btn btn-info pull-left">Create New</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Note</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td>
                <a href=""><i class="fa feather fa-cog f-w-600 f-16 text-c-red"></i></a> |
                <a href="" onclick="return confirm('Are you sure?')"><i class="fa feather fa-trash f-w-600 f-16 text-c-red"></i></a>
            </td>
            </tr>
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
