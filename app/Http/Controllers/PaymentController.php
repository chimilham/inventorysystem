<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use PDF;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		 //error_reporting(E_ALL);
      
	 $en=DB::table('tblOnlineTransactions')
            ->where('OrderNumber', '=', $_POST['bfs_orderNo'])
             ->first();
		 
	 if(!empty($en->EnrollmentNumber))
	 {	
		//echo $en->EnrollmentNumber;
	     DB::table('tblBfsOnlineTransactions')
			->insert(['bfs_orderNo'=>$_POST['bfs_orderNo'], 'bfs_remitterBank'=>$_POST['bfs_remitterBankId'],'bfs_amount'=>$_POST['bfs_txnAmount'], 
			 'EnrollmentNumber'=>$en->EnrollmentNumber, 'bfs_TxnID'=>$_POST['bfs_bfsTxnId'] ]);	 	
		
		$values=[$en->EnrollmentNumber, $_POST['bfs_bfsTxnId']];	 
	     DB::update('EXEC procWEBUpdateStudentBalances ?,?', $values);
		 
		$receiptno=DB::table('tblFinancialTransactions')
			->where('TTReference', '=', $_POST['bfs_bfsTxnId'])
			->first();		
				
		$getrecpt=DB::table('vwWEBSuccessPaymentDetails')                                 		
				   ->where('ReceiptID','=',$receiptno->ReceiptID)
                     ->get();	
					 
	
		foreach ($getrecpt as $dat){
		$data = [  
   			'ReceiptID'=> $dat -> ReceiptID,
			'StudentName'=>$dat -> StudentName,
			'EnrollmentNumber'=>$dat -> EnrollmentNumber,
			'Semester'=>$dat -> Semester,
			'Amount'=>$_POST['bfs_txnAmount'],
			'bank'=>$_POST['bfs_remitterBankId'],
			'txn'=>$_POST['bfs_bfsTxnId'],
			'TuitionPayments'=>$dat -> TuitionPayments,
			
			'FoodPayments'=>$dat -> FoodPayments,
			
			'RoomPayments'=>$dat -> RoomPayments,
			
			'LibraryFinesPayments'=>$dat -> LibraryFinesPayments,
			'SecurityDepositPayments'=>$dat->SecurityDepositPayments,
			'AcademicFeesPayments'=>$dat ->AcademicFeesPayments,
			'PhotosPayments'=>$dat ->PhotosPayments,
			'ProCourseFeePayments'=>$dat ->ProCourseFeePayments,
			'FoodSurchargePayments'=>$dat ->FoodSurchargePayments,
			'RoomsurchargePayments'=>$dat ->RoomsurchargePayments,
			'FinePayments'=>$dat ->FinePayments,
             'Mail'=>$dat->EMailRTC,
			 'toin'=>$dat->InchargeEMail,
             'tocc'=>$dat->EmailOther,	
		     'subject'=>$dat -> EnrollmentNumber." ".$dat -> StudentName."-Payment Receipt"	 
             			
        ];	}	
		
		
		Mail::send('mail',['data'=>$data], function($message) use($data){					
			$message->to($data['Mail']."@rtc.bt")
				 ->cc($data['toin'])
				 ->cc($data['tocc'])
				  ->cc("admission@rtc.bt")
				 ->from("acct@rtc.bt")
				 ->subject($data['subject']);
					
			});
			
			                                                                                  
	
       return view ('success',['getrecpt' =>$getrecpt]);	
	
	 }
	 
	 
	 else{
			$ref=DB::table('tblOnlineTransactions')
                 ->where('OrderNumber', '=', $_POST['bfs_orderNo'])
                 ->get();				 
			return view ('success',['getrecpt' =>$ref]);	 
	 } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {		
						
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	public function receiptconfirmed($id){
		  
		        $getrecpt=DB::table('vwWEBSuccessPaymentDetails')
                   
				   ->where('RanNum','=',$id)
                     ->get();
					 return view('confirmPage')->with('getrecpt',$getrecpt);					
		  
		  } 
	
	 
}
