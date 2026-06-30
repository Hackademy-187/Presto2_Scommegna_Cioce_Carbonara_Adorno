// NAVBAR SCROLL

window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.header-area');

    if (!navbar) return;

    navbar.classList.toggle(
        'navbar-scrolled',
        window.scrollY > 50
    );
});


// VIDEO LOGIN
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
document.addEventListener('DOMContentLoaded', () => {
    const hero = document.getElementById('beer-hero');
    if (!hero) return;

    let lastScrollY = window.scrollY;
    let targetAngle = 0;
    let currentAngle = 0;

    window.addEventListener('scroll', () => {
        const heroHeight = hero.offsetHeight;
        const currentScrollY = window.scrollY;

        // Calcolo del livello (0% in cima, 100% quando superi la hero)
        let scrollPercent = (currentScrollY / heroHeight) * 100;
        let beerLevel = Math.min(Math.max(scrollPercent, 0), 100);

        // Calcolo inerzia per l'effetto onda (iBeer style)
        let scrollDelta = currentScrollY - lastScrollY;
        targetAngle = Math.min(Math.max(scrollDelta * 0.5, -20), 20); // Angolo max sbandata schiuma

        document.documentElement.style.setProperty('--beer-level', `${beerLevel}%`);
        
        lastScrollY = currentScrollY;
    });

    // Fisica per lo smorzamento dell'onda quando ti fermi
    function updatePhysics() {
        currentAngle += (targetAngle - currentAngle) * 0.15;
        targetAngle += (0 - targetAngle) * 0.08; // Ritorna al centro con molleggio

        document.documentElement.style.setProperty('--beer-angle', `${currentAngle}vh`);
        requestAnimationFrame(updatePhysics);
    }

    updatePhysics();
});