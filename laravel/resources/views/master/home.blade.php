
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>وب‌سایت خبری لوکس</title>

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
            <div class="carousel-item active">
                <img src="images/prime.jpg" class="d-block w-100" alt="خبر اول">
                <div class="carousel-caption d-none d-md-block">
                    <h5>تحولات جدید در بازار ارز؛ روند صعودی یا نزولی؟</h5>
                    <p>توضیحات کوتاه درباره این خبر...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/prime.jpg" class="d-block w-100" alt="خبر دوم">
                <div class="carousel-caption d-none d-md-block">
                    <h5>چه اتفاقی در نشست سیاسی اخیر رخ داد؟</h5>
                    <p>توضیحات کوتاه درباره نشست سیاسی...</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/prime.jpg" class="d-block w-100" alt="خبر سوم">
                <div class="carousel-caption d-none d-md-block">
                    <h5>گزارش ویژه از پیشرفت‌های تکنولوژی در سال ۲۰۲۵</h5>
                    <p>توضیحات کوتاه درباره پیشرفت‌های تکنولوژی...</p>
                </div>
            </div>
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

         @include('layout.newsgroup')

    <!-- Footer Section -->
    <footer class="footer">
        <p>تمامی حقوق محفوظ است &copy; 2025 | طراحی شده با ❤️ توسط تیم خبرنامه لوکس</p>
    </footer>

    <script src="js/pageone.js"></script>
</body>

</html>
