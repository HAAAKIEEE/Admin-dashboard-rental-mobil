<x-layout>
    <div class="p-4 sm:ml-64 ">
        @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
        @endif

        @if ($errors->any())
        <script>
            @foreach ($errors->all() as $error)
                alert('{{ $error }}');
            @endforeach
        </script>
        @endif

        <a href="/create"
            class="mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
            Kendaraan</a>
        
        <table class=" mt-5 drop-shadow-xl w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
            <thead class="font-medium text-xs text-blue-500 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 ">
                        Jenis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Plat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penumpang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga/jam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        gambar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kendaraans as $kendaraan)
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$kendaraan->jenis}}
                    </th>
                    <td class="px-6 py-4">
                        {{$kendaraan->plat}}
                    </td>
                    <td class="px-6 py-4">
                        {{$kendaraan->penumpang}}
                    </td>
                    <td class="px-6 py-4">
                        Rp. {{$kendaraan->harga}}
                    </td>
                    <td class="px-6 py-4">
                        <img src="{{ Storage::url($kendaraan->file) }}" alt="{{ $kendaraan->file }}"
                        style="width: 100px; height: auto;">
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                        <form action="/{{$kendaraan->id}}" method="POST" onsubmit="return confirmDelete()">
                            @method('delete')
                            @csrf
                            <button type="submit"
                                class="text-blue-500 bg-white border-2 border-blue-600 focus:outline-none hover:bg-blue-600 hover:text-white focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                Hapus
                            </button>
                        </form>
                        <a href="/{{$kendaraan->id}}/edit"
                            class="text-blue-500 bg-white border-2 border-blue-600 focus:outline-none hover:bg-blue-600 hover:text-white focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                            Edit
                        </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    

    
    <script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data ini?');
    }
    </script>
</x-layout>
