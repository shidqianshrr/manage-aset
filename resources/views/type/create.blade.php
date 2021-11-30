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
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Admin </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Create</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <form method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Usename">
                </div>
              <!-- /.form-group -->
                <label>Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                <input type="date" name="date" id="date" class="form-control pull-right">
                </div><br>
                <!-- /.input group -->
              <!-- /.form-group -->
              <label>Textarea </label>
                <div class="form-group">
                    <textarea name="text" id="text" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                <!-- /.input group -->
              <!-- /.form-group -->
            </div>
          </div>
          <!-- /.row -->
          <button type="submit" class="btn btn-info pull-right">Submit</button>
        </form>
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
