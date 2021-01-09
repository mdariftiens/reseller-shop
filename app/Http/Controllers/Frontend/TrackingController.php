<?php


namespace App\Http\Controllers\Frontend;

use App\Abstracts\Http\FrontendController as FrontController;
use App\Models\Order;
use Illuminate\Http\Request;

class TrackingController extends FrontController
{
    public function index()
    {
        return view('frontend.tracking');
    }

    public function track(Request $request)
    {

        if( ! $request->has('invoice_number') || trim($request->invoice_number) =='')
        {
          return response()->json(['message'=>'Invoice Number Empty'], 400);
        }

        $invoice_number = $request->invoice_number;

        $order = Order::with('orderDetails','orderShipping')->where('invoice_number', $invoice_number)->first();

        if ( ! $order){
            return response()->json(['message'=>'Order Not Found!'], 400);
        }
        return response()->json(['data'=>$order]);

    }

}
