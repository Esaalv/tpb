@extends('pages.admin.index')
@section('content')
    <div class="p-4 sm:ml-64 mt-5">
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                });
            </script>
        @endif

        <div class="space-y-4 rounded-lg mt-14">
            <div class="p-4 bg-white rounded-lg shadow-lg flex justify-between items-center">
                <p class="text-lg font-semibold">Satuan</p>
                <button type="button" data-modal-target="add" data-modal-toggle="add"
                    class="px-2 py-1 bg-blue-200 rounded-lg cursor-pointer">
                    <i class="fa-solid fa-plus"></i>
                </button>
                @include('components.modal.tambah-satuan')
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Satuan</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($satuan as $data)
                            <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                                <td class="px-6 py-4">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $data->nama_satuan }}
                                </td>
                                <td class="px-6 py-4 flex items-center gap-2">
                                    {{-- Button Modal Edit --}}
                                    <button type="button" data-modal-target="edit{{ $data->id }}"
                                        data-modal-toggle="edit{{ $data->id }}"
                                        class="px-2 py-1 bg-yellow-500 rounded-lg text-white cursor-pointer">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    {{-- End Button Modal Edit --}}

                                    {{-- Modal Edit --}}
                                    @include('components.modal.edit-satuan', ['data' => $data])
                                    {{-- End Edit --}}

                                    <form id="delete-form-{{ $data->id }}"
                                        action="{{ route('satuan.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $data->id }})"
                                            class="px-2 py-1 bg-red-500 rounded-lg text-white cursor-pointer">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{ $satuan->links() }}
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endsection
