<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ویرایش خبر فرهنگی</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h4>ویرایش خبر فرهنگی</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('Culturalnews.update', ['Culturalnews' => $Culturalnews->id]) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method("PUT")

          <div class="mb-3">
            <label for="title" class="form-label text-white">عنوان</label>
            <input type="text" value="{{ old('title', $Culturalnews->title) }}" class="form-control" id="title" name="title" readonly>
            <input type="hidden" name="title" value="{{ $Culturalnews->title }}">
          </div>

          <div class="mb-3">
            <label for="body" class="form-label text-white">متن خبر</label>
            <textarea class="form-control" id="body" name="body" rows="4" readonly>{{ old('body', $Culturalnews->body) }}</textarea>
            <input type="hidden" name="body" value="{{ $Culturalnews->body }}">
          </div>

          <div class="mb-3">
            <label class="form-label text-white">تصویر</label>
            @if($Culturalnews->image)
              <img src="{{ asset('storage/' . $Culturalnews->image) }}" alt="تصویر" class="img-fluid mt-2">
            @endif
          </div>

          <div class="mb-3">
            <label class="form-label text-white">ویدیو</label>
            @if($Culturalnews->movie)
              <video class="mt-2" width="100%" controls>
                <source src="{{ asset('storage/' . $Culturalnews->movie) }}" type="video/mp4">
                مرورگر شما از تگ ویدیو پشتیبانی نمی‌کند.
              </video>
            @endif
          </div>

          <a href="{{ route('Culturalnews.index') }}" class="btn btn-warning w-100">بازگشت به صفحه مدیریت</a>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
