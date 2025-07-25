<div id="edit{{ $data->id }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">
                    Edit Barang
                </h3>
                <button type="button"
                    class="text-gray-400 cursor-pointer bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="edit{{ $data->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <form action="{{ route('barang.update', $data->id) }}" method="POST" enctype="multipart/form-data"
                    class="space-y-3">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="nama_barang" class="block mb-2 text-sm font-medium text-gray-600">Nama
                            Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" value="{{ $data->nama_barang }}"
                            class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                    </div>
                    {{-- <div>
                        <label for="kategori_id" class="block mb-2 text-sm font-medium text-gray-600">Kategori</label>
                        <select name="kategori_id" id="kategori_id"
                            class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            <option value="">---Pilih Kategori---</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ $data->kategori_id == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="satuan_id" class="block mb-2 text-sm font-medium text-gray-600">Satuan</label>
                        <select name="satuan_id" id="satuan_id"
                            class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                            <option value="">---Pilih Satuan---</option>
                            @foreach ($satuans as $satuan)
                                <option value="{{ $satuan->id }}"
                                    {{ $data->satuan_id == $satuan->id ? 'selected' : '' }}>
                                    {{ $satuan->nama_satuan }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div>
                        <button type="submit"
                            class="w-full cursor-pointer px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
