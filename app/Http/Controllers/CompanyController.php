<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image; // Pastikan untuk mengimpor kelas Image
use Exception;

class CompanyController extends Controller
{
    /**
     * Menampilkan informasi perusahaan.
     */
    public function index()
    {
        $company = Company::orderBy('name', 'asc')->get();

        return view('company.company', [
            'company' => $company
        ]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|max:255|unique:company,name', // Validasi nama perusahaan harus unik
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi logo jika ada
            'tagline' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        try {
            // Menyimpan logo jika di-upload
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $filename = time() . '_' . $logo->getClientOriginalName();

                // Simpan gambar ke direktori public/logos
                $logo->storeAs('logos', $filename);

                $validated['logo'] = $filename; // Simpan nama file logo
            }

            // Membuat data perusahaan baru
            Company::create($validated);

            // Menampilkan notifikasi sukses
            Alert::success('Sukses', 'Perusahaan telah ditambahkan!');
            return redirect('/company');
        } catch (Exception $ex) {
            // Menampilkan notifikasi error jika terjadi kesalahan
            Alert::error('Error', 'Terjadi kesalahan saat menambahkan perusahaan!');

            // Logging kesalahan
            Log::error('Error saat menambahkan perusahaan: ' . $ex->getMessage());

            return redirect('/company/create')->withInput(); // Redirect kembali ke form dengan input yang tersimpan
        }
    }

    /**
     * Menampilkan form untuk mengedit informasi perusahaan.
     */
    public function edit()
    {
        // Mengambil data perusahaan pertama (anggap hanya ada satu data perusahaan)
        $company = Company::first();

        // Mengirim data perusahaan ke view admin untuk diedit
        return view('company.edit', [
            'company' => $company,
        ]);
    }

    /**
     * Mengupdate informasi perusahaan.
     */
    public function update(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|max:255',
            'tagline' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        try {
            // Mengambil data perusahaan pertama (anggap hanya ada satu data perusahaan)
            $company = Company::first();

            // Mengupdate data perusahaan
            $company->update($validated);

            // Menampilkan notifikasi sukses
            Alert::success('Sukses', 'Informasi perusahaan telah diperbarui!');
            return redirect('/company');
        } catch (Exception $ex) {
            // Menampilkan notifikasi error jika terjadi kesalahan
            Alert::error('Error', 'Terjadi kesalahan saat memperbarui informasi perusahaan!');
            return redirect('/company');
        }
    }

    public function destroy($id)
    {
        try {
            $company = Company::findOrFail($id);
            $company->delete();

            Alert::success('Success', 'company has been deleted!'); // Ubah Alert::error menjadi Alert::success
            return redirect('/company');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cannot delete, company already used!'); // Ubah Alert::warning kedua untuk menunjukkan error
            return redirect('/company');
        }
    }
}
