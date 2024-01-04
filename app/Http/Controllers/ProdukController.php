<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Produk;
use App\Models\ProdukListItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Produk";
        $produks = Produk::with('ProdukListItem')->get();
        return view('pages.produk.index', ['title' => $title, 'produks' => $produks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Produk";
        $items = Item::all();
        return view('pages.produk.create', ['title' => $title, "items" => $items]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'maps' => 'required',
            'price' => 'required',
        ]);
        $data["status_sewa"] = 1;
        if ($request->file('image') != null) {
            $data['image'] = $request->file('image')->store('images/produk', 'public');
        }
        $produk = Produk::create($data);

        if ($request->id_item) {
            for ($i=0; $i < count($request->id_item); $i++) {
                $data = [
                    "id_produk" => $produk->id,
                    "id_item" => $request->id_item[$i],
                ];
                try {
                    ProdukListItem::create($data);
                } catch (\Throwable $e) {
                    dd($e);
                }
            }
        }
        return redirect(route('produk.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $title = "Edit Produk";
        // $produk = Produk::with('ProdukListItem')->get();
        $items = Item::all();
        return view('pages.produk.edit', ['title' => $title, 'produk' => $produk, 'items' => $items]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $produk = Produk::findOrFail($produk->id);
        // dd($request->file('image'), $produk);
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'maps' => 'required',
            'price' => 'required',
            'status_sewa' => 'required',
        ]);
        if ($request->file('image')) {
            Storage::delete($produk->image);
            $data['image'] = $request->file('image')->store('images/produk', 'public');
        } else {
            $data['image'] = $produk->image;
        }
        $produk->update($data);

        //* Hapus Data ProdukListItem yang berelasi dengan Room Terpilih
        if ($request->id_produk_list_item[0] != null) {
            foreach ($request->id_produk_list_item as $value) {
                ProdukListItem::destroy($value);
            }
        }

        //* Tambah Data ProdukListItem
        if ($request->id_item) {
            for ($i=0; $i < count($request->id_item); $i++) {
                $data = [
                    "id_produk" => $produk->id,
                    "id_item" => $request->id_item[$i],
                ];
                try {
                    ProdukListItem::create($data);
                } catch (\Throwable $e) {
                    dd($e);
                }
            }
        }

        return redirect(route('produk.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk = Produk::findOrFail($produk->id);
        Produk::destroy($produk->id);
        return redirect(route('produk.index'));
    }
}
