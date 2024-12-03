// Removed ES6 features for cross-browsing tests
// Sad D:
(function () {

  'use strict';

  var wrapper = document.getElementById('wrapper');
  var cardGroup = document.getElementById('card-group');

  function igniteBtnAction(button) {
    var _attr = button.getAttribute('data-action');
    var _loginForm = document.getElementById('login-form');

    if (_attr === 'register') {
      cardGroup.setAttribute('data-active-card', 'register');
      wrapper.classList.add('active');

      return;
    }

    if (_attr === 'login') {
      cardGroup.setAttribute('data-active-card', 'login');
      wrapper.classList.remove('active');

      return;
    }

    button.classList.add('active');
    button.innerHTML = "Working on it...";

    setTimeout(function () {
      button.classList.remove('active');
      button.innerHTML = "Submit <span class='fas fa-arrow-right'></span>";
    }, 2000);
  }

  function handleEvents() {
    var actionBtns = document.querySelectorAll('.btn-default');

    for (var i = 0; i < actionBtns.length; i++) {
      actionBtns[i].addEventListener('click', function (elem) {
        var _this = elem.target;

        igniteBtnAction(_this);
      });
    }
  }

  function init() {
    handleEvents();
  }

  init();

})();