(function () {
    // Menu Javascript Helper
    var menuButton = document.getElementById('menuButton'),
        topMenuNav = document.getElementById('topMenuNav');
    menuButton.addEventListener('click', function () {
        topMenuNav.classList.toggle('toggled');
        var aria = this.getAttribute('aria-expanded');
        if (aria === 'false') {
            topMenuNav.setAttribute('aria-expanded', 'true');
            menuButton.setAttribute('aria-expanded', 'true');
        }
        else {
            topMenuNav.setAttribute('aria-expanded', 'false');
            menuButton.setAttribute('aria-expanded', 'false');
        }
    })
})();