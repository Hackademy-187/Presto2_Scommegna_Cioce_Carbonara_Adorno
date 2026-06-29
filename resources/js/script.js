// =========================
// NAVBAR SCROLL
// =========================

window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.header-area');

    if (!navbar) return;

    navbar.classList.toggle(
        'navbar-scrolled',
        window.scrollY > 50
    );
});


// =========================
// VIDEO LOGIN
// =========================

document.addEventListener('DOMContentLoaded', () => {

    const video = document.getElementById('intro-video');
    const overlay = document.getElementById('intro-overlay');

    if (video && overlay) {

        video.play();

        video.addEventListener('ended', () => {

            overlay.classList.add('fade-out');

            setTimeout(() => {
                overlay.remove();
            }, 500);

        });

    }

});