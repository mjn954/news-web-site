<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>پنل مدیریت</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
  <style>
    .news-image {
      width: 150px;
      height: auto;
      margin-bottom: 10px;
    }

    .news-video {
      display: block;
      width: 200px;
      margin-top: 10px;
    }
  </style>
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
            <h2 class="text-white">مدیریت اخبار فرهنگی</h2>
            <a href="{{ route('Culturalnews.create') }}" class="btn btn-primary">ایجاد خبر</a>
          </div>

          @foreach(['success', 'info', 'warning', 'danger'] as $msg)
            @if(session($msg))
              <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                {{ session($msg) }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
            @endif
          @endforeach

          @foreach($culturalnews as $CulturalnewS)
          <div class="card mb-3">
            <div class="card-header">
              <h4>{{ $CulturalnewS->title }}</h4>
            </div>
            <div class="card-body">
              <p>{{ $CulturalnewS->body }}</p>

              @if($CulturalnewS->image)
                <img src="{{ asset('storage/' . $CulturalnewS->image) }}" alt="تصویر خبر" class="news-image" >
              @endif

              @if($CulturalnewS->movie)
                <video class="news-video" controls>
                  <source src="{{ asset('storage/' . $CulturalnewS->movie) }}" type="video/mp4">
                </video>
              @endif

              <div class="d-flex gap-2">
                <a href="{{ route('Culturalnews.show', ['Culturalnews' => $CulturalnewS->id]) }}" class="btn btn-info">نمایش</a>
                <a href="{{ route('Culturalnews.edit', ['Culturalnews' => $CulturalnewS->id]) }}" class="btn btn-warning">ویرایش</a>
                <form action="{{ route('Culturalnews.destroy', ['culturalnews' => $CulturalnewS->id]) }}" method="POST" onsubmit="return confirm('آیا مطمئن هستید؟')">
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
