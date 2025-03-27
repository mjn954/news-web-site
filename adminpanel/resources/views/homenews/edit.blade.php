<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ویرایش اسلایدر</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h4>ویرایش اسلایدر</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('homenews.update', ['homenews' => $homenews->id]) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method("PUT")


          <div class="mb-3">
            <label for="title" class="form-label text-white">عنوان</label>
            <input type="text" value="{{ old('title', $homenews->title) }}" class="form-control" id="title" name="title" required>
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
          </div>


          <div class="mb-3">
            <label for="body" class="form-label text-white">متن خبر</label>
            <textarea class="form-control" id="body" name="body" rows="4" required>{{ old('body', $homenews->body) }}</textarea>
            @error('body')<div class="text-danger">{{ $message }}</div>@enderror
          </div>


          <div class="mb-3">
            <label for="image" class="form-label text-white">تصویر</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')<div class="text-danger">{{ $message }}</div>@enderror

            @if($homenews->image)
              <img id="imagePreview" src="{{ asset('storage/' . $homenews->image) }}" alt="تصویر انتخاب شده" class="img-fluid mt-2">
            @endif
          </div>


          <div class="mb-3">
            <label for="movie" class="form-label text-white">ویدیو</label>
            <input type="file" class="form-control" id="movie" name="movie" accept="video/*">
            @error('movie')<div class="text-danger">{{ $message }}</div>@enderror

            @if($homenews->movie)
              <video class="mt-2" width="100%" controls>
                <source src="{{ asset('storage/' . $homenews->movie) }}" type="video/mp4">
                مرورگر شما از تگ ویدیو پشتیبانی نمی‌کند.
              </video>
            @endif
          </div>


          <button type="submit" class="btn btn-warning w-100">ذخیره خبر</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
