<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use Carbon\Carbon;

class InventoryController extends Controller
{
    /**
     * Tampilkan daftar inventaris obat.
     */
    public function index()
    {
        $inventory = Inventory::all();
        return view('admin.inventory.index', compact('inventory'));
    }

    /**
     * Tampilkan form untuk menambahkan obat baru.
     */
    public function create()
    {
        return view('admin.inventory.create');
    }

    /**
     * Simpan data obat baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'medicine_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'expiry_date' => 'required|date|after:today',
        ]);

        Inventory::create([
            'medicine_name' => $request->medicine_name,
            'quantity' => $request->quantity,
            'expiry_date' => $request->expiry_date,
        ]);

        return redirect()->route('inventory.index')->with('success', 'Obat berhasil ditambahkan ke inventaris.');
    }

    /**
     * Tampilkan form untuk mengedit data obat.
     */
    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('admin.inventory.edit', compact('inventory'));
    }

    /**
     * Perbarui data obat di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'medicine_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'expiry_date' => 'required|date|after:today',
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->update([
            'medicine_name' => $request->medicine_name,
            'quantity' => $request->quantity,
            'expiry_date' => $request->expiry_date,
        ]);

        return redirect()->route('inventory.index')->with('success', 'Data obat berhasil diperbarui.');
    }

    /**
     * Hapus data obat dari database.
     */
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', 'Obat berhasil dihapus dari inventaris.');
    }
}
