<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Status;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index()
    {
        // $produk = Produk::with(['kategori', 'status'])->get();
        $produk = Produk::join('kategori', 'kategori_id', '=', 'kategori.id_kategori')
            ->join('status', 'status_id', '=', 'status.id_status')
            ->where('status_id', '=', 1)
            ->select('produk.*', 'kategori.nama_kategori', 'status.nama_status')
            ->latest()
            ->paginate(10);

        return view('index', [
            'produk' => $produk
        ]);
    }

    public function create()
    {
        $kategori = Kategori::all();
        $status = Status::all();
        return view('create-produk', [
            'kategori' => $kategori,
            'status' => $status
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => ['required', 'max:255'],
            'harga' => ['required', 'integer', 'min:0'],
            'kategori_id' => ['required'],
            'status_id' => ['required']
        ]);

        $produk = new Produk;
        $produk->nama_produk = $request->input('nama_produk');
        $produk->harga = $request->input('harga');
        $produk->kategori_id = $request->input('kategori_id');
        $produk->status_id = $request->input('status_id');
        $produk->save();

        return to_route('index')->with('success', 'Produk telah di tambah');
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        $kategori = Kategori::all();
        $status = Status::all();
        return view('edit-produk', [
            'kategori' => $kategori,
            'status' => $status,
            'produk' => $produk
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => ['required', 'max:255'],
            'harga' => ['required', 'integer', 'min:0'],
            'kategori_id' => ['required'],
            'status_id' => ['required']
        ]);

        $produk = Produk::find($id);
        $produk->nama_produk = $request->input('nama_produk');
        $produk->harga = $request->input('harga');
        $produk->kategori_id = $request->input('kategori_id');
        $produk->status_id = $request->input('status_id');
        $produk->save();

        return to_route('index')->with('success', 'Produk telah di ubah');
    }

    public function destroy($id)
    {
        $produk = Produk::where('id_produk', $id)->first();
        $produk->delete();

        return to_route('index')->with('success', 'produk telah dihapus');
    }
}
