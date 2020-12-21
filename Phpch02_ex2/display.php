<?php
    $von_dau_tu = filter_input(INPUT_POST, 'von_dau_tu', FILTER_VALIDATE_FLOAT);
    $lai_xuat= filter_input(INPUT_POST, 'lai_xuat', FILTER_VALIDATE_FLOAT);
    $thoi_gian= filter_input(INPUT_POST, 'thoi_gian', FILTER_VALIDATE_INT);
    
    if ($von_dau_tu === false){
        $error_message= 'Số vốn đầu tư phải là một số có giá trị';
    }
    else if($von_dau_tu <=0){
        $error_message= 'Số nhập vào phải là một số nguyên dương';
    }
    
    else if($lai_xuat === false){
        $error_message= 'Số lãi xuất phải là một số có giá trị';
    }else if($lai_xuat <=0){
        $error_message= 'Số nhập vào phải là một số nguyên dương';
    }else if($lai_xuat >15){
        $error_message= 'Số nhập vào phải nhỏ hơn 15';
    }
    
    else if($thoi_gian === false){
        $error_message= 'Số nhập vào phải là một số có giá trị';
    }else if($thoi_gian <=0){
        $error_message= 'Số nhập vào phải là một số nguyên dương';
    }else if($thoi_gian > 30){
        $error_message= 'Số nhập vào phải nhỏ hơn 31';
    }else {
        $error_message = ''; }
    // Nếu có lỗi thì quay về trang chủ 
    if ($error_message != '') {
        include('index.php');
        exit();
    }
    // Tính tiền 
    $tien = $von_dau_tu;
    for ($i=1; $i <= $thoi_gian; $i++){
        $tien += $tien * $lai_xuat * .01;
    }
    //Định dạng số liệu sau khi đổ vào bảng 2
    $von_dau_tu_f= '$'.number_format($von_dau_tu,2);
    $lai_xuat_f= number_format($lai_xuat,2).'%';
    $tien_f= '$'.number_format($tien,2);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tính lãi xuất ngân hàng</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Tính lãi xuất ngân hàng</h1>

        <label>Tiền vốn:</label>
        <span><?php echo htmlspecialchars($von_dau_tu_f); ?></span><br />

        <label>Lãi xuất theo năm:</label>
        <span><?php echo htmlspecialchars($lai_xuat_f); ?></span><br />

        <label>Thời gian</label>
        <span><?php echo htmlspecialchars($thoi_gian); ?></span><br />

        <label>Tiền lãi :</label>
        <span><?php echo htmlspecialchars($tien); ?></span><br />
        
        <p>Mẫu tính toán này được thực hiện vào ngày <?php echo date('m/d/Y'); ?>.</p>
    </main>
</body>
</html>