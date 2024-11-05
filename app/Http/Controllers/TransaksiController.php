<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Jurnal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data jurnal yang ada
        $jurnal = Jurnal::orderBy('nama_jurnal', 'asc')->get();

        // Ambil semua data transaksi yang sudah ada
        $transaksi = Transaksi::orderBy('tanggal', 'asc')->get();

        return view('transaksi.index', [
            'transaksi' => $transaksi,
            'jurnal' => $jurnal,  // Kirim data jurnal ke view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua data jurnal dari database
        $jurnal = Jurnal::all();  // Sesuaikan query jika perlu

        // Kirim data jurnal ke view
        return view('transaksi.create', [
            'jurnal' => $jurnal,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari request
        $validated = $request->validate([
            'kode_jurnal' => 'required|max:50|unique:jurnal_transaksi',  // Validasi untuk kode jurnal
            'keterangan' => 'nullable|string',
            'tanggal' => 'required|date',
            'kode_rekening' => 'required|string|max:50',
            'uraian_transaksi' => 'required|string|max:255',
            'kel_tujuan' => 'required|string|max:50',
            'tujuan' => 'required|string|max:50',
            'referensi' => 'nullable|string|max:100',
            'pemasok' => 'nullable|string|max:100',
            'department' => 'nullable|string|max:50',
            'debet' => 'required|numeric',
            'kredit' => 'required|numeric',
        ]);

        // Buat entri jurnal transaksi baru
        Transaksi::create($validated);

        // Set pesan sukses
        Alert::success('Success', 'Jurnal Transaksi has been saved!');

        // Redirect ke halaman index
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('transaksi.show', [
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('transaksi.edit', [
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input dari request
        $validated = $request->validate([
            'kode_jurnal' => 'required|max:50|unique:jurnal_transaksi,kode_jurnal,' . $id,
            'keterangan' => 'nullable|string',
            'tanggal' => 'required|date',
            'kode_rekening' => 'required|string|max:50',
            'uraian_transaksi' => 'required|string|max:255',
            'kel_tujuan' => 'required|string|max:50',
            'tujuan' => 'required|string|max:50',
            'referensi' => 'nullable|string|max:100',
            'pemasok' => 'nullable|string|max:100',
            'department' => 'nullable|string|max:50',
            'debet' => 'required|numeric',
            'kredit' => 'required|numeric',
        ]);

        // Cari jurnal transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);

        // Update data jurnal transaksi
        $transaksi->update($validated);

        // Set pesan sukses
        Alert::info('Success', 'Jurnal Transaksi has been updated!');

        // Redirect ke halaman index
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Cari jurnal transaksi berdasarkan ID dan hapus
            $transaksi = Transaksi::findOrFail($id);
            $transaksi->delete();

            // Set pesan sukses
            Alert::success('Success', 'Jurnal Transaksi has been deleted!');

            // Redirect ke halaman index
            return redirect()->route('transaksi.index');
        } catch (Exception $ex) {
            // Set pesan peringatan jika gagal hapus
            Alert::warning('Error', 'Cannot delete, this transaction is already used!');

            // Redirect kembali ke halaman index
            return redirect()->route('transaksi.index');
        }
    }
}
