<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ویرایش خبر ورزشی</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>ویرایش خبر ورزشی</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('Sportsnews.update', $sportsnews->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <!-- عنوان خبر (فقط خواندنی) -->
                    <div class="mb-3">
                        <label for="title" class="form-label">عنوان</label>
                        <input type="text" value="{{ old('title', $sportsnews->title) }}" class="form-control" id="title" name="title" readonly>
                        <input type="hidden" name="title" value="{{ $sportsnews->title }}">
                    </div>

                    <!-- متن خبر (فقط خواندنی) -->
                    <div class="mb-3">
                        <label for="body" class="form-label">متن خبر</label>
                        <textarea class="form-control" id="body" name="body" rows="4" readonly>{{ old('body', $sportsnews->body) }}</textarea>
                        <input type="hidden" name="body" value="{{ $sportsnews->body }}">
                    </div>

                    <!-- تصویر خبر (فقط نمایش) -->
                    <div class="mb-3">
                        <label for="image" class="form-label">تصویر</label>
                        @if($sportsnews->image)
                            <img id="imagePreview" src="{{ asset('storage/' . $sportsnews->image) }}" alt="تصویر انتخاب شده" class="img-fluid mt-2">
                        @endif
                    </div>

                    <!-- ویدیو خبر (فقط نمایش) -->
                    <div class="mb-3">
                        <label for="movie" class="form-label">ویدیو</label>
                        @if($sportsnews->movie)
                            <video class="mt-2" width="100%" controls>
                                <source src="{{ asset('storage/' . $sportsnews->movie) }}" type="video/mp4">
                                مرورگر شما از تگ ویدیو پشتیبانی نمی‌کند.
                            </video>
                        @endif
                    </div>

                    <!-- دکمه بازگشت به صفحه مدیریت -->
                    <a href="{{ route("Sportsnews.index") }}" class="btn btn-warning w-100">بازگشت به صفحه مدیریت</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
