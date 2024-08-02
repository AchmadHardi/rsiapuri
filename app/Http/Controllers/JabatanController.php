<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatans = Jabatan::orderBy('name', 'asc')->get();

        return view('jabatans.jabatans', [
            'jabatans' => $jabatans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jabatans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100|unique:jabatans',
        ]);

        Jabatan::create($validated);

        Alert::success('Success', 'Jabatan has been saved!');
        return redirect('/jabatans'); // Ubah '/jabatans' menjadi '/Jabatan'
    }
    /**
     * Display the specified resource.
     */
    public function show(Jabatan $Jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);

        return view('jabatans.edit', [
            'jabatan' => $jabatan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:100|unique:jabatans,name,' . $id,
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($validated);

        Alert::info('Success', 'Jabatan has been updated!');
        return redirect('/jabatans');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $Jabatan = Jabatan::findOrFail($id);
            $Jabatan->delete();

            Alert::success('Success', 'Jabatan has been deleted!'); // Ubah Alert::error menjadi Alert::success
            return redirect('/jabatans');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cannot delete, Jabatan already used!'); // Ubah Alert::warning kedua untuk menunjukkan error
            return redirect('/jabatans');
        }
    }
}
