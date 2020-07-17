<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once("../admin-test/models/DataProvider.php");
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
                                DATABASES
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="ACCOUNT.php">ACCOUNTS</a>
                                    <a class="nav-link" href="TYPES.php">TYPES</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">TYPESCLOTHES</a>
                                    <a class="nav-link" href="CLOTHES.php">CLOTHES</a>
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Clothes : 
                                    <?php include_once("../admin-test/models/DataProvider.php");
                                            $db=new DataProvider();
                                            $sql="SELECT id FROM `clothes`";
                                            $num=$db->NumRows($sql);
                                            echo $num;
                                    ?>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="CLOTHES.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
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
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                    <i class="fa fa-barcode" aria-hidden="true"></i>

                                        Bill Manager
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="Bill-Table" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>id_clothes</th>
                                                    <th>Buyer</th>
                                                    <th>Button</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                            <?php 
                                                include_once("../admin-test/models/DataProvider.php");
                                                $db=new DataProvider();
                                                $sql="SELECT * FROM `accounts`";
                                                  
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Product List
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Id_Type</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Pic</th>
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
                                                $p=number_format($item['price'],0,",",".");
                                                echo "<tr>";
                                                    echo "<td >$item[id]</td>";
                                                    echo "<td>$item[id_type]</td>";
                                                    echo "<td>$item[name]</td>";
                                                    echo "<td>$p</td>";
                                                    echo "<td><img src='../admin-test/image/image_product/$item[picture]' class='item' style='width:100px; height:50px' ></td>";
                                                    echo "<td><button class='btn-edit btn btn-primary' data-toggle='modal' data-target='#exampleModal'>EDIT</button><button class='btn-delete btn btn-danger' style='margin-left:10px'>DELETE</button></td>";
                                                echo "</tr>";
                                            }                               
                                            ?>
                                        </tbody>
                                    </table>
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