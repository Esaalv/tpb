@extends('pages.ormawa.index')
@section('content')
    <div class="max-w-screen-xl p-4 mx-auto space-y-3">
        <div class="mt-5 bg-white p-4 text-blue-500 rounded-xl text-2xl font-semibold text-center shadow-lg">
            Riwayat
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Mahasiswa</th>
                        <th scope="col" class="px-6 py-3">Unit kerja</th>
                        <th scope="col" class="px-6 py-3">Nama Kegiatan</th>
                        <th scope="col" class="px-6 py-3">Nama Barang</th>
                        <th scope="col" class="px-6 py-3">Waktu Mulai</th>
                        <th scope="col" class="px-6 py-3">Waktu Selesai</th>
                        <th scope="col" class="px-6 py-3">Status Permohonan</th>
                        <th scope="col" class="px-6 py-3">Status Pengembalian</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dataPermohonan as $index => $item)
                        <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $item->pengembalian->mahasiswa->name }}</td>
                            <td class="px-6 py-4">{{ $item->unit_kerja }}</td>
                            <td class="px-6 py-4">{{ $item->nama_kegiatan }}</td>
                            <td class="px-6 py-4">{{ $item->barang->nama_barang ?? 'Tidak tersedia' }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }} WIB</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($item->waktu_selesai)->format('H:i') }} WIB</td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 rounded text-xs font-semibold
                                    {{ $item->status == 'Disetujui'
                                        ? 'bg-green-100 text-green-800'
                                        : ($item->status == 'Ditolak'
                                            ? 'bg-red-100 text-red-800'
                                            : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-2 py-1 rounded text-xs font-semibold
                                    {{ $item->pengembalian->status_pengembalian == 'Diterima'
                                        ? 'bg-green-100 text-green-800'
                                        : ($item->pengembalian->status_pengembalian == 'Menunggu'
                                            ? 'bg-yellow-100 text-yellow-800'
                                            : 'bg-gray-100 text-gray-800') }}">
                                    {{ $item->pengembalian->status_pengembalian ?? 'Belum dikembalikan' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada riwayat permohonan dan pengembalian.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
