<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RTC Online Payment</title>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <link rel='icon' href='images/favicon.ico' type='image/x-icon'/> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('w3.css') }}">
        <script type='text/javascript' src="{{asset('jquery.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('bootstrap.min.js')}}"></script>          
    </head>   
		
    <body>

    <div class="w3-border w3-content w3-margin-top w3-card-4">
   <img src="{{ asset('img/logo.png') }}" alt="Header Picture" class="images">
    <div class=" w3-container w3-center w3-margin">
      <img src="{{ asset('img/a.png') }}" alt="Payment Details" class="images">
    </div>

    <div class="w3-container w3-blue">  
  <h1>Outstanding Details</h1>
</div>
<div class="w3-container w3-margin">
 <?php foreach($paymentdetails as $pd){ ?>
        Transaction Number:{{ $pd ->ReferenceNumber }} 
        <input type="hidden" value="{{ $pd ->ReferenceNumber }}" id="ref"><br><br>
         Name: {{ $pd ->Name }}
         <input type="hidden" value="{{ $pd ->Name }}" id="name"><br><br>
         Mobile Number: {{ $pd ->MobileNumber }}
         <input type="hidden" value="{{ $pd ->MobileNumber }}" id="mnumber"><br><br>
		 
	<?php if($pd->Amount==0.00){ ?>
		 
				<div>					
						There is no outstanding against this consumer.<br><br>
						<a href="{{ url()->previous() }}" type="button" class="w3-button w3-round-xlarge w3-green w3-hover-lightgray">Back</a>
				</div>
				
		 
	<?php } else{ ?>
		
			<div>
				<strong>Total Amount: <?php echo number_format(round($pd->Amount,2)); ?></strong><input type="hidden" value="{{ $pd ->Amount }}" id="amount">  <br><br>	  
				
				<?php 
					 $number = "";
					for($i=0; $i<10; $i++) {
					  $min = ($i == 0) ? 1:0;
					  $number .= mt_rand($min,9);
					}
				   
				   $today = date("Ymdhms");
				   $bfs_msgType = "AR"; 
				   $bfs_benfTxnTime = $today; 
				   $bfs_orderNo = date('Ymd').$number; 
				   $bfs_benfId = "BE10000119"; //Put your beneficiary ID
				   $bfs_benfBankCode = "01";
				   $bfs_txnCurrency = "BTN";
				   //$bfs_txnAmount = round($pd->Due);
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
								->insert(['Amount'=>$bfs_txnAmount, 'OrderNumber'=>$bfs_orderNo, 'BeneficiaryTxnTime'=>$bfs_benfTxnTime, 'ReferenceNumber'=>$pd->ReferenceNumber]);					
					?>
					
				<form method="POST" action="https://bfssecure.rma.org.bt/BFSSecure/makePayment">
				   <input type="hidden"  id="en" value="{{$pd->ReferenceNumber}}">
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
				<input class="w3-button w3-round-xlarge w3-green w3-hover-lightgray" value="Pay Now" type="submit"/>
				<a href="{{ url()->previous() }}" type="button" class="w3-button w3-round-xlarge w3-green w3-hover-lightgray">Back</a>
				</form>			

			  </div>
	<?php } } ?>
       
</div>
	
 
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<footer class="w3-center w3-container w3-blue">
		
    <p>@<?php echo date("Y"); ?> <a href = "https://www.myrtc.bt" target="_blank"> Royal Thimphu College</a></p>
</footer>
</div>
	
</body>
</html>


