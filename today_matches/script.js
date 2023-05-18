let loginForm = document.querySelector('.login-form');

document.querySelector('#login-btn').onclick = () => {
  loginForm.classList.add('active');
  searchForm.classList.remove('active');
  cartItem.classList.remove('active');
}

document.querySelector('#close-login-form').onclick = () => {
  loginForm.classList.remove('active');
}

let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .nav');

menu.onclick = () => {
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
  searchForm.classList.remove('active');
  cartItem.classList.remove('active');
}

let searchForm = document.querySelector('.search-form')

document.querySelector('#search-btn').onclick = () => {
  searchForm.classList.toggle('active');
  cartItem.classList.remove('active');
  loginForm.classList.remove('active');
  // navbar.classList.remove('active');
  // as2l chatgpt ele fo2ya de bt3ml eh
}

let cartItem = document.querySelector('.cart-items-container')

document.querySelector('#cart-btn').onclick = () => {
  cartItem.classList.toggle('active');
}

window.onscroll = () => {
  loginForm.classList.remove('active');
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








const matchContainers = document.querySelectorAll('.match');
const voteContainers = document.querySelectorAll('.vote');

matchContainers.forEach((matchContainer, index) => {
  const leftBtn = matchContainer.querySelector('.left-btn');
  const rightBtn = matchContainer.querySelector('.right-btn');
  const leftLabel = voteContainers[index].querySelector('.left-label');
  const rightLabel = voteContainers[index].querySelector('.right-label');
  const leftBar = voteContainers[index].querySelector('.left-bar');
  const rightBar = voteContainers[index].querySelector('.right-bar');

  let leftVotes = 0;
  let rightVotes = 0;

  leftBtn.addEventListener('click', () => {
    leftVotes++;
    updateVotePercentage();
  });

  rightBtn.addEventListener('click', () => {
    rightVotes++;
    updateVotePercentage();
  });



  function updateVotePercentage() {
    const totalCount = leftVotes + rightVotes;

    let leftPercentage = totalCount === 0 ? 50 : (leftVotes / totalCount) * 100;
    let rightPercentage = totalCount === 0 ? 50 : (rightVotes / totalCount) * 100;

    if (index === 3) {
      leftPercentage = 120;
      rightPercentage = 0;
    }

    leftBar.style.width = `${leftPercentage}%`;
    rightBar.style.width = `${rightPercentage}%`;

    leftLabel.textContent = `${leftPercentage.toFixed(0)}%`;
    rightLabel.textContent = `${rightPercentage.toFixed(0)}%`;
  }
  updateVotePercentage();
});
