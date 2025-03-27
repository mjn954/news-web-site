<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>پنل مدیریت</title>

  <!-- اضافه کردن لینک به فایل‌های استایل -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>
<body>

  <!-- Wrapper اصلی صفحه -->
  <div class="container-fluid">
    <div class="row">

      <!-- Sidebar (نوار کناری) -->
      <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar text-white min-vh-100">
        <div class="position-sticky">
          <!-- لینک به داشبورد -->
          <a href="{{ route('dashbord') }}">
            <h4 class="my-4">پنل مدیریت</h4>
          </a>

          <!-- منو -->
          <ul class="nav flex-column">
            <!-- اسلایدر‌ها -->
            @include('layout.sliderslink')

            <!-- اخبار -->
            @include('layout.news')

            <!-- تماس با ما -->
            @include('layout.contactus')
          </ul>
        </div>
      </nav>

      <!-- Main content (محتوای اصلی) -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="mt-4">
          <h1>خوش آمدید به پنل مدیریت</h1>
          <p>لطفاً یکی از گزینه‌های منو را برای ادامه انتخاب کنید.</p>
        </div>
      </main>
    </div>
  </div>

  <!-- لینک به فایل جاوا اسکریپت Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
