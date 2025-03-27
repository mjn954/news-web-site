// admin.js


function showSliderModal(title, body) {
    document.getElementById('sliderModalBody').innerHTML = '<h4>' + title + '</h4><p>' + body + '</p>';
    var sliderModal = new bootstrap.Modal(document.getElementById('sliderModal'));
    sliderModal.show();
}

document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        let alerts = document.querySelectorAll(".alert");
        alerts.forEach(function(alert) {
            let bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 4000);
});


document.getElementById('image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        const imgPreview = document.getElementById('imagePreview');
        imgPreview.src = e.target.result;
        imgPreview.style.display = 'block';
    };

    if (file) {
        reader.readAsDataURL(file);
    }
});
