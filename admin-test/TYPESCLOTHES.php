<?php
include_once("../admin-test/models/DataProvider.php");
$db=new DataProvider();
if(isset($_POST["update-type"])) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $type = $_POST['types_clothes'];
    $db->ExecuteQuery("UPDATE typeclothes SET name_type ='$name', type=$type WHERE id_type =$id");
}
else if(isset($_POST["add-type"])){
    $name=$_POST['name'];
    $type = $_POST['types_clothes'];
    $db->ExecuteQuery("INSERT INTO typeclothes VALUES(NULL,'$name',$type)");
}
if(isset($_POST['action'])){
    if($_POST['action']==='delete'){
    $db=new DataProvider();
    $delete_id = $_POST["id"];
    $sql = "UPDATE clothes SET id_type=-1 WHERE id_type=$delete_id;DELETE FROM typeclothes WHERE id_type=$delete_id ; SET @num := 0; UPDATE typeclothes SET id = @num := (@num+1); ALTER TABLE typeclothes AUTO_INCREMENT = 1";
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
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method = 'post' action='' enctype="multipart/form-data" id='form'>
            
            <input type="hidden" name="id" id="id" />
            <label>Name Type Clothes: </label>
            <input type='text' name='name'  id='name'/><br/>
            <label style="margin-left:105px">Type: </label>
                <select name="types_clothes" id="types_clothes" >
                    <?php
                        $db=new DataProvider();
                        $sql="SELECT * FROM types";
                        $result=$db->FetchAll($sql);
                        foreach($result as $row){
                            echo "<option value='$row[id]'>$row[nametype]</option>";
                        }
                    ?>
                </select><br/>
            <div class="modal-footer" align="center" style="margin-top:20px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type='submit'  name='update-type' class='btn-save btn btn-primary' value='save' />
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
        <h5 class="modal-title" id="exampleModalLabel">Add type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method = 'post' action='' enctype="multipart/form-data" id='form-add'>
            <label>Name Type Clothes: </label>
                <input type='text' name='name'  id='name'/><br/>
            <label style="margin-left:105px">Type: </label>
                <select name="types_clothes" id="types_clothes" >
                    <?php
                        $db=new DataProvider();
                        $sql="SELECT * FROM types";
                        $result=$db->FetchAll($sql);
                        foreach($result as $row){
                            echo "<option value='$row[id]'>$row[nametype]</option>";
                        }
                    ?>
                </select><br/>
            <div class="modal-footer" align="center" style="margin-top:20px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type='submit'  name='add-type' class='btn-save btn btn-primary' value='add' />
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
            <button class='btn-add btn btn-success'  data-toggle='modal' data-target='#AddModal'><i class="fa fa-plus" aria-hidden="true"></i>Add New Type Clothes</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive" >
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Name Type Product</th>
                            <th>Type </th>
                            <th>Button</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php 
                            include_once("../admin-test/models/DataProvider.php");
                            $db=new DataProvider();
                            $sql="SELECT typeclothes.id_type,typeclothes.name_type, typeclothes.type, types.nametype FROM `typeclothes` INNER JOIN types on typeclothes.type=types.id";
                            $array=$db->FetchAll($sql);
                            foreach($array as $typeclothes){
                                if($typeclothes['id_type']>0){
                                echo "<tr>";
                                    echo "<td class='id'>$typeclothes[id_type]</td>";
                                    echo "<td class='name' >$typeclothes[name_type]</td>";
                                    echo "<td class='type' data-id_type=$typeclothes[type]>$typeclothes[nametype]</td>";
                                    echo "<td><button class='btn-edit btn btn-primary' data-toggle='modal' data-target='#exampleModal'>EDIT</button>";
                                    echo "<button class='btn-delete btn btn-danger' style='margin-left:10px' >DELETE</button></td>";
                                echo "</tr>";
                                }
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
                        $('#types_clothes option:selected').removeAttr('selected');   
                        let div = $(this).parent().parent();
                        id=div.find('.id').text();
                        name=div.find('.name').text();
                        type = div.find('.type').data('id_type');
                        
                        $('#name').val(name);
                        $('#id').val(id);
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
                                    alert('delete success');
                                });
                            }
                    })
                    function validateForm() {
                        $("#form-add").validate({
                            onfocusout: false,
                            onkeyup: false,
                            onclick: false,
                            rules: {
                                "name":{
                                    required: true,
                                },
                                
                            },
                            messages: {
                                "name":{
                                    required: "* Bắt buộc nhập name"
                                },
                            
                            }
                        });
                    }
                })
                
            </script>
        </footer>
    </div>
</div>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    } 
    </script>
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
