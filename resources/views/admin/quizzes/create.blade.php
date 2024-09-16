@extends('admin.layouts.app')

@push('styles_top')
    <link rel="stylesheet" href="{{ asset('assets/default/vendors/sweetalert2/dist/sweetalert2.min.css')}}">
    <link href="{{ asset('assets/default/vendors/sortable/jquery-ui.min.css')}}"/>
@endpush

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>{{ $pageTitle }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">{{ $pageTitle }}</div>
            </div>
        </div>
        @if(count($errors) > 0 )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="p-0 m-0" style="list-style: none;">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.quizzes.create_quiz_form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts_bottom')
    <script src="{{ asset('assets/default/vendors/feather-icons/dist/feather.min.js')}}"></script>
    <script src="{{ asset('assets/default/vendors/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('assets/default/vendors/sortable/jquery-ui.min.js')}}"></script>

    <script>
        var saveSuccessLang = '{{ trans('webinars.success_store') }}';
    </script>

    <script src="{{ asset('assets/default/js/admin/quiz.min.js')}}"></script>
@endpush
