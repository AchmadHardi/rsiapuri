<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Jabatan;
use App\Models\Unit; // Jika Anda menggunakan model Unit
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Karyawan::with('unit', 'jabatan')->orderBy('id', 'desc')->get();
        return view('karyawan.karyawan', [
            'karyawans' => $karyawans
        ]);
    }

    public function create()
    {
        $units = Unit::all(); // Mengambil semua unit untuk dropdown
        $jabatans = Jabatan::all(); // Mengambil semua jabatan untuk dropdown
        return view('karyawan.create', [
            'units' => $units,
            'jabatans' => $jabatans,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nama' => 'required|max:100',
            'username' => 'required|unique:karyawans|max:100',
            'password' => 'required|min:6',
            'unit_id' => 'required|exists:units,id', // Perbaiki validasi jika unit adalah ID unit
            'jabatan_id' => 'required|exists:jabatans,id', // Validasi untuk jabatan_id
            'tanggal_bergabung' => 'required|date',
        ]);

        // Encrypt the password before storing
        // $validated['password'] = bcrypt($validated['password']);
        // dd($request->all());
        Karyawan::create($validated);

        Alert::success('Success', 'Karyawan has been saved!');
        return redirect('/karyawan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', [
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_karyawan)
    {
        $karyawan = Karyawan::findOrFail($id_karyawan);
        $units = Unit::all(); // Mengambil semua unit untuk dropdown
        $jabatans = Jabatan::all(); // Mengambil semua jabatan untuk dropdown

        return view('karyawan.edit', [
            'karyawan' => $karyawan,
            'units' => $units,
            'jabatans' => $jabatans,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_karyawan)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|max:100',
            'username' => 'required|max:100|unique:karyawans,username,' . $id_karyawan . ',id',
            'password' => 'nullable|min:6', // Password boleh kosong saat update
            'unit_id' => 'required|exists:units,id',
            'jabatan_id' => 'required|exists:jabatans,id', // Validasi untuk jabatan_id
            'tanggal_bergabung' => 'required|date',
        ]);

        // Temukan karyawan berdasarkan ID
        $karyawan = Karyawan::findOrFail($id_karyawan);

        // Encrypt password jika disediakan
        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']); // Hapus password dari array jika tidak diinputkan
        }

        // Update data karyawan
        $karyawan->update($validated);

        Alert::info('Success', 'Karyawan has been updated!');
        return redirect('/karyawan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_karyawan)
    {
        try {
            $karyawan = Karyawan::findOrFail($id_karyawan);
            $karyawan->delete();

            Alert::success('Success', 'Karyawan has been deleted!');
            return redirect('/karyawan');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cannot delete, Karyawan is in use!');
            return redirect('/karyawan');
        }
    }
}
