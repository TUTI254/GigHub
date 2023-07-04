@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(()=> show = false, 2000)" x-show="show" class="fixed top-1 left-1/2 transform -translate-x-1/2 bg-laravel text-gray-500 px-48 py-2 rounded-lg">
        <p>{{ session('message') }}</p>
    </div>
@endif
