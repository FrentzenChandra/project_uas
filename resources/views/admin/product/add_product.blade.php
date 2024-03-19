@extends('layouts.admin')

@section('content')

<div class="container">
  @if(Route::getFacadeRoot()->current()->uri() == 'product/add')
    <form action="{{url('/product/added')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
  @elseif(Route::getFacadeRoot()->current()->uri() == 'product/edit/{id}')
    <form action="{{url('/product/edited')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
  @endif
     <div class="row ">
      <div class="col">
       <select value="{{isset($product) ? $product[0]->category_id : ""}}" name="category_id"  class="form-control bg-dark text-white" required>
        <option value="">Select Category</option>
        @forEach($category as $data)
        <option value="{{$data->id}}">{{$data->name}}</option>
        @endforeach
       </select>
       <div class="invalid-feedback">
        Please select a Category
       </div>
     </div>
     </div>
     <div class="row mt-5">
      <div class="col ">
        <label for="name" class="form-label fs-6">Name</label>
        <input value="{{isset($product) ? $product[0]->name : ""}}" type="text"  id="name" class="form-control bg-dark text-white" name="name" placeholder="Input Name Here" required >
        <div class="valid-feedback">
         Looks good!
        </div>
        <div class="invalid-feedback">
         Please enter a valid name.
        </div>
      </div>
      
      <div class="col">
        <label for="slug" class="form-label fs-6">Slug</label>
        <input value="{{isset($product) ? $product[0]->slug : ""}}" type="text" class="form-control bg-dark text-white" id="slug" name="slug" placeholder="Input Slug Here">
      </div>
     </div>
     
     <div class="row mt-4">
      <div class="col form-floating">
       <textarea class="form-control bg-dark text-white" placeholder="Leave a comment here" id="description" name="description" style="height: 140px">{{isset($product) ? $product[0]->description : ""}}</textarea>
       <label  for="description" class="ps-3 fs-6">Description</label>
      </div>
     </div>

     <div class="row mt-4">
      <div class="col form-floating">
       <textarea class="form-control bg-dark text-white" placeholder="Leave a comment here" id="small_description" name="small_description" style="height: 100px">{{isset($product) ? $product[0]->small_description : ""}}</textarea>
       <label  for="small_description" class="ps-3 fs-6">Small description</label>
      </div>
     </div>

     <div class="row mt-5">
      <div class="col">
        <label class="fs-6" for="qty">Quantity / Stock</label>
        <input type="number" value="{{isset($product) ? $product[0]->qty : ""}}" name="qty" id="qty" min="1" class="form-control bg-dark text-white " placeholder="Input Quantity Here">
      </div>
      <div class="col">
        <label class="fs-6" for="tax_percentage">Tax Percentage</label>
        <input type="number" value="{{isset($product) ? $product[0]->tax_percentage : ""}}" name="tax_percentage" id="tax_percentage"  class="form-control bg-dark text-white " min="1" placeholder="Input Tax Percentage Here">
      </div>
      <div class="col">
        <label class="fs-6" for="original_price">Original Price</label>
        <input type="number" value="{{isset($product) ? $product[0]->original_price : ""}}" name="original_price" id="original_price" class="form-control bg-dark text-white " min="1" placeholder="Input Original Price Here">
      </div>
      <div class="col">
        <label class="fs-6" for="selling_price">Selling Price</label>
        <input type="number" value="{{isset($product) ? $product[0]->selling_price : ""}}" name="selling_price" id="selling_price" class="form-control bg-dark text-white " min="1" placeholder="Input Selling Price Here">
      </div>
     </div>


     <div class="row mt-5">
      <div class="col ">
       <select value="{{isset($product) ? $product[0]->status : ""}}" class="m-auto form-select bg-dark text-white" id="floatingSelect" aria-label="Floating label select example" style="max-width: 15em" name="status">
        <option value=""  >Select Status</option>
        <option value="Active">Active</option>
        <option value="Not Active">Not Active</option>
       </select>
      </div>
      <div class="col ">
       <select value="{{isset($product) ? $product[0]->trending : ""}}" class="m-auto form-select bg-dark text-white" id="floatingSelect" aria-label="Floating label select example" style="max-width: 15em" name="trending">
        <option value="">Select Trending</option>
        <option value="yes">Yes</option>
        <option value="Popular">No</option>
       </select>
      </div>
     </div>

     <div class="row mt-5">
      <div class="col">
        <label for="meta_title" class="form-label fs-6">Meta Title</label>
        <input value="{{isset($product) ? $product[0]->meta_title : ""}}" type="text" class="form-control bg-dark text-white" id="meta_title" name="meta_title" placeholder="Input Meta Title Here">
      </div>
     </div>
     <div class="row mt-4">
      <div class="col">
        <label for="meta_descrip" class="form-label fs-6">Meta Description</label>
        <input value="{{isset($product) ? $product[0]->meta_descrip : ""}}" type="text" class="form-control bg-dark text-white" id="meta_descrip" name="meta_descrip" placeholder="Input Meta Description Here">
      </div>
     </div>
     <div class="row mt-4">
      <div class="col">
        <label for="meta_keywords" class="form-label fs-6">Meta Keywords</label>
        <input value="{{isset($product) ? $product[0]->meta_keywords : ""}}" type="text" class="form-control bg-dark text-white" id="meta_keywords" name="meta_keywords" placeholder="Input Meta Keywords Here">
      </div>
     </div>
     <div class="row mt-4">
      <div class="col">
        <label for="choose-file" class="form-label fs-6">Image</label>
        <input  type="file" class="form-control bg-dark text-white" id="choose-file" name="img" placeholder="Input Meta Description Here">
        @if(isset($product))
        <div id="img-preview" style="display: block;">
         <img src="{{isset($product) ? $product[0]->img : ""}}" alt="" id="image-preview2" >
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
     <input type="hidden" name="id" value="{{isset($product) ? $product[0]->id : ""}}">
     @csrf
    </form>

</div>


@endsection