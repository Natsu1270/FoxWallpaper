$(document).ready(function () {
    // date time picker
    
    //related wallpaper
    $('.carousel').carousel({
        indicators: true
    });

    // comment character count
    $('input#input_text, textarea#textarea2').characterCounter();

    // edit profile with ajax
    $('select').formSelect();
    $("#password_edit").on('keyup', () => {
        var pass = $("#password_edit").val();
        console.log(pass.length);
        if (pass.length >= 4) {
            $(".editpasshelper").html("");
        } else if (pass.length < 4) {
            $(".editpasshelper").html("Password must have at least 4 character!");
        }
    });
    $('.datepicker').datepicker({
        container:'body',
        format:'yyyy/mm/dd',
        showClearBtn:true,
        yearRange:[1970,2018]
    });
    // $('.datepicker').datepicker({
    //     selectMonths: true, // Creates a dropdown to control month
    //     selectYears: 15 // Creates a dropdown of 15 years to control year
    // });
    $('select').formSelect();
    $('.modal').modal({
        opacity: 0.6

    });

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
        swipeable: false,
        responsiveThreshold: 1920
    });
    $('.grid').masonry({
        // options
        itemSelector: '.grid-item',
        columnWidth: 50
    });
    $("#search-user").submit(function (event) {

        $.ajax({
            type: "post",
            url: "http://localhost:8000/include/search_user.php",
            data: {
                username: $("#search").val()
            },
            success: function (result) {
                window.location.href = "/profile?user_id=" + String(result);
            }
        })
    })
});

function editProfile(usr_id) {
    var the_user_id = usr_id;
    $.ajax({
        type: "post",
        url: "http://localhost:8000/include/edit_profile.php",
        data: {
            user_id: the_user_id,
            fullname: $("#fullname").val(),
            avatar: $("#avatar").val(),
            password: $("#password_edit").val(),
            about: $("#textarea1").val(),
            email: $("#email").val(),
            gender: $("#gender").val(),
            birthday:$("#birthday").val()
        },
        success: function (result) {
            window.location.href = "http://localhost:8000/account/profile.php?" + result;
        },
        error: function () {
            alert('error!');
        }
    })
}

function searchUser() {
    $.ajax({
        type: "post",
        url: "http://localhost:8000/include/search_user.php",
        data: {
            username: $("#search").val()
        },
        success: function (result) {
            window.location.href = "http://localhost:8000/account/profile.php?user_id=" + String(result);
        }
    })
}

function golog() {
    window.open(
        "http://localhost:8000/login",
        '_blank' // <- This is what makes it open in a new window.
      );
}

function getWallpaper(id) {
    var cid = id;
    $.ajax({
        type: "post",
        url: "http://localhost:8000/include/cat_wallpaper.php",
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
                allImages += "<img src='http://localhost:8000/images/" + response[i] + "'" + '>';
            }
            var selector = "#" + img_location;
            $(selector).append(allImages);
        },
        error: function () {
            alert("fuck");
        }
    });
}

function downNum(id) {
    var wall_id = id;
    $.ajax({
        type: "post",
        url: "http://localhost:8000/include/wallpaper_plus.php",
        data: {
            wallpaper_id: wall_id
        },
        success: function (response) {
            $("#dwnNum").html(response);
        }
    })
}

function love(islog, uid, wid,bid) {
    var lovebut=$("#"+bid);
    var incardlovebut=$("#count"+bid);
   
    if (!islog) {
        return golog();
    } else {
       
        if (lovebut.hasClass("purple")) {
            $.ajax({
                type: "POST",
                url: "http://localhost:8000/include/plusbtn_process.php",
                data: {
                    lovepurple : true,
                    user_id: uid,
                    wallpaper_id: wid
                },
                success: function (response) {
                    lovebut.removeClass('purple');
                    lovebut.addClass('redz');
                    incardlovebut.html(response);
                }
            })
        } else if (lovebut.hasClass('redz')) {
            $.ajax({
                type: "POST",
                url: "http://localhost:8000/include/plusbtn_process.php",
                data: {
                    lovered: true,
                    user_id: uid,
                    wallpaper_id: wid
                },
                success: function (response) {
                    console.log(response);
                    lovebut.removeClass('redz');
                    lovebut.addClass('purple');
                    incardlovebut.html(response);
                }
            })
        }
    }
}


function bookmark(islog, uid, wid,bid) {
    if (!islog) {
        return golog();
    } else {
        var bookbut =$("#"+bid);
        if (bookbut.hasClass("purple")) {
            $.ajax({
                type: "POST",
                url: "http://localhost:8000/include/plusbtn_process.php",
                data: {
                    bookpurple : true,
                    user_id: uid,
                    wallpaper_id: wid
                },
                success: function (response) {
                    bookbut.removeClass('purple');
                    bookbut.addClass('redz');
                }
            })
        } else if (bookbut.hasClass('redz')) {
            $.ajax({
                type: "POST",
                url: "http://localhost:8000/include/plusbtn_process.php",
                data: {
                    bookred: true,
                    user_id: uid,
                    wallpaper_id: wid
                },
                success: function (response) {
                    bookbut.removeClass('redz');
                    bookbut.addClass('purple');
                }
            })
        }
    }

}

document.addEventListener("DOMContentLoaded", function(){
	$('.preloader-background').delay(1000).fadeOut('slow');
	
	$('.preloader-wrapper')
		.delay(1000)
		.fadeOut();
});