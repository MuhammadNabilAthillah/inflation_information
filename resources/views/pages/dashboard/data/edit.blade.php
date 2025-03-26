@extends('layouts.dashboard')

@section('content')
    <div class="w-full" style="padding: 2rem; padding-left: 18rem;">
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col gap-3">
            <div class="flex justify-between items-center">
                <h1 class="font-bold" style="font-size: 30px;">Edit Data</h1>
                <a href="{{ route('dashboard.data.index') }}" type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white cursor-pointer hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Kembali
                </a>
            </div>
            <form method="POST" action="{{ route('dashboard.data.update', ['data', $data->id]) }}" class="flex flex-col gap-4">
                @csrf
                <div class="max-w-sm space-y-3 flex flex-col" style="gap: 20px;">
                    <div class="flex w-full gap-4">
                        <div class="flex rounded-lg w-full">
                            <span
                                class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Tahun</span>
                            <input type="number" name="tahun" min="1900" max="2099" step="1" value="{{ $data->tahun }}"
                                class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 rounded-e-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Masukkan tahun" required>
                        </div>
                        <div class="flex rounded-lg w-full">
                            <span
                                class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Bulan</span>
                            <select name="bulan"
                                class="py-3 px-4 pe-9 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                <option value="" readonly>Pilih Bulan</option>
                                <option value="1" {{ $data->bulan == 1 ? 'selected' : '' }}>Januari</option>
                                <option value="2" {{ $data->bulan == 2 ? 'selected' : '' }}>Februari</option>
                                <option value="3" {{ $data->bulan == 3 ? 'selected' : '' }}>Maret</option>
                                <option value="4" {{ $data->bulan == 4 ? 'selected' : '' }}>April</option>
                                <option value="5" {{ $data->bulan == 5 ? 'selected' : '' }}>Mei</option>
                                <option value="6" {{ $data->bulan == 6 ? 'selected' : '' }}>Juni</option>
                                <option value="7" {{ $data->bulan == 7 ? 'selected' : '' }}>Juli</option>
                                <option value="8" {{ $data->bulan == 8 ? 'selected' : '' }}>Agustus</option>
                                <option value="9" {{ $data->bulan == 9 ? 'selected' : '' }}>Septermber</option>
                                <option value="10" {{ $data->bulan == 10? 'selected' : '' }}>Oktober</option>
                                <option value="11" {{ $data->bulan == 11 ? 'selected' : '' }}>November</option>
                                <option value="12" {{ $data->bulan == 12 ? 'selected' : '' }}>Desember</option>
                            </select>
                        </div>
                        <div class="flex rounded-lg w-full">
                            <span
                                class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Minggu</span>
                            <select name="minggu"
                                class="py-3 px-4 pe-9 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                <option value="" readonly>Pilih Minggu</option>
                                <option value="1" {{ $data->minggu == 1 ? 'selected' : '' }}>Minggu ke - 1</option>
                                <option value="2" {{ $data->minggu == 2 ? 'selected' : '' }}>Minggu ke - 2</option>
                                <option value="3" {{ $data->minggu == 3 ? 'selected' : '' }}>Minggu ke - 3</option>
                                <option value="4" {{ $data->minggu == 4 ? 'selected' : '' }}>Minggu ke - 4</option>
                                <option value="5" {{ $data->minggu == 5 ? 'selected' : '' }}>Minggu ke - 5</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex w-full gap-4">
                        <div class="flex rounded-lg w-full">
                            <span
                                class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Sektor</span>
                            <select name="sektor"
                                class="py-3 px-4 pe-9 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                <option value="" readonly>Pilih Sektor</option>
                                @foreach ($sektors as $sektor)
                                <option value="{{ $sektor->id }}" {{ $data->id_sektor == $sektor->id ? 'selected' : '' }} style="text-transform: capitalize;">{{ $sektor->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex w-full gap-4">
                        <div class="flex rounded-lg w-full">
                            <span
                                class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Komoditas</span>
                            <select name="komoditas"
                                class="py-3 px-4 pe-9 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                <option value="" readonly>Pilih Komoditas</option>
                                @foreach ($komoditas as $item)
                                <option value="{{ $item->id }}" {{ $data->id_komoditas == $item->id ? 'selected' : '' }} style="text-transform: capitalize;">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex w-full gap-4">
                        <div class="flex rounded-lg w-full">
                            <span
                                class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Klasifikasi</span>
                            <select name="klasifikasi"
                                class="py-3 px-4 pe-9 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                <option value="" readonly>Pilih Klasifikasi</option>
                                @foreach ($klasifikasi as $item)
                                <option value="{{ $item->id }}" {{ $data->id_klasifikasi == $item->id ? 'selected' : '' }} style="text-transform: capitalize;">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex w-full gap-4">
                        <div class="flex rounded-lg w-full">
                            <span
                            style="min-width: 100px"
                                class="px-4 inline-flex justify-center items-center rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Harga Rp.</span>
                            <input type="number" name="harga" step="1" value="{{ $data->harga }}"
                                class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 rounded-e-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Masukkan harga" required>
                        </div>
                        <div class="flex rounded-lg w-full">
                            <span
                            style="min-width: 100px;"
                                class="px-4 inline-flex justify-center items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Inflasi %</span>
                            <input type="number" name="inflasi" value="{{ $data->inflasi }}"
                            step="0.0000000001"
                                class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 rounded-e-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Masukkan inflasi" required>
                        </div>
                    </div>
                </div>
                <div class="flex w-full justify-end">
                    <button type="submit"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white cursor-pointer hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection