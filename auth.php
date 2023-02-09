<?php
       //koneksi database
       $conn = mysqli_connect("localhost","root","", "school");
        //deklarasi variabel 
        $username = $_POST["username"];
        $password = $_POST["password"];
        //dekripsi password
        $decrypt = md5($username . $password);
        
         
        $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' and password='$decrypt'");
        $cek = mysqli_num_rows($query);
        
        if($cek==1){
            header("location:view.php");
        }
        else{
        ?>
            <script language="JavaScript">
                alert('Oops! Username atau Password tidak sesuai ...');
                document.location='./';
            </script>
        <?php
        }
    ?>
