<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ایجاد خبر سیاسی جدید</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h4>ایجاد خبر سیاسی جدید</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('Politicalnews.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
            <label for="image" class="form-label text-white">تصویر خبر</label>
            <input type="file" class="form-control" id="image" name="image" required>
            @error('image')<span class="text-danger">{{ $message }}</span>@enderror
            <img id="imagePreview" src="" style="display: none; margin-top: 10px; max-width: 100%; height: auto;">
          </div>

          <div class="mb-3">
            <label for="title" class="form-label text-white">عنوان خبر</label>
            <input type="text" value="{{ old('title') }}" class="form-control" id="title" name="title" required>
            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
          </div>

          <div class="mb-3">
            <label for="body" class="form-label text-white">متن خبر</label>
            <textarea class="form-control" id="body" name="body" rows="4" required>{{ old('body') }}</textarea>
            @error('body')<span class="text-danger">{{ $message }}</span>@enderror
          </div>

          <div class="mb-3">
            <label for="movie" class="form-label text-white">فیلم (اختیاری)</label>
            <input type="file" class="form-control" id="movie" name="movie">
            @error('movie')<span class="text-danger">{{ $message }}</span>@enderror

            <video id="moviePreview" controls style="display: none; margin-top: 10px; max-width: 100%; height: auto;">
              <source src="" id="movieSource">
              مرورگر شما از ویدیو پشتیبانی نمی‌کند.
            </video>
          </div>

          <button type="submit" class="btn btn-warning w-100">ذخیره خبر</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('image').addEventListener('change', function(e) {
      var file = e.target.files[0];
      var reader = new FileReader();
      reader.onload = function(event) {
        var imagePreview = document.getElementById('imagePreview');
        imagePreview.src = event.target.result;
        imagePreview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    });

    document.getElementById('movie').addEventListener('change', function(e) {
      var file = e.target.files[0];
      var moviePreview = document.getElementById('moviePreview');
      var movieSource = document.getElementById('movieSource');
      if (file) {
        movieSource.src = URL.createObjectURL(file);
        moviePreview.style.display = 'block';
        moviePreview.load();
      } else {
        moviePreview.style.display = 'none';
      }
    });
  </script>
</body>
</html>
