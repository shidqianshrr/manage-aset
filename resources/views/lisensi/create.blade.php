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
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> Adm{{@$page}}in </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">{{@$page}}</h3>

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
              <div class="form-group col-sm-5">
                  <label>Item Name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="Usename">
              </div>
              <div class="form-group col-sm-5">
                <label>Model</label>
                <input type="text" name="model" id="model" class="form-control" placeholder="Usename">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-5">
                  <label>Category</label>
                  <input type="text" name="category" id="category" class="form-control" placeholder="Usename">
              </div>
              <div class="form-group col-sm-5">
                <label>Version</label>
                <input type="text" name="version" id="version" class="form-control" placeholder="Usename">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-sm-5">
                <label>Status</label>
                <select type="text" name="status_id" id="status_id" class="form-control">
                  <option value="">Select One Status</option>

                  @foreach($status as $row)
                    <option value="{{$row->id}}">{{ $row->name }}</option>
                  @endforeach
                  
                </select>
            </div>
            </div>
            <div class="row">
              <div class="form-group col-md-5">
                <label>Upload File</label>
                <div class="form-group">
                  <input type="file" name="image" id="image" class="form-control">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-10">
                <label>Description</label>
                <div class="form-group">
                  <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
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
