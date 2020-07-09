let navContainer = document.getElementById(
    "main-container__navigation-container"
);

function showNavigation() {
    navContainer.style.display = "flex";
    navContainer.style.zIndex = 5;
}

function hideNavigation() {
    navContainer.style.display = "none";
}

// do not touch navigation fix hahahahh 
function mediaListener(mediaState) {
  if (mediaState.matches) { // If media query matches
    showNavigation();
  }
}
let matchMedia = window.matchMedia("(min-width: 768px)");
mediaListener(matchMedia);
matchMedia.addListener(mediaListener);
