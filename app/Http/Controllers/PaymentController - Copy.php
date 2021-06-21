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
		$values=[$en->EnrollmentNumber, $_POST['bfs_bfsTxnId']];	 
	     DB::update('EXEC procWEBUpdateStudentBalances ?,?', $values);
		 
		$receiptno=DB::table('tblFinancialTransactions')
			->where('TTReference', '=', $_POST['bfs_bfsTxnId'])
			->first();		
		echo $_POST['bfs_bfsTxnId'];
		
		$getrecpt=DB::table('vwWEBSuccessPaymentDetails')
                   ->where('EnrollmentNumber','=',$en->EnrollmentNumber)
				   ->where('ReceiptID','=',$receiptno->ReceiptID)
                     ->get();				
			//return redirect()->away('https://my.rtc.bt/staff_attendancebck/public/index.php/test/'.$receiptno->ReceiptID.'/'.$_POST['bfs_txnAmount'].'/'.$_POST['bfs_remitterBankId'].'/'.$_POST['bfs_bfsTxnId']);
			
		$data = [            
            'date' => date('m/d/Y'),
			//'ReceiptID'=> $getrecpt -> ReceiptID,
			//'StudentName'=>$getrecpt -> StudentName,
			//'EnrollmentNumber'=>$getrecpt -> EnrollmentNumber,
			//'Semester'=>$getrecpt -> Semester,
			//'Amount'=>$_POST['bfs_txnAmount'],
			//'Bankid'=>$_POST['bfs_remitterBankId'],
			//'txnid'=>$_POST['bfs_bfsTxnId'],
			//'TuitionPayments'=>$getrecpt -> TuitionPayments,			
			//'FoodPayments'=>$getrecpt -> FoodPayments,			
			//'RoomPayments'=>$getrecpt -> RoomPayments,			
			//'LibraryFinesPayments'=>$getrecpt -> LibraryFinesPayments,
			//'SecurityDepositPayments'=>$getrecpt->SecurityDepositPayments,
			//'AcademicFeesPayments'=>$getrecpt ->AcademicFeesPayments,
			//'PhotosPayments'=>$getrecpt ->PhotosPayments,
			//'ProCourseFeePayments'=>$getrecpt ->ProCourseFeePayments,
			//'FoodSurchargePayments'=>$getrecpt ->FoodSurchargePayments,
			//'RoomsurchargePayments'=>$getrecpt ->RoomsurchargePayments,
			//'FinePayments'=>$getrecpt ->FinePayments			
        ];
		
		$pdf = PDF::loadView('success',$data);
				
		$pdf->getDomPDF()->setHttpContext(
			stream_context_create([
				'ssl' => [
					'allow_self_signed'=> TRUE,
					'verify_peer' => FALSE,
					'verify_peer_name' => FALSE,
				]
			])
		);
		$pdf->setOptions(['isHtml5ParserEnabled'=>true,'isRemoteEnabled'=>true]);
				
		Mail::send('mail', $data, function($message)use($data, $pdf) {
         $message->to("chimilham@rtc.bt")
			         ->cc("sherubrangdrel@rtc.bt")
			         ->from("acct@rtc.bt")
                    ->subject("bill")
                    ->attachData($pdf->output(),'Receipt_'.date('Y_m_d_H_i_s').'.pdf');
        });
		
        return view ('success',['getrecpt' =>$getrecpt]);
		//return view('welcome');
	
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
	public function pdf(){   

          
        $pdf = PDF::loadView('PDF');
		$pdf->getDomPDF()->setHttpContext(
			$contxt=stream_context_create([
				'ssl' => [
					'allow_self_signed'=> TRUE,
					'verify_peer' => FALSE,
					'verify_peer_name' => FALSE,
				]
			])
		);
		$pdf->setOptions(['isHtml5ParserEnabled'=>true,'isRemoteEnabled'=>true]);
		$pdf->getDomPDF()->setHttpContext($contxt);
    
        return $pdf->download('Receipt_'.date('Y_m_d_H_i_s').'.pdf');
	
	}
	
	 public function test1(){
          $getr=DB::table('vwWEBSuccessPaymentDetails')
                   ->where('EnrollmentNumber','=','201145')
				   ->where('ReceiptID','=','C0023502')
                     ->first();
					// echo $getr -> StudentName;
	
	     $data = [
            
            'date' => date('m/d/Y'),
			'ReceiptID'=> $getr -> ReceiptID,
			'StudentName'=>$getr -> StudentName,
			'EnrollmentNumber'=>$getr -> EnrollmentNumber,
			'Semester'=>$getr -> Semester,
			'Amont'=>'1',
			'Bankid'=>'01',
			'orderno'=>'2222289',
			'TuitionPayments'=>$getr -> TuitionPayments,
			
			'FoodPayments'=>$getr -> FoodPayments,
			
			'RoomPayments'=>$getr -> RoomPayments,
			
			'LibraryFinesPayments'=>$getr -> LibraryFinesPayments,
			'SecurityDepositPayments'=>$getr->SecurityDepositPayments,
			'AcademicFeesPayments'=>$getr ->AcademicFeesPayments,
			'PhotosPayments'=>$getr ->PhotosPayments,
			'ProCourseFeePayments'=>$getr ->ProCourseFeePayments,
			'FoodSurchargePayments'=>$getr ->FoodSurchargePayments,
			'RoomsurchargePayments'=>$getr ->RoomsurchargePayments,
			'FinePayments'=>$getr ->FinePayments
			
        ];
          
        $pdf = PDF::loadView('myPDF',$data);
    
       
		$pdf->getDomPDF()->setHttpContext(
			stream_context_create([
				'ssl' => [
					'allow_self_signed'=> TRUE,
					'verify_peer' => FALSE,
					'verify_peer_name' => FALSE,
				]
			])
		);
		
		
		$pdf->setOptions(['isHtml5ParserEnabled'=>true,'isRemoteEnabled'=>true]);
		
		Mail::send('mail', $data, function($message)use($data, $pdf) {
            $message->to("sherubrangdrel@rtc.bt")
			         ->from("acct@rtc.bt")
                    ->subject("bill")
                    ->attachData($pdf->output(),'Receipt_'.date('Y_m_d_H_i_s').'.pdf');
        });
  
        dd('Mail sent successfully');
    
    //    return $pdf->download('Receipt_'.date('Y_m_d_H_i_s').'.pdf');
          }
		  public function receiptconfirmed($id){
		  
		  $getrecpt=DB::table('vwWEBSuccessPaymentDetails')
                  
				   ->where('ReceiptID','=',$id)
                     ->get();
		  
		  return view('conformPage')->with('getrecpt',$getrecpt);
		  }
}
