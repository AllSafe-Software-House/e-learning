@extends('admin.layouts.app')

@push('libraries_top')
@endpush


<style>
    .url-btn {
        display: flex;
        flex-direction: column;
        margin-left: auto;
        align-items: center;
        gap: 20px
    }

    .add-bns-btn {
        background-color: #6777ef;
        color: white;
        border: none;
        border-radius: 15px;
        padding: 10px;
        font-weight: bold
    }

    #popup-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    #popup-content {
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        position: relative;
        max-width: 400px;
        width: 100%;
        margin: auto;
        /* Added to center horizontally */
        top: 20%;
        left: 10%;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    /* Responsive Form Styling */
    form {
        display: grid;
        gap: 15px;
    }

    label {
        font-weight: bold;
    }

    input,
    select {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #4caf50;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ trans('update.Bonus_card') }}</h1>
            <div class="url-btn">
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a
                            href="{{ getAdminPanelUrl() }}">{{ trans('admin/main.dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ trans('update.Bonus_card') }}</div>
                </div>
                <div>
                    <button class="add-bns-btn">{{ trans('update.add_bonus_card') }}</button>
                </div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped font-14">
                                    <tr>
                                        <th>{{ trans('admin/main.logo') }}</th>
                                        <th class="text-left">{{ trans('admin/main.name') }}</th>
                                        <th class="text-left">{{ trans('admin/main.phone') }}</th>
                                        <th>{{ trans('update.location') }}</th>
                                        <th>{{ trans('admin/main.discount') }}</th>
                                        <th>{{ trans('admin/main.created_at') }}</th>
                                    </tr>
                                    @foreach ($bonus_cards as $bonus_card)

                                        <tr>
                                            <td>
                                                <img src="{{ $bonus_card->logo }}" width="50" alt="">
                                            </td>
                                            <td class="text-left">{{ $bonus_card->name }}</td>
                                            <td>{{ $bonus_card->phone }}</td>
                                            <td>{{ $bonus_card->location }}</td>
                                            <td>{{ $bonus_card->discount }}</td>
                                            <td>{{ $bonus_card->created_at->format('Y m d h:i a') }}</td>
                                            {{-- <td>
                                                @can('admin_bonus_cards_edit')
                                                    <a href="{{ getAdminPanelUrl() }}/bonus_cards/{{ $bonus_card->id }}/edit"
                                                       class="btn-transparent btn-sm text-primary">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('admin_bonus_cards_delete')
                                                    @include('admin.includes.delete_button',['url' => getAdminPanelUrl().'/bonus_cards/'.$bonus_card->id.'/delete', 'deleteConfirmMsg' => trans('update.bonus_card_delete_confirm_msg')])
                                                @endcan
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            {{-- {{ $bonus_cards->appends(request()->input())->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="popup-container">
        <div id="popup-content">
            <span class="close-btn">&times;</span>
            <form id="popup-form" action="{{ getAdminPanelUrl() . '/bonus_card/store' }}" method="POST">
                @csrf
                <div class="form-group mt-15">
                    <label class="input-label">{{ trans('public.logo') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="input-group-text admin-file-manager" data-input="logo"
                                data-preview="holder">
                                <i class="fa fa-upload"></i>
                            </button>
                        </div>
                        <input type="text" name="logo" id="logo"
                            value="{{ old('logo') }}"
                            class="form-control @error('logo')  is-invalid @enderror" />
                        <div class="input-group-append">
                            <button type="button" class="input-group-text admin-file-view" data-input="logo">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                        @error('logo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <label for="name">{{ trans('public.name') }}</label>
                <input type="text" id="name" name="name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="phone">{{ trans('public.phone') }}</label>
                <input type="number" id="phone" name="phone">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="location">{{ trans('public.location') }}</label>
                <input type="text" id="location" name="location">
                @error('location')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <label for="discount">{{ trans('public.discount') }}</label>
                <input type="number" id="discount" name="discount">
                @error('discount')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.add-bns-btn').on('click', function() {
            $('#popup-container').fadeIn();
        });

        $('.close-btn, #popup-container').on('click', function(event) {
            if (event.target === this || $(event.target).hasClass('close-btn')) {
                $('#popup-container').fadeOut();
            }
        });
    });
</script>