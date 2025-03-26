@extends('layouts.dashboard')

@section('content')
    <div class="w-full" style="padding: 2rem; padding-left: 18rem;">
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col gap-3">
            <div class="flex justify-between items-center">
                <h1 class="font-bold" style="font-size: 20px;">Datas</h1>
                <div class="flex gap-2">
                <form action="{{ route('dashboard.export') }}" method="GET">
    <input type="hidden" name="sektor" value="{{ request('sektor') }}">
    <input type="hidden" name="komoditas" value="{{ request('komoditas') }}">
    <input type="hidden" name="klasifikasi" value="{{ request('klasifikasi') }}">
    <input type="hidden" name="tahun" value="{{ request('tahun') }}">
    <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white cursor-pointer hover:bg-green-700 focus:outline-hidden focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">Export to Excel</button>
</form>
    <a href="{{ route('dashboard.data.create') }}" type="button"
        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white cursor-pointer hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
        Tambah Data
    </a>
</div>

            </div>
            <div class="p-1.5 w-full inline-block align-middle">
                <div class="border border-gray-200 rounded-lg divide-y divide-gray-200">
                    <div class="py-3 px-4">
                        <div class="relative max-w-xs">
                            <label class="sr-only">Search</label>
                            <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search"
                                class="py-1.5 sm:py-2 ps-9 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Search for items" style="padding-inline: 32px;">
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none px-3">
                                <svg class="size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 px-4">
    <form method="GET" action="{{ route('dashboard.data.index') }}" class="flex flex-wrap gap-3">
    <div class="flex w-full gap-4">
        <div class="flex w-full gap-4">
        <div class="flex rounded-lg w-full">
          <span
          class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Sektor</span>
          <select name="sektor" id="sektor"
          class="py-3 px-4 pe-9 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
          <option value="" readonly>Pilih Sektor</option>
          @foreach ($sektors as $sektor)
        <option value="{{ $sektor->id }}" {{ request('sektor') == $sektor->id ? 'selected' : '' }} style="text-transform: capitalize;">{{ $sektor->nama }}</option>
      @endforeach
          </select>
        </div>
        </div>
        <div class="flex w-full gap-4">
        <div class="flex rounded-lg w-full">
          <span
          class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Komoditas</span>
          <select name="komoditas" id="komoditas"
          class="py-3 px-4 pe-9 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
          <option value="" readonly>Pilih Komoditas</option>
          @foreach ($komoditas as $item)
        <option value="{{ $item->id }}" {{ request('komditas') == $item->id ? 'selected' : '' }} style="text-transform: capitalize;">{{ $item->nama }}</option>
      @endforeach
          </select>
        </div>
        </div>
      </div>
      <div class="flex w-full gap-4">
        <div class="flex w-full gap-4">
        <div class="flex rounded-lg w-full">
          <span
          class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Klasifikasi</span>
          <select name="klasifikasi" id="klasifikasi"
          class="py-3 px-4 pe-9 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
          <option value="" readonly>Pilih Klasifikasi</option>
          @foreach ($klasifikasi as $item)
        <option value="{{ $item->id }}" {{ request('klasifikasi') == $item->id ? 'selected' : '' }} style="text-transform: capitalize;">{{ $item->nama }}</option>
      @endforeach
          </select>
        </div>
        </div>
        <div class="flex w-full gap-4">
        <div class="flex rounded-lg w-full">
          <span
          class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Tahun</span>
          <select name="tahun" id="tahun"
          class="py-3 px-4 pe-9 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
          <option value="" readonly>Pilih Tahun</option>
          @foreach ($tahun_list as $item)
        <option value="{{ $item }}" {{ request('tahun') == $item ? 'selected' : '' }} style="text-transform: capitalize;">{{ $item }}</option>
      @endforeach
          </select>
        </div>
        </div>
      </div>

      <div class="flex w-full justify-end">
                    <button type="submit"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white cursor-pointer hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Filter
                    </button>
                </div>
    </form>
</div>

                    <div class="overflow-hidden">
                        <table class="w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-4 pe-0">
                                        <div class="flex items-center justify-center h-5">
                                            #
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Sektor</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Komoditas</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Klasifikasi</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Bulan / Tahun</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Minggu</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Harga</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                        Inflasi</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase flex justify-center">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($datas as $index => $item)
                                    <tr>
                                        <td class="py-3 ps-4">
                                            <div class="flex items-center justify-center h-5">
                                                <p>{{ $index + 1 }}</p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            {{ $item->sektor?->nama  }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            {{ $item->komoditas?->nama  }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            {{ $item->klasifikasi?->nama  }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            {{ bulan($item->bulan) . ' / ' . $item->tahun }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            {{ $item->minggu  }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            {{ formatRupiah($item->harga)  }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            {{ $item->inflasi  }}</td>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex justify-center gap-2">
                                            <a href="{{ route('dashboard.data.edit', ['data' => $item->id]) }}" type="button"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Update</a>
                                            <a href="{{ route('dashboard.data.destroy', $item->id) }}"
                                                data-confirm-delete="true" type="button"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-1 px-4 w-full flex justify-end">
                        {{ $datas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#hs-table-with-pagination-search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>
@endpush