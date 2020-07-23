<?php
if (!isset($_SESSION)) session_start();
include_once("../models/DataProvider.php");
if(isset($_POST['action'])){
    $db=new DataProvider();
    $id=$_POST['id'];
    if($_POST['action']=='promote'){
        $db->ExecuteQuery("UPDATE accounts SET lv=1 WHERE id=$id;");
    }
    if($_POST['action']=='demote'){
        $db->ExecuteQuery("UPDATE accounts SET lv=0 WHERE id=$id;");
    }
    if($_POST['action']=='delete'){
        $db->ExecuteQuery("UPDATE accounts SET lv=0 WHERE id=$id;");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache" /> <META HTTP-EQUIV="Expires" CONTENT="-1" />
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
                        <a class="dropdown-item" href="../templates">Return to main Page</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
        <?php
                include_once('menu-slide.php');
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Static Navigation</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Static Navigation</li>
                        </ol>
                        

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
            <div class="table-responsive" >
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Accounts</th>
                            <th>Button</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php 
                       include_once("../models/DataProvider.php");
                        $db=new DataProvider();
                        $sql="SELECT * FROM `accounts`";
                        $array=$db->FetchAll($sql);
                        foreach($array as $user){
                            if($user['id']>0){
                            echo "<tr>";
                                echo "<td class='acc-id' >$user[id]</td>";
                                echo "<td class='acc-username' >$user[username]</td>";
                                if($user['lv']==1){
                                    echo "<td><button class='btn-promote btn btn-primary' disabled>PROMOTE</button>";
                                    echo "<button class='btn-demote btn btn-danger' style='margin-left:10px' >DEMOTE</button>";
                                }
                                else{
                                    echo "<td><button class='btn-promote btn btn-primary' >PROMOTE</button>";
                                    echo "<button class='btn-demote btn btn-danger' style='margin-left:10px' disabled>DEMOTE</button>";
                                }
                                echo "<button class='btn-delete btn btn-danger' style='margin-left:10px' ><i class='fas fa-ban'></i></button></td>";
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
                $('.btn-promote').on('click',function(){
                    let div = $(this).parent().parent();
                    id=div.find('.acc-id').text();
                    name=div.find('.acc-username').text();
                    var check = confirm("Are you sure to promote '"+ name +"' ?");
                    if(check==true){
                        $.post('',{id:id,action:'promote'},function(){
                        alert('promote success');
                        location.reload();
                        
                    });
                    }
                })
                $('.btn-demote').on('click',function(){
                    let div = $(this).parent().parent();
                    id=div.find('.acc-id').text();
                    name=div.find('.acc-username').text();
                    var check = confirm("Are you sure to demote '"+ name +"' ?");
                    if(check==true){
                        $.post('',{id:id,action:'demote'},function(){
                        alert('demote success');
                        location.reload();
                    });
                    }
                })
                $('.btn-delete').on('click',function(){
                    let div = $(this).parent().parent();
                    id=div.find('.acc-id').text();
                    name=div.find('.acc-username').text();
                    var check = confirm("Are you sure to delete '"+ name +"' ?");
                    if(check==true){
                        $.post('',{id:id,action:'delete'},function(){
                        location.reload();
                    });
                    }
                })
            </script>


            <script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                } 
            </script>
                </footer>
            </div>
        </div>
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




