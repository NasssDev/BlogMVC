var swiper = new Swiper('.blog-slider', {
    spaceBetween: 30,
    effect: 'fade',
    loop: true,
    mousewheel: {
      invert: false,
    },
    // autoHeight: true,
    pagination: {
      el: '.blog-slider__pagination',
      clickable: true,
    }
  });



/**/
if (document.getElementById('inputUpload')) {

    let inputFile = document.getElementById('inputUpload');
    let spanFile = document.getElementById('oldValue');

    inputFile.addEventListener("change", () => {
        const words = inputFile.value.split('\\');
        const nameFile = words.pop();
        spanFile.innerHTML = nameFile;
    });
}

