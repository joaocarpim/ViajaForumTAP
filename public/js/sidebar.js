// public/js/sidebar.js
document.addEventListener('DOMContentLoaded', (event) => {
    const sidebar = document.getElementById('sidebar');
    const btn_navbar = document.getElementById('btn-navbar');
    const closeBtn = document.getElementById('close-btn');

    btn_navbar.addEventListener('click', () => {
        sidebar.classList.add('open');
    });

    closeBtn.addEventListener('click', () => {
        sidebar.classList.remove('open');
    });

    // function pageReload() {
    //     location.reload()
    // }
});
