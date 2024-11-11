<!-- resources/views/home.blade.php -->
<x-layout>
    <x-slot:title>Home</x-slot:title>

    <!-- Content -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Medicine Card Dummy -->
        <div class="bg-white rounded-lg shadow-md h-full p-4">
            <img src="{{ asset('images/paracetamol.png') }}" alt="Parasetamol" class="h-48 w-full object-cover rounded-t-lg">
            <div class="p-4">
                <h3 class="text-lg font-semibold">Parasetamol</h3>
                <p class="text-gray-500">Rp 10,000</p>

                <!-- Quantity Controls (Without JavaScript) -->
                <div class="flex items-center mt-4">
                    <label for="quantity" class="sr-only">Quantity</label>
                    <input id="quantity" type="number" value="1" min="1" step="1" class="w-20 text-center border rounded" aria-label="Quantity">
                </div>

                <!-- Buy Button -->
                <button class="bg-blue-500 text-white mt-4 px-4 py-2 rounded w-full">Buy</button>
            </div>
        </div>
        
    </div>
</x-layout>
