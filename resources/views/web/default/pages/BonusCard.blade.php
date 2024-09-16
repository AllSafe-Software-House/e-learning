@extends(getTemplate().'.layouts.app')

@push('styles_top')
    <link rel="stylesheet" href="/assets/default/vendors/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/default/vendors/select2/select2.min.css">
    <style>
        .card {
            transition: transform 0.3s ease;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        .card-img-top {
            max-height: 200px;
            object-fit: contain;
            padding:10px;
            border-bottom: 1px solid #eee;
        }

        .card-body {
            padding: 15px;
            display:flex;
            flex-direction:column;
            align-items: center;
            justify-content:center
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            padding:10px;
            margin-bottom: 10px;
            text-align:  center;
            color:#1f3b64;
        }
        .card-text {
            margin-bottom: 10px;
            color:#1f3b64;
        }
        .card-text strong{
            color:#1f3b64;
            font-size: 15px;
        }
        .discount-badge {
            background-color: #43d477;
            color: #1f3b64;
            background-image: url(/assets/default/img/footer/pattern.png);
            border-radius: 5px;
            padding: 10px;
            display: inline-block;
            width: -webkit-fill-available;
            text-align: center;
        }
    </style>
@endpush

@section('content')

<div class="container mt-4">
    <div class="row">
        @for ($i = 0; $i < 7; $i++)
            <div class="col-md-3 mb-4">
                <div class="card d-flex align-items-center justify-content-center">
                    <img src="/assets/default/img/card/online-learning.png" class="card-img-top" alt="Logo {{ $i + 1 }}">
                    <div class="card-body">
                        <h5 class="card-title">Business Name {{ $i + 1 }}</h5>
                        <p class="card-text"><strong>Phone:</strong> +123456789</p>
                        <p class="card-text"><strong>Location:</strong> Some Location</p>
                        <p class="discount-badge">
                        <strong>Discount:  10%</strong> 
                        </p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection

@push('scripts_bottom')
    <script src="/assets/vendors/leaflet/leaflet.min.js"></script>
    <script>
        var leafletApiPath = '{{ getLeafletApiPath() }}';
    </script>
    <script src="/assets/default/js/parts/contact.min.js"></script>
@endpush
