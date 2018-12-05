
$(document).ready(function () {
    $('.dt2').dropdown();
    $('.sidenav').sidenav();
    $('.dropdown-trigger').dropdown({
        coverTrigger: false,
        constrainWidth: false

    });
    $('.tabs').tabs({
        swipeable: true,
        responsiveThreshold : 1920
    });
    $('.grid').masonry({
        // options
        itemSelector: '.grid-item',
        columnWidth: 50
    });
});

function getWallpaper(id) {
    var cid = id;
    $.ajax({
        type: "post",
        url: "http://localhost/LTW/include/cat_wallpaper.php",
        data: {
            cat_id: cid
        },
        dataType: 'JSON',
        success: function (response) {
            var img_location="";
            if(cid==1){
                img_location='3d_abstract';
            }else if(cid==2){
                img_location='anime';
            }else if(cid==3){
                img_location='bike';
            }else if(cid==4){
                img_location='landscape';
            }else if(cid==5){
                img_location='girl';
            }
            function getRandomSize(min, max) {
                return Math.round(Math.random() * (max - min) + min);
            }
            var allImages="";
            for (var i = 0; i < response.length; i++) {
                var width = getRandomSize(200, 400);
                var height = getRandomSize(200, 400);
                allImages += "<img src='http://localhost/ltw/images/"+response[i]+"'"+'>';
            }
            var selector="#"+img_location;
            $(selector).append(allImages);
        },
        error: function () {
            alert("fuck");
        }
    });
}