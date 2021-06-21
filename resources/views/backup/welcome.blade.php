<!doctype html>
<html class="no-js" lang="en">
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RTC Online Payment</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" type="text/css" href="new.css"/>
        <link rel='icon' href='images/favicon.ico' type='image/x-icon'/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('w3.css') }}">
        <script src="jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
		<script type='text/javascript' src="{{asset('dropdown.js')}}"></script>
		
		<meta name="detectify-verification"
      content="d2cb8cdad528a6d0df9ee217f43cc86d"/>
    </head>
    <body>
<div class="w3-border w3-content w3-margin-top w3-card-4">
     <img src="{{ asset('img/logo.png') }}" alt="Header Picture" class="images">
<div class="w3-container w3-blue">
   
<h1 class="w3-center">Welcome to RTC Secure Online Payment</h1>
</div><br>
 <div class=" w3-container w3-center w3-padding w3-margin-top">
                             @if ($message = Session::get('success'))
                                       <div class="alert alert-danger alert-block">
                                          <button type="button" class="close" data-dismiss="alert">×</button>
                                           <strong>{{ $message }}</strong>
                                                  </div>
                                 @endif
           
			
					 
					  <label for="option">Choose a payment:</label>						   
						<select id="option">						  												  
							<option value="2" selected>Student Fees Payment</option>
							 <option value="1">Other Payments</option>
						</select><br><br>
							<div id="tu">
							 <form class="form-horizontal" action="{{route('payment.store')}}" method="POST" >
							             @csrf
							<div class="form-group">							
							  <div class="row"><label class="control-label col-sm-4" for="EnrlNo"> Enrollment Number:</label>
							   <div class="col-sm-7"><input type="text" class="form-control" name = "EnrlNo" placeholder="eg:110060" required></div><br><br></div>
								<label class="control-label col-sm-4" for="dob"> Date of Birth:</label>
									<div class="col-sm-8">
										<div class="container">
										 <div class="row">
											<div class="col-sm-2" id="remove-all-margin-padding">
												<select name="year" class="form-control" required>
												<option value="#">Select Year</option>
										<?php
											for($i=date("Y");$i>1950;$i--){
		
										?>
												<option value="{{ $i}}"><?php echo $i; ?></option>
										<?php
										}
										?>
										  </select>
											</div>
											<div id="remove-all-margin-padding" class="col-sm-2" >
												  <select name="month" class="form-control" required>
													  <option value="#">Select Month</option>
													  <option value="01">January</option>
													  <option value="02">February</option>
													  <option value="03">March</option>
													  <option value="04">April</option>
													  <option value="05">May</option>
													  <option value="06">June</option>
													  <option value="07">July</option>
													  <option value="08">August</option>
													  <option value="09">September</option>
													  <option value="10">October</option>
													  <option value="11">November</option>
													  <option value="12">December</option>
											   </select>
											</div>
											<div id="remove-all-margin-padding" class="col-sm-2">
												 <select name="date" class="form-control" required>
												 <option value="#">Select Date</option>
													<?php
														for($i=1;$i<31;$i++){
															if($i<10){
																$a='0'.$i;
													?>
															<option value="{{$a}}"><?php echo $a; ?></option>

													<?php
														} else
													{?>
															<option value="{{$i}}"><?php echo $i; ?></option>
													<?php }}	?>
												</select>
											</div>
										  </div>
										 </div>					  
 									</div>
								<br>
								<br>
								<input class= "w3-button w3-round-xlarge w3-blue w3-hover-lightgray" type="submit" value="Submit">	 </form> 							
							</div></div>
							<div id="Football">
							<form class="form-horizontal" action="{{route('payment.store')}}" method="POST" >
							<div class="form-group">
							  <label class="control-label col-sm-4" for="ref"> Reference Number:</label>
							   <div class="col-sm-8"><input type="text" class="form-control" name="ref" placeholder="eg:abc0060" ></div>
								<label class="control-label col-sm-4" for="phone"> Phone number</label>
								  <div class="col-sm-8"><input type="text" class="form-control" name="phone" placeholder="eg:17000000" ></div><br>
								<input class= "w3-button w3-round-xlarge w3-blue w3-hover-lightgray" type="submit" value="Submit">  </form> 
							</div></div>	
							  
           </div><br>
    <div>
    <h4><b><span id="sp" class="text-info">Instructions/guidelines for using this secure payment portal.</span></b></h4>
	<span id="sp">Please read carefully the following steps for using this payment portal:</span>
    <ol id="customlist">
        <li><b>Home page:</b>
			<ul>
				<li>For Student Fees Payment, choose “Student Fees Payment” from the dropdown option.</li>
				<li>Enter your RTC enrollment number (6-digits number) and DOB, then click <span class="text-primary">Submit</span>.</li>
			</ul>
		</li>
        <li><b>Outstanding Dues page:</b>
			<ul>
				<li>Reconfirm the student enrollment number, name of student, and outstanding dues. There is also an option to <br>update your contact information (phone number) and email 
				address to which the payment receipt will be emailed.</li>
				<li>Please ensure that you have sufficient balance in your bank account to proceed further, and Click <span class="text-primary">Pay Now.</span></li>
			</ul>
		</li>
        <li><b>Payment Gateway page:</b>
			<ul>
				<li>Select your bank, enter your bank account number, and click “<span class="text-primary">Continue</span>”.</li>
				<li>You will receive an OTP pin to the mobile number registered with your bank. Please note that this OTP pin will be active only for a few minutes (<7mins) for security purposes.</li>
				<li>Enter the OTP pin in the field provided and click <span class="text-primary">Make payment</span> to process the payment. This may take a few <br>seconds, and once the Make payment button is clicked,
				<span class="text-danger"><b>please do not close the page</b></span>.</li>
			</ul>
		</li> 
        <li><b>Receipt & Transaction Details for successful payments:</b>
			<ul>
				<li>Once the payment is successful, you will see an online money receipt.</li>
				<li>The money receipt will be emailed automatically to the respective email ids.</li>
				<li>You can also print or download the money receipt by clicking the button “<span class="text-primary">Print</span>” / “<span class="text-primary">Download</span>”.</li>
				<li>Please note that current students can view past semesters’ money receipts by logging into the student / parent / guardian’s portal –
				   <a href="https://results.rtc.bt/" target="_blank">results.rtc.bt</a>.</li>
			</ul>
		</li>
    </ol>  

		
    </div>

            <br><br><br><br><br>
            

       
<footer class="w3-blue w3-container w3-center">
                <p>(c)<?php echo date("Y"); ?> Royal Thimphu College</p>
            </footer>
            </div>


</div> 
</body>
</html>
