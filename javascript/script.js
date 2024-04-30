function toggleNavigator() {
  let nav = document.getElementById("side-menu");
  nav.classList.toggle("show-nav");
}

function closeNavigator() {
  let screenWidth = window.innerWidth;
  let nav = document.getElementById("side-menu");

  if (screenWidth > 768 && nav.classList.contains("show-nav")) {
    nav.classList.remove("show-nav");
  }
}

// Close the navigation menu when the window is resized
window.onresize = function () {
  closeNavigator();
};

// Close the navigation menu when the page loads
window.onload = function () {
  closeNavigator();
};
