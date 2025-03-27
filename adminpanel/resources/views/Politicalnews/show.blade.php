<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ویرایش خبر سیاسی</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>ویرایش خبر سیاسی</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('Politicalnews.update', ['politicalnews' => $politicalnews->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <!-- عنوان خبر -->
                    <div class="mb-3">
                        <label for="title" class="form-label">عنوان</label>
                        <input type="text" value="{{ old('title', $politicalnews->title) }}" class="form-control" id="title" name="title" readonly>
                        <input type="hidden" name="title" value="{{ $politicalnews->title }}">
                    </div>

                    <!-- متن خبر -->
                    <div class="mb-3">
                        <label for="body" class="form-label">متن خبر</label>
                        <textarea class="form-control" id="body" name="body" rows="4" readonly>{{ old('body', $politicalnews->body) }}</textarea>
                        <input type="hidden" name="body" value="{{ $politicalnews->body }}">
                    </div>

                    <!-- تصویر خبر -->
                    <div class="mb-3">
                        <label for="image" class="form-label">تصویر</label>
                        @if($politicalnews->image)
                            <img id="imagePreview" src="{{ asset('storage/' . $politicalnews->image) }}" alt="تصویر انتخاب شده" class="img-fluid mt-2">
                        @endif
                    </div>

                    <!-- ویدیو خبر -->
                    <div class="mb-3">
                        <label for="movie" class="form-label">ویدیو</label>
                        @if($politicalnews->movie)
                            <video class="mt-2" width="100%" controls>
                                <source src="{{ asset('storage/' . $politicalnews->movie) }}" type="video/mp4">
                                مرورگر شما از تگ ویدیو پشتیبانی نمی‌کند.
                            </video>
                        @endif
                    </div>

                    <!-- دکمه بازگشت به صفحه مدیریت -->
                    <a href="{{ route("Politicalnews.index") }}" class="btn btn-warning w-100">بازگشت به صفحه مدیریت</a>
                </form>
            </div>
        </div>
    </div>

    <!-- بارگذاری فایل‌های JS برای Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>
