<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ایجاد اسلایدر ورزشی</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h4>ایجاد اسلایدر ورزشی</h4>
      </div>
      <div class="card-body">
        <form action="{{ route('Sportsslider.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="mb-3">
            <label for="image" class="form-label text-white">تصویر اسلایدر</label>
            <input type="file" class="form-control" id="image" name="image" required>
            @error('image')<div class="text-danger">{{$message}}</div>@enderror

            <img id="imagePreview" src="" alt="تصویر انتخاب شده" style="display: none; margin-top: 10px; max-width: 100%; height: auto;">
          </div>

          <div class="mb-3">
            <label for="title" class="form-label text-white">عنوان اسلایدر</label>
            <input type="text" value="{{ old('title') }}" class="form-control" id="title" name="title" required>
            @error('title')<div class="text-danger">{{$message}}</div>@enderror
          </div>

          <div class="mb-3">
            <label for="link_title" class="form-label text-white">عنوان لینک</label>
            <input value="{{ old('link_title') }}" type="text" class="form-control" id="link_title" name="link_title" required>
            @error('link_title')<div class="text-danger">{{$message}}</div>@enderror
          </div>

          <div class="mb-3">
            <label for="link_adress" class="form-label text-white">آدرس لینک</label>
            <input type="url" value="{{ old('link_adress') }}" class="form-control" id="link_adress" name="link_adress" required>
            @error('link_adress')<div class="text-danger">{{$message}}</div>@enderror
          </div>

          <div class="mb-3">
            <label for="body" class="form-label text-white">متن اسلایدر</label>
            <textarea class="form-control" id="body" name="body" rows="4" required>{{ old('body') }}</textarea>
            @error('body')<div class="text-danger">{{$message}}</div>@enderror
          </div>

          <button type="submit" class="btn btn-warning w-100">ذخیره اسلایدر</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
