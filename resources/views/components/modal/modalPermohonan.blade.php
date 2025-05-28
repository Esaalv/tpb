<div id="form-permohonan" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Form Permohonan</h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="form-permohonan">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <form action="{{ route('keranjang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <div class="mb-5">
                            <label for="unit_kerja"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Unit Kerja
                            </label>
                            <input type="text" id="unit_kerja" name="unit_kerja"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div class="mb-5">
                            <label for="nama_kegiatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama_Kegiatan
                            </label>
                            <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        <div class="mb-5">
                            <label for="nama_kegiatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Hari atau Tanggal
                            </label>
                            <input type="date" id="hari_atau_tanggal" name="hari_atau_tanggal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div class="mb-5">
                            <label for="waktu_mulai"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Waktu Mulai
                            </label>
                            <input type="time" id="waktu_mulai" name="waktu_mulai"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div class="mb-5">
                            <label for="waktu_selesai"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Waktu Selesai
                            </label>
                            <input type="time" id="waktu_selesai" name="waktu_selesai"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="mahasiswa_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Penanggung Jawab
                        </label>
                        <input type="text" id="mahasiswa_id" name="mahasiswa_id" value="{{ auth()->user()->name }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                    </div>
                    <div class="mb-5">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Phone
                        </label>
                        <input type="text" id="phone" name="phone"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                    </div>
                    <button type="submit"
                        class="w-full text-sm font-medium px-5 py-2.5 text-white bg-blue-500 rounded-lg hover:bg-blue-800">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
