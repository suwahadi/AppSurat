<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\JenisSurat;
use App\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $surat = Surat::where('no_surat', 'LIKE', "%$keyword%")
                ->orWhere('judul_surat', 'LIKE', "%$keyword%")
                ->orWhere('jenis_surat_id', 'LIKE', "%$keyword%")
                ->orWhere('tanggal', 'LIKE', "%$keyword%")
                ->orWhere('instansi', 'LIKE', "%$keyword%")
                ->orWhere('keterangan', 'LIKE', "%$keyword%")
                ->orWhere('tipe', 'LIKE', "%$keyword%")
                ->orWhere('file', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $surat = Surat::paginate($perPage);
        }

        return view('surat.index', compact('surat'));
    }


    public function masuk(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $surat = Surat::where('no_surat', 'LIKE', "%$keyword%")
                ->orWhere('judul_surat', 'LIKE', "%$keyword%")
                ->orWhere('jenis_surat_id', 'LIKE', "%$keyword%")
                ->orWhere('tanggal', 'LIKE', "%$keyword%")
                ->orWhere('instansi', 'LIKE', "%$keyword%")
                ->orWhere('keterangan', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $surat = Surat::where('tipe', 'masuk')->paginate($perPage);
        }

        return view('surat.masuk', compact('surat'));
    }

    public function keluar(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $surat = Surat::where('no_surat', 'LIKE', "%$keyword%")
                ->orWhere('judul_surat', 'LIKE', "%$keyword%")
                ->orWhere('jenis_surat_id', 'LIKE', "%$keyword%")
                ->orWhere('tanggal', 'LIKE', "%$keyword%")
                ->orWhere('instansi', 'LIKE', "%$keyword%")
                ->orWhere('keterangan', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $surat = Surat::where('tipe', 'keluar')->paginate($perPage);
        }

        return view('surat.keluar', compact('surat'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $jenisSurats = JenisSurat::pluck('name','id');
        return view('surat.create', compact('jenisSurats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validation = [
            'no_surat' => 'required',
            'judul_surat' => 'required',
            'jenis_surat_id' => 'required',
            'tanggal' => 'required',
            'tipe' => 'required',
            //'instansi' => 'required',
            'file' => 'required|file|mimes:pdf|max:12048',
        ];

        if ($request->tipe == 'masuk') {
            $validation = array_add($validation, 'tanggal', 'required');
        }

        $request->validate($validation);

        // Simpan file pdf START
        $file = $request->file('file');
        $nama_file = time()."_".str_replace(' ', '_', $file->getClientOriginalName());
		$tujuan_upload = 'files';
		$file->move($tujuan_upload,$nama_file);
        // Simpan file pdf END

        $requestData = array_add($request->all(), 'user_id', $request->user()->id);

        //Surat::create($requestData);
        $surats = Surat::create(array('no_surat' => $request->no_surat, 'judul_surat' => $request->judul_surat, 'jenis_surat_id' => $request->jenis_surat_id, 'tanggal' => $request->tanggal, 'instansi' => $request->instansi, 'keterangan' => $request->keterangan, 'tipe' => $request->tipe, 'user_id' => $request->user()->id, 'file' => $nama_file));

        return redirect('surat')->with('flash_message', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $surat = Surat::findOrFail($id);
        return view('surat.show', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        $jenisSurats = JenisSurat::pluck('name','id');

        return view('surat.edit', compact('surat','jenisSurats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validation = [
            'no_surat' => 'required',
            'judul_surat' => 'required',
            'jenis_surat_id' => 'required',
            'tanggal' => 'required',
            'tipe' => 'required',
            //'instansi' => 'required',
            'file' => 'file|mimes:pdf|max:12048',
        ];

        if ($request->tipe == 'masuk') {
            $validation = array_add($validation, 'tanggal', 'required');
        }

        $request->validate($validation);
        
        if ($request->file) {
           // Simpan file pdf START
            $file = $request->file('file');
            $nama_file = time()."_".str_replace(' ', '_', $file->getClientOriginalName());
            $tujuan_upload = 'files';
            $file->move($tujuan_upload,$nama_file);
            // Simpan file pdf END
            $surat = Surat::findOrFail($id);
            $surat->no_surat = $request->no_surat;
            $surat->judul_surat = $request->judul_surat;
            $surat->jenis_surat_id = $request->jenis_surat_id;
            $surat->tanggal = $request->tanggal;
            $surat->instansi = $request->instansi;
            $surat->keterangan = $request->keterangan;
            $surat->file = $nama_file;
            $surat->save();
        } else {
            $surat = Surat::findOrFail($id);
            $surat->no_surat = $request->no_surat;
            $surat->judul_surat = $request->judul_surat;
            $surat->jenis_surat_id = $request->jenis_surat_id;
            $surat->tanggal = $request->tanggal;
            $surat->instansi = $request->instansi;
            $surat->keterangan = $request->keterangan;
            //$surat->file = $nama_file;
            $surat->save();
        }

        //$requestData = $request->all();
        

        //$surat->update($requestData);

        return redirect('surat')->with('flash_message', 'Data berhasil di-update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Surat::destroy($id);

        return redirect('surat')->with('flash_message', 'Data berhasil dihapus!');
    }

    public function laporan (Request $request)
    {   
        $from = \Carbon\Carbon::now();
        $to = \Carbon\Carbon::now();
        $tipe = 'masuk';
        if ($request->from && $request->to && $request->tipe) {
            $from = $request->from;
            $to = $request->to;
            $tipe = $request->tipe;
        }

        $surats = Surat::whereTipe($tipe)-> whereDate('tanggal', '>=', $from)->whereDate('tanggal', '<=', $to)->get();

        return view('surat.laporan', compact('surats','from','to','tipe'));
    }
}