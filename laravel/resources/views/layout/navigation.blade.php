<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
        <a class="navbar-brand" href="{{ route("home") }}">خبرنامه</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route("home") }}">خانه</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">اخبار</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route("ContactUs.index") }}">تماس با ما</a></li>
            </ul>
        </div>
    </div>
</nav>