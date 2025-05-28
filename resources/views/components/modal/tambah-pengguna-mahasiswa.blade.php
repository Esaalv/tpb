<div id="add" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">
                    Tambah Mahasiswa
                </h3>
                <button type="button"
                    class="text-gray-400 cursor-pointer bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="add">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
                <form action="{{ route('mahasiswa.store') }}" method="POST" class="space-y-3">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-600">Nama
                            Mahasiswa</label>
                        <input type="text" name="name" id="name"
                            class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="nim" class="block mb-2 text-sm font-medium text-gray-600">Nim</label>
                        <input type="text" name="nim" id="nim"
                            class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="organisasi" class="block mb-2 text-sm font-medium text-gray-600">Organisasi</label>
                        <input type="text" name="organisasi" id="organisasi"
                            class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent">
                    </div>
                    {{-- <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
                        <input type="text" name="password" id="password"
                            class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent">
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
