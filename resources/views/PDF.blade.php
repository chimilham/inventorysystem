
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RTC Online Payment</title>
        
		<link rel='icon' href='images/favicon.ico' type='image/x-icon'/>       
		<link rel="stylesheet" href="{{ asset('w3.css') }}"> 
        		
       
        <link rel="stylesheet" href="{{ asset('style.css') }}">						
    </head>.
   
  
   
<body>
<div class="w3-content w3-margin-top w3-card-4">
<?php 

   $img='\img\receiptheader.JPG';
?>
  <img src="{{ public_path().$img }}" alt="Header Picture" class="images">
    



  

<div class="w3-row">
  <div class="w3-col s8  w3-left"><p>Date:3344455</p></div>

  <div class="w3-col s4  w3-left"><p>Receipt No.:lllll</p></div>
</div>

<div class="w3-row">
  <div class="w3-col s8  w3-left"><p><strong>Received with thanks from :</strong>kkkk</div>
  
  <div class="w3-col s4  w3-left"><p><strong>Enrollment No.</strong>:llll</p></div>
</div>
<div class="w3-row">
  <div class="w3-col s4  w3-left"><p><strong><strong>Semester</strong>:</strong>llll</div>
  
  
</div>
<div class="w3-row">
  <div class="w3-col s4  w3-left"><p><strong><strong>Nu</strong>:</strong>kkkkk</div>
  
  
</div>
<div class="w3-row">
  <div class="w3-col s4  w3-left"><p><strong>Paid as per the following breakdown:</strong></div>
  
  
</div>

<div class="w3-row">
  <div class="w3-col s4  w3-left"><p><strong>Cash</strong></div>
  
  
</div>
<div class="w3-row">
  <div class="w3-col s4  w3-left"><p><strong>Cheque</strong></div>
  
  
</div>

<div class="w3-row">
  <div class="w3-col s4  w3-left"><p><strong>TT/Other :</strong>pppp</div>
  <div class="w3-col s4  w3-left"><p><strong>TT Bank :</strong>kkkk,<strong>TT Date</strong>:2021/12/02</div>
  <div class="w3-col s4  w3-left"><p><strong>TT Ref :</strong>kkkkk</div>
  
  
</div>
<div class="w3-row">
  <div class="w3-col s4  w3-left"><p><strong>Items on this payment:</strong></div>
  <div class="w3-col s4  w3-left"><p><strong>Balances after this payment (negative balance means amount is owing):</strong></div>
  
  
</div>
<div class="w3-row">
  <div class="w3-col s4  w3-left"><p>Tuition Payment :999</div>
  <div class="w3-col s4  w3-left"><p><strong>Tuition Balance :9999</strong></div>
  
  
</div>
<div class="w3-row">
  <div class="w3-col s4  w3-left"><p>Food Payment :77777</div>
  <div class="w3-col s4  w3-left"><p><strong>Food Balance :00000</strong></div>
  
  
</div>
<div class="w3-row">
  <div class="w3-col s4  w3-left"><p>Room Payment :88888</div>
  <div class="w3-col s4  w3-left"><p><strong>Room Balance :88888</strong></div>
  
  
</div>
<div class="w3-row">
  <div class="w3-col s4  w3-left"><p>Library Payment :uuuuu</div>
  <div class="w3-col s4  w3-left"><p><strong>Library Balance :777777</strong></div>
  
  
</div>
<div class="w3-row">
  <div class="w3-col w3-container" id="lowsc"><p></p></div>
  <div class="w3-col w3-container" id="highsc"><p></p></div>
  <div class="w3-col w3-container" id="highsc"><p>(Receiver's Signature and Seal)</p></div>
</div>

<div class="w3-row">
  <div class="w3-col s9  w3-left"><p>* For cheque or TT/Other- validity of this receipt is subject to realization of the amount.</div>
  
  
  
</div>

<div class="w3-row">
  <div class="w3-col s9  w3-left"><p>* This receipt is not valid without signature and official seal.</div>
  
  
  
</div>

</div>

    

</body>
</html>
