@extends('admin.layouts.v1')
<!-- section title --> 
@section('title_page')
@lang('general.title_media_page')
@endsection 
<!-- sub title --> 
@section('sub_title_page')
@lang('general.sub_title_media_page')
@endsection 
@section('content')
<div class="container">
<iframe src="/responsive_filemanager/filemanager/dialog.php?akey=myPrivateKey" style="width:100%;height:500px"></iframe>
</div>
@endsection