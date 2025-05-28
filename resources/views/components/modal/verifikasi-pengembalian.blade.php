<div id="permohonan{{ $mahasiswa_id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">
                    Detail Verifikasi Pengembalian
                </h3>
                <button type="button"
                    class="text-gray-400 cursor-pointer bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="permohonan{{ $mahasiswa_id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <form action="{{ route('verifikasi-pengembalian.update', $data->first()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="max-w-screen-xl mx-auto">
                        <div class="w-full bg-white border border-gray-200 rounded-lg shadow p-3">
                            <div class="relative overflow-y-auto space-y-3">
                                <!-- Informasi Barang -->
                                @foreach ($data as $item)
                                    <div class="flex items-center gap-1">
                                        @if ($item->permohonan->barang->foto)
                                            <img src="{{ asset('storage/' . $item->permohonan->barang->foto) ?? 'image/barang.png' }}"
                                                class="w-12" alt="{{ $item->permohonan->barang->nama_barang }}">
                                        @else
                                            <i class="fa-regular fa-image text-gray-400 text-6xl"></i>
                                        @endif
                                        <div>
                                            <div class="flex gap-1">
                                                <p class="text-sm text-gray-900 font-semibold ms-4">
                                                    {{ $item->permohonan->barang->nama_barang }}
                                                </p>
                                                <p
                                                    class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    Jumlah Pinjam {{ $data->first()->permohonan->jumlah }}
                                                </p>
                                            </div>
                                            <p class="text-xs text-gray-500 mt-1 ms-4">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    {{ $item->permohonan->barang->kategori->nama_kategori ?? 'Kategori tidak tersedia' }}
                                                </span>
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    {{ $item->permohonan->barang->satuan->nama_satuan ?? 'Satuan tidak tersedia' }}
                                                </span>
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                    {{ $item->status_pengembalian ?? 'Status tidak tersedia' }}
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-4">
                                <label for="status_pengembalian" class="block py-2 text-sm font-medium">Status
                                    Pengembalian</label>
                                <select id="status_pengembalian" name="status_pengembalian"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    {{ $data->first()->status_pengembalian == 'Diterima' ? 'disabled' : '' }}>
                                    <option>--- Pilih Status ---</option>
                                    <option value="Diterima"
                                        {{ $data->first()->status_pengembalian == 'Diterima' ? 'selected' : '' }}>
                                        Diterima</option>
                                    <option value="Ditolak"
                                        {{ $data->first()->status_pengembalian == 'Ditolak' ? 'selected' : '' }}>
                                        Ditolak</option>
                                </select>
                            </div>
                            <button type="submit"
                                class="mt-4 px-4 py-2 bg-blue-500 text-white rounded
                                {{ $data->first()->status_pengembalian == 'Diterima' ? 'opacity-50 cursor-not-allowed' : '' }}"
                                {{ $data->first()->status_pengembalian == 'Diterima' ? 'disabled' : '' }}>
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
