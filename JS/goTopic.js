$('nav #navbarContent #elts_cat li ul li a').on('click',function(e){
    /*console.log(e.target.textContent);*/
    let tmpTheme = e.target.textContent;
    window.location.href='displayTopics.php?gTheme='+tmpTheme;
});