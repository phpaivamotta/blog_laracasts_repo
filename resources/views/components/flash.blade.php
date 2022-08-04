@if (session()->has('success'))
    <div x-data="{ show: true }" 
         x-init="setTimeout(() => show = false, 4000)" 
         x-show="show"
         class="fixed bg-blue-500 text-white py-7 px-10 lg:py-2 lg:px-4 rounded-3xl lg:rounded-xl bottom-3 right-3 text-6xl lg:text-sm">
        <p> {{ session('success') }} </p>
    </div>
@endif
