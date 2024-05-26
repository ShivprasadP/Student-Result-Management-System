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

         // function calculateTotalCredit($resultId)
         // {
         //    $stmt = $con->prepare("SELECT credit FROM result_items WHERE result_id = ?");
         //    $stmt->bind_param("i", $resultId);
         //    $stmt->execute();
         //    $stmt->bind_result($credit);
         //    $totalCredit = 0;
         //    while ($stmt->fetch()) {
         //       $totalCredit += $credit;
         //   }
         //   $stmt->close();
         //   return $totalCredit;
         // }

         foreach($data as $row)
         {
            $result_id = $row['0'];
            $class_id = $row['1'];
            $subject_id = $row['2'];
            $ca1 = $row['3'];
            $ca2 = $row['4'];
            $mse = $row['5'];
            $ese = $row['6']; 
            $marks = $row['7'];          
            $grade = $row['8'];
            $totalgrade = 0;
            $totalgrade = $grade;
            $pointer = $row['9'];
            $credit = $row['10'];
            $totalcredit = 0;
            $totalcredit += $credit;

            $resultsItemQuery = "INSERT INTO result_items (result_id,subject_id,ca1,ca2,mse,ese,marks,grade,credit) VALUES ('$result_id','$subject_id','$ca1','$ca2','$mse','$ese','$marks','$grade','$credit')";
            $resultsQuery = "INSERT INTO results (student_id,class_id,totalgrade,totalcredit,pointer) VALUES ('$result_id','$class_id','$totalgrade','$totalcredit','$pointer')";
            $result = mysqli_query($con, $resultsItemQuery);
            $result1 = mysqli_query($con, $resultsQuery);
            $msg = true;
         }

         if(isset($msg))
         {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: ./index.php?page=import_result');
            exit(0);
         }
         else
         {
            $_SESSION['message'] = "Not Imported";
            header('Location: ./index.php?page=import_result');
            exit(0);
         }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: ./index.php?page=import_result');
        exit(0);
    }
}