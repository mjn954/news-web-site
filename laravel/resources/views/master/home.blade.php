@php
    $sliders = App\Models\slider::all();
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
                    // ایجاد مسیر تصویر با توجه به SLIDER_IMAGES_PATH در فایل .env
                    $imagePath = $slider->image
                        ? asset(env('SLIDER_IMAGES_PATH') . $slider->image)  // استفاده از SLIDER_IMAGES_PATH از .env
                        : asset('images/default.jpg'); // تصویر پیش‌فرض در صورت عدم وجود تصویر
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

{{-- end slider --}}
    <!-- Latest News Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2>آخرین اخبار</h2>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">تحولات جدید در بازار ارز؛ روند صعودی یا نزولی؟</h5>
                        <p class="card-text">توضیحات کوتاه درباره این موضوع...</p>
                        <a href="#" class="btn btn-gold">ادامه مطلب</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">چه اتفاقی در نشست سیاسی اخیر رخ داد؟</h5>
                        <p class="card-text">توضیحات کوتاه درباره نشست سیاسی...</p>
                        <a href="#" class="btn btn-gold">ادامه مطلب</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">گزارش ویژه از پیشرفت‌های تکنولوژی در سال ۲۰۲۵</h5>
                        <p class="card-text">توضیحات کوتاه درباره پیشرفت‌های تکنولوژی...</p>
                        <a href="#" class="btn btn-gold">ادامه مطلب</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">مهمترین تغییرات در سیاست‌های اقتصادی کشور</h5>
                        <p class="card-text">توضیحات کوتاه درباره سیاست‌های اقتصادی...</p>
                        <a href="#" class="btn btn-gold">ادامه مطلب</a>
                    </div>
                </div>
            </div>
            {{-- newsgroup --}}
         @include('layout.newsgroup')

    <!-- Footer Section -->
   @include('layout.footer')
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/pageone.js"></script>
</body>

</html>
