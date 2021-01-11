<?php

namespace App\Http\Controllers\Backend;

use App\Abstracts\Http\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Cat;
use App\Models\Note;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderShipping;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $list = Order::with('orderDetails','notes','orderShipping','deliveryMan','createdBy')->collect();

        return view('dashboard.order.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {

        $products = Product::enabled()->get();

        $categories = Cat::getEnabledItemForDropdown();

        return view("dashboard.order.create", compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderRequest $request
     * @return JsonResponse
     */
    public function store(OrderRequest $request): JsonResponse
    {


        $order = Order::create([
            'status' => 'ORDER_STATUS_NOT_ACCEPTED',
        ]);

        OrderShipping::create([
            'order_id'=> $order->id,
            'name' => $request->name,
            'address'=> $request->address,
            'optional_address' => $request->optional_address,
            'mobile_number' => $request->mobile_number,
        ]);

        $productIds = $request->product_id; // product_id as array

        $products = Product::find($productIds);

        $offerPriceTotal = 0;
        $sellingPriceTotal = 0;
        $profitTotal = 0;
        $noOfProduct = 0;

        foreach ( $productIds as $key => $p_id){

            $qty = $request->qty[$key];
            $sellingPrice = $request->selling_price[$key];
            $originalPrice = $products->find($p_id)->offer_price;
            $profit = ( $sellingPrice * $qty) - ( $originalPrice * $qty);

            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $p_id,
                'quantity' => $qty,
                'original_price' => $originalPrice,
                'selling_price' => $sellingPrice,
                'profit' => $profit,
            ]);

            $offerPriceTotal += $originalPrice * $qty;
            $sellingPriceTotal += $sellingPrice * $qty;
            $profitTotal += $profit;
            $noOfProduct  += $qty ;

        }

        Order::where('id', $order->id)->update([
            'offer_price_total' => $offerPriceTotal,
            'selling_price_total' => $sellingPriceTotal,
            'profit_total' => $profitTotal,
            'no_of_product' => $noOfProduct,
            'delivery_charge' => $request->delivery_charge,
        ]);


        return response()->json([
            'message'=>'Order Created',
            'url'=> route('order.edit', $order->id),
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        $order = Order::with('orderDetails','notes','orderShipping','deliveryMan','createdBy', 'orderDetails.product')
            ->where('id', $id)
            ->first();

        return view("dashboard.order.show", compact('order'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View|Response
     */
    public function edit( $id )
    {

        $order = Order::with('notes','orderShipping','deliveryMan','createdBy', 'orderDetails','orderDetails.product')
            ->where('id', $id)
            ->first();

        $products = Product::enabled()->get();

        $categories = Cat::getEnabledItemForDropdown();

        return view("dashboard.order.edit", compact('order','categories', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrderRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(OrderRequest $request, $id)
    {
        $order = Order::with('notes','orderShipping','deliveryMan','createdBy', 'orderDetails.product')
            ->where('id', $id)
            ->first();

        $order->orderShipping->update([
            'name' => $request->name,
            'address'=> $request->address,
            'optional_address' => $request->optional_address,
            'mobile_number' => $request->mobile_number,
        ]);


        OrderDetail::where('order_id', $id)->delete();

        $productIds = $request->product_id;

        $products = Product::find($productIds);

        $offerPriceTotal = 0;
        $sellingPriceTotal = 0;
        $profitTotal = 0;
        $noOfProduct = 0;

        foreach ( $productIds as $key => $p_id){

            $qty = $request->qty[$key];
            $sellingPrice = $request->selling_price[$key];
            $originalPrice = $products->find($p_id)->offer_price;
            $profit = ( $sellingPrice * $qty) - ( $originalPrice * $qty);

            OrderDetail::create([
                'order_id' => $id,
                'product_id' => $p_id,
                'quantity' => $qty,
                'original_price' => $originalPrice,
                'selling_price' => $sellingPrice,
                'profit' => $profit,
            ]);

            $offerPriceTotal += $originalPrice * $qty;
            $sellingPriceTotal += $sellingPrice * $qty;
            $profitTotal += $profit;
            $noOfProduct  += $qty ;

        }

        Order::where('id', $id)->update([
            'offer_price_total' => $offerPriceTotal,
            'selling_price_total' => $sellingPriceTotal,
            'profit_total' => $profitTotal,
            'no_of_product' => $noOfProduct,
            'delivery_charge' => $request->delivery_charge,
        ]);

        return response()->json([
            'message'=>'Order Updated ',
            'url'=> route('order.index')
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Order $order): RedirectResponse
    {

        $order->delete();

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Order $order
     * @return JsonResponse
     */
    public function storeNote(Request $request, Order $order)
    {

        Note::create([
            'order_id'=> $order->id,
            'note' => $request->note,
        ]);

        return response()->json(['message'=>'Note Saved' ]);
    }

    /**
     * change Status the specified Order.
     *
     * @param Request $request
     * @param Order $order
     * @return JsonResponse
     */
    public function changeStatus(Request $request, Order $order): JsonResponse
    {

        $order->status = $request->status;
        $order->save();

        return response()->json(['message'=>'Status Changed to ' . config('shop.order_status')[$request->status]]);
    }

    public function pdfInvoice(Order $order)
    {
        $order->load('orderShipping','deliveryMan','createdBy','createdBy.shopSetting', 'orderDetails.product')
            ->first();
        return view('dashboard.order.pdf', compact('order'));
    }
}
