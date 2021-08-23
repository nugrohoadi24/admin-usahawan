<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermohonanController extends Controller {
    public function permohonan(Request $request) {

        $rules = [
            'nama_pemohon' => 'required|max:255',
            'jenis_kelamin_pemohon' => 'required|max:255',
            'tanggal_lahir_pemohon' => 'required|date',
            'provinsi_pemohon' => 'required|max:255',
            'kota_pemohon' => 'required|max:255',
            'kecamatan_pemohon' => 'required|max:255',
            'kelurahan_pemohon' => 'required|max:255',
            'alamat_pemohon' => 'required',
            'no_telp_pemohon' => 'required|max:255',
            'email_pemohon' => 'required|email|max:255',
            'nama_pembina_pemohon' => 'required|max:255',
            'nama_dpd_pemohon' => 'required|max:255',
            'kepentingan' => 'required|max:255',

            'nama_termohon' => 'required|max:255',
            'jenis_kelamin_termohon' => 'required|max:255',
            'no_telp_termohon' => 'required|max:255',
            'provinsi_termohon' => 'required|max:255',
            'kota_termohon' => 'required|max:255',
            'kecamatan_termohon' => 'max:255',
            'kelurahan_termohon' => 'max:255',
            'alamat_termohon' => 'required',
            'kategori',
            'status',

            'foto_pemohon' => 'required',
            'ktp_pemohon' => 'required',
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

            $foto_pemohon = $request->file('foto_pemohon')->store(
                'assets/foto_pemohon', 'public'
            );

            $ktp_pemohon = $request->file('ktp_pemohon')->store(
                'assets/ktp_pemohon', 'public'
            );

            $input = $request->all();
            $input['foto_pemohon'] = $foto_pemohon;
            $input['ktp_pemohon'] = $ktp_pemohon;
            
            $permohonan = Permohonan::create($input);
            
            $response['status'] = 200;
            $response['message'] = 'Data Berhasil Dikirim';
            $response['data'] = $permohonan;

            return response()->json($response);

        } catch(\Exception $e) {
            return ResponseFormatter::error([], $e);
        }
    }
}