<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::orderBy('name', 'asc')->get();

        return view('units.units', [
            'units' => $units
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100|unique:units',
        ]);

        Unit::create($validated);

        Alert::success('Success', 'Unit has been saved!');
        return redirect('/units'); // Ubah '/units' menjadi '/unit'
    }
    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);

        return view('units.edit', [
            'unit' => $unit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:100|unique:units,name,' . $id,
        ]);

        $unit = Unit::findOrFail($id);
        $unit->update($validated);

        Alert::info('Success', 'Unit has been updated!');
        return redirect('/units');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $unit = Unit::findOrFail($id);
            $unit->delete();

            Alert::success('Success', 'Unit has been deleted!'); // Ubah Alert::error menjadi Alert::success
            return redirect('/units');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cannot delete, Unit already used!'); // Ubah Alert::warning kedua untuk menunjukkan error
            return redirect('/units');
        }
    }
}
