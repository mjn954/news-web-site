<!-- resources/views/political/show.blade.php -->
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $culturalnews->title }}</title>

    <!-- لینک به Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- لینک به فایل CSS اختصاصی -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="header">
            <h1>{{ $culturalnews->title }}</h1>

            <!-- بررسی اینکه تاریخ انتشار وجود دارد یا نه -->
            <p>تاریخ انتشار:
                @if($culturalnews->created_at)
                    {{ $culturalnews->created_at->format('d F Y') }}
                @else
                    تاریخ انتشار نامشخص
                @endif
            </p>
        </div>

        <div class="news-container mt-4">
            <p>{{ $culturalnews->body }}</p>

            <!-- بررسی تصویر و نمایش آن -->
            <img src="{{ $culturalnews->image ? asset('storage/' . $culturalnews->image) : 'https://via.placeholder.com/600x400.png?text=No+Image' }}" alt="News Image" class="img-fluid"/>

            <!-- بررسی و نمایش ویدئو -->
            @if($culturalnews->movie)
                <video controls>
                    <source src="{{ asset('storage/' . $culturalnews->movie) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                <p>ویدئو موجود نیست.</p>
            @endif
        </div>

        <!-- دکمه برگشت -->

        <a href="{{ url()->previous() }}" class="btn btn-gold">بازگشت به صفحه قبل</a>
    </div>

    <footer class="footer mt-5">
        <p>&copy; 2025 اخبار سایت - تمام حقوق محفوظ است.</p>
    </footer>

    <!-- اسکریپت‌ها -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/pageone.js') }}"></script>
</body>
</html>
