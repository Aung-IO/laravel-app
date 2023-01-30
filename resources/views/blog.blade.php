<x-layout>

  <x-slot:title>
    <title>{{$blog->title}}</title>
  </x-slot:title>



  <article class="container">

    <h1>{{$blog->title}}</h1>
    <p>{{$blog->body}}</p>
    <a href="/">back to home</a>
  </article>

</x-layout>