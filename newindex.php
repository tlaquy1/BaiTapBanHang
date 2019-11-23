<?php
include_once("newheader.php");
include_once("model/sql.php");
?>
<?php


$dem=0;

if(isset($_REQUEST["maloai"])){
  $lsFromDB= Sach::getListLoaiFromDB($_REQUEST["maloai"]);
}
if(isset($_REQUEST["ms"])){
  if ($_REQUEST["ms"]=="all"){
    $lsFromDB=Sach::getListFromDB();
  }
}

if(!isset($_REQUEST["maloai"]) && !isset($_REQUEST["ms"])){
  $lsFromDB = Sach::getListFromDB();
  }
  $keyWord=null;
if (isset($_REQUEST["timkiem"])) {
    $keyWord = $_REQUEST["timkiem"];
}
if ($keyWord != null) {
    $lsFromDB = Sach::getSearch($keyWord);
}
?>  
 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="newindex.php" class="nav-link">Trang Chủ</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="newgiohang.php" class="nav-link">Giỏ Hàng</a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3" action="newindex.php" method="">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" 
                placeholder="Search" aria-label="Search" name="timkiem">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
<div class="wrapper">

   
    <!-- content-wrapper -->
    <div class="content-wrapper">
    <div class="container">

<div class="row">
    
    <div class="col-md-12">


        <h3 style="Text-align:Center; color:red"> SÁCH </h3>
            <!--  -->
            
            <table style="    border-collapse: inherit; border-spacing: 60px 5px;">
                 <tr>
                <?php
               

                foreach ($lsFromDB as $key => $value) {
                    $dem++;
                    
                    ?>
                      <div>
                        <td>
                          
                            <a href="newxuly.php?action=them&ms=<?php echo $value->MaSach?>&gia=<?php echo $value->Gia?>">  <img src="<?php echo $value->Anh ?> " style="height: 264px;"></a>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                            <b style="color: blueviolet;font-size: 30px;"> <?php echo $value->TenSach?></b>
                                </div>
                                <div class="col-lg-6" style="text-align: end;">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $value->MaSach ?>"
                            value="<?php echo $value->MaSach ?>" name="btnXem" style="">
                            <i class="fas fa-info-circle"></i>  </button>
                            </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6" style="text-align: center;">
                            <b   style="font-size: 25px;"  > <?php echo $value->Gia?></b>
                                </div>
                                <div class="col-lg-6" style="text-align: end;">
                            <a href="newxuly.php?action=them&ms=<?php echo $value->MaSach?>&gia=<?php echo $value->Gia?>">
                                 <img src="source/datmua11.png " style="height: 32px;"> </a>
                                </div>
                            </div>
                        </td>
                      </div>
                        <?php 
                            if($dem % 3 ==0){
                                ?>  
                    </tr>
                    <tr>
                    
                                <?php
                            }
                            if($dem>=count($lsFromDB)){
                                ?>
                    </tr>
                                <?php
                            }
                        ?>

                    <?php

                    }

                    ?>
            </table>
         

            <!--  -->
        <!-- phan trnag -->
        
        
        <!--  -->
    </div>
</div>
</div>
    </div>
    <!-- content-wrapper -->
    <?php
    include_once("newfooter.php");
    ?>