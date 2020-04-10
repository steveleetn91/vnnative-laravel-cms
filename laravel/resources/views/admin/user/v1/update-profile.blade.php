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
@lang('general.title_list_user_profile')
@endsection 
<!-- sub title --> 
@section('sub_title_page')
@lang('general.sub_title_list_user_profile')
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
        <form method="POST" action="<?php echo route('SaveUpdateUserProfile'); ?>">
            <!-- email --> 
            <div class="form-group row">
                <label for="user-email" class="col-sm-2 col-form-label">
                    @lang('form.user_email') <span class="text-danger">*</span>
                </label>
                <div class="col-sm-10">
                <input type="text" name="email" value="<?php echo $data->email; ?>"
                    class="form-control-plaintext" id="user-email" placeholder="">
                </div>
            </div>
            <!-- name --> 
            <div class="form-group row">
                <label for="user-name" class="col-sm-2 col-form-label" name="name">
                    @lang('form.user_name') <span class="text-danger">*</span>
                </label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="<?php echo $data->name; ?>"
                    class="form-control-plaintext" id="user-name" placeholder="">
                </div>
            </div>
            <!-- avatar --> 
            <div class="form-group row">
                <label for="posthumbnail" class="col-sm-2 col-form-label">@lang('form.user_avatar')</label>
                <div class="col-sm-10">
                    
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
                Open Media
                </button>

                <div id="review_thumb">
                    <img src="<?php echo $data->avatar; ?>"/>
                </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width: 900px!important;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Your library</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    
                                <iframe  style="width:100%;height:500px" frameborder="0"
                                    src="<?php echo asset('responsive_filemanager/filemanager/dialog.php?field_id=imgField&lang=en_EN&akey=myPrivateKey'); ?>">
                                </iframe>
                                    <input type="hidden" id="imgField" data-mappingId="review_thumb" name="avatar" value="<?php echo $data->avatar; ?>"/>
                                    <input type="hidden" id="imgReviewBox" value="review_thumb"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
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