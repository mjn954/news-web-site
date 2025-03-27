<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>پنل مدیریت</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar text-white min-vh-100">
        <div class="position-sticky">
          <a href="{{ route('dashbord') }}" class="text-white text-decoration-none">
            <h4 class="my-4">پنل مدیریت</h4>
          </a>
          <ul class="nav flex-column">
            @include('layout.sliderslink')
            @include('layout.news')
            @include('layout.contactus')
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container mt-4">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-white">مدیریت اسلایدرهای فرهنگی</h2>
            <a href="{{ route('Culturalslider.create') }}" class="btn btn-primary">ایجاد اسلایدر</a>
          </div>

          <!-- Message Alerts -->
          @foreach(['success', 'info', 'warning', 'danger'] as $msg)
            @if(session()->has($msg))
              <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                {{ session($msg) }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            @endif
          @endforeach

          <!-- Display All Cultural Sliders -->
          @foreach($Culturals as $Cultural) <!-- اصلاح نام متغیر از $Cultural به $Culturals -->
            <div class="card mb-3">
              <div class="card-header">
                <h4>{{ $Cultural->title }}</h4>
              </div>
              <div class="card-body">
                <p>{{ $Cultural->body }}</p> <!-- اصلاح از $Culturals به $Cultural -->

                <!-- Display Image -->
                @if($Cultural->image) <!-- اصلاح نام متغیر از $Culturals به $Cultural -->
                  <img src="{{ asset('storage/' . $Cultural->image) }}" alt="تصویر اسلایدر" class="img-fluid mb-3" style="max-width: 150px; height: auto;">
                @endif

                <!-- Action Buttons -->
                <div class="d-flex gap-2">
                  <a href="{{ route('Culturalslider.show', ['Cultural' => $Cultural->id]) }}" class="btn btn-info">نمایش</a>
                  <a href="{{ route('Culturalslider.edit', ['Cultural' => $Cultural->id]) }}" class="btn btn-warning">ویرایش</a>
                  <form action="{{ route('Culturalslider.destroy', ['Cultural' => $Cultural->id]) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
