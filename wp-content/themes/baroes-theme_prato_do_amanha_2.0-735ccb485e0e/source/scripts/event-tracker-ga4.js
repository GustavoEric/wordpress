document.onreadystatechange = () => {
    if (document.readyState !== 'complete') return false;
    GA4events();
}

function GA4events() {

    // Cadastro Newsletter
    document.getElementsByName('mc-embedded-subscribe-form').forEach(form => {
        form.addEventListener('submit', event => {
          //event.preventDefault();
          let email = event.target.querySelector('[name=EMAIL]') ? event.target.querySelector('[name=EMAIL]') : null;
          let modelo = event.target.querySelector('[name=MODELO]') ? event.target.querySelector('[name=MODELO]').value : 'estático';
          GA4Track({
            event_type: 'event', 
            event_name: 'cadastro_newsletter',
            event_parameters: {
              email: email.value,
              modelo: modelo
            }
          });
        });
      });


    document.querySelectorAll('[data-ga4]').forEach(elem => {
        
        if (!elem.getAttribute('data-ga4')) return false;
        
        const dataGA = JSON.parse(elem.getAttribute('data-ga4'));
        const action = dataGA.event_type || 'click';

        // PageView
        if (action == 'pageview') {
            //setTimeout(()  => GA4Track(dataGA), 20000 * 10);
            setTimeout(()  => GA4Track(dataGA), 2000 * 10);
            return true;
        }

        // Scroll
        if (action == 'scrollHere') {
            const handleScrollHere = () => {
                // getOffset precisa ser chamada dentro da função para que o carragamento de imagens e outros elementos sejam considerados
                const offset = getOffset(elem)
                const scrollPosition = window.scrollY + window.innerHeight / 2 // Center of the screen
                if (scrollPosition >= offset.top) {
                    GA4Track(dataGA);
                    document.removeEventListener("scroll", handleScrollHere);
                }
            }
            document.addEventListener('scroll', handleScrollHere);
            return true;
        }

        

        // Outras ações
        elem.addEventListener(action, () => {
            GA4Track(dataGA);
        });
    });

    // scroll 25, 50, 75, 100
    window.addEventListener('scroll', handleScroll);


}

function GA4Track({event_type, event_name, event_parameters}) {
  if(typeof gtag === 'function'
    && event_name !== null
    && event_name !== ''
    && event_parameters !== null
  ) {
    if (location.hostname === "localhost" || location.hostname === "127.0.0.1") {
      console.log('---GA4---')
      console.log(event_type)
      console.log(event_name)
      console.log(event_parameters)
      console.log('--------')
    }
    // eslint-disable-next-line
    gtag('event', event_name, event_parameters);
    saveGA4log(event_name, event_parameters)
  }
}

// Salvar log
function saveGA4log(event_name, event_parameters) {

  var data = {event_name, event_parameters};
  var jsonData = JSON.stringify(data);
  console.log(jsonData);

  var httpRequest = new XMLHttpRequest();
  // eslint-disable-next-line
  httpRequest.open("POST", my_ajax_object.rest_url+"baroes/v1/event-tracker-log?"+Date.now(), true);
  httpRequest.setRequestHeader('Content-Type', 'application/json');
  httpRequest.send(jsonData);
  httpRequest.onreadystatechange = function() {
    //if (httpRequest.readyState == 4 && httpRequest.status == 200) {
      //var data = httpRequest.responseText;
      //console.log(data);
    //}
  }
}

// Função para obter a porcentagem de rolagem
function getScrollPercentage() {
    var scrollTop = window.pageYOffset;
    var windowHeight = window.innerHeight;
    var documentHeight = document.documentElement.scrollHeight;
    var scrolled = scrollTop / (documentHeight - windowHeight) * 100;
    return Math.round(scrolled);
}

var s25 = false;
var s50 = false;
var s75 = false;
var s100 = false;
function handleScroll() {
    var scrollPercentage = getScrollPercentage();
    if(scrollPercentage >= 25 && s25 === false) {
        s25 = true;
        GA4Track({
          'event_type' : 'event',
          'event_name' : 'scroll',
          'event_parameters': {
              'percent_scrolled': '25'
          }
        })
    }
    if(scrollPercentage >= 50 && s50 === false) {
        s50 = true;
        GA4Track({
          'event_type' : 'event',
          'event_name' : 'scroll',
          'event_parameters': {
              'percent_scrolled': '50'
          }
        })
    }
    if(scrollPercentage >= 75 && s75 === false) {
        s75 = true;
        GA4Track({
          'event_type' : 'event',
          'event_name' : 'scroll',
          'event_parameters': {
              'percent_scrolled': '75'
          }
        })
    }
    if(scrollPercentage >= 100 && s100 === false) {
        s100 = true;
        GA4Track({
          'event_type' : 'event',
          'event_name' : 'scroll',
          'event_parameters': {
              'percent_scrolled': '100'
          }
        })
    }
}

/******************************************************* */

function getOffset(el) {
    const rect = el.getBoundingClientRect();
    return {
      left: rect.left + window.scrollX,
      top: rect.top + window.scrollY
    }
}
var segundos = 1;
function ContarSegundos(){
    segundos = ++segundos;
}
setInterval(ContarSegundos, 1000);