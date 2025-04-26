window.onload = function() {
  // Mobile menu toggle
  const menuToggle = document.querySelector('.menu-toggle');
  const navLinks = document.querySelector('.nav-links');

  menuToggle.addEventListener('click', () => {
      navLinks.classList.toggle('active');
  });

  // Smooth scroll (check if button exists)
  const learnMoreButton = document.querySelector('.learn-more');
  if (learnMoreButton) {
    learnMoreButton.addEventListener('click', function() {
      document.getElementById('about').scrollIntoView({ behavior: 'smooth' });
    });
  }

// Modal logic for all islands
function setupModal(triggerId, modalId) {
  const openBtn = document.getElementById(triggerId);
  const modal = document.getElementById(modalId);
  const closeBtn = modal.querySelector('.close');

  openBtn.addEventListener('click', () => {
    modal.style.display = "block";
  });

  closeBtn.addEventListener('click', () => {
    modal.style.display = "none";
  });

  window.addEventListener('click', (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
}

setupModal("openJawaModal", "jawaModal");
setupModal("openSumatraModal", "sumatraModal");
setupModal("openKalimantanModal", "kalimantanModal");


  // Carousel logic
  const slides = document.querySelectorAll('.carousel-slide');
  let current = 0;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.remove('active');
      if (i === index) slide.classList.add('active');
    });
  }

  function nextSlide() {
    current = (current + 1) % slides.length;
    showSlide(current);
  }

  function prevSlide() {
    current = (current - 1 + slides.length) % slides.length;
    showSlide(current);
  }

  const nextButton = document.querySelector('.next');
  const prevButton = document.querySelector('.prev');

  if (nextButton && prevButton) {
    nextButton.addEventListener('click', nextSlide);
    prevButton.addEventListener('click', prevSlide);
    setInterval(nextSlide, 5000);
    showSlide(current);
  }
};
