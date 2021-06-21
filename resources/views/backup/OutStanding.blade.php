<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RTC Online Payment</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel='icon' href='images/favicon.ico' type='image/x-icon'/> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ asset('w3.css') }}">
		<link rel="stylesheet" type="text/css" href="new.css"/>        
        <script type='text/javascript' src="{{asset('bootstrap.min.js')}}"></script>	
          
    </head>   
		
    <body>
    <div class="w3-border w3-content w3-margin-top w3-card-4">
   <img src="{{ asset('img/logo.png') }}" alt="Header Picture" class="images">
    <div class=" w3-container w3-center w3-margin">
      <img src="{{ asset('img/a.png') }}" alt="Payment Details" class="images">
    </div>

    <div class="w3-container w3-blue">  
  <h1>Outstanding Dues</h1>
</div>
<div class="w3-container w3-margin">
 <?php foreach($paymentdetails as $pd){ ?>
        Enrollment No.: {{ $pd ->EnrollmentNumber }} 
        <input type="hidden" value="{{ $pd ->EnrollmentNumber }}" id="elno"><br><br>
        Student Name: {{ $pd ->StudentName }}
         <input type="hidden" value="{{ $pd ->StudentName }}" id="sname"><br><br>
		 Student Phone Number: {{$Phone}} <br><br>
	<?php if($pd->Due>=0.00){ ?>		 
				<div>
						Email Address: {{$email}}<br><br>						
						No outstanding dues at the time of displaying this page.<br><br>
						<a href="{{ url()->previous() }}" type="button" class="w3-button w3-round-xlarge w3-green w3-hover-lightgray">Back</a>
				</div>
				
		 
	<?php } else{ ?>
		
			<div>
			 <div class="card">
				<strong>A copy of the payment receipt will be emailed automatically to these email addresses.</strong>
				RTC email address:&nbsp{{$email}}<br>
				Student’s personal email address:&nbsp{{$Oemail}}<br>
				Parent/Guardian’s email address:&nbsp{{$inemail}}<br></div>
				<button type="button" data-toggle="modal" data-target="#Modal"> Update contact details</button>
				   <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					 <div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Update contact details</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
						<form action="{{url('/uemail')}}" method="post"> 
							<b>Please update only if you have changed your phone number or email.</b><br>
							Student's phone number: <input class="wid" type="text" name="phone" value="{{$Phone}}"/></br> 
							Student’s personal email address: <input class="wid" type="text" name="email" value="{{$Oemail}}"/></br>
							Parent/guardian’s email address: <input class="wid" type="text" name="inchargeemail" value="{{$inemail}}"/>							
							<input type="hidden" name="enum" value="{{ $pd ->EnrollmentNumber }}"/>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</form>
						  </div>
						</div>
					  </div>
					</div>	
				
			 
				<!--<b>Edit Incharge email:</b> <input type="text" id="inemail" placeholder ={{$inemail}}> <input type="submit" id="inemail">-->	
				 <br> <br><strong>Total Dues: Nu. <?php echo number_format(abs($pd->Due),2); ?></strong><input type="hidden" value="{{ $pd ->Due }}" id="due"> <br>				
			
					<div class="w-50 p-1">						
							<table class="table table-hover">
							<thead><th scope="col">Dues</th><th scope="col">Amount (Nu.)</th> </thead>
							<?php if(($pd ->TuitionBalance)==-20000) { ?>
								<?php print(($pd ->TuitionBalance)<0)? "<tr><td>Enrollment Deposit </td><td>".number_format(abs($pd ->TuitionBalance),2)."</td></tr>": "" ; ?>
							<?php }else{?>
								<?php print(($pd ->TuitionBalance)<0)? "<tr><td>Tuition  </td><td>".number_format(abs($pd ->TuitionBalance),2)."</td></tr>": "" ; ?>
							<?php }?>							     
							<?php print(($pd ->RoomBalance)<0)? "<tr><td>Room </td><td>".number_format(abs($pd ->RoomBalance),2)."</td></tr>": "" ; ?> 
							<?php print(($pd ->FoodBalance)<0)? "<tr><td>Food </td><td>".number_format(abs($pd ->FoodBalance),2)."</td></tr>": "" ; ?> 
							<?php print(($pd ->LibraryFinesBalance)<0)? "<tr><td>Library Fines </td><td>".number_format(abs($pd ->LibraryFinesBalance),2)."</td></tr>": "" ; ?>                  
							<?php print(($pd ->SecurityDepositBalance)<0)? "<tr><td>Security Deposit </td><td>".number_format(abs($pd ->SecurityDepositBalance),2)."</td></tr>": "" ; ?> 
							<?php print(($pd ->AcademicFeesBalance)<0)? "<tr><td>Academics Due </td><td>".number_format(abs($pd ->AcademicFeesBalance),2)."</td></tr>": "" ; ?> 
							<?php print(($pd ->PhotosBalance)<0)? "<tr><td>Photos Due</td><td>".number_format(abs($pd ->PhotosBalance),2)."</td></tr>": "" ; ?> 							
							<?php print(($pd ->ProCourseFeeBalance)<0)? "<tr><td>Professional Course</td><td>".number_format(abs($pd ->ProCourseFeeBalance),2)."</td></tr>": "" ; ?> 
							<?php print(($pd ->FoodsurchargeBalance)<0)? "<tr><td>Food Surcharge</td><td>".number_format(abs($pd ->FoodsurchargeBalance),2)."</td></tr>": "" ; ?> 
							<?php print(($pd ->RoomsurchargeBalance)<0)? "<tr><td>Room Surcharge</td><td>".number_format(abs($pd ->RoomsurchargeBalance),2)."</td></tr>": "" ; ?> 
							<?php print(($pd ->FinesBalance)<0)? "<tr><td>Fines</td><td> ".number_format(abs($pd ->FinesBalance),2)."</td></tr>": "" ; ?>
							
						</table>
					</div>
				
				<?php 
					$amt=abs($pd->Due);
					$number = "";
					for($i=0; $i<10; $i++) {
					$min = ($i == 0) ? 1:0;
					$number .= mt_rand($min,9);}       
					$today = date("Ymdhms");
					$bfs_msgType = "AR"; 
				   $bfs_benfTxnTime = $today; 
				   $bfs_orderNo = date('Ymd').$number; 
				   $bfs_benfId = "BE10000119"; //Put your beneficiary ID
				   $bfs_benfBankCode = "01";
				   $bfs_txnCurrency = "BTN";
				   //$bfs_txnAmount = $amt;
				   $bfs_txnAmount = 0.1;
				   $bfs_remitterEmail = "itadmin@rtc.bt";
				   $bfs_paymentDesc = "Fee payment via BFS secure";
				   $bfs_version = "1.0";
				   $data = $bfs_benfBankCode.'|'.$bfs_benfId.'|'.$bfs_benfTxnTime.'|'.$bfs_msgType.'|'.$bfs_orderNo.'|'.$bfs_paymentDesc.'|'.$bfs_remitterEmail.'|'.$bfs_txnAmount.'|'.$bfs_txnCurrency.'|'.$bfs_version;
				   
				   $key = file_get_contents('C:/inetpub/wwwroot/RTCOnlinePayment/public/key/BE10000130.key');
				   
				   $p = openssl_pkey_get_private($key);
					openssl_sign($data, $signature, $p);
					openssl_free_key($p);
					$signed = bin2hex($signature);
					$bfs_checkSum = strtoupper($signed);
					
					
						$insert=DB::table('tblOnlineTransactions')
								->insert(['Amount'=>$bfs_txnAmount, 'OrderNumber'=>$bfs_orderNo, 'BeneficiaryTxnTime'=>$bfs_benfTxnTime, 'EnrollmentNumber'=>$pd->EnrollmentNumber]);
					
				?>
				  <form method="POST" action="https://bfssecure.rma.org.bt/BFSSecure/makePayment">
				   <input type="hidden"  id="en" value="{{$pd->EnrollmentNumber}}">
					  <input type="hidden"  name="bfs_msgType" value="{{$bfs_msgType}}">
					  <input type="hidden" id="bfs_benfTxnTime" name="bfs_benfTxnTime" value="{{$bfs_benfTxnTime}}">
					  <input type="hidden" id="bfs_orderNo" name="bfs_orderNo" value="{{$bfs_orderNo}}">
					  <input type="hidden"  name="bfs_benfId" value="{{$bfs_benfId}}">
					  <input type="hidden" name="bfs_benfBankCode" value="{{$bfs_benfBankCode}}">
					  <input type="hidden" name="bfs_txnCurrency" value="{{$bfs_txnCurrency}}">
					  <input type="hidden" id="bfs_txnAmount" name="bfs_txnAmount" value="{{$bfs_txnAmount}}">
					  <input type="hidden" name="bfs_remitterEmail" value="{{$bfs_remitterEmail}}">
					  <input type="hidden" name="bfs_checkSum" value="{{$bfs_checkSum}}">
					  <input type="hidden" name="bfs_paymentDesc" value="{{$bfs_paymentDesc}}">
					 <input type="hidden" name="bfs_version" value="{{$bfs_version}}">
						&nbsp &nbsp &nbsp &nbsp
					<input class="w3-button w3-round-xlarge w3-green w3-hover-lightgray" value="Pay Now" type="submit"/>
				<a href="{{ url()->previous() }}" type="button" class="w3-button w3-round-xlarge w3-green w3-hover-lightgray">Back</a>
				</form>
			  </div>
			  	
    <ol id="customnum">		
   <b>Instructions for remaining steps:</b>
        <li>Step 2. <b>Outstanding Dues page:</b>
			<ul>
				<li>Reconfirm the student enrollment number, name of student, and outstanding dues. There is also an option to update your contact information (phone number) and email 
				address to which the payment receipt will be emailed.</li>
				<li>Please ensure that you have sufficient balance in your bank account to proceed further, and Click <span class="text-primary">Pay Now.</span></li>
			</ul>
		</li>
        <li>Step 3. <b>Payment Gateway page:</b>
			<ul>
				<li>Select your bank, enter your bank account number, and click “<span class="text-primary">Continue</span>”.</li>
				<li>You will receive an OTP pin to the mobile number registered with your bank. Please note that this OTP pin will be active only for a few minutes (<7mins) for security purposes.</li>
				<li>Enter the OTP pin in the field provided and click <span class="text-primary">Make payment</span> to process the payment. This may take a few seconds, and once the Make payment button is clicked,
				<span class="text-danger"><b>please do not close the page</b></span>.</li>
			</ul>
		</li> 
        <li>Step 4. <b>Receipt & Transaction Details for successful payments:</b>
			<ul>
				<li>Once the payment is successful, you will see an online money receipt.</li>
				<li>The money receipt will be emailed automatically to the respective email ids.</li>
				<li>You can also print or download the money receipt by clicking the button “<span class="text-primary">Print</span>” / “<span class="text-primary">Download</span>”.</li>
				<li>Please note that current students can view past semesters’ money receipts by logging into the student / parent / guardian’s portal –
				   <a href="https://results.rtc.bt/" target="_blank">results.rtc.bt</a>.</li>
			</ul>
		</li><br>
		<div class="card">
			<div class="card-body"><b>Note: For any assistance while using the secure payment portal, please contact: 7740-0145 / 1758-9499 / 1734-5282</b></div></div>
    </ol> 
	
	<?php } } ?>
       
</div>
	 
    <br>

<footer class="w3-center w3-container w3-blue">
		
    <p>(c)<?php echo date("Y"); ?> Royal Thimphu College</p>
</footer>
</div>
	
</body>
</html>


