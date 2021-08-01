<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller {
    public function laporan(Request $request) {

        $rules = [
            'nama_pelapor' => 'required|max:255',
            'jenis_kelamin_pelapor' => 'required|max:255',
            'tanggal_lahir_pelapor' => 'required|date',
            'alamat_pelapor' => 'required',
            'no_telp_pelapor' => 'required|max:255',
            'email_pelapor' => 'required|email|max:255',
            'nama_pembina_pelapor' => 'required|max:255',
            'nama_dpd_pelapor' => 'required|max:255',
            'tanggal_transaksi' => 'required|date',
            'total_kerugian'=> 'required',

            'nama_terlapor' => 'required|max:255',
            'jenis_kelamin_terlapor' => 'required|max:255',
            'no_telp_terlapor' => 'required|max:255',
            'alamat_terlapor' => 'required',
            'email_terlapor' => 'max:255',
            'nama_dpd_terlapor' => 'max:255',
            'kasus' => 'required|max:255',
            'penyelesaian' => 'required|max:255',
            'uraian_kasus' => 'required',
            'kategori' => 'required',
            'status' => 'required',

            'foto_pelapor' => 'required',
            'ktp_pelapor' => 'required',
            'primary_document' => 'required',
            'secondary_document'
        ];

        $response = [
            'status' => 0,
            'message' => '',
            'data' => [],
        ];

        try {
        $validator = Validator::make($request->all(), $rules);
            
            if($validator->fails()) {
                
                $error = $validator-> errors()->first();
                $response['message'] = $error;

                return response()->json($response);
            }

            $foto_pelapor = $request->file('foto_pelapor')->store(
                'assets/foto_pelapor', 'public'
            );

            $ktp_pelapor = $request->file('ktp_pelapor')->store(
                'assets/ktp_pelapor', 'public'
            );

            $primary_document = $request->file('primary_document')->store(
                'assets/primary_document', 'public'
            );

            $secondary_document = $request->file('secondary_document')->store(
                'assets/secondary_document', 'public'
            );

            $input = $request->all();
            $input['foto_pelapor'] = $foto_pelapor;
            $input['ktp_pelapor'] = $ktp_pelapor;
            $input['primary_document'] = $primary_document;
            $input['secondary_document'] = $secondary_document;
            
            $laporan = Laporan::create($input);
            
            $response['status'] = 200;
            $response['message'] = 'Data Berhasil Dikirim';
            $response['data'] = $laporan;

            return response()->json($response);
            
        } catch(\Exception $e) {
            // $response['message'] = $e->getMessage();
            // return response()->json($response);
            return ResponseFormatter::success([], $e);
        }
    }
}