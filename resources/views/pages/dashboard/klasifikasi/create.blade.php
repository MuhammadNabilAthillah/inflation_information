@extends('layouts.dashboard')

@section('content')
    <div class="w-full" style="padding: 2rem; padding-left: 18rem;">
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col gap-3">
            <div class="flex justify-between items-center">
                <h1 class="font-bold" style="font-size: 30px;">Tambah Klasifikasi</h1>
                <a href="{{ route('dashboard.klasifikasi.index') }}" type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white cursor-pointer hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Kembali
                </a>
            </div>
            <form method="POST" action="{{ route('dashboard.klasifikasi.store') }}" class="flex flex-col gap-4">
                @csrf
                <div class="max-w-sm space-y-3">
                    <div class="flex w-full gap-4">
                        <div class="flex rounded-lg w-full">
                            <span
                                class="px-4 inline-flex items-center min-w-fit rounded-s-md border border-e-0 border-gray-200 bg-gray-50 text-sm text-gray-500">Name</span>
                            <input type="text" name="nama"
                                class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 rounded-e-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" required>
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
