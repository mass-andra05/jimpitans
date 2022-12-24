<?php

namespace App\Http\Controllers;

use App\Models\pemasukan;
use Illuminate\Http\Request;
use App\Http\Requests\StorepemasukanRequest;
use App\Http\Requests\UpdatepemasukanRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\pemasukanExport;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pemasukan.index',[
            'title' => "Daftar Pemasukan",
            'pemasukans' => pemasukan::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemasukan.add', [
            'title' => "Tambah Pemasukan"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepemasukanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pemasukan = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'kategori' => 'required|max:255',
            'tanggal' => 'required|max:255',
            'jumlah' => 'required|max:255',
            'user' => 'required|max:255',
            'status',
        ]);
        
        pemasukan::create($pemasukan);

        $request->session()->flash('success', 'Selamat Data Telah Ditambahkan!!');
        // kembalikan ke halaman post
        return redirect('/pemasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
        $pemasukan['pemasukans'] = pemasukan::where('id', $id)->get();
        return view('pemasukan.detail',$pemasukan, [
            'title' => "Detail Pemasukan",
            'pemasukans' => pemasukan::findOrFail($id)
        ]);
    }  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit(pemasukan $pemasukan)
    {
        return view('pemasukan.edit', [
            'pemasukan' => $pemasukan,
            'title' => 'Update Pemasukan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepemasukanRequest  $request
     * @param  \App\Models\pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pemasukan $pemasukan)
    {
        $rules = [
            'judul' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'kategori' => 'required|max:255',
            'tanggal' => 'required|max:255',
            'jumlah' => 'required|max:255',
            'user' => 'required|max:255',
            'status',
        ];

        $vali = $request->validate($rules);
        
        // search laravel = update | insert
        pemasukan::where('id', $pemasukan->id)
                ->update($vali);


        // kembalikan ke halaman post
        return redirect('/pemasukan')->with('success', 'Selamat Data Telah Di Update!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pemasukan $pemasukan)
    {
        pemasukan::destroy($pemasukan->id);
        // kembalikan ke halaman pemasukan
        return redirect('/pemasukan')->with('success', 'Selamat Data Telah Dihapus!!');
    }

    public function status(Request $request, $id)
    {
        $pemasukan = pemasukan::where('id', $id)->first();
        $pemasukan->status = $request->status;

        $pemasukan->update();

        return redirect('/pemasukan')->with('success', 'Anda Berhasil Mengkonfimasi');
    }

    public function pemasukanExport(){
        return Excel::download(new pemasukanExport, 'Pemasukan.xlsx');
    }
}
