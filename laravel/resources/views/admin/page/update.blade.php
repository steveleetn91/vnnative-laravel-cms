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
        <form method="POST" action="<?php echo route('SaveUpdatePage',[
            "page_id" => $data->id
        ]); ?>">
            <div class="form-group row">
                <label for="post-tile" class="col-sm-2 col-form-label">
                    Post title <span class="text-danger">*</span>
                </label>
                <div class="col-sm-10">
                <input type="text" name="title" value="<?php echo $data->title; ?>"
                class="form-control-plaintext" id="post-tile" placeholder="Maximum 50 characters">
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">Content<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="editor" name="content" row="10">
                        <?php echo $data->content; ?>
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="content-seo" class="col-sm-2 col-form-label">Content Seo <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <textarea class="form-control-plaintext" id="content-seo" 
                    name="content-seo" maxLength="30" placeholder="maximum 30 charaters"><?php echo $data->content_seo; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="content-seo" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
            @csrf
        </form>
    </div>
    <div class="js-action-form">
        <script src="{{ asset('js/app.add.post.js') }}" defer></script>
    </div>
@endsection