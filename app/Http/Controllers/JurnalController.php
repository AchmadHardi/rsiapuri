<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurnal = Jurnal::orderBy('nama_jurnal', 'asc')->get();

        return view('jurnal.index', [
            'jurnal' => $jurnal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurnal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'kode' => 'required|max:50|unique:jurnals',
            'nama_jurnal' => 'required|max:100',
            'no_terakhir' => 'nullable|max:50',
            'keterangan' => 'nullable|string',
        ]);

        // Create the new journal entry
        Jurnal::create($validated);

        // Set success message using SweetAlert
        Alert::success('Success', 'Jurnal has been saved!');

        // Redirect to the index page of journals
        return redirect()->route('jurnal.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Jurnal $jurnal)
    {
        // You can implement show logic here if needed.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jurnal = Jurnal::findOrFail($id);

        return view('jurnal.edit', [
            'jurnal' => $jurnal,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|max:50|unique:jurnals,kode,' . $id,
            'nama_jurnal' => 'required|max:100',
            'no_terakhir' => 'nullable|max:50',
            'keterangan' => 'nullable|string',
        ]);

        $jurnal = Jurnal::findOrFail($id);
        $jurnal->update($validated);

        Alert::info('Success', 'Jurnal has been updated!');
        return redirect('/jurnal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $jurnal = Jurnal::findOrFail($id);
            $jurnal->delete();

            Alert::success('Success', 'Jurnal has been deleted!');
            return redirect('/jurnal');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cannot delete, Jurnal already used!');
            return redirect('/jurnal');
        }
    }
}
