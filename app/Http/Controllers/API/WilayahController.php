<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RegDistricts;
use App\Models\RegProvinces;
use App\Models\RegRegencies;
use App\Models\RegVillages;
use Illuminate\Http\Request;

class WilayahController extends Controller {
    public function provinsi(Request $request) {
        $response = [
            'status' => 0,
            'message' => '',
            'data' => [],
        ];

        $provinces = RegProvinces::all();

        if($provinces)
        {
            $response['status'] = 200;
            $response['message'] = 'Data Berhasil Diambil';
            $response['data'] = $provinces;

            return response()->json($response);
        }
        else 
        {
            $response['status'] = 400;
            $response['message'] = 'Data Tidak Ditemukan';
            $response['data'] = $provinces;

            return response()->json($response);
        }
    }

    public function kabkota(Request $request) {
        $response = [
            'status' => 0,
            'message' => '',
            'data' => [],
        ];

        $regency_id = $request->input('province_id');

        if($regency_id)
        {
            $regency = RegRegencies::where('province_id', $regency_id)->get();

            if($regency)
            {
                $response['status'] = 200;
                $response['message'] = 'Data Berhasil Diambil';
                $response['data'] = $regency;

                return response()->json($response);
            }
            else 
            {
                $response['status'] = 400;
                $response['message'] = 'Data Tidak Ditemukan';
                $response['data'] = $regency;
    
                return response()->json($response);
            }
        }
    }

    public function kecamatan(Request $request) {
        $response = [
            'status' => 0,
            'message' => '',
            'data' => [],
        ];

        $districts_id = $request->input('regency_id');

        if($districts_id)
        {
            $district = RegDistricts::where('regency_id', $districts_id)->get();

            if($district)
            {
                $response['status'] = 200;
                $response['message'] = 'Data Berhasil Diambil';
                $response['data'] = $district;

                return response()->json($response);
            }
            else 
            {
                $response['status'] = 400;
                $response['message'] = 'Data Tidak Ditemukan';
                $response['data'] = $district;
    
                return response()->json($response);
            }
        }
    }

    public function kelurahan(Request $request) {
        $response = [
            'status' => 0,
            'message' => '',
            'data' => [],
        ];

        $villages_id = $request->input('district_id');

        if($villages_id)
        {
            $villages = RegVillages::where('district_id', $villages_id)->get();

            if($villages)
            {
                $response['status'] = 200;
                $response['message'] = 'Data Berhasil Diambil';
                $response['data'] = $villages;

                return response()->json($response);
            }
            else 
            {
                $response['status'] = 400;
                $response['message'] = 'Data Tidak Ditemukan';
                $response['data'] = $villages;
    
                return response()->json($response);
            }
        }
    }
}

