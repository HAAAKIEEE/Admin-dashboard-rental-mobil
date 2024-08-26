<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Http\Requests\StoreKendaraanRequest;
use App\Http\Requests\UpdateKendaraanRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome', [
            'kendaraans' => Kendaraan::latest()->paginate(3),
            // 'kendaraans' => DB::table('kendaraans')->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKendaraanRequest $request)
    { 
         // Mengunggah file dan mendapatkan path-nya
    $filePath = $request->file('file')->store('kendaraan', 'public');

    // Menyimpan data kendaraan, termasuk path file
    Kendaraan::create(array_merge(
        $request->validated(),
        ['file' => $filePath] // Menambahkan path file ke data kendaraan
    ));

    return redirect()->route('dashboard')->with('success', 'Kendaraan created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kendaraan $kendaraan)
    {
        return view('edit', [
            'kendaraan' => $kendaraan
        ]);
    }

    /**
     * Up.pubdate the specified resource in storage.
     */
    public function update(UpdateKendaraanRequest $request, Kendaraan $kendaraan)
    {
        
        $filePath = $request->file('file')->store('kendaraan', 'public');
        $kendaraan->update(array_merge(
            $request->validated(),
            ['file' => $filePath] // Menambahkan path file ke data kendaraan
        ));
        return redirect()->route('dashboard')->with('success', 'Data updated successfully!');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete(); // Menghapus data berdasarkan model instance
    return redirect()->route('dashboard')->with('success', 'Data Deleted successfully!');
    }
}
