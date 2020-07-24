

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    DASHBOARD
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    DATABASE MANAGER
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <?php
                            if(isset($_SESSION['user']['id']))   {             
                                if( $_SESSION['user']['id']==-1){
                                
                                    echo "<a class='nav-link' href='ACCOUNT.php'>ACCOUNT </a>";
                                }
                            }
                        ?>
                        <a class="nav-link" href="TYPES.php">TYPES</a>
                        <a class="nav-link" href="TYPESCLOTHES.php">TYPESCLOTHES</a>
                        <a class="nav-link" href="CLOTHES.php">CLOTHES</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    BILL MANAGER
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link"  href="bills.php?tt=0"> UNPAID BILL</a>
                        <a class="nav-link" href="bills.php?tt=1"> PAID BILL</a> 
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small" style=' font-size: 20px;font-family: "Times New Roman", Times, serif;'>Logged in as:</div>
                <b style=' text-transform: uppercase; font-size: 20px; font-family: "Times New Roman", Times, serif;'>
                    <?php 
                            echo $_SESSION['user']['name'] ;
                    ?>
                </b>
            </div>
    </nav>
</div>