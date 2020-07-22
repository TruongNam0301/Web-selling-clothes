
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
        <h5 class="modal-title" id="exampleModalLabel">edit tinh trang hoa don</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method = 'post' action='?action=edit' enctype="multipart/form-data" id='form'>
            <input type='hidden' name='MaHD'  id='MaHD' /><br/>
            <input type="radio" class='check' name="tinhtrang" value="1">
            <label >xac nhan</label>
            <input type="radio" class='check' name="tinhtrang" value="0">
            <label >chua xac nhan</label><br>
            <div class="modal-footer" align="center" style="margin-top:20px">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type='submit'  name='update-clothes' class='btn-save btn btn-primary' value='save' />
            </div>
        </form>
      </div>
    </div>
  </div>
</div> 

<!--modal detail bill-->

                    <!-- table-->
                        <div class="card mb-4">
                            <div class="card-header" >
                                <i class="fas fa-table mr-1"></i>
                                Product List
                            </div>
                            <div class="card-body">
                                <div class="table-responsive"  id='clothes_table'>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>image clothes</th>
                                                <th>name clothes</th>
                                                <th>pricer</th>
                                                <th>quantity</th>
                                                <th>size</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        include_once("../controllers/BillsDetailCtr.php");
                                        $BillsDetailCtr=new BillsDetailCtr();
                                        $BillsDetailCtr->getBillsDetail($_GET['MaHD']);                 
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
                            $('.btn-edit').on('click',function(){
                                    let div = $(this).parent().parent();
                                    let tinhtrang = div.find('.tinhtrang').data('value');
                                    let MaHD = $(this).data('mahd');
                                    $('#MaHD').val(MaHD);
                                    $("input[name=tinhtrang][value=" + tinhtrang + "]").attr('checked', 'checked');
                                
                            })
                            $("#exampleModal").on("hidden.bs.modal", function () {
                                $("input[name=tinhtrang]").removeAttr('checked');
                            });
                        })
                    </script>
                </footer>
            </div>
        </div>
        <script>
            if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );} 
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
       
    </body>
</html>
