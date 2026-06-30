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
    let foamHeightTarget = 50; 
    let currentFoamHeight = 50;

    window.addEventListener('scroll', () => {
        const heroHeight = hero.offsetHeight;
        const currentScrollY = window.scrollY;

        let scrollPercent = (currentScrollY / heroHeight) * 100;
        let beerLevel = Math.min(Math.max(scrollPercent, 0), 100);

        let scrollDelta = currentScrollY - lastScrollY;

        // SPILLATURA ESAGERATA: Se si sale, la schiuma si gonfia a dismisura
        if (scrollDelta < 0) {
            // Moltiplicatore alzato a 3.5 e tetto massimo portato a 180px
            foamHeightTarget = Math.min(50 + Math.abs(scrollDelta) * 3.5, 180); 
        } else {
            // Anche quando scendi, se vai veloce la schiuma si agita un po' di più (fino a 70px)
            foamHeightTarget = Math.min(50 + scrollDelta * 0.5, 70);
        }

        // Angolo di sbandata laterale potenziato (max 35 gradi invece di 22)
        targetAngle = Math.min(Math.max(scrollDelta * 0.8, -35), 35);

        document.documentElement.style.setProperty('--beer-level', `${beerLevel}%`);
        
        lastScrollY = currentScrollY;
    });

    // Fisica di oscillazione specidica per rendere l'onda più elastica
    function updatePhysics() {
        // Ridotto il freno (0.12) per far durare il "rimbalzo" dell'onda un po' più a lungo
        currentAngle += (targetAngle - currentAngle) * 0.12;
        targetAngle += (0 - targetAngle) * 0.05; 

        // La schiuma si gonfia istantaneamente ma si riassesta con un bell'effetto "morbido"
        currentFoamHeight += (foamHeightTarget - currentFoamHeight) * 0.14;
        foamHeightTarget += (50 - foamHeightTarget) * 0.04;

        document.documentElement.style.setProperty('--beer-angle', `${currentAngle}vh`);
        document.documentElement.style.setProperty('--foam-height', `${currentFoamHeight}px`);
        
        requestAnimationFrame(updatePhysics);
    }

    updatePhysics();
});