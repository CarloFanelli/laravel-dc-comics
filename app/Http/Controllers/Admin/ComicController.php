<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::All();

        return view('admin.comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComicRequest $request)
    {

        $val_data = $request->validated();

        // dd($val_data);

        // $new_comic = new Comic();

        if ($request->has('thumb')) {
            $file_path = Storage::put('comics_img', $request['thumb']);
            $val_data['thumb'] = $file_path;
        }

        //Comic::store($val_data);

        /* 
        if ($request->title) {
            $new_comic->title = $request->title;
        }

        if ($request->price) {
            $new_comic->price = $request->price;
        }
 */
        //$new_comic->save($val_data);

        Comic::create($val_data);

        $comics = Comic::All();

        return to_route('comics.index', compact('comics'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('admin.comics.show', ['comic' => $comic]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {

        return view('admin.comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComicRequest $request, Comic $comic)
    {

        $val_data = $request->validated();

        //dd($val_data);

        if ($request->has('thumb') && $comic->thumb) {

            $new_thumb = $val_data->thumb;

            Storage::delete($comic['thumb']);

            $file_path = Storage::put('comics_img', $new_thumb);

            $data['thumb'] = $file_path;
        }

        $comic->update($val_data);

        return to_route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        if (!is_null($comic->thumb)) {

            Storage::delete($comic['thumb']);
        }

        $comic->delete();

        return to_route('comics.index')->with('message', 'Comic deleted successfully ✅');
    }
}
