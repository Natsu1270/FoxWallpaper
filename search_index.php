

<?php include"include/header.php";?>
<?php if(isset($_GET['submit'])){
    $Cat_id=(int)$_GET['cat_id'];
    $keyword=$_GET['searchinput'];
}
?>
<body>
    <?php include"include/navbar.php" ?>
    <!-- Tab area -->
    <div class="content" >
        <div class="section search-res z-depth-3" style="background-color:purple">
            <p style="color:white;font-size:30px;font-family: 'Ubuntu',sans-serif !important;margin-left:20px;font-weight: bold !important;">Search results for: <?php if(isset($_GET['searchinput'])){echo $_GET['searchinput'];}?></p>
        </div>
        <div class="divider"></div>
        <div class="section ">
            <div class="cat_wall card">
                <?php findWall($Cat_id,$keyword)  ?>
            </div>
        </div>

    </div>
</body>

