
<form action="/admin-users" method="post" enctype='multipart/form-data' id="addform">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <input type="text" class="form-control" name="role">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Avatar</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="avatar">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" class="form-control" name="status">
    </div>
    <button type="submit" name="create_user" class="btn btn-primary">Create User</button>
    <a href="/admin" class="btn btn-info">Back</a>
</form>
<script> $(document).ready(function(){
            $("#addform").on('submit',function(e){
            var flag=0;
            var username=$("input[name='username']").val();
            var password=$("input[name='password']").val();
            var role=$("input[name='role']").val();
            var email=$("input[name='email']").val();
            var status=$("input[name='status']").val();
            var avatar=$("input[name='avatar']").val();
            console.log(avatar);
            if(username.trim()==null||username.trim()==""||password.trim()==null||password.trim()==""||role.trim()==null||role.trim()==""){
                alert("Some of your input is empty!Please check again");
                e.preventDefault();return false;
            }else if(username.trim()<4){
                alert("Username's length must be greater than 3");
                e.preventDefault();return false;
            }
        })
    })
</script>
    
