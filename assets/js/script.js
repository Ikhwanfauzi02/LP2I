'use strict';



/**
 * add Event on elements
 */

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}



/**
 * navbar toggle 
 */
document.addEventListener('DOMContentLoaded', function() {
  // Handle click event to toggle dropdown menu
  document.querySelectorAll('.dropdown-toggle').forEach(function(dropdownToggle) {
      dropdownToggle.addEventListener('click', function(e) {
          e.preventDefault();
          let parentDropdown = this.parentElement;
          if (parentDropdown.classList.contains('active')) {
              parentDropdown.classList.remove('active');
          } else {
              // Close all other dropdowns
              document.querySelectorAll('.dropdown.active').forEach(function(activeDropdown) {
                  activeDropdown.classList.remove('active');
              });
              // Open clicked dropdown
              parentDropdown.classList.add('active');
          }
      });
  });

  // Close dropdown if click outside of it
  document.addEventListener('click', function(e) {
      if (!e.target.closest('.dropdown')) {
          document.querySelectorAll('.dropdown.active').forEach(function(activeDropdown) {
              activeDropdown.classList.remove('active');
          });
      }
  });
});



/**
 * header & back top btn show when scroll down to 100px
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

const headerActive = function () {
  if (window.scrollY > 80) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
}

addEventOnElem(window, "scroll", headerActive);

// Show Password

function togglePasswordVisibility(passwordId, toggleIconId) {
  // Toggle the type attribute using getAttribute() and setAttribute()
  const password = document.getElementById(passwordId);
  const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
  password.setAttribute('type', type);

  // Toggle the eye slash icon
  const toggleIcon = document.getElementById(toggleIconId);
  if (type === 'password') {
    toggleIcon.classList.remove('nf-fa-eye');
    toggleIcon.classList.add('nf-fa-eye_slash');
  } else {
    toggleIcon.classList.remove('nf-fa-eye_slash');
    toggleIcon.classList.add('nf-fa-eye');
  }
}

// Usage example:
togglePasswordVisibility('password', 'toggleIcon');
togglePasswordVisibility('new_password', 'toggleIcon2');
togglePasswordVisibility('confirm_password', 'toggleIcon3');

