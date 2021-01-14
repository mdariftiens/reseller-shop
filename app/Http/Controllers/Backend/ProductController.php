<?php

namespace App\Http\Controllers\Backend;

use App\Abstracts\Http\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Cat;
use App\Models\CatProduct;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $list = Product::with('collection','categories')->collect();

        return view('dashboard.product.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {

        $categories = Cat::orderBy('name')->get()->pluck("name",'id')->toArray();

        $collections = Collection::enabled()->get()->pluck("name","id")->toArray();

        return view("dashboard.product.create", compact('collections','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request): Response
    {

        $product = Product::create( [
            'name'=> $request->name,
            'description'=> $request->description,
            'enabled' => $request->enabled,
            'collection_id' => $request->collection,
            'regular_price' => $request->regular_price,
            'offer_price' => $request->offer_price,
            'delivery_within_days' => $request->delivery_within_days,
        ] );

        $product->categories()->sync(request('category',null));

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View|Response
     */
    public function edit(Product $product)
    {

        $categories = Cat::orderBy('name')->get()->pluck("name",'id')->toArray();

        $product->load('categories', 'collection');

        $collections = Collection::enabled()->get()->pluck("name","id")->toArray();

        return view("dashboard.product.edit", compact('product','collections','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(ProductRequest $request,Product $product)
    {
        $product->categories()->sync(request('category',null));

        $product->update( [
            'name'=> $request->name,
            'description'=> $request->description,
            'enabled' => $request->enabled,
            'collection_id' => $request->collection,
            'regular_price' => $request->regular_price,
            'offer_price' => $request->offer_price,
            'delivery_within_days' => $request->delivery_within_days,
        ] );
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product): RedirectResponse
    {

        $product->delete();

        return redirect()->route('product.index');
    }

    public function searchByCatId(int $category_id){
            $category =  Cat::with('products')->where('id', $category_id)->first();
            if ( $category ){
                return $category->products;
            }
            else{
                return response()->json(['message'=>'Product Not Found'], 400);
            }
    }


    public function home()
    {
        $categories = Cat::enabled()
//            ->whereIn('parent_id',[1,2])
            ->get();

        $products = Product::enabled()->paginate(50);

        return view('dashboard.product.home', compact('products','categories'));
    }

    public function detail(Product $product)
    {
        $product->with('categories','collection');

        return view('dashboard.product.detail', compact('products'));
    }

    public function subCatNProducts($categoryId): JsonResponse
    {
        $subCategories = Cat::enabled()
            ->where('parent_id', $categoryId)
            ->get();

        $catWithProducts = Cat::with('products')->where('id', $categoryId)->first();

        if ( $catWithProducts->whereHas('products')){
            $products = $catWithProducts->products;
        }else{
            $products = null;
        }

        return response()->json(['subCategories' => $subCategories, 'products'=>$products]);

    }

    public function productDetail($productId): JsonResponse
    {
        $product = Product::where('id', $productId)->first();
        if ( ! $product ){
            return response()->json(['message'=>'Product Not Found!'], 400);
        }
        return response()->json($product);

    }
}
