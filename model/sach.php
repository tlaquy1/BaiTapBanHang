<?php 
class Book
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
        $this->MaLoai = $MaLoai;
        $this->SoTap = $SoTap;
        $this->Anh = $Anh;
        $this->NgayNhap = $NgayNhap;
        $this->TacGia = $TacGia;
        $this->TomTat=$TomTat;
    }
}
?>

