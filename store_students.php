<?php

session_start();
$con = mysqli_connect('localhost', 'root', '', 'osrs_db');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save-excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
         $inputFileNamePath = $_FILES['import_file']['tmp_name'];
         $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
         $data = $spreadsheet->getActiveSheet()->toArray();

         foreach($data as $row)
         {
            $student_code = $row['0'];
            $lastname = $row['1'];
            $firstname = $row['2'];
            $middlename = $row['3'];
            $gender = $row['4'];
            $address = $row['5'];
            $class_id = $row['6'];


            $subjectQuery = "INSERT INTO students (student_code,firstname,middlename,lastname,gender,address,class_id) VALUES ('$student_code','$firstname','$middlename','$lastname','$gender','$address','$class_id')";
            $result = mysqli_query($con, $subjectQuery);
            $msg = true;
         }

         if(isset($msg))
         {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: ./index.php?page=import_student');
            exit(0);
         }
         else
         {
            $_SESSION['message'] = "Not Imported";
            header('Location: ./index.php?page=import_student');
            exit(0);
         }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: ./index.php?page=import_student');
        exit(0);
    }
}