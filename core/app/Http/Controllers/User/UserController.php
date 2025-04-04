<?php
namespace App\Http\Controllers\User;
use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Lib\FormProcessor;
use App\Lib\GoogleAuthenticator;
use App\Lib\Mlm;
use App\Models\JobPosting;
use App\Models\BvLog;
use App\Models\Deposit;
use App\Models\Ads;
use Illuminate\Support\Str;
use App\Models\Form;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserExtra;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Mail\Packageselected;
use Illuminate\Support\Facades\Mail;



class UserController extends Controller
{

    public function jobpostings(){
        return view('user.jobpostings');
    }

    public function apply(Request $request, $id)
    {
        $job = JobPosting::findOrFail($id);
        $user = Auth::user();

        // Assuming user has a balance field in the users table
        if ($user->balance < 500) { // Example: minimum balance required is 10
            return response()->json([
                'success' => false,
                'message' => 'Insufficient balance. Required: 500 kes. Your balance: ' . $user->balance
            ]);
        }

        $new_balance=$user->balance-500;

        $user->balance=$new_balance;

        $user->save();

        // Here you could deduct balance or process the application
        // For this example, we'll just return success
        return response()->json([
            'success' => true,
            'message' => 'Application submitted successfully!'
        ]);
    }



    public function addons(Request $request){
        return view ('user.addons');
    }

    public function premium(){
        return view('user.premium');
    }


    public function whatswith(Request $request){

        $user=Auth::user();


        if($user->plan_id==1 || $user->plan_id==2){
            session()->flash('error', 'Please purchase premium ads package');  
            return redirect()->back();
        }

        $amount=$request->amount;

        
     

        //check the amount earned today
        $total_ads=Ads::where('user_id',Auth::user()->id)
                                ->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
                                ->sum('earnings');
        
        $whatsapp_with=Withdrawal::where('user_id',Auth::user()->id)
                                ->where('withdraw_information', 'LIKE', '%whatsapp%')
                                ->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
                                ->sum('amount');

        $wh="whatsapp";



        //check if there is a balance

        if($whatsapp_with<=$total_ads){
            $withdrawal=new Withdrawal();

            $withdrawal->user_id=$user->id;

            $withdrawal->amount=$amount;

            $withdrawal->trx=Str::random(10);

            $withdrawal->withdraw_information=$wh;

            $withdrawal->status=1;

            if($withdrawal->save()){
                session()->flash('success', 'Withdrawal request created');
                // Redirect back or to another page
                return redirect()->back();  
        }
    }else{

        session()->flash('error', 'Insufficient balance to withdraw');  
        return redirect()->back();


       
    }





        

        
        
        
        //check the amount earned this week





    }
    public function forexpackage(Request $request){


        $user=auth()->user();

        $amount=$request->amount;

        $user_balance=$user->balance;

        if($user_balance>=$amount){
            $user->balance=$user_balance-$amount;
            


            if($user->save()){
                session()->flash('success', 'Forex package purchased');
                // Redirect back or to another page
                return redirect()->back();  
    
        }
        }else{
                session()->flash('error', 'Insufficient balance to purchase package');
                // Redirect back or to another page
                return redirect()->back();  
        }


    }

    public function withdrawalscashback(Request $request){
        $user=auth()->user();

        $balance=$user->cashback;

        $amount=$request->amount;
        // $phone=$request->phoneNumber;

        $withdrawal=new Withdrawal();

        $withdrawal->user_id=$user->id;

        $withdrawal->amount=$amount;

        $withdrawal->trx=Str::random(10);

        // $withdrawal->phone=$phone;

        $withdrawal->withdraw_information="cashback";

        $withdrawal->status=2;

        if($balance>=$amount){
            $user->cashback=$balance-$amount;
            $user->save();

            if($withdrawal->save()){
                session()->flash('success', 'Withdrawal request created');
                // Redirect back or to another page
                return redirect()->back();  
    
        }
        }else{
                session()->flash('error', 'Insufficient balance to withdraw');
                // Redirect back or to another page
                return redirect()->back();  
        }

        
}
    public function transfercreate(Request $request){
        $username=$request->username;
        $amount=$request->amount;

        $user=auth()->user();

        $mybalance=$user->balance;

        $toUser=User::where('username',$username)->first();

        if(!$toUser){
            session()->flash('error', 'User not found');
            // Redirect back or to another page
            return redirect()->back();
        }

        // return $user->username.$username;

        if (strtolower($user->username) == strtolower($username)) {

            
            session()->flash('error', 'Hahah bold move.You cannot transfer to yourself');
            // Redirect back or to another page
            return redirect()->back();
        }

        $toUserBalance=$toUser->balance;

        if($mybalance>=$amount){
            $user->balance=$mybalance-$amount;
            $toUser->balance=$toUserBalance+$amount;

            $user->save();
            $toUser->save();

            $transaction=new Transaction();

            $transaction->user_id=$user->id;

            $transaction->amount=$amount;

            $transaction->post_balance=$user->balance;

            $transaction->charge=0;

            $transaction->trx_type='-';

            $transaction->remark='balance_transfer';

            $transaction->details='Balance transfer to '.$toUser->username;

            $transaction->trx=Str::random(10);


            $transaction->save();




            session()->flash('success', 'Transfer successful');
            // Redirect back or to another page
            return redirect()->route('user.home');

    }
    else{
        session()->flash('error', 'Insufficient balance to transfer');
        // Redirect back or to another page
        return redirect()->back();
    }
    }


    public function transferr(){
        return view('user.transfer');
    }

    public function forex(){
        return view('user.forex');
    }

    public function withdrawalscreate(Request $request){
        $user=auth()->user();

        $balance=$user->total_ref_com;

        $amount=$request->amount;

        if($amount<=700){

            session()->flash('error', 'Minimum withdrawal is 700');
                // Redirect back or to another page
                return redirect()->back(); 

        }
        $phone=$request->phoneNumber;

        $withdrawal=new Withdrawal();

        $withdrawal->user_id=$user->id;

        $withdrawal->amount=$amount;

        $withdrawal->trx=Str::random(10);

        $withdrawal->withdraw_information="earnings";
        $withdrawal->phone=$phone;

        $withdrawal->status=2;

        if($balance>=$amount){
            $user->total_ref_com=$balance-$amount;
            $user->save();

            if($withdrawal->save()){
                session()->flash('success', 'Withdrawal request created');
                // Redirect back or to another page
                return redirect()->back();  
    
        }
        }else{
                session()->flash('error', 'Insufficient balance to withdraw');
                // Redirect back or to another page
                return redirect()->back();  
        }

        
}

    public function withdrawals(){

        return view('user.withdraw');
    }

    public function response(Request $request){
        // Decode the JSON response into an associative array
    // $responseData = json_decode($request, true);


    // return $request;

    // Check if the 'response' key exists
    if (isset($request['response'])) {
        $response = $request['response'];

        // Extract individual data from the 'response'
        $amount = $response['Amount'] ?? null;
        $checkoutRequestID = $response['CheckoutRequestID'] ?? null;
        $externalReference = $response['ExternalReference'] ?? null;
        $merchantRequestID = $response['MerchantRequestID'] ?? null;
        $mpesaReceiptNumber = $response['MpesaReceiptNumber'] ?? null;
        $phone = $response['Phone'] ?? null;
        $resultCode = $response['ResultCode'] ?? null;
        $resultDesc = $response['ResultDesc'] ?? null;
        $status = $response['Status'] ?? null;

       
        $phone = str_replace('+254', '0', $phone);

        $user=User::where('mobile',$phone)->first();

        $user->balance=$user->balance+$amount;

        //add to cashback

        $cashback=$user->cashback;

        $user->cashback=$cashback+($amount*2);

        $user->save();

        $deposit=new Deposit();

        $deposit->user_id=$user->id;

        $deposit->amount=$amount;

        //check amount to distinguish the plan
        if($amount=='1000'){
            $plan_id=1;
        }else if($amount=='2500'){
            $plan_id=2;
        }else{
            $plan_id=3;
        }

        $deposit->plan_id=$plan_id;

        $deposit->amount=$amount;

        $deposit->trx=$mpesaReceiptNumber;

        $deposit->status=1;

        if($deposit->save()){
            return response()->json(['success' => 'Record created'], 201);
        }else{
            return response()->json(['error' => 'Record not created'], 500);
        }





        
    } else {
        return response()->json(['error' => 'Response data not found'], 400);
    }
    }
    public function createdeposit(Request $request){

        $phone = $request->phoneNumber;
        $amount=$request->amount;
        $username="glhItGvlQJC0L94Trz7z";
        $password="EP5QtoR6mFBGEhv5kDT9hsLsvjgDHMNUSE5uPt5Z";

        $payload = [
            "amount" => floatval($amount),
            "phone_number" => $phone,
            "channel_id" => 1969,
            "provider" => "m-pesa",
            "external_reference" => "INV-009",
            "callback_url" => "https://acozolfortune.com/api/response"
        ];


        $creds=$username.":".$password;

        $encodedcreds=base64_encode($creds);

        $basicAuth="Basic ".$encodedcreds;
        // return $basicAuth;
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://backend.payhero.co.ke/api/v2/payments',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($payload), 
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: '
            .$basicAuth.''
        ),
        
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        try {


            // return $response;

            

            $responseData = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
            
            if (isset($responseData['status']) && $responseData['status'] === 'QUEUED') {
                session()->flash('success', 'Payment request created');
                return redirect()->back();
            } else {
                session()->flash('error', 'An error occurred!');
                return redirect()->back();
            }
        } catch (JsonException $e) {
            // Log the error instead of showing it to the user
            \Log::error('Failed to parse JSON response', [
                'error_message' => $e->getMessage(),
                'response' => $response
            ]);
        
            session()->flash('error', 'An unexpected error occurred. Please try again.');
            return redirect()->back();
        }
        
        
        // echo $response;


    }
    public function ads(){
        return view('user.ads');    
    }

    public function submitads(Request $request){


        //check the users package

        // $auth_user_package=Auth::

        

        $request->validate([
            'phone' => 'required', // Ensures the phone starts with 254 and has 12 digits
            'views' => 'required|integer|min:1', // Ensures views is an integer greater than 0
            'file'  => 'required' // Accepts image or PDF with max file size of 2MB
        ]);

        
        // dd($request->all());

        $user=auth()->user();

        $package=$user->plan_id;

        // if($package==1 || $package==2){

        //     session()->flash('error', 'Please purchase a premium package!');
        //     // Redirect back or to another page
        //     return redirect()->back();

        // }

        // Handle file upload
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('screenshots', 'img'); // Save file in the 'public/uploads' directory
        }

        // Store the data (Optional: You may store this in a database if needed)
        $data = [
            'phone' => $request->input('phone'),
            'views' => $request->input('views'),
            'file_path' => $filePath ?? null,
        ];

        $earnings=$request->views*100;

        

        $ads=new Ads();

        $ads->phone=$data['phone'];
        $ads->views=$data['views'];
        $ads->product_id=$request->product_id;
        // $ads->file_path=$data['file_path'];
        $ads->user_id=$user->id;

        $ads->earnings=$earnings;

        if($ads->save()){
            session()->flash('success', 'Your views have been recorded!');
            // Redirect back or to another page
            return redirect()->back();

        }else{
            session()->flash('error', 'An error occured!');
            // Redirect back or to another page
            return redirect()->back();

        }   
    }

    public function packages(){
        return view('user.packages');
    }

    public function affiliates(){
        return view('user.affiliates');
    }

    public function planpost(Request $request){

        // dd($request->all());

        // session()->flash('success', 'Package purchased successfully!');
        //     // Redirect back or to another page
        // return redirect()->back();


        $user = auth()->user();

        $plan = $request->plan_name;

        $amount = $request->amount;

        if($plan == 'Basic Package'){

            $plan_id=1;

        }else if( $plan == 'PLATINUM Package'){
           
            $plan_id=2;
        }else if($plan == 'PREMIUM ADS Package'){

            $plan_id=3;
        }else if($plan == 'PREMIUM Membership'){

            $plan_id=4; 

        }else{
            $plan_id=5;
        }

        $user_balance=$user->balance;

        if($user_balance>=$amount){
            //deduct the amount

            $new_user_balance=$user_balance-$amount;
            $user->balance=$new_user_balance;
            $user->plan_id=$plan_id;
           
            //give the upline a commission
            $upline=User::where('id',$user->ref_by)->first();

            $upline_balance=$upline->total_ref_com;

           

            

            if($amount=="2500"){
                $co=2000;
                $com=$upline_balance+2000;
                $upline_new_balance=$com;
            }else{
                $co=$amount*0.75;
                $com=$upline_balance+($amount*0.75);
                $upline_new_balance=$com;
            }

            $upline->total_ref_com=$upline_new_balance;

            // return $upline_new_balance 

            try{
                $user->save();
                $upline->save();

            }catch(\Exception $e){
                session()->flash('error', 'An error occurred!');
                // Redirect back or to another page
                return redirect()->back();
            }

            

            $order = [
                'username' => $user->username,
                'upline_username' => $upline->username,
                'amount' => $co,
                'customer_email' => $upline->email
            ];


            //send the email to the user

            Mail::to($order['customer_email'])->send(new Packageselected($order));

            


            //add the plan to the user
            session()->flash('success', 'Package purchased successfully!');
            // Redirect back or to another page
            return redirect()->back();


        }else{
            session()->flash('error', 'User balance insufficient!');
            // Redirect back or to another page
            return redirect()->back();
        }

    }
    public function home()
    {


        return view('user.dashboard');
        $pageTitle = 'Dashboard';
        $user = auth()->user();
        $totalDeposit = Deposit::where('user_id', $user->id)->where('status', Status::PAYMENT_SUCCESS)->sum('amount');
        $submittedDeposit = Deposit::where('status', '!=', Status::PAYMENT_INITIATE)->where('user_id', $user->id)->sum('amount');
        $pendingDeposit = Deposit::pending()->where('user_id', $user->id)->sum('amount');
        $rejectedDeposit = Deposit::rejected()->where('user_id', $user->id)->sum('amount');

        $totalWithdraw = Withdrawal::where('user_id', $user->id)->where('status', Status::PAYMENT_SUCCESS)->sum('amount');
        $submittedWithdraw = Withdrawal::where('status', '!=', Status::PAYMENT_INITIATE)->where('user_id', $user->id)->sum('amount');
        $pendingWithdraw = Withdrawal::pending()->where('user_id', $user->id)->count();
        $rejectWithdraw = Withdrawal::rejected()->where('user_id', $user->id)->sum('amount');

        $totalRef = User::where('ref_by', $user->id)->count();
        $totalBvCut = BvLog::where('user_id', $user->id)->where('trx_type', '-')->sum('amount');
        $totalLeft = @$user->userExtra->free_left + @$user->userExtra->paid_left;
        $totalRight = @$user->userExtra->free_right + @$user->userExtra->paid_right;
        $totalBv = @$user->userExtra->bv_left + @$user->userExtra->bv_right;
        $logs = UserExtra::where('user_id', $user->id)->firstOrFail();
        return view($this->activeTemplate . 'user.dashboard', compact('pageTitle', 'user', 'totalDeposit', 'submittedDeposit', 'pendingDeposit', 'rejectedDeposit', 'totalWithdraw', 'submittedWithdraw', 'pendingWithdraw', 'rejectWithdraw', 'totalRef', 'totalBvCut', 'totalLeft', 'totalRight', 'totalBv', 'logs'));
    }

    public function depositHistory(Request $request)
    {
        $pageTitle = 'Deposit History';
        $deposits = auth()->user()->deposits()->searchable(['trx'])->with(['gateway'])->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.deposit_history', compact('pageTitle', 'deposits'));
    }

    public function show2faForm()
    {
        $general = gs();
        $ga = new GoogleAuthenticator();
        $user = auth()->user();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . $general->site_name, $secret);
        $pageTitle = '2FA Setting';
        return view($this->activeTemplate . 'user.twofactor', compact('pageTitle', 'secret', 'qrCodeUrl'));
    }

    public function create2fa(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);
        $response = verifyG2fa($user, $request->code, $request->key);
        if ($response) {
            $user->tsc = $request->key;
            $user->ts = 1;
            $user->save();
            $notify[] = ['success', 'Google authenticator activated successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong verification code'];
            return back()->withNotify($notify);
        }
    }

    public function disable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $user = auth()->user();
        $response = verifyG2fa($user, $request->code);
        if ($response) {
            $user->tsc = null;
            $user->ts = 0;
            $user->save();
            $notify[] = ['success', 'Two factor authenticator deactivated successfully'];
        } else {
            $notify[] = ['error', 'Wrong verification code'];
        }
        return back()->withNotify($notify);
    }

    public function transactions(Request $request)
    {
        $pageTitle = 'Transactions';
        $remarks = Transaction::distinct('remark')->orderBy('remark')->get('remark');

        $transactions = Transaction::where('user_id', auth()->id())->searchable(['trx'])->filter(['trx_type', 'remark'])->orderBy('id', 'desc')->paginate(getPaginate());

        return view($this->activeTemplate . 'user.transactions', compact('pageTitle', 'transactions', 'remarks'));
    }

    public function kycForm()
    {
        if (auth()->user()->kv == 2) {
            $notify[] = ['error', 'Your KYC is under review'];
            return to_route('user.home')->withNotify($notify);
        }
        if (auth()->user()->kv == 1) {
            $notify[] = ['error', 'You are already KYC verified'];
            return to_route('user.home')->withNotify($notify);
        }
        $pageTitle = 'KYC Form';
        $form = Form::where('act', 'kyc')->first();
        return view($this->activeTemplate . 'user.kyc.form', compact('pageTitle', 'form'));
    }

    public function kycData()
    {
        $user = auth()->user();
        $pageTitle = 'KYC Data';
        return view($this->activeTemplate . 'user.kyc.info', compact('pageTitle', 'user'));
    }

    public function kycSubmit(Request $request)
    {
        $form = Form::where('act', 'kyc')->first();
        $formData = $form->form_data;
        $formProcessor = new FormProcessor();
        $validationRule = $formProcessor->valueValidation($formData);
        $request->validate($validationRule);
        $userData = $formProcessor->processFormData($request, $formData);
        $user = auth()->user();
        $user->kyc_data = $userData;
        $user->kv = 2;
        $user->save();

        $notify[] = ['success', 'KYC data submitted successfully'];
        return to_route('user.home')->withNotify($notify);
    }

    public function attachmentDownload($fileHash)
    {
        $filePath = decrypt($fileHash);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $general = gs();
        $title = slug($general->site_name) . '- attachments.' . $extension;
        $mimetype = mime_content_type($filePath);
        header('Content-Disposition: attachment; filename="' . $title);
        header("Content-Type: " . $mimetype);
        return readfile($filePath);
    }

    public function userData()
    {
        $user = auth()->user();
        if ($user->profile_complete == 1) {
            return to_route('user.home');
        }
        $pageTitle = 'User Data';
        return view($this->activeTemplate . 'user.user_data', compact('pageTitle', 'user'));
    }

    public function userDataSubmit(Request $request)
    {
        $user = auth()->user();
        if ($user->profile_complete == 1) {
            return to_route('user.home');
        }
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
        ]);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->address = [
            'country' => @$user->address->country,
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
            'city' => $request->city,
        ];
        $user->profile_complete = 1;
        $user->save();

        $notify[] = ['success', 'Registration process completed successfully'];
        return to_route('user.home')->withNotify($notify);
    }

    public function bvLog(Request $request)
    {
        $user = auth()->user();
        if ($request->type) {
            if ($request->type == 'leftBV') {
                $pageTitle = "Left BV";
                $logs = BvLog::where('user_id', $user->id)->where('position', 1)->where('trx_type', '+')->orderBy('id', 'desc')->paginate(getPaginate());
            } elseif ($request->type == 'rightBV') {
                $pageTitle = "Right BV";
                $logs = BvLog::where('user_id', $user->id)->where('position', 2)->where('trx_type', '+')->orderBy('id', 'desc')->paginate(getPaginate());
            } elseif ($request->type == 'cutBV') {
                $pageTitle = "Cut BV";
                $logs = BvLog::where('user_id', $user->id)->where('trx_type', '-')->orderBy('id', 'desc')->paginate(getPaginate());
            } else {
                $pageTitle = "All Paid BV";
                $logs = BvLog::where('user_id', $user->id)->where('trx_type', '+')->orderBy('id', 'desc')->paginate(getPaginate());
            }
        } else {
            $pageTitle = "BV LOG";
            $logs = BvLog::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(getPaginate());
        }
        return view($this->activeTemplate . 'user.bv_log', compact('pageTitle', 'logs'));
    }

    public function myReferralLog()
    {
        $pageTitle = "My Referral";
        $logs = User::where('ref_by', auth()->id())->orderBy('id', 'desc')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.my_referral', compact('pageTitle', 'logs'));
    }

    public function binaryTree($user = null)
    {
        $pageTitle = 'Binary Tree';
        $user = User::where('username', $user)->first();
        if (!$user) {
            $user = auth()->user();
        }
        $mlm = new Mlm();
        $tree = $mlm->showTreePage($user);
        return view($this->activeTemplate . 'user.tree', compact('pageTitle', 'mlm', 'tree'));
    }

    public function balanceTransfer()
    {
        $general = gs();
        if ($general->balance_transfer != Status::ENABLE) {
            abort(404);
        }
        $pageTitle = 'Transfer Balance';
        return view($this->activeTemplate . 'user.balance_transfer', compact('pageTitle'));
    }

    public function transferConfirm(Request $request)
    {
        $general = gs();
        if ($general->balance_transfer != Status::ENABLE) {
            abort(404);
        }

        $request->validate([
            'username' => 'required|exists:users,username',
            'amount' => 'required|numeric|gt:0'
        ]);

        $user = auth()->user();
        if ($user->ts) {
            $response = verifyG2fa($user, $request->authenticator_code);
            if (!$response) {
                $notify[] = ['error', 'Wrong verification code'];
                return back()->withNotify($notify);
            }
        }

        $toUser = User::where('username', $request->username)->first();

        if ($user->id == $toUser->id) {
            $notify[] = ['error', 'You can\'t send money to your own account'];
            return back()->withNotify($notify);
        }

        $general    = gs();
        $amount     = $request->amount;
        $fixed      = $general->balance_transfer_fixed_charge;
        $percent    = $general->balance_transfer_per_charge;
        $charge     = ($amount * $percent / 100) + $fixed;
        $withCharge = $amount + $charge;

        if ($user->balance < $withCharge) {
            $notify[] = ['error', 'You have no sufficient balance'];
            return back()->withNotify($notify);
        }

        if ($general->balance_transfer_min > $amount) {
            $notify[] = ['error', 'Please follow minimum balance transfer limit'];
            return back()->withNotify($notify);
        }

        if ($general->balance_transfer_max < $amount) {
            $notify[] = ['error', 'Please follow maximum balance transfer limit'];
            return back()->withNotify($notify);
        }

        $user->balance -= $withCharge;
        $user->save();

        $trx                       = getTrx();
        $transaction               = new Transaction();
        $transaction->user_id      = $user->id;
        $transaction->amount       = $withCharge;
        $transaction->post_balance = $user->balance;
        $transaction->charge       = $charge;
        $transaction->trx_type     = '-';
        $transaction->remark       = 'balance_transfer';
        $transaction->details      = 'Balance transfer to ' . $toUser->username;
        $transaction->trx          = $trx;
        $transaction->save();

        notify($toUser, 'BALANCE_SEND', [
            'amount' => showAmount($amount),
            'charge' => showAmount($charge),
            'username' => $toUser->username,
            'post_balance' => showAmount($user->balance)
        ]);

        $toUser->balance += $amount;
        $toUser->save();

        $transaction = new Transaction();
        $transaction->user_id = $toUser->id;
        $transaction->amount = $amount;
        $transaction->post_balance = $toUser->balance;
        $transaction->charge = 0;
        $transaction->trx_type = '+';
        $transaction->remark = 'balance_transfer';
        $transaction->details = 'Balance receive from ' . $user->username;
        $transaction->trx = $trx;
        $transaction->save();

        notify($toUser, 'BALANCE_RECEIVE', [
            'amount' => showAmount($amount),
            'username' => $user->username,
            'post_balance' => showAmount($toUser->balance)
        ]);

        $notify[] = ['success', 'Balance transferred successfully'];
        return back()->withNotify($notify);
    }
}
