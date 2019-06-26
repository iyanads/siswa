<?php
    $koneksi = mysqli_connect("localhost", "root", "", "siswa");

    if($koneksi){
        //echo "Alhamdulillah sudah terkoneksi";
    }else{
        echo "Aduh, gagal nih gan";
    }
?>

<h1>Input Data Siswa</h1>

<form action="" method="post">
<table border="1" >
    
    <tr>
        <td>Nama</td>
        <td><input type="text" name="Nama"></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><input type="text" name="Alamat"></td>
    </tr>
    <tr>
        <td>No_Telpon</td>
        <td><input type="number" name="No_Telpon"></td>
    </tr>
    
</table>
    <input type="submit" name="Registrasi" value="Registrasi">
</form>
<h4 align="center">Hasil Input Data Diri Siswa SMA NEGRI 02 KONSEL</h4>
<table border="1" align="center">
    <thead>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No_Telpon</th>
        
    </thead>
    <tbody>

        <?php
            $sqlView = "SELECT * FROM `tb_siswa`";
            $cekView = mysqli_query($koneksi, $sqlView);

            $nomor = 1;
            while($data = mysqli_fetch_array($cekView)){
        ?>
        <tr>
            <td><?=$nomor ?></td>
            <td><?=$data[1] ?></td>
            <td><?=$data[2] ?></td>
            <td><?=$data[3] ?></td>
            
            
            <td>
                <a href="dataDiri2.php?id=<?=$data[0]?>">Delete</a>
            </td>
        </tr>
        <?php
            $nomor++; // ++ = nomor+1; 
            }
        ?>
    <!-- /end -->
    </tbody>
</table>

<?php
    if(isset($_POST['Registrasi'])){
        $sqlInput = "INSERT INTO `tb_siswa` (`Nama`,`Alamat`,`No_Telpon`)
                VALUES ('$_POST[Nama]', '$_POST[Alamat]', '$_POST[No_Telpon]')";
        $cekInput = mysqli_query($koneksi, $sqlInput);
        if($cekInput){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'dataDiri2.php' </script>";
        }else{
            echo "Aduh.. Gagal masuk datanya gan";
        }
    }

    if(isset($_GET['id'])){
        $sqlDelete = "DELETE FROM `tb_siswa` WHERE
        `tb_siswa`.`id` = '$_GET[id]'";
        $cekDelete = mysqli_query($koneksi, $sqlDelete);

        if($cekDelete){
            // echo "Datanya udah masuk gan";
            echo "<script> window.location = 'dataDiri2.php' </script>";
        }else{
            echo "Aduh.. Gagal ngehapus datanya gan";
        }
    }
?>