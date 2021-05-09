//Evenement lors du clic sur un Theme
$(document).on('click', 'nav #navbarContent #elts_cat li ul li a', function(e) {
    let tmpTheme = e.target.textContent;
    window.location.href = 'displayTopics.php?gTheme=' + tmpTheme;
});