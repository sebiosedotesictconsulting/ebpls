<?php                                  
require_once("lib/ebpls.utils.php");
define('FPDF_FONTPATH','font/');
require('ebpls-php-lib/html2pdf_lib/fpdf.php');     

$dbLink = get_db_connection();

		$result=mysql_query("select lgumunicipality, lguprovince, lguoffice from ebpls_buss_preference") or die(mysql_error());
    $resulta=mysql_fetch_row($result);
   
$pdf=new FPDF('L','mm','Legal');
$pdf->AddPage();
$pdf->image('peoplesmall.jpg',10,5,33);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(340,5,'REPUBLIC OF THE PHILIPPINES',0,1,'C');
$pdf->Cell(340,5,$resulta[0],0,1,'C');
$pdf->Cell(340,5,$resulta[1],0,2,'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(340,5,$resulta[2],0,2,'C');
$pdf->Cell(340,5,'',0,2,'C');
$pdf->SetFont('Arial','BU',16);
$pdf->Cell(340,5,' MASTERLIST OF BUSINESS ESTABLISHMENT',0,1,'C');

					$result=mysql_query("select a.business_permit_code, concat(c.owner_first_name, ' ', c.owner_middle_name, ' ', c.owner_last_name),
	        b.business_name, e.bus_nature, b.business_street, e.cap_inv, e.last_yr, d.total_amount_paid, d.or_no, 
	        d.or_date, b.business_category_code
					from ebpls_business_enterprise_permit a, ebpls_business_enterprise b, ebpls_owner c, ebpls_transaction_payment_or d, 
					tempbusnature e
					where a.owner_id = b.owner_id and a.owner_id = c.owner_id and b.owner_id = d.trans_id and b.business_id = e.business_id") 
					or die(mysql_error());
					
					$number_of_rows = mysql_numrows($result);
          while ($resulta=mysql_fetch_row($result))

					{
    					$row1 = $resulta[0];
    					$row2 = $resulta[1];
							$row3 = $resulta[2];
							$row4 = $resulta[3];
							$row5 = $resulta[4];
							$row6 = number_format($resulta[5],',','.','.');
							$row7 = number_format($resulta[6],',','.','.');
							$row8 = $resulta[7];
							$row9 = $resulta[8];
							$row10 = $resulta[9];
							$row11 = $resulta[10];
							
    					$column_code1 = $column_code.$row1."\n";
    					$column_code2 = $column_code.$row2."\n";
    					$column_code3 = $column_code.$row3."\n";
    					$column_code4 = $column_code.$row4."\n";
    					$column_code5 = $column_code.$row5."\n";
    					$column_code6 = $column_code.$row6."\n";
    					$column_code7 = $column_code.$row7."\n";
    					$column_code8 = $column_code.$row8."\n";
    					$column_code9 = $column_code.$row9."\n";
    					$column_code10 = $column_code.$row10."\n";
    					$column_code11 = $column_code.$row11."\n";
    					
					}

$pdf->SetLineWidth(2);
$pdf->Line(0,45,360,45);
$pdf->SetLineWidth(0);
					
$pdf->Cell(270,5,'',0,1,'C');
$pdf->Cell(270,5,'',0,1,'C');

$Y_Label_position = 50;
$Y_Table_Position = 55;

$pdf->SetFont('Arial','B',6);
$pdf->SetY($Y_Label_position);
$pdf->SetX(5);
$pdf->Cell(15,5,'PERMIT NO.',1,0,'C');
$pdf->SetX(20);
$pdf->Cell(50,5,'NAME OF OWNER',1,0,'C');
$pdf->SetX(70);
$pdf->Cell(50,5,'BUSINESS NAME',1,0,'C');
$pdf->SetX(120);
$pdf->Cell(30,5,'BUSINESS NATURE',1,0,'C');
$pdf->SetX(150);
$pdf->Cell(60,5,'BUSINESS ADDRESS',1,0,'C');
$pdf->SetX(210);
$pdf->Cell(30,5,'CAPITAL INVESTMENT',1,0,'C');
$pdf->SetX(240);
$pdf->Cell(30,5,'GROSS SALES',1,0,'C');
$pdf->SetX(270);
$pdf->Cell(20,5,'AMOUNT PAID',1,0,'C');
$pdf->SetX(290);
$pdf->Cell(15,5,'O.R. NO.',1,0,'C');
$pdf->SetX(305);
$pdf->Cell(20,5,'PAYMENT DATE',1,0,'C');
$pdf->SetX(325);
$pdf->Cell(25,5,'OWNERSHIP TYPE',1,0,'C');

$pdf->SetFont('Arial','',6);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(15,5,$column_code1,0);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(50,5,$column_code2,0);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(50,5,$column_name3,0);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(120);
$pdf->MultiCell(30,5,$column_name4,0);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(150);
$pdf->MultiCell(60,5,$column_name5,0);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(210);
$pdf->MultiCell(30,5,$column_name6,0,'R');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(240);
$pdf->MultiCell(30,5,$column_name7,0,'R');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(270);
$pdf->MultiCell(20,5,$column_name8,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(290);
$pdf->MultiCell(15,5,$column_name9,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(305);
$pdf->MultiCell(20,5,$column_name10,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(325);
$pdf->MultiCell(25,5,$column_name11,1);


					$result=mysql_query("select sign1, sign2, sign3, sign4, pos1, pos2, pos3, pos4
					from permit_templates") or die(mysql_error());
          $resulta=mysql_fetch_row($result);

$Y_Table_Position = $Y_Table_Position + 20;
          
$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(172,5,'Inspected By:',1,0,'L');
$pdf->Cell(172,5,'Noted By:',1,1,'L');

$pdf->Cell(350,5,'',0,2,'C');
$pdf->Cell(350,5,'',0,2,'C');

$pdf->SetFont('Arial','BU',10);
$pdf->SetX(5);
$pdf->Cell(172,5,$resulta[0],1,0,'C');
$pdf->Cell(172,5,$resulta[3],1,1,'C');

$pdf->SetFont('Arial','B',10);
$pdf->SetX(5);
$pdf->Cell(172,5,$resulta[4],1,0,'C');
$pdf->Cell(172,5,$resulta[7],1,1,'C');

$pdf->Output();

?>
					
<?php 
/* require_once("lib/ebpls.lib.php");
require_once("lib/ebpls.utils.php");                                                                                                                        
require_once("ebpls-php-lib/utils/ebpls.search.funcs.php");
//require_once("includes/eBPLS_header.php");
                                                                                                                                                                                                                                     
//--- get connection from DB
$dbLink = get_db_connection();
?>

<?php
echo date("F d, Y h:i:s A");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta http-equiv="Content-Type"
 content="text/html; charset=iso-8859-1">
  <title>MASTERLIST OF BUSINESS ESTABLISHMENT</title>
  <meta name="Author" content=" Pagoda, Ltd. ">
  <link href="includes/eBPLS.css" rel="stylesheet" type="text/css">
  <script language="JavaScript" src="includes/eBPLS.js"></script>
</head>
<body>

<?php

					$result=mysql_query("select lgumunicipality, lguprovince, lguoffice from ebpls_buss_preference") or die(mysql_error());
          $resulta=mysql_fetch_row($result);

?>

<h4 align="center"> Republic of the Philippines </h4>
<h4 align="center"> <?php echo $resulta[1]; ?> </h4>
<h4 align="center"> <?php echo $resulta[0]; ?> </h4>
<h4 align="center"> <?php echo $resulta[2]; ?> </h4>
<h4 align="center"><u> MASTERLIST OF BUSINESS ESTABLISHMENT</u></h4>

<hr>

<table border="0" cellpadding="1" cellspacing="1" width="1100">
  <tbody>
    <tr>
      <td>
      <table border="1" cellpadding="1" cellspacing="1" width="1000">
        <tbody>
          <tr>
            <td align="center" width="100"><b> Permit No. </b></td>
            <td align="center" width="100"><b> Name of Owner </b></td>
            <td align="center" width="100"><b> Business Name </b></td>
            <td align="center" width="100"><b> Business Nature </b></td>
            <td align="center" width="100"><b> Business Address </b></td>
            <td align="center" width="100"><b> Capital Investment </b></td>
            <td align="center" width="100"><b> Gross Sales </b></td>
            <td align="center" width="100"><b> Amount Paid </b></td>
            <td align="center" width="100"><b> O.R. No. </b></td>
            <td align="center" width="100"><b> Date of Payment </b></td>
            <td align="center" width="100"><b> Ownership Type </b></td>
          </tr>
          
        <?php
				
	        $result=mysql_query("select a.business_permit_code, concat(c.owner_first_name, ' ', c.owner_middle_name, ' ', c.owner_last_name),
	        b.business_name, e.bus_nature, b.business_street, e.cap_inv, e.last_yr, d.total_amount_paid, d.or_no, 
	        d.or_date, b.business_category_code
					from ebpls_business_enterprise_permit a, ebpls_business_enterprise b, ebpls_owner c, ebpls_transaction_payment_or d, 
					tempbusnature e
					where a.owner_id = b.owner_id and a.owner_id = c.owner_id and b.owner_id = d.trans_id and b.business_id = e.business_id") 
					or die(mysql_error());
          while ($resulta=mysql_fetch_row($result)){
          
					print "<tr>\n";
					foreach ($resulta as $field )
					print "<td>&nbsp;$field&nbsp</td>\n";
					print "<tr>";
					}
		//code ko to
/*					print "<td>&nbsp;$r[0]&nbsp</td>\n";
					print "<td>&nbsp;$r[1]&nbsp</td>\n";
					print "<td>&nbsp;$r[2]&nbsp</td>\n";
					print "<td>&nbsp;$r[3]&nbsp</td>\n";
					print "<td>&nbsp;$r[4]&nbsp</td>\n";
					print "<td>&nbsp;$r[5]&nbsp</td>\n";
                                        print "<td>&nbsp;$r[6]&nbsp</td>\n";
                                        print "<td>&nbsp;$r[7]&nbsp</td>\n";
                                        print "<td>&nbsp;$r[8]&nbsp</td>\n";
                                        print "<td>&nbsp;$r[9]&nbsp</td>\n";
					print "</tr>";
					$tot=$tot + $r[7];
				}

$tot=mysql_query("select sum(d.total_amount_paid) from ebpls_business_enterprise_permit a, ebpls_business_enterprise b, ebpls_owner c, ebpls_transaction_payment_or d
                                        where a.owner_id = b.owner_id and a.owner_id = c.owner_id and b.owner_id = d.trans_id ") or die(mysql_error());
$tot = mysql_fetch_row($tot);


					$tot = number_format($tot[0],2);
					print "<td>&nbsp;&nbsp</td>\n";
                                        print "<td>&nbsp;&nbsp</td>\n";
                                        print "<td>&nbsp;&nbsp</td>\n";
                                        print "<td>&nbsp;&nbsp</td>\n";
                                        print "<td>&nbsp;&nbsp</td>\n";
                                        print "<td>&nbsp;&nbsp</td>\n";
                                        print "<td>&nbsp;&nbsp</td>\n";
                                        print "<td><font color=red>&nbsp;$tot&nbsp</font></td>\n";
                                        print "<td>&nbsp;&nbsp</td>\n";
                                        print "<td>&nbsp;&nbsp</td>\n";

				?>
             
          </tr>
        </tbody>
      </table>

<br>
<br>
<br>
<br>

<?php

					$result=mysql_query("select sign1, sign2, sign3, sign4, pos1, pos2, pos3, pos4
					from permit_templates") or die(mysql_error());
          $resulta=mysql_fetch_row($result);

?>

<table style="width: 1000px" border="0" cellpadding="1" cellspacing="1">
	<tbody>
		<tr>
    	<td align="left", width="500"><b> Inspected By: <br> <br> <br> <br> <br> </b></td>
    	<td align="left", width="500"><b> Noted By: <br> <br> <br> <br> <br> </b></td>
    </tr>
    <tr>
    	<td	align="center"><u><b> <?php echo $resulta[0]; ?> </u> </b> </td>
    	<td align="center"> <u><b> <?php echo $resulta[2]; ?> </u> </b> </td>
    </tr>
    <tr>
    	<td align="center"> <?php echo $resulta[4]; ?> <br> <br> <br> <br> <br> <br> <br> <br> </td>
    	<td align="center"> <?php echo $resulta[6]; ?> <br> <br> <br> <br> <br> <br> <br> <br> </td>
    </tr>
    <tr>
    	<td align="left", width="500"><b> Approved By: <br> <br> <br> <br> <br> </b></td>	
    </tr>
    <tr>
    	<td align="center"><b><u> <?php echo $resulta[3]; ?> </b></u> <br> <?php echo $resulta[7]; ?> <br> <br> <br> <br> <br> </td>
    </tr>
    <tr> 
    	<td align="left"> Date printed: &nbsp; &nbsp; <?php echo date("F d Y"); ?> </td>
   </tbody>
</table>

<?php

require_once("includes/eBPLS_footer.php");
*/
?>
	
</body>
</html>

