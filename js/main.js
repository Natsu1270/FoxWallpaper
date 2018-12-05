$(document).ready(function () {
    // edit profile with ajax
    $('.modal').modal();

    // autocomplete search
    $('input.autocomplete').autocomplete({
        data: {
          "Girl": null,
          "Nature": null,
          "Landscape": null,
          "3D": null,
          "Abstract": null,
          "Beautiful": null,
          "Bike": null,
          "Race": null,
          "Motor": null,
          "Microsoft": null,
          "Google": 'https://upload.wikimedia.org/wikipedia/commons/a/a5/Google_Chrome_icon_%28September_2014%29.svg'
        },
      });
    $('.fullscreen').on('click', () => {
        $('body').fullscreen();
        return false;
    });
    $('.fixed-action-btn').floatingActionButton();
    $('.tap-target').tapTarget();
    $('.dt2').dropdown();
    $('.sidenav').sidenav();
    $('.dropdown-trigger').dropdown({
        coverTrigger: false,
        constrainWidth: false

    });
    $('.tabs').tabs({
        swipeable: true,
        responsiveThreshold: 1920
    });
    $('.grid').masonry({
        // options
        itemSelector: '.grid-item',
        columnWidth: 50
    });
    $("#search-user").submit(function(event){
        
        $.ajax({
            type:"post",
            url:"http://localhost/LTW/include/search_user.php",
            data:{
                username:$("#search").val()
            },
            success:function(result){
                window.location.href = "http://localhost/ltw/profile.php?user_id="+String(result);
            }
        })
    })
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
            var img_location = "";
            if (cid == 1) {
                img_location = '3d_abstract';
            } else if (cid == 2) {
                img_location = 'anime';
            } else if (cid == 3) {
                img_location = 'bike';
            } else if (cid == 4) {
                img_location = 'landscape';
            } else if (cid == 5) {
                img_location = 'girl';
            }

            function getRandomSize(min, max) {
                return Math.round(Math.random() * (max - min) + min);
            }
            var allImages = "";
            for (var i = 0; i < response.length; i++) {
                var width = getRandomSize(200, 400);
                var height = getRandomSize(200, 400);
                allImages += "<img src='http://localhost/ltw/images/" + response[i] + "'" + '>';
            }
            var selector = "#" + img_location;
            $(selector).append(allImages);
        },
        error: function () {
            alert("fuck");
        }
    });
}