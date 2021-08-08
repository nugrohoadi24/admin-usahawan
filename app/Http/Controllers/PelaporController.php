<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PelaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Laporan::select('*')
            ->where('status', 'DITERIMA')
            ->orWhere('status', 'DITOLAK')
            ->orderBy('id', 'DESC')
            ->get();

        return view('pages.pelapor.index')->with([
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
        $item = Laporan::findOrFail($id);
        $item->delete();
        
        return redirect()->route('laporan.index'); 
        
    }

    public function detail (Request $request, $id)
    {
        $laporan = Laporan::findorFail($id);

        $primary_document = pathinfo($laporan->primary_document, PATHINFO_EXTENSION);
        $secondary_document = pathinfo($laporan->secondary_document, PATHINFO_EXTENSION);

        return view('pages.pelapor.detail')->with([
            'laporan' => $laporan,
            'primary_document' => $primary_document,
            'secondary_document' => $secondary_document
        ]);
    }

    public function download_primary($id)
    {
        $laporan = Laporan::findorFail($id);
        $primary_document = pathinfo($laporan->primary_document, PATHINFO_BASENAME);

        return response()->download(public_path('storage/assets/primary_document/'.$primary_document));
    }

    public function download_secondary($id)
    {
        $laporan = Laporan::findorFail($id);
        $secondary_document = pathinfo($laporan->secondary_document, PATHINFO_BASENAME);

        return response()->download(public_path('storage/assets/secondary_document/'.$secondary_document));
    }

    public function verifikasi(Request $request)
    {
        $items = Laporan::where('status', 'PROSES')->get();

        return view('pages.pelapor.verification')->with([
            'items' => $items
        ]);
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:PROSES,DITERIMA,DITOLAK'
        ]);
        
        $laporan = Laporan::findOrFail($id);
        $laporan->status = $request->status;

        $laporan->save();

        return redirect()->route('laporan.index');
    }

    public function sendEmail()
    {
        // $items = Laporan::findOrFail($id);
        // dd(config('mail'));
        $details = [
            'title' => 'Mail from nugrohoadi.pratomo99@gmail.com',
            'body' => 'This is for testing email using smtp'
        ];
       
        Mail::to('nugrohoadi.pratomo24@gmail.com')->send(new \App\Mail\MyTestMail($details));
       
        dd("Email is Sent.");
    }
}
