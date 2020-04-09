@extends('admin.layouts.v1')
<!-- helper content --> 
@section('helperContent')
Only save insert and save
@endsection
<!-- section title --> 
@section('title_page')
@lang('general.title_list_post_page')
@endsection 
<!-- sub title --> 
@section('sub_title_page')
@lang('general.sub_title_list_post_page')
@endsection 
<!-- content --> 
@section('content')
    <div class="container">
    <?php 
      if(session('delete_status') === true) {
          session()->forget('delete_status');
          ?>
          <div class="alert alert-success">
              You has been deleted successfully
          </div>
          <?php
      } else if(session('delete_status') === false){
        session()->forget('delete_status');
          ?>
          <div class="alert alert-danger">
              You has been deleted failed
          </div>
          <?php
      }
      /**
       * Add new 
       */
      if(session('add_new_status') === true) {
          session()->forget('add_new_status');
          ?>
          <div class="alert alert-success">
              You has been added successfully
          </div>
          <?php
      } else if(session('add_new_status') === false){
        session()->forget('add_new_status');
          ?>
          <div class="alert alert-danger">
              You has been added failed
          </div>
          <?php
      }
      /**
       * Add new 
       */
      if(session('update_status') === true) {
          session()->forget('update_status');
          ?>
          <div class="alert alert-success">
              You has been updated successfully
          </div>
          <?php
      } else if(session('update_status') === false){
        session()->forget('update_status');
          ?>
          <div class="alert alert-danger">
              You has been updated failed
          </div>
          <?php
      }
    ?>
    <!-- table -->   
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name

      </th>
      <th class="th-sm">Email

      </th>
      <th class="th-sm">
          
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $key => $value ) {?>
      <tr>
        <td class="th-sm"><?php echo $value->name; ?></td>
        <td class="th-sm"><?php echo $value->email; ?></td>
        <td class="th-sm text-center box-action-of-list">
          <span onclick="delete_post('<?php echo $value->id; ?>','<?php echo route('DeleteUser',['user_id' => $value->id]); ?>');"> <i class="far fa-trash-alt"></i> </span>
          <a href="<?php echo route('UpdateUser',['user_id' => $value->id]); ?>">
          <i class="far fa-edit"></i>
          </a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th>Name
      </th>
      <th>Email
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