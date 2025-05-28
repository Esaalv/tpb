<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="/" class="flex items-center">
                    <img src="{{ asset('image/logo/polindra.png') }}" class="h-10 me-3" alt="Logo Polindra" />
                    <div class="flex flex-col">
                        <p class="text-2xl font-semibold">Tracking</p>
                        <p class="text-m">Peminjaman Barang</p>
                    </div>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=random&color=fff"
                                alt="User photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown-user">
                        <div class="px-4 py-3">
                            <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
                            <p class="text-sm text-gray-500">NIP {{ Auth::user()->nip }}</p>
                        </div>
                        <ul class="py-1">
                            <li>
                                <a href="{{ route('logout.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Keluar
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 mt-3 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 rounded-lg hover:bg-blue-200 hover:text-white {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : '' }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center justify-between w-full p-2 rounded-lg hover:bg-blue-200 hover:text-white {{ Request::is('pengguna/*') ? 'bg-blue-500 text-white' : '' }}"
                    aria-expanded="false" data-collapse-toggle="dropdown-pengguna">
                    <span class="flex items-center">
                        <i class="fa-solid fa-users me-2"></i> Pengguna
                    </span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <ul id="dropdown-pengguna" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin') }}"
                            class="flex gap-1 items-center w-full p-2 pl-11 rounded-lg hover:bg-blue-200 hover:text-white {{ request()->routeIs('admin') ? 'bg-blue-500 text-white' : '' }}">
                            <i class="fa-solid fa-user"></i>
                            <span class="ms-3">Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa') }}"
                            class="flex gap-1 items-center w-full p-2 pl-11 rounded-lg hover:bg-blue-200 hover:text-white {{ request()->routeIs('mahasiswa') ? 'bg-blue-500 text-white' : '' }}">
                            <i class="fa-solid fa-user"></i>
                            <span class="ms-3">Mahasiswa</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button"
                    class="flex items-center justify-between w-full p-2 rounded-lg hover:bg-blue-200 hover:text-white {{ Request::is('kelola-barang/*') ? 'bg-blue-500 text-white' : '' }}"
                    aria-expanded="false" data-collapse-toggle="dropdown-barang">
                    <span class="flex items-center">
                        <i class="fa-solid fa-folder me-2"></i> Kelola Barang
                    </span>
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <ul id="dropdown-barang" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('barang') }}"
                            class="flex gap-1 items-center w-full p-2 pl-11 rounded-lg hover:bg-blue-200 hover:text-white {{ request()->routeIs('barang') ? 'bg-blue-500 text-white' : '' }}">
                            <i class="fa-solid fa-folder-open"></i> Data Barang
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kategori') }}"
                            class="flex gap-1 items-center w-full p-2 pl-11 rounded-lg hover:bg-blue-200 hover:text-white {{ request()->routeIs('kategori') ? 'bg-blue-500 text-white' : '' }}">
                            <i class="fa-solid fa-folder-open"></i> Data Kategori
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('satuan') }}"
                            class="flex gap-1 items-center w-full p-2 pl-11 rounded-lg hover:bg-gray-100 {{ request()->routeIs('satuan') ? 'bg-gray-300' : '' }}">
                            <i class="fa-solid fa-folder-open"></i> Data Satuan
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('verifikasi-permohonan') }}"
                    class="flex items-center p-2 rounded-lg hover:bg-blue-200 hover:text-white {{ request()->routeIs('verifikasi-permohonan') ? 'bg-blue-500 text-white' : '' }}">
                    <i class="fa-solid fa-clipboard-check"></i>
                    <span class="ms-3">Verifikasi Permohonan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('verifikasi-pengembalian') }}"
                    class="flex items-center p-2 rounded-lg hover:bg-blue-200 hover:text-white {{ request()->routeIs('verifikasi-pengembalian') ? 'bg-blue-500 text-white' : '' }}">
                    <i class="fa-solid fa-clipboard-check"></i>
                    <span class="ms-3">Verifikasi Pengembalian</span>
                </a>
            </li>
            <li>
                <a href="{{ route('laporan') }}"
                    class="flex items-center p-2 rounded-lg hover:bg-blue-200 hover:text-white
                    {{ request()->routeIs('laporan') ? 'bg-blue-500 text-white' : '' }}">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span class="ms-3">Laporan</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
