@props(['blog'])
<div class="card">
            <img
              src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <h3 class="card-title">{{$blog->title}}</h3>
              <p class="fs-6 text-secondary">
                {{$blog->user->name}}
                <span> {{$blog->created_at->diffForHumans()}}</span>
              </p>
              <div class="tags my-3">
                <span class="badge bg-primary">{{$blog->category->name}}</span>
                <!-- <span class="badge bg-secondary">Css</span>
                <span class="badge bg-success">Php</span>
                <span class="badge bg-danger">Javascript</span>
                <span class="badge bg-warning text-dark">Frontend</span> -->
              </div>
              <p class="card-text">
                Some quick example text to build on the Blog title and make up
                the bulk of the card's content.
              </p>
              <a href="/blogs/{{$blog->slug}}" class="btn btn-primary">Read More</a>
            </div>
          </div>