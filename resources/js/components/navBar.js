const nav = document.getElementById("navigasi");

window.addEventListener("scroll", () => {
  if (window.scrollY > 10) {
    nav.classList.add("scrolled");
    nav.classList.remove("navigasi");
    nav.classList.remove("bg-white");
  } else {
    nav.classList.remove("scrolled");
    nav.classList.add("navigasi");
    nav.classList.add("bg-white");
  }
});
