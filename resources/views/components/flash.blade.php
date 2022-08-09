@if (session()->has('success'))
    <div x-data="{ show: true }" 
         x-init="setTimeout(() => show = false, 3500)" 
         x-show="show"
         class="fixed bg-blue-500 text-white py-2 px-4 rounded-md lg:rounded-xl bottom-3 right-3 text-lg lg:text-sm">
        <p> {{ session('success') }} </p>
    </div>
@endif
