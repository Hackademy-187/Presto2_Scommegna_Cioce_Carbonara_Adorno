// ======================
// NAVBAR SCROLL
// ======================

window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.header-area');

    if (!navbar) return;

    navbar.classList.toggle(
        'navbar-scrolled',
        window.scrollY > 50
    );
});


// ======================
// DOM READY
// ======================

document.addEventListener('DOMContentLoaded', () => {

    // ======================
// MOBILE NAVBAR
// ======================

const menuTrigger = document.querySelector('.menu-trigger');
const navContainer = document.querySelector('.nav-container-right');

if (menuTrigger && navContainer) {
    menuTrigger.addEventListener('click', (event) => {
        event.preventDefault();

        navContainer.classList.toggle('nav-active');
        menuTrigger.classList.toggle('active');
    });

    const submenuLinks = navContainer.querySelectorAll('.submenu > a');

    submenuLinks.forEach((link) => {
        link.addEventListener('click', (event) => {
            if (window.innerWidth <= 991) {
                event.preventDefault();

                const submenu = link.closest('.submenu');

                if (!submenu) return;

                submenu.classList.toggle('submenu-open');
            }
        });
    });

    const navLinks = navContainer.querySelectorAll('a');

    navLinks.forEach((link) => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 991 && !link.closest('.submenu > a')) {
                navContainer.classList.remove('nav-active');
                menuTrigger.classList.remove('active');

                document.querySelectorAll('.submenu.submenu-open').forEach((submenu) => {
                    submenu.classList.remove('submenu-open');
                });
            }
        });
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 991) {
            navContainer.classList.remove('nav-active');
            menuTrigger.classList.remove('active');

            document.querySelectorAll('.submenu.submenu-open').forEach((submenu) => {
                submenu.classList.remove('submenu-open');
            });
        }
    });
}

    // ======================
    // VIDEO LOGIN
    // ======================

    const video = document.getElementById('intro-video');
    const overlay = document.getElementById('intro-overlay');

    if (video && overlay) {

        video.play().catch(() => {});

        video.onended = () => {

            overlay.classList.add('fade-out');

            setTimeout(() => {
                overlay.remove();
            }, 500);

        };

    }

    // ======================
    // HERO BIRRA
    // ======================

    const hero = document.getElementById('beer-hero');

    if (hero) {

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

            if (scrollDelta < 0) {

                foamHeightTarget = Math.min(
                    50 + Math.abs(scrollDelta) * 3.5,
                    180
                );

            } else {

                foamHeightTarget = Math.min(
                    50 + scrollDelta * 0.5,
                    70
                );

            }

            targetAngle = Math.min(
                Math.max(scrollDelta * 0.8, -35),
                35
            );

            document.documentElement.style.setProperty(
                '--beer-level',
                `${beerLevel}%`
            );

            lastScrollY = currentScrollY;

        });

        function updatePhysics() {

            currentAngle +=
                (targetAngle - currentAngle) * 0.12;

            targetAngle +=
                (0 - targetAngle) * 0.05;

            currentFoamHeight +=
                (foamHeightTarget - currentFoamHeight) * 0.14;

            foamHeightTarget +=
                (50 - foamHeightTarget) * 0.04;

            document.documentElement.style.setProperty(
                '--beer-angle',
                `${currentAngle}vh`
            );

            document.documentElement.style.setProperty(
                '--foam-height',
                `${currentFoamHeight}px`
            );

            requestAnimationFrame(updatePhysics);

        }

        updatePhysics();

    }

    // ======================
    // FLASH MESSAGE
    // ======================

    const flash = document.querySelector('.flash-message');

    if (flash) {

        setTimeout(() => {

            flash.style.opacity = '0';
            flash.style.transform = 'translateX(40px)';

            setTimeout(() => {
                flash.remove();
            }, 400);

        }, 4000);

    }

});