window.addEventListener("scroll", () => {
    const navbar = document.querySelector(".navbar");
    if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});

const hero = document.querySelector(".hero");
const images = ["images/hero1.jpg"];
let index = 0;

function changeBackground() {
    hero.style.backgroundImage = `url('${images[index]}')`;
    index = (index + 1) % images.length;
}
changeBackground();
setInterval(changeBackground, 5000);

document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".filter-btn");
    const items = document.querySelectorAll(".filter-item");

    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            // Toggle active class
            buttons.forEach((btn) => btn.classList.remove("active"));
            button.classList.add("active");

            const filter = button.getAttribute("data-filter");

            items.forEach((item) => {
                // Reset opacity for transition effect
                item.style.opacity = "0";
                item.style.transform = "scale(0.8)";

                setTimeout(() => {
                    if (filter === "all" || item.classList.contains(filter)) {
                        item.style.display = "block";
                        setTimeout(() => {
                            item.style.opacity = "1";
                            item.style.transform = "scale(1)";
                        }, 50);
                    } else {
                        item.style.display = "none";
                    }
                }, 300);
            });
        });
    });
});

const counters = document.querySelectorAll(".counter");
const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = +el.getAttribute("data-target");
                const duration = 2000;
                let start = null;

                const step = (timestamp) => {
                    if (!start) start = timestamp;
                    const progress = Math.min(
                        (timestamp - start) / duration,
                        1
                    );
                    const ease = 1 - Math.pow(1 - progress, 4);
                    el.innerText = Math.floor(ease * target);
                    if (progress < 1) window.requestAnimationFrame(step);
                    else el.innerText = target;
                };
                window.requestAnimationFrame(step);
                observer.unobserve(el);
            }
        });
    },
    { threshold: 0.5 }
);
counters.forEach((c) => observer.observe(c));
