function navigator() {
  let nav = document.getElementById("side-menu");
  if (nav.className === "hide-nav") {
    nav.className += "-show";
  } else {
    nav.className = "hide-nav";
  }
}
