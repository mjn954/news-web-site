<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $homenews->title }}</title>

    <!-- لینک به Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- لینک به فایل CSS اختصاصی -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="header">
            <h1>{{ $homenews->title }}</h1>
            <p>تاریخ انتشار: {{ $homenews->created_at->format('d F Y') }}</p>
        </div>

        <div class="news-container mt-4">
            <p>{{ $homenews->body }}</p>

            @if($homenews->image)
                <img src="{{ asset('storage/' . $homenews->image) }}" alt="News Image" class="img-fluid"/>
            @else
                <img src="https://via.placeholder.com/600x400.png?text=No+Image" alt="No Image" class="img-fluid"/>
            @endif

            @if($homenews->movie)
                <video controls>
                    <source src="{{ asset('storage/' . $homenews->movie) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @endif
        </div>

        <a href="{{ route('home') }}" class="btn btn-gold">بازگشت به صفحه اصلی</a>
    </div>

    <footer class="footer mt-5">
        <p>&copy; 2025 اخبار سایت - تمام حقوق محفوظ است.</p>
    </footer>

    <!-- اسکریپت‌ها -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/pageone.js') }}"></script>
</body>
</html>
