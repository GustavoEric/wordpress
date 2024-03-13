const menuBtn = document.querySelector(".menu-btn");

if (menuBtn) {
  menuBtn.addEventListener("click", function (event) {
    event.preventDefault();
    var nav = document.querySelector(".drawer-nav");
    nav.classList.toggle('active');
    document.body.classList.toggle("menu-open");
    document.body.classList.toggle("open-transition");
  });
}

const closeMenuBtn = document.querySelector(".close-menu-btn");

if (closeMenuBtn) {
  closeMenuBtn.addEventListener("click", function (event) {
    event.preventDefault();
    var nav = document.querySelector(".drawer-nav");
    nav.classList.remove('active');
    document.body.classList.remove("menu-open");
    document.body.classList.remove("open-transition");
  });
}