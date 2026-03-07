const navbarNav = document.querySelector
('.navbar-nav');
// ketika hamburger menu di klikv
document.querySelector('#hamburger-menu')
onclick = () =>{
    navbarNav.classList.toggle('active');
};

// klik di luar sidebar untuk menghilangkan nav
const hamburger =document.querySelector('#hamburger-menu');

document.addEventListener('click', function(e) {
    if(!hamburger.contains(e.targer) &&  !navbarNav(e.target)){
        navvbarNav.classList.remove('active')
    }
});