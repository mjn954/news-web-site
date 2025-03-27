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
        <h4>ویرایش اسلایدر </h4>
      </div>
      <div class="card-body">

        <form action="{{ route('Culturalslider.update', ['Cultural' => $Cultural->id]) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method("PUT")

          <div class="mb-3">
            <label for="image" class="form-label text-white">تصویر اسلایدر</label>

            <input type="file" class="form-control" id="image" name="image">
            @error('image')<div class="text-danger">{{ $message }}</div>@enderror

            @if($Cultural->image)
              <img id="imagePreview" src="{{ asset('storage/' . $Cultural->image) }}" alt="تصویر انتخاب شده" style="display: block; margin-top: 10px; max-width: 100%; height: auto;">
            @endif
          </div>

          <div class="mb-3">
            <label for="title" class="form-label text-white">عنوان اسلایدر</label>
            <input type="text" value="{{ old('title', $Cultural->title) }}" class="form-control" id="title" name="title" readonly>
            @error('title')<div class="text-danger">{{ $message }}</div>@enderror
          </div>

          <div class="mb-3">
            <label for="link_title" class="form-label text-white">عنوان لینک</label>
            <input type="text" value="{{ old('link_title', $Cultural->link_title) }}" class="form-control" id="link_title" name="link_title" readonly>
            @error('link_title')<div class="text-danger">{{ $message }}</div>@enderror
          </div>

          <div class="mb-3">
            <label for="link_adress" class="form-label text-white">آدرس لینک</label>
            <input type="url" value="{{ old('link_adress', $Cultural->link_adress) }}" class="form-control" id="link_adress" name="link_adress" readonly>
            @error('link_adress')<div class="text-danger">{{ $message }}</div>@enderror
          </div>

          <div class="mb-3">
            <label for="body" class="form-label text-white">متن اسلایدر</label>
            <textarea class="form-control" id="body" name="body" rows="4" readonly>{{ old('body', $Cultural->body) }}</textarea>
            @error('body')<div class="text-danger">{{ $message }}</div>@enderror
          </div>


          <a href="{{ route('Culturalslider.index') }}" class="btn btn-warning w-100">بازگشت به صفحه ی مدیریت</a>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
