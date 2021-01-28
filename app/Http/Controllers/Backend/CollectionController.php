<?php

namespace App\Http\Controllers\Backend;

use App\Abstracts\Http\Controller;
use App\Http\Requests\CollectionRequest;
use App\Models\Collection;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Plank\Mediable\Facades\MediaUploader;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $list = Collection::collect();

        return view('dashboard.collection.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('dashboard.collection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CollectionRequest $request
     * @return Response
     */
    public function store(CollectionRequest $request)
    {
        $collection = Collection::create( $request->validated());

        if ( $request->hasFile('image')){
            $file = $request->file('image');

            $media = MediaUploader::fromSource($file)
                ->toDestination('public', 'image')
                ->upload();

            $collection->attachMedia($media, ['image']);
        }

        return redirect()->route('collection.index');
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
     * @param Collection $collection
     * @return Application|Factory|View|Response
     */
    public function edit(Collection $collection)
    {
        $media = $collection->getMedia('image')->first();
        $collectionURL = $media ? $media->getUrl() : '';
        return view('dashboard.collection.edit', compact('collection','collectionURL'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CollectionRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CollectionRequest $request, $id): RedirectResponse
    {

        $collection = Collection::find( $id );

        $collection->update( $request->validated());

        if ( $request->hasFile('image')){
            $file = $request->file('image');

            $media = MediaUploader::fromSource($file)
                ->toDestination('public', 'image')
                ->upload();

            $collection->syncMedia($media, ['image']);
        }

        return redirect()->route('collection.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Collection $collection
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();

        return redirect()->route('collection.index');
    }

    public function home()
    {
        $collections = Collection::enabled()->paginate();

        return view('dashboard.collection.home', compact('collections'));
    }

    public function detail(Collection $collection)
    {
        $products = $collection->products;

        return view('dashboard.collection.detail', compact('products'));
    }
}
