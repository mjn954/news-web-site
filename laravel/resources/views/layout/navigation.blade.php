<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">خبرنامه</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">خانه</a>
                </li>

                <!-- Dropdown Menu for اخبار -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="newsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        اخبار
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="newsDropdown">
                        <li><a class="dropdown-item" href="{{ route("Political.index") }}">سیاسی</a></li>
                        <li><a class="dropdown-item" href="{{ route('Economic.index') }}">فرهنگی</a></li>
                        <li><a class="dropdown-item" href="{{ route('Sport.index') }}">ورزشی</a></li>
                        <li><a class="dropdown-item" href="{{ route("Economic.index") }}">اقتصادی</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ContactUs.index') }}">تماس با ما</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
