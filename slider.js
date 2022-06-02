document.addEventListener("DOMContentLoaded", function () {
  //slider
  var position = 0;
  var minPosition = 0;
  var photosWrapper = document.querySelector(".js-photos");
  var maxPosition = 2;
  //Decalation de la div
  function decaleGauche() {
    position++;

    if (position > maxPosition) {
      retourDebut();
    } else {
      photosWrapper.style.left = position * -100 + "vw";
      //console.log(position)
    }
  }

  function decaleDroite() {
    position--;

    if (position < minPosition) {
      retourFin();
    } else {
      photosWrapper.style.left = position * -100 + "vw";
      //console.log(position)
    }
  }

  function retourDebut() {
    position = minPosition;
    photosWrapper.style.left = position * -100 + "vw";
  }

  function retourFin() {
    position = maxPosition;
    photosWrapper.style.left = position * -100 + "vw";
  }

  setInterval(decaleGauche, 3000);

  //btn slider
  var btng = document.querySelector(".btn-slider-g");
  btng.addEventListener("click", decaleGauche);

  var btnd = document.querySelector(".btn-slider-d");
  btnd.addEventListener("click", decaleDroite);
});
