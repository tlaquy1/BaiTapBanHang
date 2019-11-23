<?php
session_start();
include_once("model/user.php");
include_once("model/sql.php");
// if (!isset($_SESSION["user"]))
//     header("location:login.php");
include_once("header.php");
include_once("nav.php");

?>
<?php
if(isset($_REQUEST["maloai"])){
    header("location:giohang.php");
}
$lsFromDB = Sach::getListFromDB();
$lsLoaiFromDB = Loai::getListFromDB();
$dem = 0;
?>


<!--  container -->

<div class="container">

    <div class="row">
        <!-- row 3 -->
        <div class="col-md-3">
            <!-- Chu de sach -->
            <p class="lead"> Chu De sach </p>
            <ul class="list-group">
                
                <?php
                        foreach ($lsLoaiFromDB as $key => $value) {
                ?>
               
                        <a href="index.php?loai= <?php echo $value->MaLoai ?>" class="list-group-item " style="text-decoration: none;color: black;">
                                <span>
                                <?php echo $value->TenLoai ?>
                                    <span class="badge badge-primary badge-pill" style="float: right;"> 0</span>
                                </span>
                            </a>
                <?php
                        }
                        ?>
            </ul>

            <!-- NXB -->
            <p class="lead"> NHÀ XUẤT BẢN </p>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                   KIm ĐỒng 1
                    <span class="badge badge-primary badge-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Kim Đồng 2 
                    <span class="badge badge-primary badge-pill">2</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Kim ĐỒng 3
                    <span class="badge badge-primary badge-pill">1</span>
                </li>
            </ul>

        </div>

        <!-- end row 3 -->
        <div class="col-md-9">


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
                              
                                <a href="xuly.php?action=them&ms=<?php echo $value->MaSach?>&gia=<?php echo $value->Gia?>">  <img src="<?php echo $value->Anh ?> " style="height: 264px;"></a>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                <b style="color: blueviolet;font-size: 30px;"> <?php echo $value->TenSach?></b>
                                    </div>
                                    <div class="col-lg-6" style="text-align: end;">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $value->MaSach ?>"
                                value="<?php echo $value->MaSach ?>" name="btnXem" style=""><i class="fas fa-info-circle"></i>  </button>
                                </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6" style="text-align: center;">
                                <b   style="font-size: 25px;"  > <?php echo $value->Gia?></b>
                                    </div>
                                    <div class="col-lg-6" style="text-align: end;">
                                <a href="xuly.php?action=them&ms=<?php echo $value->MaSach?>&gia=<?php echo $value->Gia?>"> <img src="source/datmua11.png " style="height: 32px;"> </a>
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




<!-- //container -->
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
    <?php include_once("footer.php") ?>