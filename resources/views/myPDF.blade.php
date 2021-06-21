
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
		<link rel='icon' href='images/favicon.ico' type='image/x-icon'/>       
		<link rel="stylesheet" href="{{ asset('w3.css') }}">         		
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('style.css') }}">	
		<link rel="stylesheet" type="text/css" href="new.css"/>    

        		
    </head>
  
   
<body>
<div id="watermark">
            <img src="{{ asset('img/watermark.JPG') }}" height="100%" width="100%" />
        </div>
<?php 
 error_reporting(E_ALL);   
//foreach($getrecpt as $getr)   
 //{ 
if(($EnrollmentNumber)){ 
  ?> 
	
	<div class="w3-container w3-margin w3-padding" id="content">	
	<div>		
	  <div class="container">
		 <div class="row">
			<div class="col-md-12">
			<img src="{{ asset('img/receiptheader.JPG') }}" alt="Header Picture" class="images">
			</div>
		</div>
		
		 <div class="w3-row"><div class="w3-col s3">Date:</div><div class="w3-col s3"><?PHP echo date('d-M-Y');?></div></div>
		 <div class="w3-row"><div class="w3-col s3">Receipt No:</div><div class="w3-col s3">{{ $ReceiptID}}</div></div>
		 <div class="w3-row"><div class="w3-col s3">Name:</div><div class="w3-col s3">{{ $StudentName }}</div></div>
		 <div class="w3-row"><div class="w3-col s3">Enrollment No:</div><div class="w3-col s3">{{ $EnrollmentNumber }}</div></div>
		 <div class="w3-row"><div class="w3-col s3">Semester:</div><div class="w3-col s3">{{ $Semester }}</div></div>
		 <hr class="new1">  	
		<div class="w3-row"><div class="w3-col s3"><strong>Amount(Nu.):</div><div class="w3-col s3"><?php echo $Amont; ?></strong></div></div>
		<div class="w3-row"><div class="w3-col s3">Amount in words:</div><div class="w3-col s3"><div class="w3-col s9" id="number"><?php echo $Amont; ?></div><div id="words"> </div></div></div>
		<div class="w3-row"><div class="w3-col s3">Paid through:</div><div class="w3-col s3"><?php echo "BOBL";?></div></div>
		<div class="w3-row"><div class="w3-col s3">BFS-TxnID:</div><div class="w3-col s3"><?php echo "Nul"?></div></div>
		<br>
		<hr class="new1">
		<div><strong>Items on this payment:</strong></div>
				<div class="container">
					<div  class="w3-responsive">						
							<table class="w3-table w3-bordered w3-striped w3-hoverable fit">
							<thead><th scope="col">Payments</th><th scope="col">Amounts</th> </thead>
							<?php print(($TuitionPayments)>0)? "<tr><td>Tuition  </td><td>".(round($TuitionPayments))."</td></tr>": "" ; ?> 
							<?php print(($RoomPayments)>0)? "<tr><td>Room </td><td>".abs(round($RoomPayments))."</td></tr>": "" ; ?> 
							<?php print(($FoodPayments)>0)? "<tr><td>Food </td><td>".abs(round($FoodPayments))."</td></tr>": "" ; ?>
							<?php print(($LibraryFinesPayments)>0)? "<tr><td>Library Fines </td><td>".abs(round($LibraryFinesPayments))."</td></tr>": "" ; ?>                  
							<?php print(($SecurityDepositPayments)>0)? "<tr><td>Security Deposit </td><td>".abs(round($SecurityDepositPayments))."</td></tr>": "" ; ?>
							<?php print(($AcademicFeesPayments)>0)? "<tr><td>Academics Due </td><td>".abs(round($AcademicFeesPayments))."</td></tr>": "" ; ?> 
							<?php print(($PhotosPayments)>0)? "<tr><td>Photos Due</td><td>".abs(round($PhotosPayments))."</td></tr>": "" ; ?> 							
							<?php print(($ProCourseFeePayments)>0)? "<tr><td>Professional Course</td><td>".abs(round($ProCourseFeePayments))."</td></tr>": "" ; ?> 
							<?php print(($FoodSurchargePayments)>0)? "<tr><td>Food Surcharge</td><td>".abs(round($FoodSurchargePayments))."</td></tr>": "" ; ?>
							<?php print(($RoomsurchargePayments)>0)? "<tr><td>Room Surcharge</td><td>".abs(round($RoomsurchargePayments))."</td></tr>": "" ; ?> 
							<?php print(($FinePayments)>0)? "<tr><td>Fines</td><td> ".abs(round($FinePayments))."</td></tr>": "" ; ?> 
								
						</table>
					</div>
				</div>			
		
			</div>	
	  </div></div><?php //$rc=$getr->ReceiptID; ?>
	  
	
<?php } 
   else {   
   ?>
   
   </br><div class="row">   
	<div class="col-4 offset-4 w3-card-4" >		
		<center>      
		  <div> 
			<h3>Payment Receipt</h3>
		  </div>
		</center>		
		  <div>
			<b>Customer details</b>
			<p> 
				Name :&nbsp chimi lham</br>
				CID   : chimilhamp@gmail.com</br>
				Phone Number   : &nbsp555-555-5555</br>
			</p>
			<b>Payment Specifications</b>	
			<p>Ground Booking Fee:&nbsp Nu.40</br>
				Reference Number: &nbsp 00000000</p>
		  </div>   
		
		<div>	
			<strong>Thank you for booking and using this system to pay!</strong>
							
		</div>
	</div>
	</br>
	
<?php 
} //}	
?>	         

   
</div>

<div>
     <script type='text/javascript' src="{{asset('jquery.min.js')}}"></script>
	 <script type='text/javascript' src="{{asset('pdfmake.min.js')}}"></script>
     <script type='text/javascript' src="{{asset('html2canvas.min.js')}}"></script>
     <script type='text/javascript' src="{{asset('jspdf.min.js')}}"></script>
     <script type='text/javascript' src="{{asset('success.js')}}"></script> 
 	</div>
  </div>     

</body>
</html>
