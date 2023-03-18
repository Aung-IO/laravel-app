<x-layout>
    <h3 class="text-center">Blog Create Form</h3>
    <form class="col-md-8 mx-auto p-3" method="POST" action="/admin/blogs">
      @csrf
      
      <div class="form-group mx-auto p-2">
        <label for="exampleInputEmail1">Title</label>
        <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
      <x-error name="title"/> 
      </div>
        
      <div class="form-group mx-auto p-2">
        <label for="exampleInputEmail1">Slug</label>
        <input name="slug" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter slug">
        <x-error name="slug"/>
      </div>
      <div class="form-group mx-auto p-2">
        <label for="exampleInputEmail1">Body</label>
       <textarea name="body" id="" cols="30" rows="5" class="form-control" placeholder="Enter body"></textarea>
       <x-error name="body"/>
      </div>
      <div class="form-group mx-auto p-2">
        <label for="exampleInputEmail1">Category</label>
       <select class="form-control" name="category_id">
        @foreach ($categories as $category)
            
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
       </select>
       <x-error name="category_id"/>
      </div>
        
    
        
        <button type="submit" class="btn btn-primary my-3">Submit</button>
      </form>
</x-layout>