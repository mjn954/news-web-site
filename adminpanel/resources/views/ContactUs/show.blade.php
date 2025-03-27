<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>📩 نمایش پیام</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <style>
    body {
      background: #212529;
      animation: fadeIn 1.5s ease-in-out;
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease-in-out;
    }
    .card:hover {
      transform: scale(1.02);
    }
    .card-header {
      background-color: #444444;
      color: #ffd700;
      font-size: 1.5rem;
      font-weight: 600;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      animation: fadeInDown 1s;
    }
    .card-body {
      background-color: #212529;
      color: #ffffff;
      border-bottom-left-radius: 12px;
      border-bottom-right-radius: 12px;
    }
    .btn {
      border-radius: 25px;
      padding: 10px 20px;
      font-size: 1rem;
      text-transform: uppercase;
      transition: all 0.3s ease;
    }
    .btn:hover {
      transform: translateY(-2px);
    }
    .btn-info {
      background-color: #17a2b8;
    }
    .btn-info:hover {
      background-color: #138496;
    }
    .btn-warning {
      background-color: #ffc107;
    }
    .btn-warning:hover {
      background-color: #e0a800;
    }
    .btn-danger {
      background-color: #dc3545;
    }
    .btn-danger:hover {
      background-color: #c82333;
    }
    .news-video, .news-image {
      display: block;
      max-width: 100%;
      border-radius: 8px;
      margin: 10px auto;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      animation: zoomIn 1s;
    }
  </style>
</head>
<body>
  <div class="container mt-5 wow fadeInUp">
    <div class="card">
      <div class="card-header text-white">
        <h3>📢 {{ $Contactus->title }}</h3>
      </div>
      <div class="card-body">
        <p class="wow fadeInLeft"><strong>👤 نام ارسال‌کننده:</strong> {{ $Contactus->name }}</p>
        <p class="wow fadeInRight">📝 {{ $Contactus->body }}</p>

        @if(!empty($Contactus->image))
          <img src="{{ asset('storage/' . $Contactus->image) }}" alt="تصویر" class="news-image wow zoomIn">
        @endif

        @if(!empty($Contactus->movie))
          <video class="news-video wow fadeIn" controls>
            <source src="{{ asset('storage/' . $Contactus->movie) }}" type="video/mp4">
          </video>
        @endif
      </div>
      <div class="card-footer text-center wow fadeInUp">
        <a href="{{ route('ContactUs.index') }}" class="btn btn-info text-white">🔙 بازگشت</a>
      </div>
    </div>
  </div>

  <script>
    new WOW().init();
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
