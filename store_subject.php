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
            $subject_code = $row['0'];
            $subject = $row['1'];
            $credit = $row['2'];
            $description = $row['3'];

            $subjectQuery = "INSERT INTO subjects (subject_code,subject,credit,description) VALUES ('$subject_code','$subject','$credit','$description')";
            $result = mysqli_query($con, $subjectQuery);
            $msg = true;
         }

         if(isset($msg))
         {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: ./index.php?page=import_subjects');
            exit(0);
         }
         else
         {
            $_SESSION['message'] = "Not Imported";
            header('Location: ./index.php?page=import_subjects');
            exit(0);
         }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: ./index.php?page=import_subjects');
        exit(0);
    }
}