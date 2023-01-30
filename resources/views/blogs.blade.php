<x-layout>



    <x-slot:title>
        <title>Home</title>
    </x-slot:title>



    @foreach($blogs as $blog)
    <div class="container">
        <h1>
            <a href="blogs/{{$blog->slug}}">{{$blog->title}} </a>
        </h1>

        <p>Category - <a href="/categories/{{$blog->category->name}}">{{$blog->category->name}}</a></p>

        <p>{{$blog->body}}</p>

        <p>Uploaded by User</p>
       
        published at - {{$blog->created_at->diffForHumans()}}
    </div>
    @endforeach

</x-layout>