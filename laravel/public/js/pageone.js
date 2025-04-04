// فعال سازی کاروسل برای اسلاید نمایش اخبار
const carousel = new bootstrap.Carousel(document.getElementById('newsCarousel'), {
    interval: 5000,  // تغییر تصویر هر 5 ثانیه
    ride: 'carousel' // فعال سازی حرکت اتوماتیک
});

// افزودن رفتار هنگام کلیک بر روی دکمه ادامه مطلب
const continueButtons = document.querySelectorAll('.btn-gold');
continueButtons.forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        alert('شما روی دکمه "ادامه مطلب" کلیک کرده‌اید.');
    });
});


window.addEventListener('scroll', function() {
    const header = document.querySelector('.header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});


document.styleSheets[0].insertRule('.header.scrolled { background-color: rgba(0, 0, 0, 0.8); transition: background-color 0.3s ease; }', 0);
