@extends('layouts.dashboard')

@section('content')
  <div class="w-full flex flex-col" style="padding: 2rem; padding-left: 18rem; gap: 20px">
    <!-- Card Section -->
    <div class="w-full mx-auto">
    <!-- Grid -->
    <div class="grid gap-4 sm:gap-6" style="grid-template-columns: auto auto auto auto;">
      <!-- Card -->
      <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl">
      <div class="p-4 md:p-5">
        <div class="flex items-center gap-x-2">
        <p class="text-xs uppercase text-gray-500">
          Total users
        </p>
        <div class="hs-tooltip">
          <div class="hs-tooltip-toggle">
          <svg class="shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <circle cx="12" cy="12" r="10" />
            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
            <path d="M12 17h.01" />
          </svg>
          <span
            class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded-md shadow-2xs"
            role="tooltip">
            The number of daily users
          </span>
          </div>
        </div>
        </div>

        <div class="mt-1 flex items-center gap-x-2">
        <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
          72,540
        </h3>
        <span class="flex items-center gap-x-1 text-green-600">
          <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
          <polyline points="16 7 22 7 22 13" />
          </svg>
          <span class="inline-block text-sm">
          1.7%
          </span>
        </span>
        </div>
      </div>
      </div>
      <!-- End Card -->

      <!-- Card -->
      <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl">
      <div class="p-4 md:p-5">
        <div class="flex items-center gap-x-2">
        <p class="text-xs uppercase text-gray-500">
          Sessions
        </p>
        </div>

        <div class="mt-1 flex items-center gap-x-2">
        <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
          29.4%
        </h3>
        </div>
      </div>
      </div>
      <!-- End Card -->

      <!-- Card -->
      <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl">
      <div class="p-4 md:p-5">
        <div class="flex items-center gap-x-2">
        <p class="text-xs uppercase text-gray-500">
          Avg. Click Rate
        </p>
        </div>

        <div class="mt-1 flex items-center gap-x-2">
        <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
          56.8%
        </h3>
        <span class="flex items-center gap-x-1 text-red-600">
          <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round">
          <polyline points="22 17 13.5 8.5 8.5 13.5 2 7" />
          <polyline points="16 17 22 17 22 11" />
          </svg>
          <span class="inline-block text-sm">
          1.7%
          </span>
        </span>
        </div>
      </div>
      </div>
      <!-- End Card -->

      <!-- Card -->
      <div class="flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl">
      <div class="p-4 md:p-5">
        <div class="flex items-center gap-x-2">
        <p class="text-xs uppercase text-gray-500">
          Pageviews
        </p>
        </div>

        <div class="mt-1 flex items-center gap-x-2">
        <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
          92,913
        </h3>
        </div>
      </div>
      </div>
      <!-- End Card -->
    </div>
    <!-- End Grid -->
    </div>
    <!-- End Card Section -->
    <div class="bg-white p-6 rounded-lg shadow-md flex flex-col gap-3">
    <form id="filterForm" class="flex flex-col gap-4">
      <div class="flex w-full gap-4">
        <div class="flex w-full gap-4">
        <div class="flex rounded-lg w-full">
          <span
          class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Sektor</span>
          <select name="sektor" id="sektor"
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
          <select name="komoditas" id="komoditas"
          class="py-3 px-4 pe-9 block w-full border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
          <option value="" readonly>Pilih Komoditas</option>
          @foreach ($komoditas as $item)
        <option value="{{ $item->id }}" style="text-transform: capitalize;">{{ $item->nama }}</option>
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
        <option value="{{ $item->id }}" style="text-transform: capitalize;">{{ $item->nama }}</option>
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
        <option value="{{ $item }}" style="text-transform: capitalize;">{{ $item }}</option>
      @endforeach
          </select>
        </div>
        </div>
      </div>

      <div class="flex w-full justify-end">
                    <button type="submit"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white cursor-pointer hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Tampilkan Data
                    </button>
                </div>
    </form>

    <!-- Legend Indicator -->
    <div class="flex justify-center sm:justify-end items-center gap-x-4 mb-3 sm:mb-6">
      <div class="inline-flex items-center">
      <span class="size-2.5 inline-block bg-blue-600 rounded-sm me-2"></span>
      <span class="text-[13px] text-gray-600">
        Income
      </span>
      </div>
      <div class="inline-flex items-center">
      <span class="size-2.5 inline-block bg-purple-600 rounded-sm me-2"></span>
      <span class="text-[13px] text-gray-600">
        Outcome
      </span>
      </div>
    </div>
    <!-- End Legend Indicator -->

    <div id="hs-curved-area-charts"></div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>
  <script>
    window.chartData = @json($datas);
  </script>
  <script>
    document.getElementById('filterForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const sektor = document.getElementById('sektor').value;
    const komoditas = document.getElementById('komoditas').value;
    const klasifikasi = document.getElementById('klasifikasi').value;
    const tahun = document.getElementById('tahun').value;

    fetch(`/dashboard/getChartData?sektor=${sektor}&komoditas=${komoditas}&klasifikasi=${klasifikasi}&tahun=${tahun}`)
      .then(response => response.json())
      .then(data => {
      const hargaData = data.map(item => item.harga);
      const inflasiData = data.map(item => item.inflasi);
      const categories = data.map(item => `Minggu ${item.minggu} - ${item.bulan} - ${item.tahun}`);

      buildChart('#hs-curved-area-charts', () => ({
        chart: { height: 300, type: 'area', toolbar: { show: false }, zoom: { enabled: false } },
        series: [
        { name: 'Harga', data: hargaData },
        { name: 'Inflasi', data: inflasiData }
        ],
        xaxis: { type: 'category', categories: categories }
      }));
      });
    });
  </script>
@endpush