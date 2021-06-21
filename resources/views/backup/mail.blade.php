
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>	
       <meta charset="UTF-8">
	   <meta name="referrer" content="origin">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RTC Online Payment</title>  
		   		             		
    </head>
<body>
<p>Your Payment to RTC via RTC Online Payment Gateway is successful.<br><br>
<img style=" width: 750px;" src="{{ asset('img/logo.png') }}" alt="Header Picture" class="images"><br>
<h4 style=" padding-left: 20%;">MONEY RECEIPT</h4>
<div style="margin-left: 50px; line-height: 1.8;">	
		 <div>Date:<span style="margin-left: 78px;"><?PHP echo date('d-M-Y');?></span></div>
		 <div>Receipt No:<span style="margin-left: 45px;"><?php echo $data["ReceiptID"] ?></span></div>
		 <div>Name:<span style="margin-left: 75px;"><?php echo $data["StudentName"] ?></span></div>
		 <div>Enrollment No:<span style="margin-left: 28px;"><?php echo $data["EnrollmentNumber"] ?></span></div>
		<div>Semester:<span style="margin-left: 54px;"><?php echo $data["Semester"] ?></span></div>
		 <hr style=" width:50%;  margin: 0px;">  
		<div><strong>Total Amount (Nu.):<span style="margin-left: 10px;"><?php echo number_format($data["Amount"],2); ?></strong></div>		
		<div>Paid through:<span style="margin-left: 49px;"><?php  echo $data["bank"]; ?></div>
		<div>BFS-TxnID:<span style="margin-left: 57px;"><?php  echo $data["txn"]; ?></div>
		<hr style="width:50%;  margin: 0px;">
		
		<div><strong><u>Items on this payment:</u></strong></div>
	<table>			
			<tbody>
			<?php print($data['TuitionPayments']>0)? "<tr><td>Tuition  </td><td>".number_format($data['TuitionPayments'],2)."</td></tr>": "" ; ?> 
			<?php print($data['RoomPayments']>0)? "<tr><td>Room </td><td>".number_format($data['RoomPayments'],2)."</td></tr>": "" ; ?> 
			<?php print($data['FoodPayments']>0)? "<tr><td>Food </td><td>".number_format($data['FoodPayments'],2)."</td></tr>": "" ; ?>
			<?php print($data['LibraryFinesPayments']>0)? "<tr><td>Library Fines </td><td>".number_format($data['LibraryFinesPayments'],2)."</td></tr>": "" ; ?>                  
			<?php print($data['SecurityDepositPayments']>0)? "<tr><td>Security Deposit </td><td>".number_format($data['SecurityDepositPayments'],2)."</td></tr>": "" ; ?>
			<?php print($data['AcademicFeesPayments']>0)? "<tr><td>Academics Due </td><td>".number_format($data['AcademicFeesPayments'],2)."</td></tr>": "" ; ?> 
			<?php print($data['PhotosPayments']>0)? "<tr><td>Photos Due</td><td>".number_format($data['PhotosPayments'],2)."</td></tr>": "" ; ?> 							
			<?php print($data['ProCourseFeePayments']>0)? "<tr><td>Professional Course</td><td>".number_format($data['ProCourseFeePayments'],2)."</td></tr>": "" ; ?> 
			<?php print($data['FoodSurchargePayments']>0)? "<tr><td>Food Surcharge</td><td>".number_format($data['FoodSurchargePayments'],2)."</td></tr>": "" ; ?>
			<?php print($data['RoomsurchargePayments']>0)? "<tr><td>Room Surcharge</td><td>".number_format($data['RoomsurchargePayments'],2)."</td></tr>": "" ; ?> 
			<?php print($data['FinePayments']>0)? "<tr><td>Fines</td><td> ".number_format($data['FinePayments'],2)."</td></tr>": "" ; ?> 
			</tbody>
								
	</table>		
<br><br></div>

Thank you for using RTC Online Payment Gateway System.<br><br>
This is an auto generated email message, please do not respond to this email.<br><br>


The information in this mail is strictly confidential and is intended solely for the addressee(s). Access to this mail by anyone else is unauthorized. Copying or further distribution beyond the original recipient(s) may be unlawful. Please note that any unauthorized addressee(s) needs a specific written consent for further circulation of the information(s). Any opinion expressed in this mail is that of sender and does not necessarily reflect that of the Royal Thimphu College.

</p>

</body>
</html>