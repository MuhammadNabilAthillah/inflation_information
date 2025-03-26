<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Klasifikasi;
use App\Models\Komoditas;
use App\Models\Sektor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $datas = Data::select('id', 'tahun', 'bulan', 'minggu', 'harga', 'inflasi')
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('data')
                    ->groupBy('tahun', 'bulan', 'minggu');
            })
            ->orderBy('tahun')
            ->orderBy('bulan')
            ->orderBy('minggu')
            ->get();

        $sektors = Sektor::all();
        $komoditas = Komoditas::all();
        $klasifikasi = Klasifikasi::all();
        $tahun_list = Data::select('tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');

        return view('pages.dashboard.index', compact('datas', 'sektors', 'komoditas', 'klasifikasi', 'tahun_list'));
    }

    public function getChartData(Request $request)
    {
        $data = Data::where('id_sektor', $request->sektor)
            ->where('id_komoditas', $request->komoditas)
            ->where('id_klasifikasi', $request->klasifikasi)
            ->where('tahun', $request->tahun)
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique(fn($item) => $item->tahun . '-' . $item->bulan . '-' . $item->minggu)
            ->sortBy(fn($item) => [$item->tahun, $item->bulan, $item->minggu]) // Urutkan dari awal ke akhir
            ->values();

        return response()->json($data);
    }
}
