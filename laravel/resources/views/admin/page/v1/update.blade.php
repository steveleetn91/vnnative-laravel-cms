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
@lang('general.title_update_page_page')
@endsection 
<!-- sub title --> 
@section('sub_title_page')
@lang('general.sub_title_update_page_page')
@endsection 
        <form method="POST" action="<?php echo route('SaveUpdatePage',[
            "page_id" => $data->id
        ]); ?>">
            <div class="form-group row">
                <label for="post-tile" class="col-sm-2 col-form-label">
                @lang('form.page_title') <span class="text-danger">*</span>
                </label>
                <div class="col-sm-10">
                <input type="text" name="title" value="<?php echo $data->title; ?>" maxLength="150" 
                class="form-control-plaintext" id="post-tile" placeholder="@lang('form.title_placeholder')">
                </div>
            </div>
            <div class="form-group row">
                <label for="post-tile" class="col-sm-2 col-form-label">
                    @lang('form.status') <span class="text-danger">*</span>
                </label>
                <div class="col-sm-10">
                <select class="form-control-plaintext" name="status">
                <option <?php echo $data->status === 'pendding' ? 'selected' : ''; ?> value="pendding">Pendding</option>
                    <option <?php echo $data->status === 'close' ? 'selected' : ''; ?> value="close">Close</option>
                    <option <?php echo $data->status === 'public' ? 'selected' : ''; ?> value="public">Public</option>
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="post-tile" class="col-sm-2 col-form-label">
                    @lang('form.template') <span class="text-danger">*</span>
                </label>
                <div class="col-sm-10">
                    <select class="form-control-plaintext" name="template">
                        <option <?php echo $data->template === "default" ? 'selected' : ''; ?> value="default">Default</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">@lang('form.content')<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="editor" name="content" row="10">
                        <?php echo $data->content; ?>
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="content-seo" class="col-sm-2 col-form-label">@lang('form.content') Seo <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <textarea class="form-control-plaintext" id="content-seo" 
                    name="content-seo" maxLength="250" placeholder="@lang('form.content_seo_placeholder')"><?php echo $data->content_seo; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="content-seo" class="col-sm-2 col-form-label">@lang('form.tags') <span class="text-danger">*</span></label>
                <div class="col-sm-10 form-tags">
                    <input value="<?php echo $data->tags; ?>" type="text" name="tags" 
                    class="form-control-plaintext" maxLength="75" required placeholder="@lang('form.tags_placeholder')"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="content-seo" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button class="btn btn-primary">@lang('form.update')</button>
                </div>
            </div>
            @csrf
        </form>
    </div>
    <div class="js-action-form">
        <script src="{{ asset('js/app.add.post.js') }}" defer></script>
    </div>
@endsection