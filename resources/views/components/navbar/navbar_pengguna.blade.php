<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('image/logo/polindra.png') }}" class="h-10 me-3" alt="Logo Polindra" />
            <div class="flex flex-col hidden md:block">
                <p class="text-2xl font-semibold">Tracking</p>
                <p class="text-m">Peminjaman Barang</p>
            </div>
        </a>
        <div class="flex items-center md:order-2 gap-3">
            @if (Auth::guard('ormawa')->check())
                <div>
                    <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification"
                        class="me-4 relative inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400"
                        type="button" data-dropdown-placement="bottom">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25q0-.075.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2" />
                        </svg>
                        <div
                            class="absolute block w-5 h-5 bg-red-500 border-2 border-white rounded-full -top-0.5 start-2.5 dark:border-gray-900">
                            <p class="text-white text-xs">
                                {{ $dataKeranjang->count() ?? 0 }}
                            </p>
                        </div>
                    </button>

                    <!-- Dropdown keranjang -->
                    <div id="dropdownNotification"
                        class="z-20 hidden w-64 max-w-xs bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700"
                        aria-labelledby="dropdownNotificationButton">
                        <div
                            class="block px-4 py-2 border-b border font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                            Keranjang
                        </div>
                        <div class="divide-y divide-gray-100 dark:divide-gray-700">
                            <div class="divide-y divide-gray-100 dark:divide-gray-700">
                                @if ($dataKeranjang->isNotEmpty())
                                    @foreach ($dataKeranjang as $item)
                                        <div class="flex items-center px-4 py-3">
                                            <div class="flex-1">
                                                <h4 class="text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ $item->barang->nama_barang }}</h4>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">Jumlah:
                                                    {{ $item->jumlah }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="px-4 py-3 text-sm text-gray-500 dark:text-gray-400">Keranjang Anda kosong.
                                    </p>
                                @endif
                            </div>
                        </div>

                        <a href="{{ route('keranjang') }}"
                            class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                            <div class="inline-flex items-center">
                                <svg class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                    <path
                                        d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                </svg>
                                Lihat Semua
                            </div>
                        </a>
                    </div>
                </div>
            @endif

            @if (Auth::guard('ormawa')->check())
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full"
                        src="https://ui-avatars.com/api/?name={{ urlencode(auth('ormawa')->user()->name) }}&background=random&color=fff"
                        alt="user photo">
                </button>

                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base w-44 list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span
                            class="block text-sm text-gray-900 dark:text-white">{{ Auth::guard('ormawa')->user()->name }}</span>
                        <span
                            class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->organisasi ?? '-' }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        {{-- <li>
                        <a href=""
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                    </li> --}}
                        <li>
                            <a href="{{ route('ormawa.index') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Keluar
                            </a>
                        </li>
                    </ul>
                </div>
            @endif

            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('beranda') }}"
                        class="block py-2 px-3 rounded md:border-0 md:p-0 {{ Route::is('beranda') ? 'text-blue-500' : '' }}"
                        aria-current="page">Beranda</a>
                </li>
                <li class="relative">
                    <button id="dropdownNavbarLink" data-dropdown-toggle="informasiDropdown"
                        class="flex items-center justify-between w-full py-2 px-3 rounded md:border-0 md:p-0 focus:outline-none
                        {{ request()->is('informasi/*') ? 'text-blue-500' : '' }}">
                        Informasi dan Layanan
                        <svg class="w-2.5 h-2.5 ms-2.5 transition-transform duration-300"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="informasiDropdown"
                        class="hidden absolute z-10 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-64 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownNavbarLink">
                            <li>
                                <a href="{{ route('tracking') }}"
                                    class="block px-4 py-2 hover:bg-blue-100 dark:hover:bg-blue-600 dark:hover:text-white
                                    {{ request()->routeIs('tracking') ? 'text-blue-500 font-semibold' : '' }}">
                                    Tracking
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pengembalian') }}"
                                    class="block px-4 py-2 hover:bg-blue-100 dark:hover:bg-blue-600 dark:hover:text-white
                                    {{ request()->routeIs('pengembalian') ? 'text-blue-500 font-semibold' : '' }}">
                                    Pengembalian
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('riwayat') }}"
                        class="block py-2 px-3 rounded md:border-0 md:p-0 {{ Route::is('riwayat') ? 'text-blue-500' : '' }}"
                        aria-current="page">Riwayat</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
