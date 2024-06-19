  let sta = document.getElementById("sta");
  let mon = document.getElementById("mon");
  let edu = document.getElementById("edu");
  let hea = document.getElementById("hea");

  let allThemes = document.querySelectorAll(".theme-content");
  let divmoney = document.getElementById("money");
  let divstay = document.getElementById("stay");
  let divedu = document.getElementById("education");
  let divhea = document.getElementById("health");

  let stayicon = document.querySelector(".fa-home");
  let monicon = document.querySelector(".fa-eur");
  let eduicon = document.querySelector(".fa-graduation-cap");
  let heaicon = document.querySelector(".fa-heart");

  divmoney.style.display = "none";
  divedu.style.display = "none";
  divhea.style.display = "none";

  sta.style.backgroundColor = "var(--blue-color)";
  sta.style.color = "var(--white-color)";
  stayicon.style.color = "var(--white-color)";

  sta.addEventListener("click", (evt) => {
    event.stopPropagation();
    divstay.style.display = "block";
    divmoney.style.display = "none";
    divedu.style.display = "none";
    divhea.style.display = "none";
    sta.style.backgroundColor = "var(--blue-color)";
    sta.style.color = "var(--white-color)";
    stayicon.style.color = "var(--white-color)";

    mon.style.backgroundColor = "var(--white-color)";
    mon.style.color = "var(--blue-color)";
    edu.style.backgroundColor = "var(--white-color)";
    edu.style.color = "var(--blue-color)";
    hea.style.backgroundColor = "var(--white-color)";
    hea.style.color = "var(--blue-color)";

    monicon.style.color = "var(--blue-color)";
    eduicon.style.color = "var(--blue-color)";
    heaicon.style.color = "var(--blue-color)";

  });

  mon.addEventListener("click", (evt) => {
    divmoney.style.display = "block";
    divstay.style.display = "none";
    divedu.style.display = "none";
    divhea.style.display = "none";

    mon.style.backgroundColor = "var(--blue-color)";
    mon.style.color = "var(--white-color)";
    sta.style.backgroundColor = "var(--white-color)";
    sta.style.color = "var(--blue-color)";
    edu.style.backgroundColor = "var(--white-color)";
    edu.style.color = "var(--blue-color)";
    hea.style.backgroundColor = "var(--white-color)";
    hea.style.color = "var(--blue-color)";

    stayicon.style.color = "var(--blue-color)";
    monicon.style.color = "var(--white-color)";
    eduicon.style.color = "var(--blue-color)";
    heaicon.style.color = "var(--blue-color)";
  });

  edu.addEventListener("click", (evt) => {
    divedu.style.display = "block";
    divstay.style.display = "none";
    divmoney.style.display = "none";
    divhea.style.display = "none";

    edu.style.backgroundColor = "var(--blue-color)";
    edu.style.color = "var(--white-color)";
    sta.style.backgroundColor = "var(--white-color)";
    sta.style.color = "var(--blue-color)";
    mon.style.backgroundColor = "var(--white-color)";
    mon.style.color = "var(--blue-color)";
    hea.style.backgroundColor = "var(--white-color)";
    hea.style.color = "var(--blue-color)";

    stayicon.style.color = "var(--blue-color)";
    monicon.style.color = "var(--blue-color)";
    eduicon.style.color = "var(--white-color)";
    heaicon.style.color = "var(--blue-color)";
  });

  hea.addEventListener("click", (evt) => {
    divhea.style.display = "block";
    divstay.style.display = "none";
    divmoney.style.display = "none";
    divedu.style.display = "none";

    hea.style.backgroundColor = "var(--blue-color)";
    hea.style.color = "var(--white-color)";
    sta.style.backgroundColor = "var(--white-color)";
    sta.style.color = "var(--blue-color)";
    mon.style.backgroundColor = "var(--white-color)";
    mon.style.color = "var(--blue-color)";
    edu.style.backgroundColor = "var(--white-color)";
    edu.style.color = "var(--blue-color)";

    stayicon.style.color = "var(--blue-color)";
    monicon.style.color = "var(--blue-color)";
    eduicon.style.color = "var(--blue-color)";
    heaicon.style.color = "var(--white-color)";
  });