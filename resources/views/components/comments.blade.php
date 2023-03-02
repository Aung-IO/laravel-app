@props(['comments', 'blog'])


<section class="container">

    <section>
        <div class="container">
            <div class="row">

                {{-- show comment --}}
                @if ($comments->count())
                <div class="col-sm-5 col-md-6 col-12 pb-4">
                    <div class="col-md-8  mx-auto">
                        <h5 class="my-3 text-secondary">Comments ({{ $comments->count() }})</h5>
                        @foreach ($comments as $comment)
                            <x-single-comment :comment="$comment" />
                        @endforeach
                    </div>
                    {{$comments->links()}}
                </div>
                @endif
               
                {{-- show comment --}}

                {{-- post comment --}}
                <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                    @if (auth()->check())
                        <form id="algin-form" action="{{ route('blogs.comments.store', $blog->slug) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <h4>Leave a comment</h4>

                                <textarea name="body" id="" cols="30" rows="5" class="form-control"
                                    placeholder="Comment Here..."></textarea>
                            </div>
                            <div class="form-inline">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="subscribe">
                                    Subscribe me to the newlettter
                                </label>
                            </div>
                          <x-error name="body"/>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary my-3">Post Comment</button>
                            </div>
                        </form>
                    @else
                        <p class="my-3">You must be <a href="/login" class="link-danger">logged in</a> to post a
                            comment</p>
                    @endif
                </div>
                {{-- post comment --}}
            </div>
        </div>
    </section>


</section>
