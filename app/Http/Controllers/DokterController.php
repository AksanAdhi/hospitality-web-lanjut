<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    public function profile()
    {
        $dokter = Dokter::all();
        return view('daftar_dokter', compact('dokter'));
    }

    public function create()
    {
        return view('daftar_dokter.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'phone' => 'required|string|max:15'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create new doctor
        $dokter = new Dokter();
        $dokter->name = $request->name;
        $dokter->specialty = $request->specialty;
        $dokter->phone = $request->phone;
        $dokter->save();

        return redirect()
            ->route('dokter.list')
            ->with('success', 'Data dokter berhasil ditambahkan');
    }

    public function index()
    {
        $dokter = Dokter::all();
        return view('daftar_dokter.index', compact('dokter'));
    }

    public function show($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('daftar_dokter.show', compact('dokter'));
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('daftar_dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'phone' => 'required|string|max:15'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update doctor
        $dokter = Dokter::findOrFail($id);
        $dokter->name = $request->name;
        $dokter->specialty = $request->specialty;
        $dokter->phone = $request->phone;
        $dokter->save();

        return redirect()
            ->route('dokter.list')
            ->with('success', 'Data dokter berhasil diperbarui');
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()
            ->route('dokter.list')
            ->with('success', 'Data dokter berhasil dihapus');
    }
}