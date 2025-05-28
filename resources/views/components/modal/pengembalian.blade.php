<div id="permohonan{{ $mahasiswa_id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">
                    Detail Pengembalian
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
                <form action="{{ route('pengembalian.store', $data->first()->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="max-w-screen-xl mx-auto">
                        <div class="space-y-3">
                            <div class="relative overflow-x-auto bg-gray-100 rounded-lg p-2">
                                <!-- Informasi Barang -->
                                @foreach ($data as $item)
                                    <div class="flex items-center gap-1">
                                        @if ($item->barang->foto)
                                            <img src="{{ asset('storage/' . $item->barang->foto) ?? 'image/barang.png' }}"
                                                class="w-12" alt="{{ $item->barang->nama_barang }}">
                                        @else
                                            <i class="fa-regular fa-image text-gray-800 text-6xl"></i>
                                        @endif
                                        <div>
                                            <div class="flex gap-1">
                                                <p class="text-sm text-gray-900 font-semibold ms-4">
                                                    {{ $item->barang->nama_barang }}
                                                </p>
                                                <p
                                                    class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                                                    Jumlah Pinjam {{ $data->first()->jumlah }}
                                                </p>
                                            </div>
                                            <p class="text-xs text-gray-500 mt-1 ms-4 flex gap-1 items-center">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                                                    {{ $item->barang->kategori->nama_kategori ?? 'Kategori tidak tersedia' }}
                                                </span>
                                                <span
                                                    class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                                                    {{ $item->barang->satuan->nama_satuan ?? 'Satuan tidak tersedia' }}
                                                </span>
                                                @php
                                                    $status =
                                                        $item->pengembalian->status_pengembalian ??
                                                        'Status tidak tersedia';
                                                @endphp

                                                @if ($status === 'Menunggu')
                                                    <span
                                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                                                        Status:
                                                        {{ $item->pengembalian->status_pengembalian ?? 'Status tidak tersedia' }}
                                                    </span>
                                                @elseif ($status === 'Diterima')
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                                                        Status:
                                                        {{ $item->pengembalian->status_pengembalian ?? 'Status tidak tersedia' }}
                                                    </span>
                                                @elseif ($status === 'Ditolak')
                                                    <span
                                                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                                                        Status:
                                                        {{ $item->pengembalian->status_pengembalian ?? 'Status tidak tersedia' }}
                                                    </span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="bg-gray-100 rounded-lg p-2 space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <div class="border p-2 rounded-lg">
                                        <label for="bukti_foto"
                                            class="block mb-2 text-sm font-medium text-gray-600">Preview</label>
                                        <img id="preview" class="hidden object-cover zoom-image rounded-lg">
                                    </div>
                                    <div>
                                        <label for="bukti_foto"
                                            class="block mb-2 text-sm font-medium text-gray-600">Bukti
                                            Foto</label>
                                        <input type="file"
                                            class="w-full px-4 text-sm text-gray-900 border border-gray-300 rounded-lg focus:border-transparent"
                                            name="bukti_foto" id="bukti_foto" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full mt-4 px-4 py-2 bg-blue-500 text-white rounded-xl">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('bukti_foto').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').src = e.target.result;
                document.getElementById('preview').classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
