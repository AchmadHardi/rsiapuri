<?php

namespace App\Http\Controllers;

use App\Models\COA;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class COAController extends Controller
{
    /**
     * Display a listing of the resources.
     */
    public function index()
    {
        // Fetch all accounts from the COA table, ordered by code
        $coa = COA::orderBy('code', 'asc')->get();

        return view('coa.index', [
            'coa' => $coa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua akun COA yang ada di database untuk dipilih sebagai parent account
        $coa_accounts = COA::all();  // Ambil semua data COA

        // Kirimkan data coa_accounts ke view
        return view('coa.create', [
            'coa_accounts' => $coa_accounts  // Pastikan variabel ini konsisten
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'code' => 'required|max:50|unique:coa',
            'name' => 'required|max:100',
            'type' => 'required|max:50',
            'level' => 'required|integer',
            'parent_id' => 'nullable|exists:coa,id',
            'group' => 'required|max:50',
            'control' => 'required|max:50',
            'currency' => 'required|max:3',
            'department' => 'nullable|max:50',
            'gain_loss' => 'nullable|in:gain,loss',
        ]);

        // Create the new COA entry
        COA::create($validated);

        // Set success message using SweetAlert
        Alert::success('Success', 'COA has been saved!');

        // Redirect to the index page of COA
        return redirect()->route('coa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(COA $coa)
    {
        // Implement show logic if needed, for now we can just return the data
        return view('coa.show', [
            'coa' => $coa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coa = Coa::findOrFail($id);
        $allCoa = Coa::all(); // Get all COA records for parent selection
        return view('coa.edit', compact('coa', 'allCoa'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'code' => 'required|max:50|unique:coa,code,' . $id,
            'name' => 'required|max:100',
            'type' => 'required|max:50',
            'level' => 'required|integer',
            'parent_id' => 'nullable|exists:coa,id',
            'group' => 'required|max:50',
            'control' => 'required|max:50',
            'currency' => 'required|max:3',
            'department' => 'nullable|max:50',
            'gain_loss' => 'nullable|in:gain,loss',
        ]);

        // Find the COA entry to update
        $coa = COA::findOrFail($id);

        // Update the COA entry
        $coa->update($validated);

        // Set success message
        Alert::info('Success', 'COA has been updated!');

        // Redirect to the index page
        return redirect()->route('coa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Find the COA entry and delete it
            $coa = COA::findOrFail($id);
            $coa->delete();

            // Set success message
            Alert::success('Success', 'COA has been deleted!');

            // Redirect to the index page
            return redirect()->route('coa.index');
        } catch (Exception $ex) {
            // Set error message if the COA cannot be deleted (it might be in use)
            Alert::warning('Error', 'Cannot delete, COA is in use!');

            // Redirect back to the COA list
            return redirect()->route('coa.index');
        }
    }
}
