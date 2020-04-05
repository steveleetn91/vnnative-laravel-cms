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
<?php 
if(session('setting_status') == 'success') {
    session()->forget('setting_status');
    ?>
    <div class="alert alert-success">
        You has been updated successfully
    </div>
    <?php
}
?>
<form method="POST" action="<?php echo route('SaveSettingPage'); ?>">
    <div class="form-group row">
        <label for="sitename" class="col-sm-2 col-form-label">
            @lang('default_setting_page.sitename') <span class="text-danger">*</span>
        </label>
        <div class="col-sm-10">
            <input type="text" name="sitename" value="<?php echo $data['sitename']; ?>"
            class="form-control-plaintext" id="sitename" placeholder="Maximum 3 characters">
        </div>
    </div>
    <div class="form-group row">
        <label for="siteslogan" class="col-sm-2 col-form-label">
        @lang('default_setting_page.slogan') <span class="text-danger">*</span>
        </label>
        <div class="col-sm-10">
            <input type="text" name="siteslogan" class="form-control-plaintext" 
            value="<?php echo $data['siteslogan']; ?>" id="siteslogan" placeholder="Maximum 3 characters">
        </div>
    </div>
    <div class="form-group row">
        <label for="contact_mail" class="col-sm-2 col-form-label">
        @lang('default_setting_page.contact_mail') <span class="text-danger">*</span>
        </label>
        <div class="col-sm-10">
            <input type="email" name="contact_mail" class="form-control-plaintext" 
            value="<?php echo $data['contact_mail']; ?>"
            id="contact_mail" placeholder="Maximum 50 characters">
        </div>
    </div>
    <div class="form-group row">
        <label for="contact_admin" class="col-sm-2 col-form-label">
        @lang('default_setting_page.language') <span class="text-danger">*</span>
        </label>
        <div class="col-sm-10">
            <select class="form-control-plaintext"name="lang">
                <option <?php echo $data['lang'] && $data['lang'] == "en" ? 'selected' : ''; ?> value="en">English</option>
                <option <?php echo $data['lang'] && $data['lang'] == "vi" ? 'selected' : ''; ?> value="vi">Viet Nam</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="save" class="col-sm-2 col-form-label">
            
        </label>
        <div class="col-sm-10">
            <button class="btn btn-primary">@lang('default_setting_page.save_change')</button>
        </div>
    </div>
    @csrf
</form>
</div>
@endsection