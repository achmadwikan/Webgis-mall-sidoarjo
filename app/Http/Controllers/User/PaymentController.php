<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Payment;
use App\User;
use Storage;

class PaymentController extends Controller
{   
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (! Gate::allows('member')) {
            return abort(401);
        }

        if (auth()->user()->image == NULL || auth()->user()->phone == NULL || auth()->user()->alamat == NULL ) {
            alert()->warning('Silahkan Lengkapi Profile anda terlebih dahulu untuk dapat mengakses semua menu kami.', 'Maaf')->persistent('Close');

                return redirect()->route('profiles.index');
        }
        else{
            return view('member.payment');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = new Payment;
        $payment->user_id = auth()->user()->id;
        $payment->status = 1;
        $payment->order_id = 'pvkti-'.str_pad(auth()->user()->id,6,'0',STR_PAD_LEFT).'-'.auth()->user()->jenis;
 
        if($request->hasFIle('bukti_tf')){
            $file = $request->file('bukti_tf');
            $fileName = 'membership-'.str_slug(auth()->user()->name).'-'.sha1(time()).'-'.auth()->user()->jenis.'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/web_asset/bukti_tf');
            $file->move($destinationPath, $fileName);
            $payment->bukti_tf = $fileName;
        }
        
        $payment->save();

        // $subscribers = Subscriber::all();
        // foreach($subscribers as $subscriber)
        // {
        //     Notification::route('mail',$subscriber->email)
        //     ->notify(new NewPostNotification($posts));
        // }  
        alert()->success('Pembayaran anda telah berhasil terekan pada sistem, selanjutnya admin kami akan melakukan review terlebih dahulu.', 'Selamat')->persistent('Close');

        return redirect()->back();
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
        $payment = Payment::findOrFail($id);
 
        if($request->hasFIle('bukti_tf')){
            $file = $request->file('bukti_tf');
            $fileName = 'membership-'.str_slug(auth()->user()->name).'-'.sha1(time()).'-'.auth()->user()->jenis.'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/web_asset/bukti_tf');
            $file->move($destinationPath, $fileName);
            $payment->bukti_tf = $fileName;
        }
        
        $payment->save();

        // $subscribers = Subscriber::all();
        // foreach($subscribers as $subscriber)
        // {
        //     Notification::route('mail',$subscriber->email)
        //     ->notify(new NewPostNotification($posts));
        // }  
        alert()->success('Pembayaran anda telah berhasil teredit pada sistem, selanjutnya admin kami akan melakukan review terlebih dahulu.', 'Selamat')->persistent('Close');

        return redirect()->back();
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

    public function sertifikat()
    {   
        if (! Gate::allows('member')) {
            return abort(401);
        }

        $data = Payment::where('user_id', auth()->user()->id)->first();

        if (auth()->user()->image == NULL || auth()->user()->phone == NULL || auth()->user()->alamat == NULL ) {
            alert()->warning('Silahkan Lengkapi Profile anda terlebih dahulu untuk dapat mengakses semua menu kami.', 'Maaf')->persistent('Close');

                return redirect()->route('profiles.index');
        }
        else{

            if ($data->sertifikat == NULL || $data->status == 1) {
                alert()->warning('Sertifikat anda masih belum bisa di akses untuk saat ini.', 'Maaf');

                return redirect()->route('member.payments.index');
            }
            else{
                return view('member.sertifikat');
            }
        }        
    }

}
