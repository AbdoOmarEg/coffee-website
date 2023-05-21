let loginForm = document.querySelector('.login-form');

document.querySelector('#login-btn').onclick = () => {
   loginForm.classList.add('active');
   searchForm.classList.remove('active');
   cartItem.classList.remove('active');
   // signupForm.classList.remove('active');
}

document.querySelector('#close-login-form').onclick = () => {
   loginForm.classList.remove('active');
}

let signupForm = document.querySelector('.signup-form');

document.querySelector('#signup-btn').onclick = () => {
   signupForm.classList.add('active');
   searchForm.classList.remove('active');
   loginForm.classList.remove('active');
   cartItem.classList.remove('active');
}

document.querySelector('#close-signup-form').onclick = () => {
   signupForm.classList.remove('active');
}

let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .nav');

menu.onclick = () => {
   menu.classList.toggle('fa-times');
   navbar.classList.toggle('active');
   searchForm.classList.remove('active');
   loginForm.classList.remove('active');
   signupForm.classList.remove('active');
   cartItem.classList.remove('active');
}

let searchForm = document.querySelector('.search-form')

document.querySelector('#search-btn').onclick = () => {
   searchForm.classList.toggle('active');
   cartItem.classList.remove('active');
   loginForm.classList.remove('active');
   signupForm.classList.remove('active');
   // navbar.classList.remove('active');
   // as2l chatgpt ele fo2ya de bt3ml eh
}

let cartItem = document.querySelector('.cart-items-container')

document.querySelector('#cart-btn').onclick = () => {
   cartItem.classList.toggle('active');
}

window.onscroll = () => {
   loginForm.classList.remove('active');
   signupForm.classList.remove('active');
   menu.classList.remove('fa-times');
   navbar.classList.remove('active');
   searchForm.classList.remove('active');
   cartItem.classList.remove('active');

   if (window.scrollY > 0) {
      document.querySelector('.header').classList.add('active');
   } else {
      document.querySelector('.header').classList.remove('active');
   }
}
