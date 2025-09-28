document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('.slider-container .slider-image');
    const dots = document.querySelectorAll('.slider-dots .dot');
    const prevArrow = document.querySelector('.prev-arrow');
    const nextArrow = document.querySelector('.next-arrow');

    let currentSlide = 0;
    const totalSlides = images.length;

    function showSlide(index) {
        images.forEach((img, i) => {
            img.classList.remove('active');
            dots[i].classList.remove('active');
        });
        images[index].classList.add('active');
        dots[index].classList.add('active');
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }
    
    // Initial display
    showSlide(currentSlide);

    nextArrow.addEventListener('click', nextSlide);
    prevArrow.addEventListener('click', prevSlide);

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
        });
    });

    // كود للاختبار فقط
    if (prevArrow && nextArrow) {
        prevArrow.addEventListener('click', () => {
            console.log('Previous button clicked!');
        });
        nextArrow.addEventListener('click', () => {
            console.log('Next button clicked!');
        });
    } else {
        console.log('Arrows not found in HTML.');
    }

     // Logic for the sectors cards slider
    const prevCardButton = document.getElementById('prev-card');
    const nextCardButton = document.getElementById('next-card');
    const cardsRow = document.querySelector('.sectors-cards-row');
    
    // Check if the elements exist to prevent errors
    if (prevCardButton && nextCardButton && cardsRow) {
        
        // Function to scroll the cards
        function scrollCards(direction) {
            const firstCard = cardsRow.querySelector('.sector-card');
            if (!firstCard) return; // Prevent error if no cards exist
            
            const scrollAmount = firstCard.offsetWidth + 20; // 20px is the gap

            if (direction === 'prev') {
                cardsRow.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            } else if (direction === 'next') {
                cardsRow.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        }

        // Add event listeners to the buttons
        nextCardButton.addEventListener('click', () => scrollCards('next'));
        prevCardButton.addEventListener('click', () => scrollCards('prev'));
    }

     const tabLinks = document.querySelectorAll('.tab-link');
    const tabContents = document.querySelectorAll('.tab-content');

    tabLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();

            // Remove active classes
            tabLinks.forEach(item => item.classList.remove('active-tab'));
            tabContents.forEach(content => content.classList.remove('active-content'));

            // Add active class to the clicked tab
            link.classList.add('active-tab');

            // Show the corresponding content
            const targetId = link.getAttribute('href').substring(1);
            document.getElementById(targetId).classList.add('active-content');
        });
    });

    const showMapBtn = document.querySelector('.show-projects-map-btn');
    const projectsGrid = document.querySelector('.projects-grid');
    const mapSection = document.getElementById('portfolio-map-section');

    if (showMapBtn && projectsGrid && mapSection) {
        showMapBtn.addEventListener('click', (e) => {
            e.preventDefault();

            // Toggle the visibility of the card grid and map section
            projectsGrid.classList.toggle('hidden');
            mapSection.classList.toggle('hidden');

            // Change button text
            if (mapSection.classList.contains('hidden')) {
                showMapBtn.textContent = 'SHOW PROJECTS MAP';
            } else {
                showMapBtn.textContent = 'SHOW PROJECTS GRID';
            }
        });
    }
});

