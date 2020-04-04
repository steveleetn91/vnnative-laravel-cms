@extends('admin.layouts.v1')
@section('helperContent')
Only save insert and save
@endsection
@section('content')
    <div class="container">
      <!-- help -->
    <div class="pos-f-t" style="margin-bottom:20px">
      <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
          <h4 class="text-white">Help content</h4>
          <span class="text-muted">You can search item name by search box</span>
        </div>
      </div>
      <nav class="navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
    </div>
    <!-- table -->   
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Title

      </th>
      <th class="th-sm">
          
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $key => $value ) {?>
      <tr>
        <td class="th-sm"><?php echo $value->title; ?></td>
        <td class="th-sm">
          <button class="btn btn-danger">Destroy</button>
          <a href="<?php echo route('UpdatePage',['page_id' => $value->id]); ?>">
            <button class="btn btn-warning">Edit</button>
          </a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th>Title
      </th>
      <th>
      </th>
    </tr>
  </tfoot>
</table>
    </div>
@endsection