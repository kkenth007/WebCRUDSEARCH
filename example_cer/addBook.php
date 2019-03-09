<?php 
        if(isset($_POST['nameBook']) && isset($_POST['priceBook'])){
            $bookname = $_POST['nameBook'];
            $bookprice = $_POST['priceBook'];
            if( $bookname != "" && $bookprice != ""){
                $sql = "INSERT INTO book(book_name,book_price,book_img) VALUES('$bookname','$bookprice','')";
                $result = mysqli_query($con,$sql);
                if($result){
                    echo "<span class='success'>เพิ่มข้อมูลสำเร็จ </span>";
                    echo "<br/> <a href='index.php'>Back</a>";
                }else{
                    "<br/> <span class='danger'>เพิ่มข้อมูลไม่สำเร็จ </span>";
                }
                // header("Location:index.php");
            }else{
                echo "<br/> <span class='danger'>กรุณากรอกข้อมูลไห้ครบถ้วน </span>";
                echo "<br/> <a href='index.php'>Back</a>";
            }

        }

?>
