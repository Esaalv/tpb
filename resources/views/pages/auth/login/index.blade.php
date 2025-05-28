<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/f74deb4653.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
</head>

<body class="bg-blue-200">
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    {{-- @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
            });
        </script>
    @endif --}}
    <div class="flex flex-col items-center justify-center h-screen p-4 space-y-4">
        <div class="flex justify-center">
            <img src="{{ asset('image/logo/polindra.png') }}" alt="" class="object-cover w-full h-24">
        </div>
        <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-xl">
            <h1 class="mb-6 text-3xl font-bold text-center">Login</h1>
            <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <input type="text" name="name" id="name" placeholder="Name"
                        class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-transparent" />
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-transparent" />
                </div>
                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Masuk</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
