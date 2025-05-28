<div id="permohonan{{ $mahasiswa_id }}" tabindex="-1" aria-hidden="true"
    class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden">
    <div class="relative w-full max-w-xl p-4">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Detail Laporan</h3>
                <button type="button"
                    class="text-gray-400 hover:text-gray-900 hover:bg-gray-200 rounded-lg w-8 h-8 flex items-center justify-center"
                    data-modal-hide="permohonan{{ $mahasiswa_id }}">
                    <svg class="w-3 h-3" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L13 13M13 1L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <div class="p-4 space-y-4">
                <div class="bg-white border border-gray-200 rounded-lg shadow p-3">
                    <div class="space-y-3 overflow-y-auto max-h-96">
                        @foreach ($data as $item)
                            @php
                                $barang = $item->permohonan?->barang;
                            @endphp
                            <div class="flex items-center gap-3">
                                @if ($barang?->foto)
                                    <img src="{{ asset('storage/' . $barang->foto) }}" class="w-12 h-12 object-cover rounded"
                                        alt="{{ $barang->nama_barang }}">
                                @else
                                    <i class="fa-regular fa-image text-gray-400 text-4xl"></i>
                                @endif

                                <div class="flex flex-col">
                                    <div class="flex gap-2 items-center">
                                        <p class="text-sm font-semibold text-gray-900">
                                            {{ $barang?->nama_barang ?? 'Barang tidak tersedia' }}</p>
                                        <span
                                            class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                            Jumlah Pinjam: {{ $item->permohonan?->jumlah ?? '-' }}
                                        </span>
                                    </div>
                                    <div class="flex flex-wrap gap-2 mt-1">
                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                            {{ $barang?->kategori?->nama_kategori ?? 'Kategori tidak tersedia' }}
                                        </span>
                                        <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                            {{ $barang?->satuan?->nama_satuan ?? 'Satuan tidak tersedia' }}
                                        </span>
                                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                            {{ $item->status_pengembalian ?? 'Status tidak tersedia' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>