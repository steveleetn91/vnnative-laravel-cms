@extends('admin.layouts.v1')

@section('content')
    @section('helperContent')
        Make a dashboard by your style
    @endsection
    <!-- section title --> 
    @section('title_page')
    @lang('general.title_dashboard_page')
    @endsection 
    <!-- sub title --> 
    @section('sub_title_page')
    @lang('general.sub_title_dashboard_page')
    @endsection 
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
@endsection
