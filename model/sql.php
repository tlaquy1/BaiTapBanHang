<?php 

      function connect(){
        // $con = new  mysqli("localhost","root","","KtraPHP");
        // $con->set_charset("utf8");//hướng đối tượng
        // if($con->connect_error)
        //     die("kết nối thất bại. Chi tiết:".$con->connect_error);
        // return $con;
        $link = new mysqli('localhost','root','','sach') or die ('Kết nối thất bại');
        mysqli_query($link,'SET NAMES UTF8');
        return $link;
     }

    
    class Sach
{
    #Begin properties
    var $MaSach;
    var $TenSach;
    var $SoLuong;
    var $Gia;
    var $MaLoai;
    var $SoTap;
    var $Anh;
    var $NgayNhap;
    var $TacGia;
    var $TomTat;
    
    #end properties

    #Construct function

    function __construct($MaSach, $TenSach, $SoLuong, $Gia, $MaLoai,$SoTap,$Anh,$NgayNhap,$TacGia,$TomTat)
    {
        $this->MaSach = $MaSach;
        $this->TenSach = $TenSach;
        $this->SoLuong = $SoLuong;
        $this->Gia = $Gia;
        $this->MaLoai = $MaLoai;
        $this->SoTap = $SoTap;
        $this->Anh = $Anh;
        $this->NgayNhap = $NgayNhap;
        $this->TacGia = $TacGia;
        $this->TomTat = $TomTat;
    }
    static function getListFromDB(){
        //b1 tạo kết nối
        // $con = new  mysqli("localhost","root","","BookManager");
        // $con->set_charset("utf8");//hướng đối tượng
        // //mysqli_set_charset($con,"utf8");// thủ tục
        // if($con->connect_error){
        //     die("kết nối thất bại. Chi tiết:".$con->connect_error);
        // }
        $link = connect();
        //b2: thao tác với csdl : CRUD
        $sql = "SELECT * FROM sach";
        
        $result =  $link->query($sql);
        $list = array();
        
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {//biên nó thành 1 mảng kết hợp
                //$thongtin = new ThongTin($row["ID"],$row["Ten"],$row["Email"],$row["SDT"]);
                $sach = new Sach($row["MaSach"], $row["TenSach"], $row["SoLuong"], $row["Gia"], 
                $row["MaLoai"], $row["SoTap"], $row["Anh"], $row["NgayNhap"], $row["TacGia"],$row["TomTat"]);
                
                array_push($list,$sach);
            }
        }
        //b3 : đóng kết nối
        $link->close();
        //echo "<h4>kết nối thành công<h4>";
        return $list;
    }
    static function getChiTiet($MaSach){
            
        $link = connect();
        //b2: thao tác với csdl : CRUD
        $sql = "SELECT * FROM Sach Where MaSach = '$MaSach'";
        
        $result =  $link->query($sql);
        $ds = array();
        
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {//biên nó thành 1 mảng kết hợp
                $sach = new Sach($row["MaSach"],$row["TenSach"],$row["SoLuong"],$row["Gia"],$row["MaLoai"],
                $row["SoTap"],$row["Anh"],$row["NgayNhap"],$row["TacGia"],$row["TomTat"]);
               
               
            }
        }
        //b3 : đóng kết nối
        $link->close();
        //echo "<h4>kết nối thành công<h4>";
        return $sach;
    }
}
class Loai
{
    #Begin properties
    var $MaLoai;
    var $TenLoai;
    
    #end properties

    #Construct function

    function __construct($MaLoai, $TenLoai)
    {
        $this->MaLoai = $MaLoai;
        $this->TenLoai = $TenLoai;
      
    }
    static function getListFromDB(){
        //b1 tạo kết nối
        // $con = new  mysqli("localhost","root","","BookManager");
        // $con->set_charset("utf8");//hướng đối tượng
        // //mysqli_set_charset($con,"utf8");// thủ tục
        // if($con->connect_error){
        //     die("kết nối thất bại. Chi tiết:".$con->connect_error);
        // }
        $link = connect();
        //b2: thao tác với csdl : CRUD
        $sql = "SELECT * FROM loai";
        
        $result =  $link->query($sql);
        $list = array();
        
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {//biên nó thành 1 mảng kết hợp
                //$thongtin = new ThongTin($row["ID"],$row["Ten"],$row["Email"],$row["SDT"]);
                
                $loai = new Loai($row["MaLoai"],$row["TenLoai"]);
                
                array_push($list,$loai);
            }
        }
        //b3 : đóng kết nối
        $link->close();
        //echo "<h4>kết nối thành công<h4>";
        return $list;
    }
}
class GioHang{
    var $MaSach;
    var $Gia;
    var $SoLuong;
    var $ThanhTien;
    
    function GioHang($MaSach,$SoLuong,$Gia,$ThanhTien){
        $this->MaSach = $MaSach;
        $this->SoLuong =$SoLuong;
        $this->Gia =$Gia;
       
        $this->ThanhTien =$ThanhTien;
    }
    static function getListFromDB(){
        $link = connect();
        $sql = "SELECT * FROM giohang";
        
        $result =  $link->query($sql);
        $list = array();
        
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {//biên nó thành 1 mảng kết hợp
                //$thongtin = new ThongTin($row["ID"],$row["Ten"],$row["Email"],$row["SDT"]);
                
                $giohang = new GioHang($row["MaSach"],$row["SoLuong"],$row["Gia"],$row["ThanhTien"]);
                
                array_push($list,$giohang);
            }
        }
        //b3 : đóng kết nối
        $link->close();
        //echo "<h4>kết nối thành công<h4>";
        return $list;
    }
    static function addGioHangToDB($MaSach=null,$SoLuong=null,$Gia=null,$ThanhTien=null)
        {
            $link = connect();
            
            $sql="INSERT INTO `giohang` (`MaSach`, `SoLuong`,`Gia`, `ThanhTien`) VALUES ('$MaSach', '$SoLuong', '$Gia','$ThanhTien')";
       
            if (mysqli_query($link, $sql)) {
                echo "<script type='text/javascript'>alert('Thêm Thành công');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
            //b3 : đóng kết nối
            $link->close();
        }
        static function editGioHangDB($MaSach,$SoLuong)
        {
            $link = connect();
            $sql="UPDATE `giohang` SET SoLuong='$SoLuong' WHERE MaSach='$MaSach'";
       
            if (mysqli_query($link, $sql)) {
                echo "<script type='text/javascript'>alert('Thêm Thành công');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
            //b3 : đóng kết nối
            $link->close();
        }
        static function deleteDB($MaSach){
            $link = connect();
            $sql="DELETE FROM `giohang` WHERE MaSach = '$MaSach'";
            if (mysqli_query($link, $sql)) {
                //echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
            //b3 : đóng kết nối
            $link->close();
        }
        static function deleteAllGioHangDB(){
            $link = connect();
            $sql="DELETE FROM `giohang`";
            if (mysqli_query($link, $sql)) {
                //echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
            //b3 : đóng kết nối
            $link->close();
        }
}
?>