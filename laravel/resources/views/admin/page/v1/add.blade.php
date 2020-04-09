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
    @lang('general.title_add_page_page')
    @endsection 
    <!-- sub title --> 
    @section('sub_title_page')
    @lang('general.sub_title_add_page_page')
    @endsection 
    <!-- content --> 
        <form method="POST" action="<?php echo route('SaveCreatePage'); ?>">
            <div class="form-group row">
                <label for="post-tile" class="col-sm-2 col-form-label">
                @lang('form.page_title') <span class="text-danger">*</span>
                </label>
                <div class="col-sm-10">
                <input type="text" name="title" maxLength="150" class="form-control-plaintext" id="post-tile" placeholder="@lang('form.title_placeholder')">
                </div>
            </div>
            <div class="form-group row">
                <label for="page_status" class="col-sm-2 col-form-label">
                    @lang('form.status') <span class="text-danger">*</span>
                </label>
                <div class="col-sm-10">
                    <select class="form-control-plaintext" name="status" id="page_status">
                        <option value="pending">Pendding</option>
                        <option value="close">Close</option>
                        <option value="public">Public</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="page_template" class="col-sm-2 col-form-label">
                    @lang('form.template') <span class="text-danger">*</span>
                </label>
                <div class="col-sm-10">
                    <select class="form-control-plaintext" name="template" id="page_template">
                        <option value="default">Default</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="editor" class="col-sm-2 col-form-label">@lang('form.content')<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="editor" name="content" row="10"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="content-seo" class="col-sm-2 col-form-label">@lang('form.content') Seo <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <textarea class="form-control-plaintext" maxLength="250" id="content-seo" name="content-seo" maxLength="250" placeholder="@lang('form.content_seo_placeholder')"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="page_tags" class="col-sm-2 col-form-label">@lang('form.tags') <span class="text-danger">*</span></label>
                <div class="col-sm-10 form-tags">
                    <input value="" type="text" id="page_tags" name="tags" class="form-control-plaintext" 
                    maxLength="75" required placeholder="@lang('form.tags_placeholder')" />
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