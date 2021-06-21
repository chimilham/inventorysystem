<html>
    <head>
	
        <meta charset="UTF-8">
		<meta name="referrer" content="origin">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RTC Online Payment</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" type="text/css" href="new.css"/>
    <link rel='icon' href='images/favicon.ico' type='image/x-icon'/>       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('w3.css') }}">
        <script type='text/javascript' src="{{asset('jquery.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('bootstrap.min.js')}}"></script>
		
    </head>
	
	<script>
    // CSRF for all ajax call
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content') } });
</script>
    <body>
 <div class="w3-border w3-content w3-margin-top w3-card-4">
     <img src="{{ asset('img/logo.png') }}" alt="Header Picture" class="images">
      <div class=" w3-container w3-center w3-margin">
       <img src="{{ asset('img/b.png') }}" alt="Outstanding Details" class="images">
     </div>
<div class="w3-container w3-blue">  

</div> 
<div class="w3-container w3-margin">

<?php
//echo "The error code ".$_POST['bfs_debitAuthCode']."<br>"; 
if ($_POST['bfs_debitAuthCode']==55){ echo "<div id='failurestyle'>You have entered invalid OTP Pin!!</div>";}
else if ($_POST['bfs_debitAuthCode']==03){ echo "<div id='failurestyle'>Beneficiary Account Closed.</div>";}
else if ($_POST['bfs_debitAuthCode']==12){ echo "<div id='failurestyle'>Invalid Transaction</div>";}
else if ($_POST['bfs_debitAuthCode']==20){ echo "<div id='failurestyle'> Invalid Amount</div>";}
else if ($_POST['bfs_debitAuthCode']==14){ echo "<div id='failurestyle'>Invalid Remitter Account</div>";}
else if ($_POST['bfs_debitAuthCode']==20){ echo "<div id='failurestyle'>Invalid Response</div>";}
else if ($_POST['bfs_debitAuthCode']==30){ echo "<div id='failurestyle'>Transaction Not Supported Or Format Error</div>";}
else if ($_POST['bfs_debitAuthCode']==45){ echo "<div id='failurestyle'>Duplicate Beneficiary Order Number</div>";}
else if ($_POST['bfs_debitAuthCode']==47){ echo "<div id='failurestyle'>Invalid Currency</div>";}
else if ($_POST['bfs_debitAuthCode']==48){ echo "<div id='failurestyle'>Transaction Limit Exceeded</div>";}
else if ($_POST['bfs_debitAuthCode']==51){  echo "<div id='failurestyle'>Your transaction was not successful due to insufficient balance.</div>";}
else if ($_POST['bfs_debitAuthCode']==53){ echo "<div id='failurestyle'>No Savings Account</div>";}
else if ($_POST['bfs_debitAuthCode']==57){ echo "<div id='failurestyle'>Transaction Not Permitted</div>";}
else if ($_POST['bfs_debitAuthCode']==61){ echo "<div id='failurestyle'>Withdrawal Limit Exceeded</div>";}
else if ($_POST['bfs_debitAuthCode']==65){ echo "<div id='failurestyle'>Withdrawal Frequency Exceeded</div>";}
else if ($_POST['bfs_debitAuthCode']==76){ echo "<div id='failurestyle'>Transaction Not Found</div>";}
else if ($_POST['bfs_debitAuthCode']==80){ echo "<div id='failurestyle'>Buyer Cancel Transaction</div>";}
else if ($_POST['bfs_debitAuthCode']==85){ echo "<div id='failurestyle'>Internal Error At Bank System</div>";}
else if ($_POST['bfs_debitAuthCode']=='OA'){ echo "<div id='failurestyle'>Session Timeout at BFS Secure Entry Page</div>";}
else { echo "<div id='failurestyle'>Transaction Failed.</div>";}
?>

<br>
<h3 class="text-center">Your Payment was unsuccessful.</h3> <br>
  <div class="text-center"><a class="w3-button w3-round-xlarge w3-blue w3-hover-lightgray" href="{{ url('/') }}">click here to try again</a> </div>         
</div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">


        <footer class="w3-center w3-container w3-blue">
                <p>(c)<?php echo date("Y"); ?> Royal Thimphu College</p>
        </footer>
</div>
     
</body>
</html>


