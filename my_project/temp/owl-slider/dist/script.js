$('.owl-carousel').owlCarousel({
  //items: 4,
  autoplay: true,
  center: true,
  loop: true,
  nav: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 3
    },
    960: {
      items: 4,
    },
    1200: {
      items: 4
    }
  }
});