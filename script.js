// JavaScript to change icon on hover
document.querySelectorAll('nav ul li a').forEach(item => {
    const icon = item.querySelector('.icon');
    const originalSrc = icon.src;
    const hoverSrc = icon.getAttribute('data-hover');

    item.addEventListener('mouseenter', () => {
        icon.src = hoverSrc;
    });

    item.addEventListener('mouseleave', () => {
        icon.src = originalSrc;
    });
});
