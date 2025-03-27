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
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container mt-4">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-white">مدیریت اسلایدرهای سیاسی</h2>
            <a href="{{ route('Politicalslider.create') }}" class="btn btn-primary">ایجاد اسلایدر</a>
          </div>

          @foreach(['success', 'info', 'warning', 'danger'] as $msg)
            @if(session($msg))
              <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                {{ session($msg) }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            @endif
          @endforeach

          @foreach($Politicals as $Political)
          <div class="card mb-3">
            <div class="card-header">
              <h4>{{ $Political->title }}</h4>
            </div>
            <div class="card-body">
              <p>{{ $Political->body }}</p>
              @if($Political->image)
              <img src="{{ asset('storage/' . $Political->image) }}" alt="تصویر اسلایدر" style="width: 150px; height: auto; margin-bottom: 10px;">
              @endif
              <div class="d-flex gap-2">
                <a href="{{ route('Politicalslider.show', ['Political' => $Political->id]) }}" class="btn btn-info">نمایش</a>
                <a href="{{ route('Politicalslider.edit', ['Political' => $Political->id]) }}" class="btn btn-warning">ویرایش</a>
                <form action="{{ route('Politicalslider.destroy', ['Political' => $Political->id]) }}" method="POST">
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
