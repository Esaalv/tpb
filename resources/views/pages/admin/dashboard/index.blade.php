@extends('pages.admin.index')
@section('content')
    <div class="p-4 sm:ml-64 mt-5">
        <div class="space-y-4 rounded-lg mt-14">
            <div class="space-y-4 rounded-lg mt-14">
                <div class="p-4 bg-white rounded-lg shadow-lg flex items-center">
                    <p class="text-lg font-semibold">Dashboard</p>
                </div>
                <div class="grid grid-cols-1 gap-2 md:grid-cols-4">
                    <a href="{{ route('mahasiswa') }}" class="block">
                        <div class="p-4 bg-white rounded-lg shadow-lg hover:bg-gray-100 transition">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-lg font-semibold">Mahasiswa</p>
                                    <p class="text-xl font-semibold">{{ $pengguna }}</p>
                                </div>
                                <div class="text-3xl font-semibold text-blue-500">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('barang') }}" class="block">
                        <div class="p-4 bg-white rounded-lg shadow-lg hover:bg-gray-100 transition">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-lg font-semibold">Barang</p>
                                    <p class="text-xl font-semibold">{{ $barang }}</p>
                                </div>
                                <div class="text-3xl font-semibold text-red-500">
                                    <i class="fa-solid fa-box"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="block">
                        <div class="p-4 bg-white rounded-lg shadow-lg hover:bg-gray-100 transition">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-lg font-semibold">Peminjaman</p>
                                    <p class="text-xl font-semibold">{{ $peminjaman }}</p>
                                </div>
                                <div class="text-3xl font-semibold text-yellow-500">
                                    <i class="fa-solid fa-boxes-stacked"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="block">
                        <div class="p-4 bg-white rounded-lg shadow-lg hover:bg-gray-100 transition">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-lg font-semibold">Pengembalian</p>
                                    <p class="text-xl font-semibold">{{ $pengembalian }}</p>
                                </div>
                                <div class="text-3xl font-semibold text-yellow-500">
                                    <i class="fa-solid fa-boxes-stacked"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
