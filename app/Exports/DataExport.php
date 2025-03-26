<?php

namespace App\Exports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = Data::with(['sektor', 'komoditas', 'klasifikasi']);

        if (!empty($this->filters['sektor'])) {
            $query->where('id_sektor', $this->filters['sektor']);
        }

        if (!empty($this->filters['komoditas'])) {
            $query->where('id_komoditas', $this->filters['komoditas']);
        }

        if (!empty($this->filters['klasifikasi'])) {
            $query->where('id_klasifikasi', $this->filters['klasifikasi']);
        }

        if (!empty($this->filters['tahun'])) {
            $query->where('tahun', $this->filters['tahun']);
        }

        return $query->get()->map(function ($data) {
            return [
                'ID' => $data->id,
                'Sektor' => $data->sektor->nama ?? 'Tidak Ada',
                'Komoditas' => $data->komoditas->nama ?? 'Tidak Ada',
                'Klasifikasi' => $data->klasifikasi->nama ?? 'Tidak Ada',
                'Tahun' => $data->tahun,
                'Bulan' => $data->bulan,
                'Minggu' => $data->minggu,
                'Harga' => $data->harga,
                'Inflasi' => $data->inflasi,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Sektor',
            'Komoditas',
            'Klasifikasi',
            'Tahun',
            'Bulan',
            'Minggu',
            'Harga',
            'Inflasi'
        ];
    }
}
