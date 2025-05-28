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

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                });
            </script>
        @endif

        <div class="space-y-4 rounded-lg mt-14">
            <div class="p-4 bg-white rounded-lg shadow-lg flex justify-between items-center">
                <p class="text-lg font-semibold">Laporan</p>
                <a href="{{ route('laporan.export') }}"
                    class="flex bg-green-500 text-white px-2 py-2 rounded hover:bg-green-600">
                    <i class="fa-solid fa-file-pdf mr-1"></i>
                </a>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Unit Kerja</th>
                            <th scope="col" class="px-6 py-3">Nama Kegiatan</th>
                            <th scope="col" class="px-6 py-3">Hari atau Tanggal</th>
                            <th scope="col" class="px-6 py-3">Waktu Mulai</th>
                            <th scope="col" class="px-6 py-3">Waktu Selesai</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $mahasiswa_id => $data)
                            <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4">{{ $data->first()->permohonan->unit_kerja }}</td>
                                <td class="px-6 py-4">{{ $data->first()->permohonan->nama_kegiatan }}</td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($data->first()->permohonan->hari_atau_tanggal)->translatedFormat('l, d F Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($data->first()->permohonan->waktu_mulai)->format('H:i') }} WIB
                                </td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($data->first()->permohonan->waktu_selesai)->format('H:i') }}
                                    WIB
                                </td>
                                <td class="flex items-center gap-2 px-6 py-4">
                                    <button type="button" data-modal-target="permohonan{{ $mahasiswa_id }}"
                                        data-modal-toggle="permohonan{{ $mahasiswa_id }}"
                                        class="flex items-center px-2 py-2 text-sm text-white bg-yellow-400 rounded">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    @include('components.modal.laporan', [
                                        'data' => $data,
                                    ])
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
        </div>
@endsection