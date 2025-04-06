@php
    $sliders = App\Models\Political::all(); // گرفتن همه اسلاید‌ها از مدل Political
@endphp

<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>وب‌سایت خبری لوکس</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <!-- Header Section -->
    @include('layout.header')

    <!-- Navigation Bar -->
    @include('layout.navigation')

    <!-- News slider -->
    <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($sliders as $key => $slider)
                @php
                    // استفاده از تابع imageUrl برای ایجاد مسیر تصویر
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

    @php
        $homenews = App\Models\Politicalnews::paginate(4); // دریافت اخبار از مدل Politicalnews
    @endphp

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2 class="text-gold mb-4">آخرین اخبار</h2>

                @foreach($homenews as $topnews)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $topnews->title }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($topnews->body), 150, '...') }}</p>
                            <a href="{{ route('news.show', $topnews->id) }}" class="btn btn-success">ادامه مطلب</a>
                        </div>
                    </div>
                @endforeach

                <div class="custom-pagination mt-4">
                    @if ($homenews->hasPages())
                        <ul class="pagination pagination-modern justify-content-center">
                            <li class="page-item {{ $homenews->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $homenews->previousPageUrl() }}" tabindex="-1">‹</a>
                            </li>
                            @foreach ($homenews->getUrlRange(1, $homenews->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $homenews->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                            <li class="page-item {{ $homenews->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $homenews->nextPageUrl() }}">›</a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    @include('layout.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/pageone.js"></script>
</body>

</html>
