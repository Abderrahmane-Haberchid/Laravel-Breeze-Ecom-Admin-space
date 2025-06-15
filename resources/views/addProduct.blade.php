<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Add New Products!") }}
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-4 rounded mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('storeProduct') }}" method="POST" class="w-full max-w-lg">
                        @csrf
                        <div class="mb-4">
                            <label for="productName" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Product Name:</label>
                            <input type="text" id="productName" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-black leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="productName" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Description:</label>
                            <textarea type="text" id="productName" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-black dark:text-black leading-tight focus:outline-none focus:shadow-outline" required>
                            </textarea>
                        </div>

                        <div class="mb-4">
                            <label for="productName" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Category:</label>
                            <select type="text" id="productName" name="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-black leading-tight focus:outline-none focus:shadow-outline" required>
                                <option>Select Category</option>
                                <option value="electronics">Electronics</option>
                                <option value="clothing">Clothing</option>
                                <option value="home">Home</option>
                                <option value="books">Books</option>
                                <option value="toys">Toys</option>
                                <option value="sports">Sports</option>
                                <option value="beauty">Beauty</option>
                                <option value="automotive">Automotive</option>
                                <option value="health">Health</option>
                                <option value="garden">Garden</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="productName" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Price:</label>
                            <input type="text" id="productName" name="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-black leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <input type="submit" 
                                    value="Add Product"
                                   class="bg-white-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    
</x-app-layout>
