const sidebarToggle = document.getElementById('sidebarToggle');
const sidebar = document.querySelector('.sidebar'); // More flexible selector
const setNav = document.querySelector('.setNavbar'); // More flexible selector
const setMain = document.querySelector('.main'); // More flexible selector

sidebarToggle.addEventListener('click', () => {
  sidebar.classList.toggle('sidebar-hidden'); 
  setNav.classList.toggle('navbar-hidden');
  setMain.classList.toggle('main-hidden');

  // Optional: Manage background color change for visual feedback (adjust class names as needed)
  const mainContent = document.querySelector('main');
  if (sidebar.classList.contains('sidebar-hidden')) {
    mainContent.classList.remove('main-content-shifted'); // Remove background shift
  } else {
    mainContent.classList.add('main-content-shifted'); // Add background shift
  }
});


const btnShowDetail = document.getElementById('btnShowDetail');
const detailContainer = document.getElementsByClassName('cardDetail');

btnShowDetail.addEventListener('click', () => {
  detailContainer.classList.remove('d-none');
});