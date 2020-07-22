<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once("../models/DataProvider.php");
    if(isset($_POST['promote-user'])){
        $id=$_POST['pro-id'];
        $user=$_POST['pro-name'];
        $db=new DataProvider();
        $sql="UPDATE accounts SET lv=1 WHERE id=$id";
        $db->ExecuteQuery($sql);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['postdata'] = $_POST;
            unset($_POST);
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        }
    }
    if(isset($_POST['demote-user'])){
        $id=$_POST['de-id'];
        $user=$_POST['de-name'];
        $db=new DataProvider();
        $sql="UPDATE accounts SET lv=0 WHERE id=$id";
        $db->ExecuteQuery($sql);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['postdata'] = $_POST;
            unset($_POST);
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
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
        <title>admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">HNH Shop Admin Page</a>
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Clothes: <?php
                                                                        $db=new DataProvider();
                                                                        $countClothes=$db->NumRows("SELECT * FROM clothes");
                                                                        echo $countClothes;
                                                                        ?> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="CLOTHES.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Bills chua giao: 
                                    <?php 
                                            $db=new DataProvider();
                                            $sql="SELECT MaHD FROM `hoadon` WHERE tinhtrang = 0" ;
                                            $num=$db->NumRows($sql);
                                            echo $num;
                                    ?>

                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="bills.php?tt=0">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Bills da giao:
                                    <?php 
                                            $db=new DataProvider();
                                            $sql="SELECT MaHD FROM `hoadon` WHERE tinhtrang = 1" ;
                                            $num=$db->NumRows($sql);
                                            echo $num;
                                    ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="bills.php?tt=1">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
        
                      
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
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

<div id="PromoteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">PROMOTION</h1>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <form  method = 'post' action='' enctype="multipart/form-data" >
            <input type="hidden" name="pro-id" id="pro-id" />
            <h4>Are you sure want to promote <b><span id="pro-user"></span></b> ?</h4>
            <input type='hidden' name='pro-name'  id='pro-name'/><br/>
            <div align="center">  
                
                <input type='submit'  name="promote-user" class="btn-pro btn btn-primary" value='YES' />
                <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
            </div>  
            
        </form>
      </div>
      
    </div>

  </div>
</div>

<div id="DemoteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title">PROMOTION</h1>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <form  method = 'post' action='' enctype="multipart/form-data" >
            <input type="hidden" name="de-id" id="de-id" />
            <h4>Are you sure want to demote <b><span id="de-user"></span></b> ?</h4>
            <input type='hidden' name='de-name'  id='de-name'/><br/>
            <div align="center">  
                
                <input type='submit'  name="demote-user" class="btn-de btn btn-primary" value='YES' />
                <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
            </div>  
            
        </form>
      </div>
      
    </div>

  </div>
</div>
<script>
    $(document).ready(function(){
        $('.btn-promote').on('click',function(){
            let div = $(this).parent().parent();
            id=div.find('.acc-id').text();
            name=div.find('.acc-username').text();
            $('#pro-id').val(id);
            $('#pro-name').val(name);
            $('#pro-user').text(name);              
        })
        $('.btn-demote').on('click',function(){
            let div = $(this).parent().parent();
            id=div.find('.acc-id').text();
            name=div.find('.acc-username').text();
            $('#de-id').val(id);
            $('#de-name').val(name);
            $('#de-user').text(name);              
        })
    })
</script>