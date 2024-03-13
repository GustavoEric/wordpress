function darkMode(status) {
  if (status) {
    document.body.classList.add('dark-mode');
    localStorage.setItem('toggled', 'dark-mode');
    console.log(status)
  } else {
    document.body.classList.remove('dark-mode');
    localStorage.setItem('toggled', '');
  }
}

document.addEventListener('DOMContentLoaded', function () {
  var trigger = document.querySelector('#darkmode-toggle');
  if (localStorage.getItem('toggled')) {
    document.body.classList.toggle(localStorage.getItem('toggled'));
    if (localStorage.getItem('toggled') === 'dark-mode') {
      trigger.checked = true;
    }
  }

  trigger.addEventListener('change', function () {
    if (this.checked) {
      darkMode(true);
    } else {
      darkMode(false);
    }
  })

  window.onload = function () {
    var mode = localStorage.getItem('toggled');

    if (mode === 'dark-mode') {
      darkMode(true);
      trigger.checked = true;
    }
  }
})
