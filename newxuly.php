<?php 
include_once("model/sql.php");

if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
    if($action=="them"){
        $masach=$_REQUEST["ms"];
        $gia=$_REQUEST["gia"];
        $soluong=1;
        $thanhtien=$soluong*$gia;
        $list = GioHang::getListFromDB();
        $check=false;
        foreach ($list as $key => $value) {
           if($masach==$value->MaSach){
            $sl= $value->SoLuong +1;
            GioHang::editGioHangDB($masach,$sl,$gia);
           $check=true;
         
           }
        }
        if($check==false){
        GioHang::addGioHangToDB($masach,$soluong,$gia,$thanhtien);
        }
    
        //echo $masach." ".$gia." ".$thanhtien;
    
        
    }
    if($action=="deleteAll"){
        GioHang::deleteAllGioHangDB();
        //GioHang::deleteDB("sach01");
    }
    
    

}
if (isset($_REQUEST["btnEdit"])) {

    $masach=$_REQUEST["btnEdit"];
    $soluong=$_REQUEST["txtsoluong$masach"];
    $sach=Sach::getChiTiet($masach);
    $gia=$sach->Gia;
    GioHang::editGioHangDB($masach,$soluong,$gia);
 
}

if(isset($_REQUEST["btnXoa"])){
    if(!empty($_REQUEST["txtcheckbox"])){
        foreach($_POST['txtcheckbox'] as $selected){
                GioHang::deleteDB($selected);
                }
    }
}



 header("location:newgiohang.php");
?>