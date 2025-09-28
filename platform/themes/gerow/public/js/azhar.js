document.addEventListener('DOMContentLoaded', function() {
    const body = document.body;

    if (!body) {
        return;
    }

    const isAdminLayout = body.classList.contains('page-sidebar-closed-hide-logo') || body.classList.contains('page-content-white') || body.classList.contains('page-container-bg-solid');

    if (isAdminLayout) {
        return;
    }
    const images = document.querySelectorAll('.slider-container .slider-image');
    const dots = document.querySelectorAll('.slider-dots .dot');
    const prevArrow = document.querySelector('.prev-arrow');
    const nextArrow = document.querySelector('.next-arrow');

    const totalSlides = images.length;

    if (totalSlides > 0 && prevArrow && nextArrow) {
        let currentSlide = 0;

        const showSlide = (index) => {
            images.forEach((img, i) => {
                const isActive = i === index;
                img.classList.toggle('active', isActive);

                if (dots[i]) {
                    dots[i].classList.toggle('active', isActive);
                }
            });
        };

        const goToSlide = (index) => {
            currentSlide = (index + totalSlides) % totalSlides;
            showSlide(currentSlide);
        };

        showSlide(currentSlide);

        const handlePrevClick = () => {
            console.log('Previous button clicked!');
            goToSlide(currentSlide - 1);
        };

        const handleNextClick = () => {
            console.log('Next button clicked!');
            goToSlide(currentSlide + 1);
        };

        prevArrow.addEventListener('click', handlePrevClick);
        nextArrow.addEventListener('click', handleNextClick);

        if (dots.length) {
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => goToSlide(index));
            });
        }
    } else if (images.length || dots.length || prevArrow || nextArrow) {
        console.warn('Slider skipped: required elements missing.');
    }

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








