@extends('layouts.admin')

@section('content')

<div class="container" >
  @if(Route::getFacadeRoot()->current()->uri() == 'category/add')
    <form action="{{url('/category/added')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
  @elseif(Route::getFacadeRoot()->current()->uri() == 'category/edit/{id}')
    <form action="{{url('/category/edited')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
  @endif
     <div class="row">
      <div class="col ">
        <label for="name" class="form-label">Name</label>
        <input value="{{isset($category) ? $category[0]->name : ""}}" type="text"  id="name" class="form-control bg-dark text-white" name="name" placeholder="Input Name Here" required >
        <div class="valid-feedback">
         Looks good!
        </div>
        <div class="invalid-feedback">
         Please enter a valid name.
        </div>

      </div>
      <div class="col">
        <label for="slug" class="form-label">Slug</label>
        <input value="{{isset($category) ? $category[0]->slug : ""}}" type="text" class="form-control bg-dark text-white" id="slug" name="slug" placeholder="Input Slug Here">
      </div>
     </div>
     
     <div class="row mt-4">
      <div class="col form-floating">
       <textarea class="form-control bg-dark text-white" placeholder="Leave a comment here" id="description" name="description" style="height: 140px">{{isset($category) ? $category[0]->description : ""}}</textarea>
       <label  for="description" class="ps-3 fs-6">Description</label>
      </div>
     </div>

     <div class="row mt-4">
      <div class="col ">
       <select value="{{isset($category) ? $category[0]->status : ""}}" class="m-auto form-select bg-dark text-white" id="floatingSelect" aria-label="Floating label select example" style="max-width: 15em" name="status">
        <option value=""  >Select Status</option>
        <option value="Active">Active</option>
        <option value="Not Active">Not Active</option>
       </select>
      </div>
      <div class="col">
       <select value="{{isset($category) ? $category[0]->popularity : ""}}" class="m-auto form-select bg-dark text-white" id="floatingSelect" aria-label="Floating label select example" style="max-width: 15em" name="popular">
        <option value="">Select Popularity</option>
        <option value="Very Popular">Very Popular</option>
        <option value="Popular">Popular</option>
       </select>
      </div>
     </div>
     <div class="row mt-4">
      <div class="col">
        <label for="meta_title" class="form-label">Meta Title</label>
        <input value="{{isset($category) ? $category[0]->meta_title : ""}}" type="text" class="form-control bg-dark text-white" id="meta_title" name="meta_title" placeholder="Input Meta Title Here">
      </div>
     </div>
     <div class="row mt-4">
      <div class="col">
        <label for="meta_descrip" class="form-label">Meta Description</label>
        <input value="{{isset($category) ? $category[0]->meta_descrip : ""}}" type="text" class="form-control bg-dark text-white" id="meta_descrip" name="meta_descrip" placeholder="Input Meta Description Here">
      </div>
     </div>
     <div class="row mt-4">
      <div class="col">
        <label for="meta_keywords" class="form-label">Meta Keywords</label>
        <input value="{{isset($category) ? $category[0]->meta_keywords : ""}}" type="text" class="form-control bg-dark text-white" id="meta_keywords" name="meta_keywords" placeholder="Input Meta Keywords Here">
      </div>
     </div>
     <div class="row mt-4">
      <div class="col">
        <label for="choose-file" class="form-label">Image</label>
        <input  type="file" class="form-control bg-dark text-white" id="choose-file" name="img" placeholder="Input Meta Description Here">
        @if(isset($category))
        <div id="img-preview" style="display: block;">
         <img src="{{isset($category) ? $category[0]->img : ""}}" alt="" id="image-preview2" >
        </div>
        @else
        <div id="img-preview">
         <img src="" alt="" id="image-preview2">
        </div>
        @endif
        
      </div>
     </div>
     <div class="row mt-4 pb-5">
      <button class="btn btn-dark  m-auto w-20 ">Submit</button>
     </div>
     <input type="hidden" name="id" value="{{isset($category) ? $category[0]->id : ""}}">
     @csrf
    </form>

</div>

<script>
const chooseFile = document.getElementById("choose-file");
const imgPreview = document.getElementById("img-preview");

function getImgData() {
  const files = chooseFile.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      imgPreview2 = document.querySelector('#image-preview2');
      imgPreview.style.display = "block";
      imgPreview2.src = this.result;
    });    
  }
}

chooseFile.addEventListener("change", function () {
  getImgData();
});


  // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
@endsection