let nav = document.getElementById("side-menu");

function toggleNavigator() {
  let nav = document.getElementById("side-menu");
  nav.classList.toggle("show-nav");
}

window.onresize = function () {
  nav.classList.remove("show-nav");
};

function closeNavigator() {
  if (nav.classList.contains("show-nav")) {
    nav.classList.remove("show-nav");
  } else {
    nav.classList.add("show-nav");
  }
}
