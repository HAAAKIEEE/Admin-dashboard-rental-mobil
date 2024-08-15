<x-layout>
    <div class="p-4 sm:ml-64 ">
        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="jenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jenis</label>
                    <input type="text" id="jenis" name="jenis"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Honda Jazz" required />
                </div>
                <div>
                    <label for="plat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plat</label>
                    <input type="text" id="plat" name="plat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="DA 3333 VS" required />
                </div>
                <div>
                    <label for="penumpang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Penumpang</label>
                    <input type="number" id="penumpang" name="penumpang"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="5 Orang" min="0" max="10" required />
                </div>
                <div>
                    <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Rp.</label>
                    <input type="number" id="harga" name="harga"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Rp. 150.000" min="0" max="9999999" required />
                </div>
            </div>
            <div class="">
                <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Gambar Mobil</label>
                <input type="file" id="file" name="file"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Honda Jazz" required onchange="previewImage(event)"/>
                <!-- Add an img element to display the preview -->
                <img id="imagePreview" style="display:none; margin-top: 10px; max-width: 100%;" />
            </div>
            
            <button type="submit"  style="margin: 12px;" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>
</x-layout>
