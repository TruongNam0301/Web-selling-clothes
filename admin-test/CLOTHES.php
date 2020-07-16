<?php
include_once("../admin-test/models/DataProvider.php");
if(isset($_POST["update-clothes"])) {
    $file = $_FILES['file'];
    $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        if($fileSize==0&&$fileName==''){
            #just update name
            $db=new DataProvider();
            $id = $_POST['id'];
            $type = $_POST['types_clothes'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $sell = $_POST['sell'];
            $sql = "UPDATE `clothes` SET id_type='$type',name='$name', price='$price',best_sell='$sell' WHERE id = '$id' ";
            if ($db->ExecuteQuery($sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" ;
            }
        }else{
            #update name & image
            $fileExt = explode('.',$fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg','pnj','jpeg');
            if(in_array($fileActualExt,$allowed)){
                if($fileError==0){
                if($fileSize<1000000){
                        $fileNameNew = uniqid('',true).".".$fileActualExt;
                        $fileDestination = '../admin-test/image/image_product/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        $db=new DataProvider();
                        $id = $_POST['id'];
                        $type = $_POST['types_clothes'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $image = $fileNameNew;
                        $sql = "UPDATE `clothes` SET id_type='$type',name='$name' ,price='$price', picture='$image' ,best_sell='$sell'  WHERE id = '$id' ";
                            if ($db->ExecuteQuery($sql)) {
                                echo "New record created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" ;
                            }
                    }
                    else{
                        echo "file too big";
                    }
                } 
                else{
                    echo "error upload file";
                }
            }
            else{
                echo "can't up this file";
            }
        }
    }
    else if(isset($_POST["add-clothes"])){
        $file = $_FILES['file'];
        print_r($file);
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        $type = $_POST['types_clothes'];
        $name = $_POST['name'];
        $price = $_POST['price'];
            #ADD CLOTHES
            $fileExt = explode('.',$fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('jpg','pnj','jpeg');
            if(in_array($fileActualExt,$allowed)){
                if($fileError==0){
                    if($fileSize<1000000){
                        $fileNameNew = uniqid('',true).".".$fileActualExt;
                        $fileDestination = '../admin-test/image/image_product/'.$fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        $db=new DataProvider();
                        $image = $fileNameNew;
                        $sql = "INSERT INTO `clothes`(id_type, name, price, picture) VALUES ('$type','$name','$price','$image')";
                            if ($db->ExecuteQuery($sql)) {
                                echo "New record created successfully";
                            } else {
                                echo "Error: " . $sql . "<br>" ;
                            }
                    }
                    else{
                        echo "file too big";
                    }
                } 
                else{
                    echo "error upload file";
                }
            }
            else{
                echo "";
            }
    }
    if(isset($_POST['action'])){
        if($_POST['action']==='delete'){
        $db=new DataProvider();
        $delete_id = $_POST["id"];
        $sql = "DELETE FROM clothes WHERE id=$delete_id ; SET @num := 0; UPDATE clothes SET id = @num := (@num+1); ALTER TABLE clothes AUTO_INCREMENT = 1";
        $db->ExecuteMultiQuery($sql);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Static Navigation - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Start Bootstrap</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Static Navigation</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Static Navigation</li>
                        </ol>
                        

<!-- Modal edit-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method = 'post' action='' enctype="multipart/form-data" id='form'>
            <label>typeclothes</label>
                <select name="types_clothes" id="types_clothes">
                    <option value="4">hoodies</option>
                    <option value="1">jacket</option>
                    <option value="3">t-shirt</option>
                    <option value="2">shirt</option>
                </select><br/>
            <input type="hidden" name="id" id="id" />
            <label>name</label>
            <input type='text' name='name'  id='name'/><br/>
            <label>price</label>
            <input type='text' name='price' id='price'/><br/>
            <input type="radio" class='check' name="sell" value="0">
            <label >normal</label>
            <input type="radio" class='check' name="sell" value="1">
            <label >best sell</label><br>
            <div class='image-swap'  style=" display: inline-block;">
                <label>image</label>
            </div>
            <div class='blah-swap' style=" display: inline-block;">
            </div>
            <img src='' id='image' alt='cloth-image' style=' display:block;width:100px; height:50px'>
            <div class="modal-footer" align="center" style="margin-top:20px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type='submit'  name='update-clothes' class='btn-save btn btn-primary' value='save' />
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div> 
<!--Modal add-->   
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method = 'post' action='' enctype="multipart/form-data" id='form-add'>
            <label>typeclothes</label>
                <select name="types_clothes" id="types_clothes-add">
                    <option value="4">hoodies</option>
                    <option value="1">jacket</option>
                    <option value="3">t-shirt</option>
                    <option value="2">shirt</option>
                </select><br/>
            <label>name</label>
            <input type='text' name='name'  id='name-add'/><br/>
            <label>price</label>
            <input type='text' name='price' id='price-add'/><br/>
            <label>image</label>
            <div class='image-swap'>
            </div>
            <div class='blah-swap' style=" display: inline-block;">
              </div>
            <div class="modal-footer" align="center" style="margin-top:20px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type='submit'  name='add-clothes' class='btn-add btn btn-primary' value='add' />
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>       
                    <!-- table-->
                        <div class="card mb-4">
                            <div class="card-header" >
                                <i class="fas fa-table mr-1"></i>
                                Product List
                                <div style="float:right">
                                   <button class='btn-add btn btn-success'  data-toggle='modal' data-target='#AddModal'>Add New Clothes</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive"  id='clothes_table'>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Id_Type</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Pic</th>
                                                <th>Best Sale</th>
                                                <th>button</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php 
                                            include_once("../admin-test/models/DataProvider.php");
                                            $db=new DataProvider();
                                            $sql="SELECT * FROM `clothes`";
                                            $array=$db->FetchAll($sql);
                                            foreach($array as $item){
                                                @$p=number_format($item['price'],0,",",".");
                                                echo "<tr>";
                                                    echo "<td class='id'>$item[id]</td>";
                                                    echo "<td class='type'>$item[id_type]</td>";
                                                    echo "<td class='name'>$item[name]</td>";
                                                    echo "<td class='price'>$p</td>";
                                                    echo "<td ><img src='../admin-test/image/image_product/$item[picture]' class='image' style='width:100px; height:50px' ></td>";
                                                    echo "<td class='bestSale'>$item[best_sell]</td>";
                                                    echo "<td><button class='btn-edit btn btn-primary' data-toggle='modal' data-target='#exampleModal'>EDIT</button>";
                                                    echo "<button class='btn-delete btn btn-danger' style='margin-left:10px' >DELETE</button></td>";
                                                echo "</tr>";
                                            }                               
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <script>
                        $(document).ready(function(){
                            validateForm();
                            $('.btn-edit').on('click',function(){
                                        let div = $(this).parent().parent();
                                        id=div.find('.id').text();
                                        name=div.find('.name').text();
                                        price=div.find('.price').text().replace('.', '');
                                        image=div.find('.image').attr('src');
                                        type = div.find('.type').text();
                                        bestsale = div.find('.bestSale').text();
                                        $('#name').val(name);
                                        $('#price').val(price);
                                        $('#image').attr('src',image);
                                        $('#id').val(id);
                                        $("input[name=sell][value=" + bestsale + "]").attr('checked', 'checked');
                                        $('#types_clothes option[value='+type+']').attr('selected','selected');
                                    })
                            $('.btn-delete').on('click',function(){
                                    let div = $(this).parent().parent();
                                    id=div.find('.id').text();
                                    name=div.find('.name').text();
                                    var check = confirm("Are you sure to delete "+ name +" ?");
                                    if(check==true){
                                        $.post('',{id:id,action:'delete'},function(){
                                            location.reload();
                                            alert('delete success')
                                        });
                                    }
                            })
                            $('.btn-edit,.btn-add').on('click',function(){
                                $('.blah-swap').append(" <img class='blah' src='#' alt=''/>")
                                $('.image-swap').append(" <input type='file' name='file' id='file-add' onchange='readURL(this);' />")
                            })
                            $("#exampleModal,#AddModal").on("hidden.bs.modal", function () {
                                $('.blah-swap img').remove();
                                $('.image-swap input').remove();
                            });
                            function validateForm() {
                                $("#form-add").validate({
                                    onfocusout: false,
                                    onkeyup: false,
                                    onclick: false,
                                    rules: {
                                        "name":{
                                            required: true,
                                        },
                                        "price":{
                                            required: true,
                                        },
                                        "file": {
                                            required: true,
                                        }
                                    },
                                    messages: {
                                        "name":{
                                            required: "* Bắt buộc nhập name"
                                        },
                                        "price":{
                                            required: "* Bắt buộc nhập price"
                                        },
                                        "file": {
                                            required: "* Bắt buộc nhập file"
                                        
                                        },
                                    }
                                });
                            }
                        })
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader()
                                reader.onload = function (e) {
                                    $('.blah')
                                        .attr('src', e.target.result)
                                        .width(100)
                                        .height(100);
                                    
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </footer>
            </div>
        </div>
                        <script>if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    } </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
