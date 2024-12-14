 // animation Stylings In javascript
 document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.animation');

    const options = {
        root: null, // Use the viewport as the container
        rootMargin: '0px',
        threshold: 0.1 // Trigger when 10% of the section is visible
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target); // Stop observing once it's visible
            }
        });
    }, options);

    sections.forEach(section => {
        observer.observe(section); // Observe each section
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const images = document.querySelectorAll('.portfolio-pictures img');

    const options = {
        root: null, // Viewport as the container
        rootMargin: '0px',
        threshold: 0.1 // Trigger when 10% of the image is visible
    };

    const animations = ['slide-left', 'slide-right'];

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const randomAnimation = animations[Math.floor(Math.random() * animations.length)];
                entry.target.classList.add('visible', randomAnimation);
                observer.unobserve(entry.target); // Stop observing once it's visible
            }
        });
    }, options);

    images.forEach(image => {
        observer.observe(image);
    });
});





// Custom modal for zooming and viewing portfolio images..

let scale = 1;
let isDragging = false;
let startX;
let startY;
let initialX;
let initialY;

document.querySelectorAll('.portfolio-pictures img').forEach(image => {
    image.addEventListener('click', (e) => {
        const modal = document.getElementById("imageModal");
        const modalImg = document.getElementById("modalImage");
        modal.style.display = "flex";
        modalImg.src = e.target.src;
        scale = 1; // Reset scale when a new image is opened
        modalImg.style.transform = `scale(${scale})`;
        modalImg.style.cursor = 'zoom-in'; // Change cursor to indicate zoom capability

        // Reset image position
        modalImg.style.transformOrigin = 'center'; // Center the image for scaling
        modalImg.style.position = 'relative'; // Make the image position relative
        modalImg.style.left = '0';
        modalImg.style.top = '0';

        // Add event listeners for dragging
        modalImg.addEventListener('mousedown', startDragging);
        modalImg.addEventListener('mouseup', stopDragging);
        modalImg.addEventListener('mousemove', dragImage);
    });
});

// Close the modal
function closeModal() {
    document.getElementById("imageModal").style.display = "none";
}

// Zoom functionality with mouse wheel and Ctrl key
document.getElementById("modalImage").addEventListener('wheel', (e) => {
    e.preventDefault(); // Prevent the page from scrolling
    if (e.ctrlKey) {
        scale += e.deltaY < 0 ? 0.1 : -0.1; // Zoom in or out
        scale = Math.max(scale, 1); // Prevent scale from going below 1
        e.target.style.transform = `scale(${scale})`; // Apply zoom
    }
});

function startDragging(e) {
    isDragging = true;
    startX = e.clientX;
    startY = e.clientY;
    initialX = parseFloat(this.style.left) || 0;
    initialY = parseFloat(this.style.top) || 0;
}

function stopDragging() {
    isDragging = false;
}

function dragImage(e) {
    if (isDragging) {
        e.preventDefault(); // Prevent text selection
        const dx = e.clientX - startX; // Change in x position
        const dy = e.clientY - startY; // Change in y position
        this.style.left = `${initialX + dx}px`;
        this.style.top = `${initialY + dy}px`;
    }
}




