<?php 
    
    if (!isset($von_dau_tu)) { $von_dau_tu = ''; } 
    if (!isset($lai_xuat)) { $lai_xuat = ''; } 
    if (!isset($thoi_gian)) { $thoi_gian = ''; } 
?> 
<!DOCTYPE html>
<html>
<head>
    <title>Tính tiền lãi ngân hàng </title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <main>
    <h1>Tính tiền lãi ngân hàng</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <?php } ?>
    <form action="display.php" method="post">

        <div id="data">
            <label>Tiền vốn:</label>
            <input type="text" name="von_dau_tu"
                   value="<?php echo htmlspecialchars($von_dau_tu); ?>">
            <br>

            <label>Lãi xuất theo năm:</label>
            <input type="text" name="lai_xuat"
                   value="<?php echo htmlspecialchars($lai_xuat); ?>">
            <br>

            <label>Thời gian:</label>
            <input type="text" name="thoi_gian"
                   value="<?php echo htmlspecialchars($thoi_gian); ?>">
            <br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Tính"><br>
        </div>

    </form>
    </main>
</body>
</html>