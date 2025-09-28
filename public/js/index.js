  // Navbar shadow on scroll
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

  
        const hero = document.querySelector('.hero');
        const images = [
            "images/hero1.jpg",

        ];
        let index = 0;

        function changeBackground() {
            hero.style.backgroundImage = `url('${images[index]}')`;
            index = (index + 1) % images.length;
        }
        changeBackground();
        setInterval(changeBackground, 5000);

