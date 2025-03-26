@extends('layouts.dashboard')

@section('content')
    <div class="w-full" style="padding: 2rem; padding-left: 18rem;">
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col gap-3">
            <div class="flex justify-between items-center">
                <h1 class="font-bold" style="font-size: 30px;">Tambah Data</h1>
                <a href="{{ route('dashboard.data.index') }}" type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white cursor-pointer hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Kembali
                </a>
            </div>
            <form method="POST" action="{{ route('dashboard.data.store') }}" class="flex flex-col gap-4">
                @csrf
                <div class="w-full space-y-3 flex flex-col" style="gap: 20px;">
                    <div class="flex w-full gap-4">
                        <div class="flex rounded-lg w-full">
                            <span
                                class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Tahun</span>
                            <input type="number" name="tahun" min="1900" max="2099" step="1"
                                class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 rounded-e-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Masukkan tahun" required>
                        </div>
                        <div class="flex rounded-lg w-full">
                            <span
                                class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Bulan</span>
                            <select name="bulan"
                                class="py-3 px-4 pe-9 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                <option value="" readonly>Pilih Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">Septermber</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="flex rounded-lg w-full">
                            <span
                                class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Minggu</span>
                            <select name="minggu"
                                class="py-3 px-4 pe-9 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                <option value="" readonly>Pilih Minggu</option>
                                <option value="1">Minggu ke - 1</option>
                                <option value="2">Minggu ke - 2</option>
                                <option value="3">Minggu ke - 3</option>
                                <option value="4">Minggu ke - 4</option>
                                <option value="5">Minggu ke - 5</option>
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
                                <option value="{{ $sektor->id }}" style="text-transform: capitalize;">{{ $sektor->nama }}</option>
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
                                <option value="{{ $item->id }}" style="text-transform: capitalize;">{{ $item->nama }}</option>
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
                                <option value="{{ $item->id }}" style="text-transform: capitalize;">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex w-full gap-4">
                        <div class="flex rounded-lg w-full">
                            <span
                            style="min-width: 100px"
                                class="px-4 inline-flex justify-center items-center rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Harga Rp.</span>
                            <input type="number" name="harga" step="1"
                                class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 rounded-e-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Masukkan harga" required>
                        </div>
                        <div class="flex rounded-lg w-full">
                            <span
                            style="min-width: 100px;"
                                class="px-4 inline-flex justify-center items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Inflasi %</span>
                            <input type="number" name="inflasi"
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