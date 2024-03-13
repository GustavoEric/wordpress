document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector(".header");
    const sensor = document.querySelector(".header-sensor");
  
    let lastScrollY = window.scrollY || document.documentElement.scrollTop;
    let ticking = false;
  
    const classes = {
      scrolled: "bg-scrolled",
      hidden: "header-hidden",
    };
  
    const tolerance = 200;
  
    if (!header || !sensor) return;
  
    const observerOptions = {
      root: null,
      rootMargin: "0px",
      threshold: 0.1
    };
  
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          header.classList.remove(classes.scrolled);
        } else {
          header.classList.add(classes.scrolled);
        }
      });
    }, observerOptions);
  
    observer.observe(sensor);
  
    const updateHeader = () => {
      const currentScrollY = window.scrollY || document.documentElement.scrollTop;
  
      if (Math.abs(currentScrollY) < tolerance) {
        ticking = false;
        return;
      }
  
      if (currentScrollY < lastScrollY) {
        header.classList.remove(classes.hidden);
      } else {
        header.classList.add(classes.hidden);
      }
  
      lastScrollY = currentScrollY;
      ticking = false;
    };
  
    const onScroll = () => {
      if (!ticking) {
        window.requestAnimationFrame(updateHeader);
        ticking = true;
      }
    };
  
    window.addEventListener("scroll", onScroll);
  });