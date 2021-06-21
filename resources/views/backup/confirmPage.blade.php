
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
<div class="w3-border w3-content w3-margin-top w3-card-4">
  <img src="{{ asset('img/logo.png') }}" alt="Header Picture" class="images">
    <div class=" w3-container w3-center w3-margin">
      <img src="{{ asset('img/c.png') }}" alt="Payment Details" class="images">
    </div>


<div class="w3-container w3-blue"> 
 <h1>Transactions Details</h1>
 </div>
<?php 
 error_reporting(E_ALL);   
foreach($getrecpt as $getr)   
 { 

  ?> 
	
	<div class="w3-container w3-margin w3-padding" id="content">	
	<div id="watermark">		
	  <div class="container">	 
		<h5 class="w3-center">MONEY RECEIPT</h5>
		 <div class="row"><div class="col-md-3">Date:</div><div class="col-md-3"><?PHP echo date('d-M-Y');?></div></div>
		 <div class="row"><div class="col-md-3">Receipt No:</div><div class="col-md-3">{{ $getr -> ReceiptID }}</div></div>
		 <div class="row"><div class="col-md-3">Name:</div><div class="col-md-3">{{ $getr -> StudentName }}</div></div>
		 <div class="row"><div class="col-md-3">Enrollment No:</div><div class="col-md-3">{{ $getr -> EnrollmentNumber }}</div></div>
		 <div class="row"><div class="col-md-3">Semester:</div><div class="col-md-3">{{ $getr -> Semester }}</div></div>
			
		
		<hr class="new1">
		<div><strong>Items on this payment:</strong></div>
				<div class="container">
					<div  class="w3-responsive">						
							<table class="w3-table w3-bordered w3-striped w3-hoverable fit">
							<thead><th scope="col">Payments</th><th scope="col">Amounts</th> </thead>
							<?php print(($getr ->TuitionPayments)>0)? "<tr><td>Tuition  </td><td>".number_format($getr ->TuitionPayments,2)."</td></tr>": "" ; ?> 
							<?php print(($getr ->RoomPayments)>0)? "<tr><td>Room </td><td>".number_format($getr ->RoomPayments,2)."</td></tr>": "" ; ?> 
							<?php print(($getr ->FoodPayments)>0)? "<tr><td>Food </td><td>".number_format($getr ->FoodPayments,2)."</td></tr>": "" ; ?>
							<?php print(($getr ->LibraryFinesPayments)>0)? "<tr><td>Library Fines </td><td>".number_format($getr ->LibraryFinesPayments,2)."</td></tr>": "" ; ?>                  
							<?php print(($getr ->SecurityDepositPayments)>0)? "<tr><td>Security Deposit </td><td>".number_format($getr ->SecurityDepositPayments,2)."</td></tr>": "" ; ?>
							<?php print(($getr ->AcademicFeesPayments)>0)? "<tr><td>Academics Due </td><td>".number_format($getr ->AcademicFeesPayments,2)."</td></tr>": "" ; ?> 
							<?php print(($getr ->PhotosPayments)>0)? "<tr><td>Photos Due</td><td>".number_format($getr ->PhotosPayments,2)."</td></tr>": "" ; ?> 							
							<?php print(($getr ->ProCourseFeePayments)>0)? "<tr><td>Professional Course</td><td>".number_format($getr ->ProCourseFeePayments,2)."</td></tr>": "" ; ?> 
							<?php print(($getr ->FoodSurchargePayments)>0)? "<tr><td>Food Surcharge</td><td>".number_format($getr ->FoodSurchargePayments,2)."</td></tr>": "" ; ?>
							<?php print(($getr ->RoomsurchargePayments)>0)? "<tr><td>Room Surcharge</td><td>".number_format($getr ->RoomsurchargePayments,2)."</td></tr>": "" ; ?> 
							<?php print(($getr ->FinePayments)>0)? "<tr><td>Fines</td><td> ".number_format($getr ->FinePayments,2)."</td></tr>": "" ; ?> 
								
						</table>
					</div>
				</div>			
		
			</div>	
	  </div></div>
<?php $rc=$getr->ReceiptID; 	
	  ?>
	  
	
<?php } ?>
  

    <footer class="w3-center w3-container w3-blue">
                <p>(c)<?php echo date("Y"); ?> Royal Thimphu College</p>
        </footer>
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
