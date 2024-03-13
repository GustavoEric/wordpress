/* global my_ajax_object */
document.addEventListener("DOMContentLoaded", function () {
  const search = document.querySelector('#search');
  const searchIcon = document.querySelector('.search-btn');
  const closeIcon = document.querySelector('.icon-close');
  const searchFormInput = document.querySelector('form.search-form [name=s]');
  const searchForm = document.querySelector('form.search-form');

  searchIcon.addEventListener('click', function (e) {
    e.preventDefault();
    search.style.display = "block";
    document.body.classList.add('search-open');

    setTimeout(function () {
      searchFormInput.focus();
    }, 300);
  });

  document.addEventListener('click', function (e) {
    if (e.target === closeIcon || closeIcon.contains(e.target)) {
      search.style.display = "none";
      document.body.classList.remove('search-open');
    }
  });

  // SEARCH AJAX FUNCTION
  let searchBounce = false;
  document.addEventListener('keyup', function (e) {
    if (e.target === searchFormInput) {
      clearInterval(searchBounce);
      searchBounce = setTimeout(() => {
        searchForm.dispatchEvent(new Event('submit'));
      }, 250);
    }
  });


  let searchAjax = false;
  let lastQuery = '';
  searchForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const s = searchFormInput.value;

    if (lastQuery === s) {
      return false;
    }
    lastQuery = s;

    if (searchAjax) {
      searchAjax.abort();
    }

    if (s) {
      updateSearchState('loading');
    } else {
      updateSearchState('default');
      return false;
    }

    searchAjax = new XMLHttpRequest();
    searchAjax.open("POST", my_ajax_object.ajax_url, true);
    searchAjax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    searchAjax.send("action=search_ajax&s=" + s);
    searchAjax.onload = function () {
      if (this.status == 200) {
        if (this.response) {
          document.querySelector('#search .results').innerHTML = this.response;
          updateSearchState('results-ok');
        } else {
          updateSearchState('no-results');
        }
      }
    }
  });
});

function updateSearchState(state) {
  switch (state) {
    case 'loading':
      // document.querySelector('#search .results').style.display = "none";
      document.querySelector('#search .no-content').style.display = "none";
      document.querySelector('#search .default').style.display = "none";
      document.querySelector('#search .loading').style.display = "block";
      break;
    case 'results-ok':
      document.querySelector('#search .loading').style.display = "none";
      // document.querySelector('#search .results').style.display = "block";
      break;
    case 'no-more-results':
      break;
    case 'no-results':
      document.querySelector('#search .loading').style.display = "none";
      document.querySelector('#search .no-content').style.display = "block";
      break;
    case 'default':
    default:
      // document.querySelector('#search .results').style.display = "none";
      document.querySelector('#search .no-content').style.display = "none";
      document.querySelector('#search .loading').style.display = "none";
      document.querySelector('#search .default').style.display = "block";
      break;
  }
}
