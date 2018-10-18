<?php
include_once ('../../../vendor/autoload.php');
use App\BookTitle\BookTitle;

$obj= new BookTitle();
 $allData=$obj->index();
 //var_dump($allData);
$trs="";
$sl=0;

    foreach($allData as $oneData) {
        $id =  $oneData->id;
        $bookTitle = $oneData->book_title;
        $authorName =$oneData->author_name;

        $sl++;
        $trs .= "<tr>";
        $trs .= "<td width='50'> $sl</td>";
        $trs .= "<td width='50'> $id </td>";
        $trs .= "<td width='250'> $bookTitle </td>";
        $trs .= "<td width='250'> $authorName </td>";

        $trs .= "</tr>";
    }

$html= <<<BITM
<div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th align='left'>Serial</th>
                    <th align='left' >ID</th>
                    <th align='left' >Book Name</th>
                    <th align='left' >Author Name</th>

              </tr>
                </thead>
                <tbody>

                  $trs

                </tbody>
            </table>


BITM;


// Require composer autoload
require_once ('../../../vendor/mpdf/mpdf/src/Mpdf.php');
//Create an instance of the class:

$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('BookTitle.pdf', 'D');