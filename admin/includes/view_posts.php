<?php
if(isset($_GET['delete'])){
    $del_id=$_GET['delete'];
    $query="DELETE FROM cms.image where ID=$del_id";
    $res=mysqli_query($conn,$query);
    if(!$res){
        die('Query failed');
    }
}
if(isset($_POST['edit_post'])){
    $Cat_id=$_POST['cat_id'];
    $tag=$_POST['tag'];
    $query="update cms.image set Cat_ID='$Cat_id',tag='$tag' where id=$edit_id";
    if(!mysqli_query($conn,$query)){
        die("Insert failed" );
    }
}
?>


        <button class="btn btn-success cusbtn" id="3d">3D abstract</button>
        <table id="3d_table" class="table table-dark table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                <?php fieldname() ?>
                </tr>
            </thead>
            <tbody>
                <?php allPost(1); ?>
            </tbody>
        </table>
    


        <button class="btn btn-success cusbtn" id="anime">Anime</button>
        <table id="anime_table" class="table table-dark table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <?php fieldname() ?>
                </tr>
            </thead>
            <tbody>
                <?php allPost(2); ?>
            </tbody>
        </table>
    



        <button class="btn btn-success cusbtn" id="bike">Bike</button>
        <table  id="bike_table" class="table table-dark table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <?php fieldname() ?>
                </tr>
            </thead>
            <tbody>
                <?php allPost(3); ?>
            </tbody>
        </table>
    



        <button class="btn btn-success cusbtn" id="landscape">Landscape</button>
        <table id="landscape_table" class="table table-dark table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <?php fieldname() ?>
                </tr>
            </thead>
            <tbody>
                <?php allPost(4); ?>
            </tbody>
        </table>
    



        <button class="btn btn-success cusbtn" id="girl">Girl</button>
        <table  id="girl_table" class="table table-dark table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <?php fieldname() ?>
                </tr>
            </thead>
            <tbody>
                <?php allPost(5); ?>
            </tbody>
        </table>
    

