// Function to add the "floating" class to specific images on the page
const addFloating = () => {
    // Select all images in the ".upper-imgs" section (top images)
    const imgs = document.querySelectorAll(".upper-imgs img")
    // Select all images in the ".bottom-imgs" section (bottom images)
    const imgs2 = document.querySelectorAll(".bottom-imgs img")
    // Select the image with the ".left-img" class (left-side image)
    const imgs3 = document.querySelector(".left-img")
    // Select the image with the ".right-img" class (right-side image)
    const imgs4 = document.querySelector(".right-img")
     // Add the "floating" class to all images in the top section
    imgs.forEach(element => {
        element.classList.add("floating")
    });
    // Add the "floating" class to all images in the bottom section
    imgs2.forEach(element => {
        element.classList.add("floating")
    });
    // Add the "floating" class to the left-side image
    imgs3.classList.add("floating")
    // Add the "floating" class to the right-side image
    imgs4.classList.add("floating")
}
// Call the addFloating function after a 1-second delay

setTimeout(() => {
    addFloating()
}, 1000);
