<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 1 PHP</title>
</head>
<body>
    <?php 
    // 1. In ra màn hình
    echo "Việt Nam vô địch <br>";

    echo "Tâm xinh gái <br>";

    //2. Biến
    // Cú pháp: $+tên biến = giá trị của biến;
    $ten = "Nguyễn Thị Thanh Tâm";
    $tuoi = 18;

    echo $ten;

    // nối chuỗi dùng .
    echo $ten . " " . $tuoi . " tuổi <br>";

    //3. Hằng
    define("soPi", "3.14 <br>");
    echo soPi;

    //4. Phân biệt '' và ""
    echo '$ten' . "<br>";
    echo "$ten" . "<br>";

    //5.Chuỗi
    #5.1 Ktra độ dài chuỗi
    echo strlen($ten) . "<br>";
    #5.2 Đếm số từ
    echo str_word_count($ten) . " " . "<br>";
    #5.3 Tìm kiếm kỹ tự trong chuỗi
    echo strpos($ten, "A");
    #5.4 Thay thế ký tự trong chuỗi
    echo str_replace("Tâm", "Thảo", $ten) . "<br>";

    //6. Toán tử
    $soThuNhat = 10;
    $soThuHai = 5;

    # + - * /
    # += -= *= /= %= 
    #so sánh == != > < >= <= ===
    // echo $soThuNhat < $soThuHai;

    // 7. câu điều kiện
    //if("Điểu kiển"){
    //    logic 
    // }
    //elseif("Điều kiện"){
    //     logic
    // }
    //else{
    //   logic
    // }

    //Kiểm tra tổng của số thứ nhất và só thứ 2
    //( nếu < 15 thì in ra lớn hơn 15)
    //( nếu = 15 thì in ra tổng = 15)
    //còn lại in ra > 15
    $tong = $soThuNhat + $soThuHai;

    if($tong < 15){
        echo "Tổng nhỏ hơn 15";
    }

    elseif($tong == 15){
        echo "Tổng bằng 15";
    }
    else{
        echo "Tổng lớn hơn 15";
    }

    //8. switch case
    $color = "red" . "<br>";
    switch ($color){
        case "red":
            echo "is red <br>";
            break;
        case "blue":
            echo "is blue <br>";
            break;
        default:
            echo "no color <br>";
            break;    
    }

    //9.for
    for($i=0; $i < 100; $i++){
        echo $i . "<br>";
    }

    //10. Mảng
    $mang = ["trâu", "bò", "gà", "vịt"];

    //đếm phần tử
    echo count($mang) . "<br>";
    echo $mang[3] . "<br>";
    #in xem toàn mảng
    print_r($mang) . "<br>";
    # đổi giá trị
    $mang[0] = "dê";
    print_r($mang) . "<br>";
    $mang[] = "ngựa";
    print_r($mang) . "<br>";
    #xóa
    unset($mang[3]);
    print_r($mang);

?>
</body>
</html>