<?php

include("dbconnection.php");

// buatkan function addStudent()
function addStudent()
{
    // variabel global
    global $conn;

    if (isset($_POST['submit'])) {
        $name = $_POST["nama"];
        $nim = $_POST["nim"];
        $jurusan = $_POST["jurusan"];
        $angkatan = $_POST["angkatan"];
        $query = "INSERT INTO tb_student (nama, nim, jurusan, angkatan) VALUES ('$name', '$nim', '$jurusan', '$angkatan')";
        mysqli_query($conn, $query);
      }
        
    }


function editStudent($id_stu) {
    global $conn;


    
    $id_stu = $_POST["id"];

$name = $_POST["nama"];
$nim = $_POST["nim"];
$jurusan = $_POST["jurusan"];
$angkatan = $_POST["angkatan"];


$query = "UPDATE tb_student SET
        nama='$name',
        nim='$nim',
        jurusan='$jurusan',
        angkatan='$angkatan',
        WHERE id=$id_stu";
$test = mysqli_query($conn, $query);

if (isset($_POST['submit'])) {
    editStudent($id_stu);
}

    if ($result) {
        echo '<script>alert("Student data has been updated.")</script>';
        echo "<script>window.location.href ='manage-students.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
}


?>