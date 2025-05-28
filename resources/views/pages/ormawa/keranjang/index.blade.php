@extends('pages.ormawa.index')
@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <div class="max-w-screen-xl p-4 mx-auto">
        <div class="space-y-5">
            <div class="mt-5 bg-white p-4 text-blue-500 rounded-xl text-2xl font-semibold text-center shadow-lg">
                Keranjang
            </div>

            <div class="max-w-screen-xl p-4 mx-auto bg-white rounded-xl shadow-lg">
                @forelse ($keranjang as $item)
                    <div class="max-w-screen-xl p-1 mx-auto space-y-2">
                        <p class="bg-blue-100 w-44 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                            {{ $item->barang->kategori->nama_kategori }}
                        </p>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <div class="flex items-center gap-3">
                                    @if ($item->barang)
                                        @if ($item->barang->foto)
                                            <img src="{{ asset('storage/' . $item->barang->foto) ?: asset('image/barang.png') }}"
                                                class="w-16 h-16 object-cover rounded"
                                                alt="{{ $item->barang->nama_barang }}">
                                        @else
                                            <i class="fa-regular fa-image text-gray-400 text-6xl"></i>
                                        @endif
                                        <div>
                                            <p class="text-sm font-semibold">{{ $item->barang->nama_barang }}</p>
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500">Barang tidak tersedia</p>
                                    @endif
                                </div>
                            </div>
                            <div class="flex justify-center items-center text-center">
                                <div class="px-4">
                                    <p class="text-sm text-gray-900">{{ $item->jumlah }}</p>
                                </div>
                                <div class="px-4">
                                    <form action="{{ route('keranjang.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-m text-red-500 cursor-pointer hover:underline">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500">Keranjang kosong</p>
                @endforelse

                @if ($keranjang->isNotEmpty())
                    <hr class="my-5" />
                    <button data-modal-target="form-permohonan" data-modal-toggle="form-permohonan"
                        class="px-4 py-2 w-full text-white bg-blue-500 rounded-lg hover:bg-blue-800" type="button">
                        Form Permohonan
                    </button>
                    @include('components.modal.modalPermohonan')
                @endif
            </div>
        </div>
    </div>
@endsection
