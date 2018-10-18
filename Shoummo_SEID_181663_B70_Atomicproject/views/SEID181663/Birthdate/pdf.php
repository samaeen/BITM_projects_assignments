<?php
include_once ('../../../vendor/autoload.php');
use App\Birthdate\Birthdate;


 $obj = new Birthdate();
 $allData=$obj->index();
 
$trs="";
$sl=0;

    foreach($allData as $oneData) {
        $id =  $oneData->id;
        $name = $oneData->name;
        $birthdate =$oneData->birthdate;

        $sl++;
        $trs .= "<tr>";
        $trs .= "<td width='50'> $sl</td>";
        $trs .= "<td width='50'> $id </td>";
        $trs .= "<td width='250'> $name </td>";
        $trs .= "<td width='250'> $birthdate </td>";

        $trs .= "</tr>";
    }

$html= <<<BITM
<div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th align='left'>Serial</th>
                    <th align='left' >ID</th>
                    <th align='left' >Name</th>
                    <th align='left' >Birthdate</th>

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
$mpdf->Output('Birthdate.pdf', 'D');