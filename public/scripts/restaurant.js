const cardHeaders = document.querySelectorAll('.card-header');

cardHeaders.forEach(header => {
    header.addEventListener('click', () => {
        const cardBody = header.nextElementSibling;
        cardBody.classList.toggle('collapse');
    });
});


//carrousel :

let slideIndex = 1;

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("custom-slider");
console.log(slides);
  if (n > slides.length) {
    slideIndex = 1;
  }    
  
  if (n < 1) {
    slideIndex = slides.length;
  }

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }

  slides[slideIndex-1].style.display = "block";  
}

showSlides(slideIndex);

//fin carrousel