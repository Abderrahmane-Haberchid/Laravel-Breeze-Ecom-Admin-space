<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>

        <style>
            .product-card {
                display: flex;
                justify-content: space-between;
                padding: 20px;
                border: 0.5px solid #e2e8f0;
                border-radius: 8px;
                margin-bottom: 20px;
            }
            .left-card {
                flex: 1;
                margin-right: 20px;
            }
            .right-card {
                flex: 0 0 200px;
            }
            .right-card img {
                max-width: 100%;
                height: auto;
            }
            .updateBtn {
                width: 100%;
                padding: 10px;
                background-color: #4299e1;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                margin-bottom: 15px;
            }
            .updateBtn:hover {
                background-color: #2b6cb0;
            }
            .deleteBtn {
                width: 100%;
                padding: 10px;
                background-color: orangered;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .deleteBtn:hover {
                background-color: red;
            }
            .product-card h3 {
                margin-bottom: 10px;
            }
            .product-card p {
                margin-bottom: 10px;
            }
            .product-card span {
                font-size: 1.2em;
                font-weight: bold;
            }
        </style>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("All Products") }} ({{ $products->count() }})
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                @forelse ($products as $product)

                    <div class="product-card">
                        <div class="left-card">
                            <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $product->description }}</p>
                            <span class="text-gray-900 dark:text-gray-100 font-bold">{{ $product->price }} MAD</span>
                        </div>

                        <div class="right-card">
                            <a href="{{ route('updateProduct', ['id' => $product->id]) }}" class="updateBtn">Update</a>
                            <a href="" class="deleteBtn">Delete</a>

                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 dark:text-gray-400">No products available.</p>
                @endforelse    
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
