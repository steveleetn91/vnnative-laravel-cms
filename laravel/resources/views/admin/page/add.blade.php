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
                <label for="content" class="col-sm-2 col-form-label">@lang('form.content')<span class="text-danger">*</span></label>
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
                <label for="content-seo" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button class="btn btn-primary">@lang('form.save')</button>
                </div>
            </div>
            @csrf
        </form>
    </div>
    <div class="js-action-form">
        <script src="{{ asset('js/app.add.post.js') }}" defer></script>
    </div>
@endsection