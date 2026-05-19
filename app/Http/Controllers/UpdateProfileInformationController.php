<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Contracts\Service\Attribute\Required;

class UpdateProfileInformationController extends Controller
{
    public function edit()
    {
        return view('editprofile', [
            'datauser'=> User::find(auth()->user()->id),
        ]);
    }

    public function update(Request $request)
    {
        
      
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'no_tlp' => 'required',
        ];
        $validatedData =$request->validate($rules);

        $validatedData['id'] = auth()->user()->id;
        User::where('id', auth()->user()->id)
                ->update($validatedData);
                
        return redirect('/dashboard')->with('success', 'Data Berhasil Di Ubah');
        //  dd($validatedData);
    }
    




}