<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventarisController extends Controller
{
    public function profile()
    {
        $inventaris = Inventaris::all();
        return view('daftar_inventaris', compact('inventaris'));
    }

    public function create()
    {
        return view('daftar_inventaris.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'expiration_date' => 'nullable|date'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create new inventory item
        $inventaris = new Inventaris();
        $inventaris->name = $request->name;
        $inventaris->type = $request->type;
        $inventaris->quantity = $request->quantity;
        $inventaris->location = $request->location;
        $inventaris->status = $request->status;
        $inventaris->expiration_date = $request->expiration_date;
        $inventaris->save();

        return redirect()
            ->route('inventaris.list')
            ->with('success', 'Data inventaris berhasil ditambahkan');
    }

    public function index()
    {
        $inventaris = Inventaris::all();
        return view('daftar_inventaris.index', compact('inventaris'));
    }

    public function show($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('daftar_inventaris.show', compact('inventaris'));
    }

    public function edit($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        return view('daftar_inventaris.edit', compact('inventaris'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'expiration_date' => 'nullable|date'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update inventory item
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->name = $request->name;
        $inventaris->type = $request->type;
        $inventaris->quantity = $request->quantity;
        $inventaris->location = $request->location;
        $inventaris->status = $request->status;
        $inventaris->expiration_date = $request->expiration_date;
        $inventaris->save();

        return redirect()
            ->route('inventaris.list')
            ->with('success', 'Data inventaris berhasil diperbarui');
    }

    public function destroy($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $inventaris->delete();

        return redirect()
            ->route('inventaris.list')
            ->with('success', 'Data inventaris berhasil dihapus');
    }
}