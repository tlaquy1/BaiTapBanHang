<?php


include_once("newheader.php");


?>
<?php
$lsGioHangFromDB = GioHang::getListFromDB();
$tong = 0;
foreach ($lsGioHangFromDB as $key => $value) {
    $tong += $value->ThanhTien;
}
// $size = count($lsGioHangFromDB);
// if ($size == 0) {
//     header("location:newindex.php");
  
// }
?>
<!-- <b>TRang 2222222222222222222</b> -->
<div class="content-wrapper">
<form action="newxuly.php" method="post">
    <table class="table" border='1' style="overflow: auto;">
        <thead class="thead-dark" style="background: black;
	    color: white;">
            <tr>
                <th scope="col" style="text-align: center;">...</th>
                <th scope="col">TenSach</th>
                <th scope="col">Ảnh</th>
                <th scope="col">TacGia </th>
                <th scope="col">SoLuong</th>
                <th scope="col">Gia</th>
                <th scope="col">...</th>
                <th scope="col">ThanhTien</th>


            </tr>
        </thead>
        <tbody>
            <!-- code php -->
            <!--  -->
            <?php
            foreach ($lsGioHangFromDB as $key => $value) {
                $sach = Sach::getChiTiet($value->MaSach);

                ?>

                <tr class="table-info">
                    <td align="center" style="vertical-align: middle;"> <input type='checkbox' name='txtcheckbox[]' value="<?php echo $value->MaSach ?>"></td>
                    <td style="vertical-align: middle;"> <b style="    font-size: 30px;"> <?php echo $sach->TenSach ?> </b></td>
                    <td style="vertical-align: middle;"><img src="<?php echo $sach->Anh ?> " alt="" style="    width: 60px;height: 80px;"></td>
                    <td style="vertical-align: middle;font-size: 25px;"><?php echo $sach->TacGia ?> </td>
                    <td style="text-align: center;vertical-align: middle;">
                        <input type="number" value="<?php echo $value->SoLuong ?>" name="txtsoluong<?php echo $value->MaSach ?>">
                        <button type="submit" value="<?php echo $value->MaSach ?>" name="btnEdit">Sua</button>
                    </td>
                    <td style="vertical-align: middle;"<?php echo $value->Gia ?></td>
                    <td style="vertical-align: middle;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $value->MaSach ?>"
                         value="<?php echo $value->MaSach ?>" name="btnXem">Xem chi tiết</button>
                    </td>
                    <td style="vertical-align: middle;font-size: 25px;"><?php echo $value->ThanhTien ?> </td>

                </tr>

            <?php

            }

            ?>
        </tbody>
    </table>
    <button class="btn btn-danger" type="submit" value="Xoa" name="btnXoa" style="    margin-left: 500px;    height: 50px;
    width: 80px;">Xóa</button>
    <button class="btn btn-outline-danger"> <a href="newxuly.php?action=deleteAll"> XoaHet</a></button>
    <!-- <input type="submit" value="Xoa" name="btnXoa"> -->
    </div>
</form>


   
<div align="right" style="margin-top: -205px;">
    <h1><b><?php echo $tong ?> </b> </h1>
</div>



<?php
if (isset($_REQUEST["btnXem"]))
    $sach = Sach::getChiTiet($_REQUEST["btnXem"]);
?>
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
</div>
<?php include_once("newfooter.php") ?>