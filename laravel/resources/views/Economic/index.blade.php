{{-- resources/views/Political/Political.blade.php --}}

@php
    $sliders = \App\Models\Economic::all();

@endphp

<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>وب‌سایت خبری لوکس/اقتصادی</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    {{-- Header --}}
    @include('layout.header')

    {{-- Navigation --}}
    @include('layout.navigation')

    {{-- News Slider --}}
    <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($sliders as $key => $slider)
                @php
                    $imagePath = imageUrl($slider->image);
                @endphp

                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ $imagePath }}" class="d-block w-100" alt="{{ $slider->title }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slider->title }}</h5>
                        <p>{{ $slider->body }}</p>
                        @if($slider->link_adress)
                            <a href="{{ $slider->link_adress }}" class="btn btn-warning">
                                {{ $slider->link_title ?? 'مشاهده بیشتر' }}
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">قبلی</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">بعدی</span>
        </button>
    </div>

    {{-- News List --}}
    @php
    $Economic = \App\Models\Economicnews::paginate(4);
    @endphp
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2 class="text-gold mb-4">آخرین اخبار</h2>

                @foreach($Economic as $Economicnews)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $Economicnews->title }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit(strip_tags($Economicnews->body), 150, '...') }}</p>
                            <a href="{{ route('Economic.show', $Economicnews->id) }}" class="btn btn-success">ادامه مطلب</a>

                        </div>
                    </div>
                @endforeach

                {{-- Pagination --}}
                <div class="custom-pagination mt-4">
                    {{ $Economic->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('layout.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/pageone.js') }}"></script>

</body>

</html>
