@extends('admin.layouts.v1')
@section('helperContent')
You can search item name by search box
@endsection
@section('content')
    <div class="container">
    <?php 
      if(session('delete_status') == 'successfully') {
          session()->forget('delete_status');
          ?>
          <div class="alert alert-success">
              You has been deleted successfully
          </div>
          <?php
      }
    ?>
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
          <button class="btn btn-danger" onclick="delete_post('<?php echo $value->id; ?>','<?php echo route('DeletePost',['post_id' => $value->id]); ?>');">Destroy</button>
          <a href="<?php echo route('UpdatePost',['post_id' => $value->id]); ?>">
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
    <!-- data input --> 
    <div class="js-action-data-hidden" >
        <input type="hidden" id="delete_title" value="@lang('form.delete_post_title_popup')">
        <input type="hidden" id="delete_message" value="@lang('form.delete_post_message_popup')">
        <input type="hidden" id="delete_text_button_cancel" value="@lang('form.delete_post_text_button_cancel')">
        <input type="hidden" id="delete_text_button_confirm" value="@lang('form.delete_post_text_button_confirm')">
    </div>
    <!-- js post --> 
    <script src="{{ asset('js/app.delete.post.js') }}"></script>
@endsection