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
@lang('general.title_change_password_page')
@endsection 
<!-- sub title --> 
@section('sub_title_page')
@lang('general.sub_title_change_password_page')
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
        } 
        /**
         * If old password is not correct 
         */
        if(session('old_password_not_correct') === false) {
            session()->forget('old_password_not_correct');
            ?>
            <div class="alert alert-danger">
                Old password is not correct
            </div>
            <?php
        }
        ?>
        <!-- form --> 
        <form method="POST" action="<?php echo route('SaveChangePasswordUser'); ?>">
            <!-- old password --> 
            <div class="form-group row">
                <label for="old-password" class="col-sm-4 col-form-label">
                    @lang('form.user_old_password') <span class="text-danger">*</span>
                </label>
                <div class="col-sm-8">
                <input type="password" name="old_password" value=""
                    class="form-control-plaintext" id="old-password" placeholder="@lang('form.user_old_password_holder')">
                </div>
            </div>
            <!-- new password --> 
            <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label">
                    @lang('form.user_new_password') <span class="text-danger">*</span>
                </label>
                <div class="col-sm-8">
                <input type="password" name="password" value=""
                    class="form-control-plaintext" id="password" placeholder="@lang('form.user_new_password_holder')">
                </div>
            </div>
            <!-- confirm new password --> 
            <div class="form-group row">
                <label for="password-confirm" class="col-sm-4 col-form-label">
                    @lang('form.user_confirm_new_password') <span class="text-danger">*</span>
                </label>
                <div class="col-sm-8">
                <input type="password" value=""
                    class="form-control-plaintext" name="password_confirmation" 
                    id="password-confirm" placeholder="@lang('form.user_confirm_new_password_placeholder')">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8">
                    <button class="btn btn-primary"><i class="far fa-save"></i> @lang('form.save')</button>
                </div>
            </div>
            @csrf
        </form>
    </div>
@endsection