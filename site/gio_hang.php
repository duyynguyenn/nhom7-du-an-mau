<?php
    session_start();
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
    //làm rỗng giỏ hàng
    if(isset($_GET['delcart'])&&($_GET['delcart']==1)) unset($_SESSION['giohang']);
    //xóa sp trong giỏ hàng
    if(isset($_GET['delid'])&&($_GET['delid']>=0)){
       array_splice($_SESSION['giohang'],$_GET['delid'],1);
    }
    //lấy dữ liệu từ form
    if(isset($_POST['addcart'])&&($_POST['addcart'])){
        $hinh=$_POST['hinh'];
        $tensp=$_POST['tensp'];
        $gia=$_POST['gia'];
        $soluong=$_POST['soluong'];

        //kiem tra sp co trong gio hang hay khong?

        $fl=0; //kiem tra sp co trung trong gio hang khong?

        for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
            
            if($_SESSION['giohang'][$i][1]==$tensp){
                $fl=1;
                $soluongnew=$soluong+$_SESSION['giohang'][$i][3];
                $_SESSION['giohang'][$i][3]=$soluongnew;
                break;

            }
            
        }
        //neu khong trung sp trong gio hang thi them moi
        if($fl==0){
            //them moi sp vao gio hang
            $sp=[$hinh,$tensp,$gia,$soluong];
            $_SESSION['giohang'][]=$sp;
        }

       // var_dump($_SESSION['giohang']);
    }

    function showgiohang(){
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            if(sizeof($_SESSION['giohang'])>0){
                $tong=0;
                for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                    $tt=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                    $tong+=$tt;
                    echo '<tr>
                            <td>'.($i+1).'</td>
                            <td><img src="image/'.$_SESSION['giohang'][$i][0].'" alt=""></td>
                            <td>'.$_SESSION['giohang'][$i][1].'</td>
                            <td>'.$_SESSION['giohang'][$i][2].'</td>
                            <td>'.$_SESSION['giohang'][$i][3].'</td>
                            <td>
                                <div>'.$tt.'</div>
                            </td>
                            <td>
                                <a href="gio_hang.php?delid='.$i.'">Xóa</a>
                            </td>
                        </tr>';
                }
                echo '<tr>
                        <th colspan="5">Tổng đơn hàng</th>
                        <th>
                            <div>'.$tong.'</div>
                        </th>
    
                    </tr>';
            }else{
                echo "Giỏ hàng rỗng!";
            }    
        }
    }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="row mb">
    <div class="boxtrai mr">
        <div class="row">
            <h1>THÔNG TIN NHẬN HÀNG</h1>
            <table class="thongtinnhanhang">
                <tr>
                    <td width="20%">Họ tên</td>
                    <td><input type="text" name="hoten"></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><input type="text" name="diachi"></td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td><input type="text" name="dienthoai"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email"></td>
                </tr>
            </table>
        </div>
        <div class="row mb">
            <h1>GIỎ HÀNG</h1>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Hình</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền ($)</th>
                </tr>
                <?php showgiohang(); ?>
                <!-- <tr>
                    <td>1</td>
                    <td><img src="images/1.jpg" alt=""></td>
                    <td>Đồng hồ</td>
                    <td>10</td>
                    <td>1</td>
                    <td>
                        <div>10</div>
                    </td>
                </tr>
                <tr>
                    <th colspan="5">Tổng đơn hàng</th>
                    <th>
                        <div>10</div>
                    </th>

                </tr> -->
            </table>
        </div>
        <div class="row mb">
                    <input type="submit" value="ĐỒNG Ý ĐẶT HÀNG" name="dongydathang">
                    <a href="index.php?delcart=1"><input type="button" value="XÓA GIỎ HÀNG"></a>
                    <a href="index.php"><input type="button" value="TIẾP TỤC ĐẶT HÀNG"></a>
                </div>
    </div>
</div>
</body>
</html>