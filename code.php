<?php

$con = mysqli_connect("localhost","root","","db_students");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

if(isset($_POST['save_student'])){


    $name = mysqli_real_escape_string($con,$_POST['name']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $course = mysqli_real_escape_string($con,$_POST['course']);

    $query = "INSERT INTO students (name,phone,email,course) VALUES ('$name','$phone','$email','$course')";
    // $quer_run = ;

    if(mysqli_query($con,$query)){
        $res = [
            "status"=>200,
            "message"=>'Student Created Successfully',
        ];

        echo json_encode($res);
        return false;
    }    
}
// =========================Inof Student================================================

if(isset($_GET['student_id'])){

    $student_id = mysqli_real_escape_string($con, $_GET['student_id']);

    $query = "SELECT * FROM students WHERE id='$student_id'";


    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1){

        $student = mysqli_fetch_array($query_run);

        $res =[
            "status"=> 200,
            "message"=>'selected student is exist',
            "data"=>$student,
        ];
        echo json_encode($res);

        return;
    }    
}
// ===========================Delete student ===========================

if(isset($_POST['delete_student'])){

    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $query = "DELETE FROM students WHERE id='$student_id'";

    $query_run = mysqli_query($con,$query);

    if($query_run){
        $res =[
            "status"=>200,
            "message"=>"Student Deleted Succesfully",
        ];
        echo json_encode($res);
        return;        
   }    
}

// ======================Edit Student==========================
if(isset($_GET['edit_student_id'])){

    $edit_student_id = mysqli_real_escape_string($con, $_GET['edit_student_id']);

    $query = "SELECT * FROM students WHERE id='$edit_student_id'";

    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1){

        $student = mysqli_fetch_array($query_run);

        $res =[
            "status"=> 200,
            "message"=>'selected Featched',
            "data"=>$student,
        ];
        echo json_encode($res);

        return;
    }    
}
// =============================Update Student================================

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con,$_POST['name']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $course = mysqli_real_escape_string($con,$_POST['course']);


    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' 
              WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        $res = [
            "status"=>200,
            "message"=>'Student Updated Successfully',
        ];

        echo json_encode($res);
        return false;
    }    
}

?>