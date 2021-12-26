<?php 

  include 'config.php';

  if(isset($_POST['log']))
  {
      $user = $con->real_escape_string($_POST['username']);
      $pass = $con->real_escape_string($_POST['password']);

      $pass = md5($pass);
      $query = $con->query("SELECT * FROM tb_login WHERE username = '$user' AND password='$pass'");
      $data = $query->fetch_array();
      $username = $data['username'];
      $password = $data['password'];
      $usr = $data['nm_user'];

      if($user == $username && $pass == $password)
      {

        $_SESSION['nama'] = $username;
        $_SESSION['nm_user'] = $usr;

        echo "<script>alert('Anda berhasil login. Sebagai : $usr');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../home.php'>";

      }else{

        echo "<script>alert('Username dan Password Tidak Ditemukan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
      }

  }

?>