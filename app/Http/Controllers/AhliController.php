<?php

namespace App\Http\Controllers;

use App\Models\Ahli;
use App\Http\Requests\StoreAhliRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAhliRequest;

class AhliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.showbidangahli', [
            'ahlis'=> Ahli::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createbidangahli');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAhliRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAhliRequest $request)
    {
        $validatedData = $request->validate([
            'bidangahli' => 'required|unique:ahlis'

        ]);
        Ahli::create($validatedData);

        return redirect('/ahlis')->with('success', 'Bidang ahli berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ahli  $ahli
     * @return \Illuminate\Http\Response
     */
    public function show(Ahli $ahli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ahli  $ahli
     * @return \Illuminate\Http\Response
     */
    public function edit(Ahli $ahli)
    {
        return view('admin.editbidangahli',[
            'ahli'=> $ahli
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAhliRequest  $request
     * @param  \App\Models\Ahli  $ahli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ahli $ahli)
    {
        $rules = [
            'bidangahli' => 'required'
        ];

        if($request->bidangahli != $ahli->bidangahli){
            $rules['bidangahli']= 'required|unique:ahlis';
        }

        $validatedData =$request->validate($rules);

        Ahli::where('id', $ahli->id)->update($validatedData);
            return redirect('/ahlis')->with('success', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ahli  $ahli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ahli $ahli)
    {
        Ahli::destroy($ahli->id);
        return redirect('/ahlis')->with('success', 'Bidang ahli berhasil dihapus');
    }
}