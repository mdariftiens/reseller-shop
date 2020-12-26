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
        Collection::create( $request->validated());

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
        return view('dashboard.collection.edit', compact('collection'));
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

        Collection::where('id',$id)->update( $request->validated());

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
}
