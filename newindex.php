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
 <!--  -->
 <!--  -->
<div class="wrapper">

   
    <!-- content-wrapper -->
    <div class="content-wrapper">
    <div class="container">

<div class="row">
    
    <div class="col-md-12">


        <h3 style="Text-align:Center; color:red"> SÁCH </h3>
            <!--  -->
            
            <table style="    border-collapse: inherit; border-spacing: 20px 0px;">
                 <tr>
                <?php
               

                foreach ($lsFromDB as $key => $value) {
                    $dem++;
                    
                    ?>
                      <div>
                        <td>
                            <!--  -->
                        <div class="box7">
                                    <img src="<?php echo $value->Anh ?> " style="   width: 190px;
    height: 200px;">
                                    <div class="box-content">
                                        <h3 class="title"><?php echo $value->TenSach ?></h3>
                                        <span class="post"><?php echo $value->Gia ?></span>
                                        <ul class="icon">
                                      
                                            <li>
                                                <!-- <a href="#" class="fa fa-search"></a> -->
                                                <!-- <a href="" class="fa fa-search">     -->

                                                <style>
                                                    button:hover{transform:rotate(360deg)}
                                                </style>
                                                    <button class= "btn btn-info"type="button"  data-toggle="modal"
                                                     data-target=".bd-example-modal-lg<?php echo $value->MaSach ?>"
                                                    value="<?php echo $value->MaSach ?>" name="btnXem" style="
                                                    margin-top: 0px;
                                                    width: 37px;
                                                    height: 37px;
                                                    border-radius: 50%;
                                                    -moz-border-radius: 50%;
                                                    -webkit-border-radius: 50%;
                                                    transition:all .3s ease 0s;
                                                    
                                                    ">
                                                    <i class="fas fa-info" style="    margin-left: 0px;"></i>
                                                    </button>
                                             
                                                <!-- </a> -->
                                            </li>
                                           
                                            <li><a href="newxuly.php?action=them&ms=<?php echo $value->MaSach?>&gia=<?php echo $value->Gia?>" class="fas fa-shopping-cart"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-12">
                                    <b style="color: blueviolet;font-size: 20px;"> <?php echo $value->TenSach?></b>
                                    <b   style="font-size: 25px;margin-left: 35px;"  > <?php echo $value->Gia?></b>
                                </div>
                                <!--  -->
                           
                           
                               
                            
                           
                        </td>
                      </div>
                        <?php 
                            if($dem % 5 ==0){
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
    <!--  -->
    <!-- Modal chi tiet -->
<?php 
$list = Sach::getListFromDB();
    foreach ($list as $key => $value) {
     
   
?>
<div class="modal fade bd-example-modal-lg<?php echo $value->MaSach ?>" tabindex="-1" 
role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="row">
                <div class="col-lg-4">
                    <img src="<?php echo $value->Anh ?>" alt="" style="max-width: 100%;">
                </div>
                <div class="col-lg-8">
                    <b style="font-size: 30px;"> Tên sách: <?php echo $value->TenSach ?></b> <br>
                    <span> Tác giả: <?php echo $value->TacGia ?></span> <br>
                    <span> Số tập: <?php echo $value->SoTap ?></span> <br>
                    <span> Giá: <?php echo $value->Gia ?></span> <br>
                    <span> Tóm Tắt: <?php echo $value->TomTat ?></span> <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>  
</div>
    <?php } ?>
<!--  -->
            
               
    <!--  -->
    <?php
    include_once("newfooter.php");
    ?>