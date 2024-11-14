const observerOptions = {
    root: null, // Use the viewport as the root
    rootMargin: "0px",
    threshold: 0.1 // Trigger when 10% of the element is visible
};

const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('fadeIn');
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

const addFloating = () => {
    const imgs = document.querySelectorAll(".upper-imgs img")
    const imgs2 = document.querySelectorAll(".bottom-imgs img")
    const imgs3 = document.querySelector(".left-img")
    const imgs4 = document.querySelector(".right-img")

    imgs.forEach(element => {
        element.classList.add("floating")
    });

    imgs2.forEach(element => {
        element.classList.add("floating")
    });
    imgs3.classList.add("floating")
    imgs4.classList.add("floating")
}

setTimeout(() => {
    addFloating()
}, 1000);

// Select all elements that should have the animation
const animatedElements = document.querySelectorAll('.animated.down');

animatedElements.forEach(element => {
    observer.observe(element); // Start observing each element
});


const routeToProject = (route) => {
    location.href = `project-${route}.html`;
};


document.addEventListener('keydown', function(event) {
    if (event.altKey && event.ctrlKey && event.shiftKey && event.key === 'V') {
        window.open('admin_login.html', '_blank'); // Opens the page in a new tab
    }
});





