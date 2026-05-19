<?php

namespace App\Http\Controllers;

use App\Models\Keputusan;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreKeputusanRequest;
use App\Http\Requests\UpdateKeputusanRequest;

class KeputusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengambilan', [
            'pengajuans'=> Pengajuan::whereFullText('status', 'Dokumen Selesai')->get()
        ]);
        // Pengajuan::whereFullText('status', 'Dokumen Selesai')->get();
        // return Pengajuan::whereFullText('status', 'Dokumen Selesai')->get();
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.datapengambilan', [
            'pengajuan'=> Pengajuan::find(1),

        ]);
        // return (Pengajuan::find(1));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKeputusanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKeputusanRequest $request)
    {
        // $validatedData = $request->validate([
        //     'nmpemohon'=> 'required|max:255',
        //     'no_rm' => 'required',
        //     'nmpasien' => 'required',
        //     'nmasuransi' => 'required',
        //     'status'=> 'required',
        //     'keputusan'=> 'required',
        //     'nmpengambil'=> 'required',
        //     'tgl_ambil'=> 'required',
        //     'file_asuransi'=> 'mimes:pdf|max:10048',
        //     'file_suratkuasa'=> 'mimes:pdf|max:10048'
        //     // 'nm_dokter' => 'required'
           
        // ]);
       $rules =[
            'nmpemohon'=> 'required|max:255',
            'no_rm' => 'required',
            'pengajuan_id' => 'required',
            'nmpasien' => 'required',
            'nmasuransi' => 'required',
            'status'=> 'required',
            'keputusan'=> 'required',
            'nmpengambil'=> 'required'
          
        ];
        // dd($rules);
        
       
        $validatedData =$request->validate($rules);
        Keputusan::create($validatedData);
        // dd($validatedData);
        return redirect('keputusans')->with('success', 'Pengajaun berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function show(Keputusan $keputusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keputusan $keputusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKeputusanRequest  $request
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKeputusanRequest $request, Keputusan $keputusan)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keputusan  $keputusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keputusan $keputusan)
    {
        //
    }
}