<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('products.index') }}" @click.prevent="loadPage($el.href)" class="text-gray-400 hover:text-navy transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h2 class="font-bold text-xl text-navy leading-tight">
                {{ __('Create New Product') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl border border-gray-100">
                <div class="p-8">
                    <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="col-span-2">
                                <x-input-label for="name" :value="__('Product Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="category_id" :value="__('Category')" />
                                <select id="category_id" name="category_id" class="mt-1 block w-full bg-gray-50/50 border-gray-200 focus:border-brick focus:ring-brick rounded-xl shadow-sm transition-all duration-200 text-sm">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                            </div>

                            <div>
                                <x-input-label for="supplier_id" :value="__('Supplier')" />
                                <select id="supplier_id" name="supplier_id" class="mt-1 block w-full bg-gray-50/50 border-gray-200 focus:border-brick focus:ring-brick rounded-xl shadow-sm transition-all duration-200 text-sm">
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('supplier_id')" />
                            </div>

                            <div>
                                <x-input-label for="price" :value="__('Price (₱)')" />
                                <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>

                            <div>
                                <x-input-label for="stock_quantity" :value="__('Stock Quantity')" />
                                <x-text-input id="stock_quantity" name="stock_quantity" type="number" class="mt-1 block w-full" required />
                                <x-input-error class="mt-2" :messages="$errors->get('stock_quantity')" />
                            </div>

                            <div class="col-span-2">
                                <x-input-label for="image_path" :value="__('Image Filename (from public/assets/images/)')" />
                                <x-text-input id="image_path" name="image_path" type="text" class="mt-1 block w-full" placeholder="e.g., assets/images/Matcha.jfif" />
                                <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
                            </div>

                            <div class="col-span-2">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" class="mt-1 block w-full bg-gray-50/50 border-gray-200 focus:border-brick focus:ring-brick rounded-xl shadow-sm transition-all duration-200 text-sm" rows="3"></textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 gap-4">
                            <a href="{{ route('products.index') }}" @click.prevent="loadPage($el.href)" class="text-sm font-bold text-gray-400 hover:text-navy transition-colors">
                                Cancel
                            </a>
                            <x-primary-button>
                                {{ __('Save Product') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
