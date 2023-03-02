<x-layout>

    <!-- single blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top" alt="..." />
                <h3 class="my-3">{{ $blog->title }}</h3>
                <div> Author -
                    <a href="/?author={{ $blog->user->name }}">{{ $blog->user->name }}</a>
                </div>
                <div> <a href="/categories/{{ $blog->category->slug }}">
                        <span class="badge bg-primary mt-3">category - {{ $blog->category->name }}</span></a>
                </div>
                <div class="text-secondary"> Uploaded - {{ $blog->created_at->diffForHumans() }}</div>
                @auth

                    <div class="text-secondary">
                        <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
                        @csrf
                          @if (auth()->user()->isSubscribed($blog))
                              
                          <button type="submit" class="btn btn-outline-warning">unsubscribe</button>
                          @else
                          <button type="submit" class="btn btn-outline-info">subscribe</button>
                          
                          @endif
                        </form>
                    </div>
                @endauth



                <p class="lh-md mt-3">
                    {{ $blog->body }}
                </p>
            </div>
        </div>
    </div>


    <x-comments :comments="$blog->comments()->paginate(2)" :blog="$blog" />



    <x-blogs_you_may_like_section :randomBlogs="$randomBlogs" />
</x-layout>
