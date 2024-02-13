<x-app-web-layout>
    <x-slot name="title">
        My Laravel App
</x-slot>
    
    <div class="py-5"> 
    {{-- top and bottom padding --}}
        <div class="container">
            <h4>Welcome to index page</h4>
</div>
</div>

<x-slot:scripts>
    <script>
        alert('this is my script area');
        </script>
</x-slot>
</x-app-web-layout>

