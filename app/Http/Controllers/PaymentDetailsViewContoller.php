<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;
use Alert;

class PaymentDetailsViewContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {       
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
       
             
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $var=$request->input('EnrlNo');
		$dob=$request->input('year')."-".$request->input('month')."-".$request->input('date');
        if(!empty($var))
            {                                 
                $paymentdetails=DB::table('vwWEBAPIstudentFeesDetails')
                                    ->where([
                                            ['EnrollmentNumber',$request->input('EnrlNo')],
                                            ['DOB',$dob]                                            
                                            ])
                                    ->get();
													

                if(count($paymentdetails)>0){
				
					$email=DB::table('tblStudents')
							->where ('EnrollmentNumber',$request->input('EnrlNo'))
							->first();
							
                   return view('OutStanding',['paymentdetails' =>$paymentdetails],['email'=>$email->EMailRTC."@rtc.bt"])->with('inemail',$email->InchargeEMail)->with('Oemail',$email->EmailOther)
											->with('Phone',$email->CellPhone);
					
                }else 
                {                    
                    return redirect()->back()->with('success','Student Does not exist');
                }
            }
        else{
                $paymentdetails=DB::table('tblGroundBooking')
                                ->where([
                                        ['ReferenceNumber', $request->input('ref')],
										['MobileNumber', $request->input('phone')]
                                        ])
                                ->get();
                if(count($paymentdetails)>0){
                    return view('GroundOutstanding',['paymentdetails' =>$paymentdetails]);
                }
                else{
                    return redirect()->back()->with('success','reference number Does not exist');
                }
			}
            
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
	    //echo "test";
       return view('failure');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request)
    {	
        $email=	$request->input('email');
		$eno= $request->input('enum');	
		$inemail= $request->input('inchargeemail');
		$phonenum=$request->input('phone');		
	
		   DB::table('tblStudents')
			  ->where('EnrollmentNumber',$eno)
			  ->update(['InchargeEMail' => $inemail]);
		   DB::table('tblStudents')
			  ->where('EnrollmentNumber',$eno)
			  ->update(['EmailOther' => $email]);
		    DB::table('tblStudents')
			  ->where('EnrollmentNumber',$eno)
			  ->update(['CellPhone' => $phonenum]);
		
		
		$paymentdetails=DB::table('vwWEBAPIstudentFeesDetails')
                         ->where('EnrollmentNumber',$eno)
                         ->get();
			
               
		    if(count($paymentdetails)>0){
				
					$email=DB::table('tblStudents')
							->where ('EnrollmentNumber', $eno)
							->first();
					
                   return view('OutStanding',['paymentdetails' =>$paymentdetails],['email'=>$email->EMailRTC."@rtc.bt"])->with('inemail',$email->InchargeEMail)->with('Oemail',$email->EmailOther)
								->with('Phone',$email->CellPhone);
					
               }else 
                {                    
                   return redirect()->back()->with('success','Student Does not exist');
                }
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
        /**$update=DB::table('tblStudents')
			->where('EnrollmentNumber',$id)
			->update(['InchargeEMail' => $request->input('mail')]);
			
			 return redirect()->route('payment.create');*/
    }
    public function cancel()
    {
        return redirect("/")->with('success','Your payment has been cancelled');;
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
    public function accountinfo()
    {
        
    }

}
