<x-layout>

@if (session('success'))
<div class="alert alert-info" role="alert">
  {{session('success')}}
  @endif
</div>
    <x-hero />
    <x-blogs-section :blogs="$blogs" />
   
</x-layout>