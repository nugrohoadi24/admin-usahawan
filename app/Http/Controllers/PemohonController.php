<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PemohonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Permohonan::select('*')
        ->where('status', 'DITERIMA')
        ->orWhere('status', 'DITOLAK')
        ->orderBy('id', 'DESC')
        ->get();
        

        return view('pages.pemohon.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Permohonan::findOrFail($id);
        $item->delete();

        return redirect()->route('permohonan.index'); 
    }

    public function detail (Request $request, $id)
    {
        $permohonan = Permohonan::findorFail($id);

        return view('pages.pemohon.detail')->with([
            'permohonan' => $permohonan,
        ]);
    }

    public function verifikasi(Request $request)
    {
        $items = Permohonan::where('status', 'PROSES')->get();

        return view('pages.pemohon.verification')->with([
            'items' => $items
        ]);
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:PROSES,DITERIMA,DITOLAK'
        ]);
        
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->status = $request->status;

        $permohonan->save();

        return redirect()->route('permohonan.index');
    }

    public function sendEmail(Request $request)
    {
        $sendMail = [
            'id' => $request->id,
            'email_pemohon' => $request->email_pemohon,
            'judul' => $request->judul,
            'pesan' => $request->pesan,
        ];

        Mail::raw($request->pesan, function($mail) use($request) {
            $mail->to($request->email_pemohon)
            ->subject($request->judul);
        });

        return redirect()->route('permohonan.index');
    }
}
