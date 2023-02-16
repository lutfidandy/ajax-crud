<?php 

          $password = $_POST['password'];
          $password_regex = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()_+-=]).{8,}$/';
      

        //koneksi database
        $conn = mysqli_connect("localhost","root","", "school");
       
      //validasi username sudah ada 
      $cek_user=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin WHERE username='$_POST[username]'"));
        if ($cek_user > 0) {
            echo '<script language="javascript">
                  alert ("Username Admin Sudah Ada Yang Menggunakan!");    
                  window.location="signup.php";
                  </script>';
                  exit();
        }else if(empty($_POST['username'])){
          echo '<script language="javascript">
                  alert ("Username tidak boleh kosong!");    
                  window.location="signup.php";
                  </script>';
                  exit();
        }elseif(!preg_match($password_regex, $password)){
          echo '<script language="javascript">
          alert ("requires the password to be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character !");    
          window.location="signup.php";
          </script>';
          exit();
        }
    
        //input ke database
        else {
            $encrypt = md5($_POST['username'] . $_POST['password']);

            mysqli_query($conn, "INSERT INTO admin (username, password)
            VALUES ('$_POST[username]', '$encrypt')");
            
            echo '<script language="javascript">
                  alert ("Registrasi Berhasil Di Lakukan!");
                  window.location="./";
                  </script>';
                  exit();

        
           
        }
    ?>
