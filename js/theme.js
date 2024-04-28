let themes = document.querySelectorAll(".theme-content");
themes.forEach((theme) => {
  theme.addEventListener("click", () => {
    let page = theme.getAttribute("data-page");
    window.location.href = page;
  });
});