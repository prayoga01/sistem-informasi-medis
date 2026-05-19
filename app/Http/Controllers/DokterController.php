<?php

namespace App\Http\Controllers;

use App\Exports\DokterExport;
use App\Models\Dokter;
use App\Models\Ahli;
use App\Http\Requests\StoreDokterRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateDokterRequest;
use Maatwebsite\Excel\Facades\Excel;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.showdokter', [
            'dokters'=> Dokter::all(),
            'dokters'=>  Dokter::search(request(key:'search'))->paginate(7)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createdokter',[
            'ahlis'=> Ahli::all(),
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDokterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kd_dokter' => 'required|unique:dokters',
            'nmdokter' => 'required',
            'ahli_id' => 'required'
            // 'bidangahli' => 'required'
           
        ]);
        Dokter::create($validatedData);

        return redirect('/dokters')->with('success', 'Pengajaun berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter)
    {
        return view('admin.editdokter',[
            'dokter'=> $dokter,
            'ahlis'=> Ahli::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDokterRequest  $request
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokter $dokter)
    {
        $rules = [
            'nmdokter' => 'required',
            'ahli_id' => 'required'
        ];

        if($request->kd_dokter != $dokter->kd_dokter){
            $rules['kd_dokter']= 'required|unique:dokters';
        }

        $validatedData =$request->validate($rules);

        Dokter::where('id', $dokter->id)
                ->update($validatedData);
            return redirect('/dokters')->with('success', 'Data Berhasil Di Ubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        Dokter::destroy($dokter->id);
        return redirect('/dokters')->with('success', 'Data dokter berhasil dihapus');
    }

    public function exportexcel(){
        return Excel::download(new DokterExport, 'dataDokter.xlsx');
    }
}