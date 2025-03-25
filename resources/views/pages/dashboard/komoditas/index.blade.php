@extends('layouts.dashboard')

@section('content')
    <div class="w-full" style="padding: 2rem; padding-left: 18rem;">
        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col gap-3">
            <div class="flex justify-between items-center">
                <h1 class="font-bold" style="font-size: 20px;">Komoditas</h1>
                <a href="{{ route('dashboard.komoditas.create') }}" type="button"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white cursor-pointer hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Tambah Komoditas
                </a>
            </div>
            <div class="p-1.5 w-full inline-block align-middle">
                <div class="border border-gray-200 rounded-lg divide-y divide-gray-200">
                    <div class="py-3 px-4">
                        <div class="relative max-w-xs">
                            <label class="sr-only">Search</label>
                            <input type="text" name="hs-table-with-pagination-search" id="hs-table-with-pagination-search"
                                class="py-1.5 sm:py-2 ps-9 block w-full border-gray-200 shadow-2xs rounded-lg sm:text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Search for items"
                                style="padding-inline: 32px;">
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
                                        Name</th>
                                    <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase flex justify-center">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($komoditas as $index => $item)
                                    <tr>
                                        <td class="py-3 ps-4">
                                            <div class="flex items-center justify-center h-5">
                                                <p>{{ $index + 1 }}</p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ $item->nama  }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex justify-center gap-2">
                                            <a href="{{ route('dashboard.komoditas.edit', ['komodita' => $item->id]) }}" type="button"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Update</a>
                                            <a href="{{ route('dashboard.komoditas.destroy', $item->id) }}" data-confirm-delete="true" type="button"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-1 px-4 w-full flex justify-end">
                        {{ $komoditas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
