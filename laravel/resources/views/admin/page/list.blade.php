@extends('admin.layouts.v1')
@section('helperContent')
Only save insert and save
@endsection
@section('content')
    <div class="container">
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