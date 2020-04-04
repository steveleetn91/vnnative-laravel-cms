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
        <form method="POST" action="<?php echo route('SaveCreatePost'); ?>">
            <div class="form-group row">
                <label for="post-tile" class="col-sm-2 col-form-label">
                    Post title <span class="text-danger">*</span>
                </label>
                <div class="col-sm-10">
                <input type="text" name="title" class="form-control-plaintext" id="post-tile" placeholder="Maximum 50 characters">
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">Content<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="editor" name="content" row="10"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="content-seo" class="col-sm-2 col-form-label">Content Seo <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <textarea class="form-control-plaintext" id="content-seo" name="content-seo" maxLength="30" placeholder="maximum 30 charaters"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="posthumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                <div class="col-sm-10">
                    
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
                Open Media
                </button>

                <div id="review_thumb"></div>
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
                                    <input type="hidden" id="imgField" data-mappingId="review_thumb" name="thumbnail"/>
                                    <input type="hidden" id="imgReviewBox" value="review_thumb"/>
                                </div>
                            </div>
                        </div>
                    </div>
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