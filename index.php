<?php include"include/header.php" ?>

<body>
    <?php include"include/navbar.php" ?>
    <div class="content">
        <!-- Search area -->
        <div class="poster" style="background-image:url('images/forest.jpeg')">
            <div class="banner">
                <strong>Free amazing wallpapers for you on FoxWallpaper</strong>
            </div>
            <div class="s003">
                <form>
                    <div class="searchtitle">
                        <p>Find stunning wallpapers here</p>
                    </div>
                    <div class="inner-form">
                        <div class="input-field first-wrap">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="">Category</option>
                                    <option>3D Abstract</option>
                                    <option>Anime</option>
                                    <option>Bike</option>
                                    <option>Animal</option>
                                    <option>Girl</option>
                                    <option>Sport</option>
                                    <option>Nature</option>
                                    <option>Space</option>


                                </select>
                            </div>
                        </div>
                        <div class="input-field second-wrap">
                            <input id="search2" type="text" placeholder="Find wallpaper..." />
                        </div>
                        <div class="input-field third-wrap">
                            <button class="btn-search" type="button">
                                <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas"
                                    data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <script src="js/extention/choices.js"></script>
            <script>
                const choices = new Choices('[data-trigger]', {
                    searchEnabled: false,
                    itemSelectText: '',
                });
            </script>
        </div> <!-- End of poster -->

        <!-- Tab area -->
        <div class="tabmenu" style="height:47px">
            <!-- <ul class="tabs tabs-fixed-width">
               
            </ul> -->
            <div class="row" style="height:100%;text-align:center">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s2"><a class="active" href="#3d">3D Abstract</a></li>
                        <li class="tab col s2"><a href="#anime">Anime</a></li>
                        <li class="tab col s2"><a href="#bike">Bike</a></li>
                        <li class="tab col s2"><a href="#nature">Landscape</a></li>
                        <li class="tab col s2"><a href="#girl">Girl</a></li>
                    </ul>
                </div>
            </div>

        </div>
        
                <div id="3d" class="3d gallery row card">
                    <div class="col s4"> 
                        <img src="images/3d_abstract/neon_bubbles_3-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s4"> 
                        <img src="images/3d_abstract/neon_bubbles_3-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s4"> 
                        <img src="images/3d_abstract/neon_bubbles_3-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s4"> 
                        <img src="images/3d_abstract/neon_bubbles_3-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s4"> 
                        <img src="images/3d_abstract/neon_bubbles_3-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s4"> 
                        <img src="images/3d_abstract/neon_bubbles_3-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s4"> 
                        <img src="images/3d_abstract/neon_bubbles_3-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s4"> 
                        <img src="images/3d_abstract/neon_bubbles_3-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s4"> 
                        <img src="images/3d_abstract/neon_bubbles_3-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s4"> 
                        <img src="images/3d_abstract/neon_bubbles_3-t1.jpg" class="materialbox responsive-img card">
                    </div>
                </div>
                <div id="anime" class="anime gallery row card">
                    <div class="col s12 m6 l4"> 
                        <img src="images/anime/goku_black_5k_2-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/anime/goku_black_5k_2-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/anime/goku_black_5k_2-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/anime/goku_black_5k_2-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/anime/goku_black_5k_2-t1.jpg" class="materialbox responsive-img card">
                    </div>
                </div>

                <div id="bike" class="bike gallery row card">
                    <div class="col s12 m6 l4"> 
                        <img src="images/bikes/2019_kawasaki_ninja_125_5k-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/bikes/2019_kawasaki_ninja_125_5k-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/bikes/2019_kawasaki_ninja_125_5k-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/bikes/2019_kawasaki_ninja_125_5k-t1.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/bikes/2019_kawasaki_ninja_125_5k-t1.jpg" class="materialbox responsive-img card">
                    </div>
                </div>
                <div id="nature" class="anime gallery row card">
                    <div class="col s12 m6 l4"> 
                        <img src="images/land/callingwp.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/land/followwp.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/land/gracewp.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/land/possiblewp.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/land/questwp.jpg" class="materialbox responsive-img card">
                    </div>
                </div>

                <div id="girl" class="girl gallery row card">
                    <div class="col s12 m6 l4"> 
                        <img src="images/girl/5.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/girl/4.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/girl/7.png" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/girl/6.jpg" class="materialbox responsive-img card">
                    </div>
                    <div class="col s12 m6 l4"> 
                        <img src="images/girl/3.jpg" class="materialbox responsive-img card">
                    </div>
                </div>
                
                
        </div>



    </div>

    
</body>

</html>