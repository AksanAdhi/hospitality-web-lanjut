<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    public function profile()
    {
        $pasien = Pasien::all();
        return view('daftar_pasien', compact('pasien'));
    }

    public function create()
    {
        return view('daftar_pasien.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:male,female',
            'address' => 'required|string',
            'phone' => 'required|string|max:15'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create new patient
        $pasien = new Pasien();
        $pasien->name = $request->name;
        $pasien->age = $request->age;
        $pasien->gender = $request->gender;
        $pasien->address = $request->address;
        $pasien->phone = $request->phone;
        $pasien->save();

        return redirect()
            ->route('pasien.list')
            ->with('success', 'Data pasien berhasil ditambahkan');
    }

    public function index()
    {
        $pasien = Pasien::all();
        return view('daftar_pasien.index', compact('pasien'));
    }

    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('daftar_pasien.show', compact('pasien'));
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('daftar_pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|in:male,female',
            'address' => 'required|string',
            'phone' => 'required|string|max:15'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update patient
        $pasien = Pasien::findOrFail($id);
        $pasien->name = $request->name;
        $pasien->age = $request->age;
        $pasien->gender = $request->gender;
        $pasien->address = $request->address;
        $pasien->phone = $request->phone;
        $pasien->save();

        return redirect()
            ->route('pasien.list')
            ->with('success', 'Data pasien berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()
            ->route('pasien.list')
            ->with('success', 'Data pasien berhasil dihapus');
    }
}