$(document).ready(function () {
    
    $('.dt2').dropdown();
    $('.sidenav').sidenav();
    $('.dropdown-trigger').dropdown({
        coverTrigger:false,
        constrainWidth:false

    });
    $('.tabs').tabs({
        swipeable:false
    });
});