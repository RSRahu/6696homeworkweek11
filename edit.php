<!DOCTYPE html>
<html lang="en">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- เพิ่ม ส่วน Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- เพิ่มฟอนต์ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            margin-left: 100px;
            margin-top: 50px;
        }

        h1 {
            /* อันนี้กำหนดส่วนย่อหน้าด้านซ้าย */

            /* อันนี้กำหนดส่วนย่อหน้าด้านบน */
            margin-top: 50px;
        }
    </style>


    <title>เเก้ไขข้อมูลkeyboard</title>
</head>

<?php
if (isset($_GET['action_even']) == 'edit') {
    $id = $_GET['id'];
    $sql = "SELECT * FROM keyboard WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ";
    }
    //$conn->close();
}
?>

<h1>แก้ไขข้อมูลkeyboard</h1>


<form action="edit_1.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> รหัส </label>
        <div class="col-sm-2">
            <label class="col-sm-1 col-form-label"> <?php echo $row['id']; ?> </label>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> โมเดล </label>
        <div class="col-sm-2">
        <input type="text" name="model" class="form-control" maxlength="50" value="<?php echo $row['model']; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> แบรน </label>
        <div class="col-sm-2">
        <select class="form-select" name="brand" aria-label="Default select example">
                <option >กรุณาระบุแบรน</option>
                <option value="ยี่ห้อ A" <?php if ($row['brand']=='ยี่ห้อ A'){ echo "selected";} ?>>ยี่ห้อ A</option>
                <option value="ยี่ห้อ B" <?php if ($row['brand']=='ยี่ห้อ B'){ echo "selected";} ?>>ยี่ห้อ B</option>
                <option value="ยี่ห้อ C"<?php if ($row['brand']=='ยี่ห้อ C'){ echo "selected";} ?>>ยี่ห้อ C</option>
                <option value="ยี่ห้อ D"<?php if ($row['brand']=='ยี่ห้อ D'){ echo "selected";} ?>>ยี่ห้อ D</option>
                <option value="ยี่ห้อ E"<?php if ($row['brand']=='ยี่ห้อ E'){ echo "selected";} ?>>ยี่ห้อ E</option>
                <option value="ยี่ห้อ F"<?php if ($row['brand']=='ยี่ห้อ F'){ echo "selected";} ?>>ยี่ห้อ F</option>
                <option value="ยี่ห้อ G"<?php if ($row['brand']=='ยี่ห้อ G'){ echo "selected";} ?>>ยี่ห้อ G</option>
                <option value="ยี่ห้อ H"<?php if ($row['brand']=='ยี่ห้อ H'){ echo "selected";} ?>>ยี่ห้อ H</option> 
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> switch type </label>
        <div class="col-sm-2">
        <input type="text" name="switch_type" class="form-control" maxlength="50" value="<?php echo $row['switch_type']; ?>" required>
            </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> เลย์เอาท์ </label>
        <div class="col-sm-2">
            <select class="form-select" name="layout" aria-label="Default select example">
                <option >กรุณาระบุเลย์เอาท์</option>
                <option value="60%" <?php if ($row['layout']=='60%'){ echo "selected";} ?>>60%</option>
                <option value="65%" <?php if ($row['layout']=='65%'){ echo "selected";} ?>>65%</option>
                <option value="75%"<?php if ($row['layout']=='75%'){ echo "selected";} ?>>75%</option>
                <option value="Compact"<?php if ($row['layout']=='Compact'){ echo "selected";} ?>>Compact</option>
                <option value="Full-size"<?php if ($row['layout']=='Full-size'){ echo "selected";} ?>>Full-size</option>
                <option value="TKL"<?php if ($row['layout']=='TKL'){ echo "selected";} ?>>TKL</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> connection type </label>
        <div class="col-sm-2">
            <input type="text" name="connection_type" class="form-control" maxlength="50" value="<?php echo $row['connection_type']; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> ราคา </label>
        <div class="col-sm-2">
            <input type="text" name="price" class="form-control" maxlength="50" value="<?php echo $row['price']; ?>" required>
        </div>
    </div>

    <div class="row mb-3">
        <label class="col-sm-1 col-form-label"> วันวางจำหน่าย </label>
        <div class="col-sm-2">
            <input type="text" name="release_date" class="form-control" maxlength="50" value="<?php echo $row['release_date']; ?>" required>
        </div>
    </div>


    <button type="submit" class="btn btn-primary"> บันทึกข้อมูล</button>
    <button type="reset" class="btn btn-danger"> ยกเลิก</button>

</form>
<br>
น.ส.กัญญากร จิวรรจนะโรดม 664485033 <br>
</head>

</html>