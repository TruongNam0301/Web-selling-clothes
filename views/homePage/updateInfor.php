<style>
.inputfile {
	position:static;
    margin-top:20px;
    margin-left:15px;
}
.inputfile + label {
    position:relative;
    top:-55px;
    padding :10px 10px;
    border-radius:10px;
    border:1px solid rgb(29, 10, 17);
    color: black;
    display: inline-block;
    cursor: pointer;
    margin-left:15px;
    background-color:white;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: rgb(137, 6, 32);
    color: white;
}
</style>
<div class="update-form" style="overflow :hidden">
    <div class="update-swapper">
        <form class="update-content" method="post" action='' enctype="multipart/form-data" >
            <input type="text"  name="name" class='text-input' placeholder="name" value="<?php echo $_SESSION['user']['name']?>">
            <input type="file" name="file" id="file" class="inputfile" />
            <label for="file">Upload Avatar</label>
            <input type="submit"  name="update-user-submit" class="update_button btn" value="UpDate">
        </form>
           
            <button type="button" class="button-logout btn btn-primary">LOG OUT</button>
    </div>
    
    </div>