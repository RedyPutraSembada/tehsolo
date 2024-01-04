<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Item";
        $items = Item::all();
        return view('pages.item.index', ['title' => $title, 'items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Item";
        return view('pages.item.create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        Item::create($data);
        return redirect(route('item.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $title = "Edit Item";
        return view('pages.item.edit', ['title' => $title, 'item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $item = Item::findOrFail($item->id);
        // dd($request->file('image'), $item);
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $item->update($data);
        return redirect(route('item.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item = Item::findOrFail($item->id);
        Item::destroy($item->id);
        return redirect(route('item.index'));
    }
}
