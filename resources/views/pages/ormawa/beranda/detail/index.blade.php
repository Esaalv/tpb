@extends('pages.ormawa.index')
@section('content')
    <style>
        .image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .animate-card {
            transform: translateY(50px);
            opacity: 0;
            transition: transform 0.5s cubic-bezier(0.25, 0.8, 0.25, 1), opacity 0.5s;
        }

        .animate-card.in-view {
            transform: translateY(0);
            opacity: 1;
        }
    </style>
    <div class="max-w-screen-xl p-4 mx-auto">
        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                });
            </script>
        @endif
        <div class="space-y-5">
            <div class="mt-5 bg-white p-4 text-blue-500 rounded-xl text-2xl font-semibold text-center shadow-lg">
                Detail Barang
            </div>

            <div class="bg-white p-4 rounded-xl shadow-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div class="flex justify-center">
                        @if ($barang->foto)
                            <img src="{{ asset('storage/' . $barang->foto) }}"
                                class="image border border-blue-300 rounded-lg shadow-lg" alt="{{ $barang->nama_barang }}" />
                        @else
                            <i class="fa-regular fa-image text-gray-400 text-6xl"></i>
                        @endif
                    </div>
                    <div>
                        <div>
                            <p class="text-xl font-semibold">{{ $barang->nama_barang }}</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ $barang->kategori->nama_kategori }}</span>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ $barang->satuan->nama_satuan }}</span>

                            </div>
                            <div>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">Sisa
                                    {{ $barang->stock->stock }}</span>
                            </div>
                        </div>
                        <div class="mt-4">
                            <form
                                action="{{ route('beranda.store', ['nama_barang' => $barang->nama_barang, 'barangId' => $barang->id]) }}"
                                method="POST">
                                @csrf
                                <input type="text" name="barang_id" id="barang_id" value="{{ $barang->id }}" hidden>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-m font-medium">Jumlah Pinjam</p>
                                    </div>
                                    <div class="flex items-center border border-blue-300 rounded-xl bg-blue-500">
                                        <!-- Tombol Minus -->
                                        <button type="button" class="p-2 text-white" onclick="decrement()" id="btn-minus"
                                            {{ $barang->stock->stock == 0 ? 'disabled' : '' }}>
                                            <i class="fa-solid fa-minus"></i>
                                        </button>
                                        <!-- Input Kuantitas -->
                                        <input type="number" name="jumlah" id="jumlah"
                                            class="w-15 auto text-center font-bold" value="1" min="1"
                                            max="{{ $barang->stock->stock }}" readonly
                                            {{ $barang->stock->stock == 0 ? 'disabled' : '' }}>
                                        <!-- Tombol Plus -->
                                        <button type="button" class="p-2 text-white" onclick="increment()" id="btn-plus"
                                            {{ $barang->stock->stock == 0 ? 'disabled' : '' }}>
                                            <i class="fa-solid fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" id="btn-tambah"
                                        class="px-4 py-2 w-full text-white bg-blue-500 rounded-lg hover:bg-blue-800"
                                        {{ $barang->stock->stock == 0 ? 'disabled' : '' }}>
                                        Tambah ke Keranjang
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let input = document.getElementById("jumlah");
            let btnPlus = document.getElementById("btn-plus");
            let btnMinus = document.getElementById("btn-minus");
            let btnTambah = document.getElementById("btn-tambah");

            let maxValue = parseInt(input.getAttribute("max"));

            if (maxValue === 0) {
                btnPlus.disabled = true;
                btnMinus.disabled = true;
                input.disabled = true;
                btnTambah.disabled = true;
            }

            function increment() {
                let currentValue = parseInt(input.value);
                if (currentValue < maxValue) {
                    input.value = currentValue + 1;
                }
            }

            function decrement() {
                let currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                }
            }

            btnPlus.addEventListener("click", increment);
            btnMinus.addEventListener("click", decrement);
        });
    </script>
@endsection
