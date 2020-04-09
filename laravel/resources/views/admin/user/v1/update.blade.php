@extends('admin.layouts.v1')
@section('content')
    <div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('helperContent')
Only save insert and save
@endsection
<!-- section title --> 
@section('title_page')
@lang('general.title_list_user_page')
@endsection 
<!-- sub title --> 
@section('sub_title_page')
@lang('general.sub_title_list_user_page')
@endsection 
        <!-- message --> 
        <?php 
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
        } ?>
        <!-- form --> 
        <form method="POST" action="<?php echo route('SaveUpdateUser',[
            "user_id" => $data->id
        ]); ?>">
            <h4> Account info </h4>
            <div class="form-group row">
                <label for="user-email" class="col-sm-2 col-form-label">
                    @lang('form.user_email') <span class="text-danger">*</span>
                </label>
                <div class="col-sm-10">
                    <span><i><?php echo $data->email; ?></i></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="user-name" class="col-sm-2 col-form-label" name="name">
                    @lang('form.user_name') <span class="text-danger">*</span>
                </label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="<?php echo $data->name; ?>"
                    class="form-control-plaintext" id="user-name" placeholder="">
                </div>
            </div>
            <h4> Roles </h4>
            <div class="form-group row">
                <label for="role_add_post" class="col-sm-2 col-form-label">
                    @lang('form.user_role_add_post') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_add_post" id="role_add_post">
                    <option value="0"> 
                        @lang('form.user_role_text_unactive')
                    </option>
                    <option <?php echo intval($roles->role_add_post) === 1 ? 'selected' : ''; ?>
                     value="1"> @lang('form.user_role_text_active')</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_update_post" class="col-sm-2 col-form-label">
                    @lang('form.user_role_edit_post') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_update_post" id="role_update_post">
                    <option value="0"> @lang('form.user_role_text_unactive')</option>
                    <option  <?php echo intval($roles->role_update_post) === 1 ? 'selected' : ''; ?>
                     value="1"> @lang('form.user_role_text_active')</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_delete_post" class="col-sm-2 col-form-label">
                    @lang('form.user_role_delete_post') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_delete_post" id="role_delete_post">
                    <option value="0"> @lang('form.user_role_text_unactive')</option>
                    <option <?php echo intval($roles->role_delete_post) === 1 ? 'selected' : ''; ?> 
                    value="1"> @lang('form.user_role_text_active')</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_see_post" class="col-sm-2 col-form-label">
                    @lang('form.user_role_see_post') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_see_post" id="role_see_post">
                    <option value="0"> just user</option>
                    <option <?php echo intval($roles->role_see_post) === 1 ? 'selected' : ''; ?> value="1"> all</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_add_page" class="col-sm-2 col-form-label">
                    @lang('form.user_role_add_page') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_add_page" id="role_add_page">
                    <option value="0"> @lang('form.user_role_text_unactive')</option>
                    <option <?php echo intval($roles->role_add_page) === 1 ? 'selected' : ''; ?> 
                    value="1"> @lang('form.user_role_text_active')</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_update_page" class="col-sm-2 col-form-label">
                    @lang('form.user_role_edit_page') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_update_page" id="role_update_page">
                    <option value="0"> @lang('form.user_role_text_unactive')</option>
                    <option <?php echo intval($roles->role_update_page) === 1 ? 'selected' : ''; ?> 
                    value="1"> @lang('form.user_role_text_active')</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_delete_page" class="col-sm-2 col-form-label">
                    @lang('form.user_role_delete_page') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_delete_page" id="role_delete_page">
                    <option value="0"> @lang('form.user_role_text_unactive')</option>
                    <option <?php echo intval($roles->role_delete_page) === 1 ? 'selected' : ''; ?> 
                    value="1"> @lang('form.user_role_text_active')</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_see_page" class="col-sm-2 col-form-label">
                    @lang('form.user_role_see_page') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_see_page" id="role_see_page">
                    <option value="0"> just user</option>
                    <option  <?php echo intval($roles->role_see_page) === 1 ? 'selected' : ''; ?>
                    value="1"> all</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_add_category" class="col-sm-2 col-form-label">
                    @lang('form.user_role_add_category') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_add_category" id="role_add_category">
                    <option value="0"> @lang('form.user_role_text_unactive')</option>
                    <option  <?php echo intval($roles->role_add_category) === 1 ? 'selected' : ''; ?> value="1"> @lang('form.user_role_text_active')</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_update_category" class="col-sm-2 col-form-label">
                    @lang('form.user_role_edit_category') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_update_category" id="role_update_category">
                    <option value="0"> @lang('form.user_role_text_unactive')</option>
                    <option <?php echo intval($roles->role_update_category) === 1 ? 'selected' : ''; ?> 
                    value="1"> @lang('form.user_role_text_active')</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_delete_category" class="col-sm-2 col-form-label">
                    @lang('form.user_role_delete_category') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_delete_category" id="role_delete_category">
                    <option value="0"> @lang('form.user_role_text_unactive')</option>
                    <option <?php echo intval($roles->role_delete_category) === 1 ? 'selected' : ''; ?> 
                    value="1"> @lang('form.user_role_text_active')</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_see_category" class="col-sm-2 col-form-label">
                    @lang('form.user_role_see_category') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_see_category" id="role_see_category">
                    <option value="0"> @lang('form.user_role_text_unactive')</option>
                    <option <?php echo intval($roles->role_see_category) === 1 ? 'selected' : ''; ?> 
                    value="1"> @lang('form.user_role_text_active')</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_update_setting" class="col-sm-2 col-form-label">
                    @lang('form.user_role_update_setting') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_update_setting" id="role_update_setting">
                    <option value="0"> @lang('form.user_role_text_unactive')</option>
                    <option <?php echo intval($roles->role_update_setting) === 1 ? 'selected' : ''; ?>  
                    value="1"> @lang('form.user_role_text_active')</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_builder_menu" class="col-sm-2 col-form-label">
                    @lang('form.user_role_builder_menu') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_builder_menu" id="role_builder_menu">
                    <option value="0"> @lang('form.user_role_text_unactive')</option>
                    <option <?php echo intval($roles->role_builder_menu) === 1 ? 'selected' : ''; ?> 
                    value="1"> @lang('form.user_role_text_active')</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_manager_user" class="col-sm-2 col-form-label">
                    @lang('form.user_role_manager_user') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_manager_user" id="role_manager_user">
                    <option value="0"> @lang('form.user_role_text_unactive')</option>
                    <option <?php echo intval($roles->role_manager_user) === 1 ? 'selected' : ''; ?> 
                    value="1"> @lang('form.user_role_text_active')</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="role_active" class="col-sm-2 col-form-label">
                    @lang('form.user_role_active') <span class="text-danger"> *</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="role_active" id="role_active">
                    <option value="0"> @lang('form.user_role_text_unactive')</option>
                    <option <?php echo intval($roles->role_active) === 1 ? 'selected' : ''; ?> 
                    value="1"> @lang('form.user_role_text_active')</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="content-seo" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button class="btn btn-primary"><i class="far fa-save"></i> @lang('form.save')</button>
                </div>
            </div>
            @csrf
        </form>
    </div>
    <div class="js-action-form">
        <script src="{{ asset('js/app.add.post.js') }}" defer></script>
    </div>
@endsection