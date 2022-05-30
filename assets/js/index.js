
  const e = document.querySelector(".box"),
  f = document.querySelector(".btn"),
    t = document.getElementById("menu"),
    s = document.querySelector(".wrap");

  e.addEventListener("click", function () {
      t.classList.toggle("active"),
      f.classList.toggle("active"),
      f.classList.toggle("not-active"),
      s.classList.toggle("active");
  });

const msgAccueil = document.getElementById("msgAccueil"),
  typewriter = new Typewriter(msgAccueil, { loop: !0, delay: 100 });
typewriter.typeString("Front-end Developer").pauseFor(2500).deleteAll().start();

// gallery item filter

const filterButtons = document.querySelector("#filter-btns").children;
const items = document.querySelector(".portfolio-gallery").children;

for (let i = 0; i < filterButtons.length; i++) {
  filterButtons[i].addEventListener("click", function () {
    for (let j = 0; j < filterButtons.length; j++) {
      filterButtons[j].classList.remove("active");
    }
    this.classList.add("active");
    const target = this.getAttribute("data-target");

    for (let k = 0; k < items.length; k++) {
      items[k].style.display = "none";
      if (target == items[k].getAttribute("data-id")) {
        items[k].style.display = "block";
      }
      if (target == "all") {
        items[k].style.display = "block";
      }
    }
  });
}

function darkMode() {
  const e = document.body;
  e.classList.toggle("dark-mode"),
    t.classList.toggle("dark-mode"),
    "dark-mode" == e.classList
      ? window.alert("Mode Sombre activé")
      : window.alert("Mode Sombre désactivé");
}

function langSelect() {
  document.getElementById("langMenu").classList.toggle("active");
}

function dyslexieMode() {
  const e = document.body;
  e.classList.toggle("dyslexie-mode"),
    "dyslexie-mode" == e.classList
      ? window.alert("Mode Dyslexie activé")
      : window.alert("Mode Dyslexie désactivé");
}

