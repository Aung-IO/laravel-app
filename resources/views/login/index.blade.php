<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center my-3">Login Form</h3>
                <div class="card p-4 my-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                <form
                method="post"
                action="/login"
                >
                @csrf
                  
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" type="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('email')
                      <p class="text-danger my-2">{{$message}}</p>
                      @enderror

                      
                          
                      
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                        
                        @error('password')
                      <p class="text-danger my-2">{{$message}}</p>
                      @enderror
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                </div>
            </div>


        </div>


    </div>

</x-layout>