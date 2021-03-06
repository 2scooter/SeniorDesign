(function() {
    if (typeof window.janrain !== 'object') window.janrain = {};
    if (typeof window.janrain.settings !== 'object') window.janrain.settings = {};

    janrain.settings.tokenUrl = 'http://localhost/home.php';

    function isReady() { janrain.ready = true; };
    if (document.addEventListener) {
      document.addEventListener("DOMContentLoaded", isReady, false);
    } else {
      window.attachEvent('onload', isReady);
    }

    var e = document.createElement('script');
    e.type = 'text/javascript';
    e.id = 'janrainAuthWidget';
    if (document.location.protocol === 'https:') {
      e.src = 'https://rpxnow.com/js/lib/stem-login/engage.js?minify=false&3719813926';
    } else {
      e.src = 'http://rpxnow.com/js/lib/stem-login/engage.js?minify=false&3719813926';
    }
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(e, s);
})();