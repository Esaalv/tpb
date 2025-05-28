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
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                });
            </script>
        @endif
        <div class="space-y-5">
            <div class="mt-5 bg-white p-4 text-blue-500 rounded-xl text-2xl font-semibold text-center shadow-lg">
                Beranda
            </div>

            <div class="bg-white rounded-lg shadow-md p-4">
                <form action="{{ route('beranda') }}" method="get" class="flex">
                    <input type="text" name="search" id="search" placeholder="Ketik nama barang disini..."
                        class="focus:outline-none border rounded-l border-gray-300 px-3 py-2 w-64"
                        value="{{ request()->query('search') }}">
                    <button type="submit"
                        class="bg-blue-500 text-white border rounded-r border-blue-500 px-4 py-2 hover:bg-blue-600">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>


                @if ($dataBarang->isEmpty())
                    <p class="mt-6 text-center text-gray-500">Tidak ada barang yang tersedia saat ini.</p>
                @else
                    <div id="card-section" class="grid grid-cols-1 gap-2 md:grid-cols-3 animate-card mt-4">
                        @foreach ($dataBarang as $data)
                            <div class="w-full p-3 border border-blue-300 rounded-lg shadow-lg relative">
                                <div class="flex justify-center w-full">
                                    @if ($data->foto)
                                        <img src="{{ asset('storage/' . $data->foto) }}" class="object-cover zoom-image"
                                            alt="{{ $data->nama_barang }}" />
                                    @else
                                        <i class="fa-regular fa-image text-gray-400 text-6xl"></i>
                                    @endif
                                </div>
                                <div class="mt-1">
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                        {{ $data->kategori->nama_kategori ?? 'Tidak ada kategori' }}
                                    </span>
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                        Sisa {{ $data->stock->stock ?? 'Tidak ada stock' }}
                                    </span>
                                </div>
                                <div class="mt-1">
                                    <p class="font-normal">{{ Str::limit($data->nama_barang, 50) }}</p>
                                </div>

                                @if ($data->stock->stock > 0)
                                    <!-- Jika stok masih ada, tetap bisa diklik -->
                                    <a href="{{ route('beranda.show', ['nama_barang' => $data->nama_barang]) }}"
                                        class="absolute inset-0"></a>
                                @else
                                    <!-- Jika stok habis, tampilkan overlay dengan teks "Stok Habis" -->
                                    <div
                                        class="absolute inset-0 bg-gray-200 bg-opacity-75 flex justify-center items-center rounded-lg">
                                        <p class="text-red-500 font-bold text-lg">Stok Habis</p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="mt-4">
                    {{ $dataBarang->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.animate-card');

            const observerOptions = {
                threshold: 0.1,
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                    } else {
                        entry.target.classList.remove('in-view');
                    }
                });
            }, observerOptions);

            cards.forEach(card => {
                observer.observe(card);
            });
        });
    </script>
@endsection
