<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Exports\PengajuanExport;
use App\Exports\PengambilanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Search;
use Symfony\Contracts\Service\Attribute\Required;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        // $pengajuan = Pengajuan::search($request->search)->get();
        // return view('admin.tabel', compact('pengajuan'));
        if(!auth()->check() || !auth()->user()->role){
            return view('statuspengajuan', [
                'pengajuans'=> Pengajuan::where('user_id',auth()->user()->id)->latest()->get()
            ]);
        }

        $filtr = Pengajuan::latest()->filter(request(['search']))->Tgl(request(['tgl_awal', 'tgl_akhir']));
        return view('admin.tabel', [
            // 'pengajuans'=> Pengajuan::all(),
            // 'pengajuans'=> Pengajuan::latest()->filter(request(['search']))->Tgl(request(['tgl_awal', 'tgl_akhir']))->paginate(7)
            'pengajuans'=> $filtr->paginate(7)


            // 'pengajuans'=> Pengajuan::latest()->get(),
            // 'pengajuans'=>  Pengajuan::search(request(key:'search'))->paginate(7)
           
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengajuan', [
            'datauser'=> User::find(auth()->user()->id),
            'dokters'=> Dokter::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'no_rm' => 'required',
            'nm_pasien' => 'required|max:255',
            'tgl_lahir' => 'required',
            'tgl_rawat' => 'required',
            'nm_asuransi'=> 'required',
            'hubungan'=> 'required',
            'file_asuransi'=> 'required|mimes:pdf|max:10048',
            'file_suratkuasa'=> 'mimes:pdf|max:10048',
            'dokter_id' => 'required'
           
        ]);
        // dd($validatedData);
        if ($request->file('file_asuransi')) {
            $validatedData['file_asuransi']= $request->file('file_asuransi')->store('post-dokuments');
        }
        if ($request->file('file_suratkuasa')) {
            $validatedData['file_suratkuasa']= $request->file('file_suratkuasa')->store('post-dokuments');
        }
                 
        $validatedData['user_id'] = auth()->user()->id;
    

        Pengajuan::create($validatedData);
        return redirect('/dashboard')->with('success', 'Pengajaun berhasil dibuat');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan)
    {
        if(!auth()->check() || !auth()->user()->role){
            return view('detailstatus', [
                'pengajuan'=>$pengajuan
            ]);
        }
        return view('admin.keputusan',[
            'pengajuan'=>$pengajuan,
            'dokters'=> Dokter::latest()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuan $pengajuan)
    {
        if(!auth()->check() || !auth()->user()->role){
            return view('editpengajuan', [
                'dokters'=> Dokter::all(),
                $user = User::find(auth()->user()->id),
                'user' => $user,
                'pengajuan' => $pengajuan,
            ]);
        }
        return view('admin.uploadarsip',[
            'pengajuan'=>$pengajuan,
            'dokters'=> Dokter::latest()->get(),
            $pemohon = User::find(1),
            'pemohon' => $pemohon
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        if(!auth()->check() || !auth()->user()->role){
            $rules = [
                // 'nmpemohon'=> 'required|max:255',
                // 'email' => 'required',
                // 'notlp' => 'required',
                'no_rm' => 'required',
                'nm_pasien' => 'required|max:255',
                'tgl_lahir' => 'required',
                'tgl_rawat' => 'required',
                'nm_asuransi'=> 'required',
                'dokter_id' => 'required',
                'hubungan'=> 'required',
                'file_asuransi'=> 'mimes:pdf|max:10048',
                'file_suratkuasa'=> 'mimes:pdf|max:10048'
            ];
            
            $validatedData =$request->validate($rules);
    
            if ($request->file('file_asuransi')) {
                if ($request->oldFile1) {
                    Storage::delete($request->oldFile1);
                }
                $validatedData['file_asuransi']= $request->file('file_asuransi')->store('post-dokuments');
            }
            if ($request->file('file_suratkuasa')) {
                if ($request->oldFile2) {
                    Storage::delete($request->oldFile2);
                }
                $validatedData['file_suratkuasa']= $request->file('file_suratkuasa')->store('post-dokuments');
            }
    
            $validatedData['user_id'] = auth()->user()->id;
            Pengajuan::where('id', $pengajuan->id)
                    ->update($validatedData);
    
            return redirect('/pengajuans')->with('success', 'Data Berhasil Di Ubah');
        }
        
        $rules = [
                'dokter_id' => 'nullable|max:100',
                'komentar' => 'nullable|max:100',
                'status'=> 'nullable|max:100',
                'file_asuransi'=> 'mimes:pdf|max:10048',
                'file_suratkuasa'=> 'mimes:pdf|max:10048'
            ];
            
            $validatedData =$request->validate($rules);
    
            if ($request->file('file_asuransi')) {
                if ($request->oldFile1) {
                    Storage::delete($request->oldFile1);
                }
                $validatedData['file_asuransi']= $request->file('file_asuransi')->store('post-dokuments');
            }
            if ($request->file('file_suratkuasa')) {
                if ($request->oldFile2) {
                    Storage::delete($request->oldFile2);
                }
                $validatedData['file_suratkuasa']= $request->file('file_suratkuasa')->store('post-dokuments');
            }
    
            Pengajuan::where('id', $pengajuan->id)->update($validatedData);
            return redirect('/pengajuans')->with('success', 'Data Berhasil Di Ubah');
            
        // $validatedData=$request->validate([
        //     'nm_dokter' => 'nullable|max:100',
        //     'komentar' => 'required',
        //     'status'=> 'required',
        //     'file_asuransi'=> 'mimes:pdf|max:10048',
        //     'file_suratkuasa'=> 'mimes:pdf|max:10048'
        //    ]);
        //    Pengajuan::where('id', $pengajuan->id)->update($validatedData);
        //    return redirect('/pengajuans')->with('success', 'Data Berhasil Di Ubah');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajuan $pengajuan)
    {
        if ($pengajuan->file_asuransi) {
            Storage::delete($pengajuan->file_asuransi);
        }
        if ($pengajuan->file_suratkuasa) {
            Storage::delete($pengajuan->file_suratkuasa);
        }

        Pengajuan::destroy($pengajuan->id);
        return redirect('/pengajuans')->with('success', 'Pengajaun berhasil dihapus');
        
    }


    //menampilkan permohonan berdasarkan status selesai (pemohon)
    public function pengajuanselesai()
    { 
        return view('pengajuanselesai', [
            'pengajuans'=> Pengajuan::where('user_id',auth()->user()->id)->whereFullText('status', 'Dokumen Selesai')->latest()->get()
            // 'pengajuans'=> Pengajuan::whereFullText('status', 'Dokumen Selesai')->latest()->get(),
        ]); 
    }

    //menampilkan detai pengajuan selesai dan status pengambilan (pemohon)
    public function detailpengajuanselesai(Pengajuan $pengajuan)
    { 
        return view('detailpengajuanselesai', [
            'pengajuan'=>$pengajuan
        ]);
    }
    
    //menampilkan permohonan berdasarkan status selesai
    public function arsip()
    { 
        return view('admin.arsip', [        
            'pengajuans'=> Pengajuan::latest()->filter(request(['search']))->whereFullText('status', 'Dokumen Selesai')->paginate(7)
        ]); 
    }

    //proses pengabilan
    public function pengambilan()
    { 
        $filtr = Pengajuan::latest()->filter(request(['search']))->Tgl(request(['tgl_awal', 'tgl_akhir']))->whereFullText('status', 'Dokumen Selesai');
        return view('admin.pengambilan', [
            'pengajuans'=> $filtr->paginate(7)
            // 'pengajuans'=> Pengajuan::latest()->filter(request(['search']))->whereFullText('status', 'Dokumen Selesai')->paginate(7)    
        ]); 
    }

    public function showpengambilan($id)
    {
        //menampilkan detail arsip berdasarkan id pemohon
        $pemohon = User::find(1);
        $pengajuan = Pengajuan::find($id);
        return view('admin.datapengambilan',compact(['pengajuan', 'pemohon']));
    }

    public function updatepengambilan($id, Request $request)
    {
        //proses pengambilan
        $pengajuan = Pengajuan::find($id);
        $pengajuan->update($request->except(['_token','submit']));
        // $pengajuan =  Pengajuan::search($request->search)->paginate(7);
        return redirect('/pengambilans');
    }
    
    public function exportpengajuan(){
        $filtr = Pengajuan::filter(request(['search']))->Tgl(request(['tgl_awal', 'tgl_akhir']))->get();
        // dd(request(['search']), request(['tgl_awal']), request(['tgl_akhir']));
        //export untuk Pengajuan
        return Excel::download(new PengajuanExport($filtr), 'dataPengajuan.xlsx');
    }
    
    public function exportpengambilan(){
        //export untuk pengambilan
        $filtr = Pengajuan::filter(request(['search']))->Tgl(request(['tgl_awal', 'tgl_akhir']))->get();
        return Excel::download(new PengambilanExport($filtr), 'dataPengambilan.xlsx');
    }




}