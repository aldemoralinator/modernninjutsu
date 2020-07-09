let memberList = document.getElementById(
    "project-body__member-container"
);

function showMembers() {
    memberList.style.display = "flex";
    memberList.style.zIndex = 5;
}

function hideMembers() {
    memberList.style.display = "none";
}

// do not touch navigation fix hahahahh 
function mediaListener(mediaState) {
  if (mediaState.matches) { // If media query matches
    memberList.style.display = "flex";
    memberList.style.zIndex = 1;
  } else {
    memberList.style.zIndex = 5;
  }
}
let matchMedia = window.matchMedia("(min-width: 768px)");
mediaListener(matchMedia);
matchMedia.addListener(mediaListener);
