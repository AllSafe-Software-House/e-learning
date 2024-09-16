@extends('admin.layouts.app')

@push('styles_top')
    <link rel="stylesheet" href="{{ asset('assets/default/vendors/sweetalert2/dist/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/default/vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/summernote/summernote-bs4.min.css')}}">
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $pageTitle  }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ getAdminPanelUrl() }}">{{ trans('admin/main.dashboard') }}</a></div>
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
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="text-danger">{{ trans('update.please_fix_the_error_fields_that_are_specified') }}</div>
                            @endif

                            <form id="productForm" method="post" action="{{ getAdminPanelUrl() }}/store/products/{{ !empty($product) ? $product->id.'/update' : 'store' }}" class="webinar-form">
                                {{ csrf_field() }}

                                @include('admin.store.products.create.basic_information')

                                @if(!empty($product))
                                    @include('admin.store.products.create.extra_information')

                                    @include('admin.store.products.create.image_and_files')

                                    @include('admin.store.products.create.category_and_specification')

                                    <section class="mt-3">
                                        <h2 class="section-title after-line">{{ trans('public.message_to_reviewer') }}</h2>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mt-15">
                                                    <textarea name="message_for_reviewer" rows="10" class="form-control">{{ (!empty($product) and $product->message_for_reviewer) ? $product->message_for_reviewer : old('message_for_reviewer') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                @endif

                                <div class="row">
                                    <div class="col-12">
                                        <input type="hidden" id="productStatusInput" name="status" value="{{ \App\Models\Product::$draft }}">

                                        <button type="button" id="saveAndPublish" class="btn btn-success">{{ !empty($product) ? trans('admin/main.save_and_publish') : trans('admin/main.save_and_continue') }}</button>

                                        @if(!empty($product))
                                            <button type="button" id="saveReject" class="btn btn-warning">{{ trans('public.reject') }}</button>

                                            @include('admin.includes.delete_button',[
                                                    'url' => getAdminPanelUrl().'/store/products/'. $product->id .'/delete',
                                                    'btnText' => trans('public.delete'),
                                                    'hideDefaultClass' => true,
                                                    'btnClass' => 'btn btn-danger'
                                                    ])
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('admin.store.products.create.modals.file_description_modal')
    @include('admin.store.products.create.modals.file_modal')

@endsection

@push('scripts_bottom')
    <script>
        var saveSuccessLang = '{{ trans('webinars.success_store') }}';
        var requestFailedLang = '{{ trans('public.request_failed') }}';
        var maxFourImageCanSelect = '{{ trans('update.max_four_image_can_select') }}';
    </script>

    <script src="{{ asset('assets/default/vendors/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('assets/default/vendors/select2/select2.min.js')}}"></script>
    <script src="{{ asset('assets/default/vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{ asset('assets/vendors/summernote/summernote-bs4.min.js')}}"></script>

    <script src="{{ asset('assets/default/js/admin/new_product.min.js')}}"></script>
@endpush
