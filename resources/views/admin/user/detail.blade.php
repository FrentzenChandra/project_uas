@extends('layouts.admin')

@section('content')
<div class="row mb-4">
 <div class="col">
    <label for="">Role</label>
    <div class="border rounded p-2">{{$user[0]->akses}}</div>
 </div>
 <div class="col">
    <label for="">First Name</label>
    <div class="border rounded p-2">{{$user[0]->name}}</div>
 </div>
 <div class="col">
    <label for="">Last Name</label>
    <div class="border rounded p-2">{{$user[0]->last_name}}</div>
 </div>
</div>

<div class="row mb-4">
 <div class="col">
    <label for="">Email</label>
    <div class="border rounded p-2">{{$user[0]->email}}</div>
 </div>
 <div class="col">
    <label for="">Phone</label>
    <div class="border rounded p-2">{{$user[0]->phone}}</div>
 </div>
 <div class="col">
    <label for="">Address 1</label>
    <div class="border rounded p-2">{{$user[0]->address1}}</div>
 </div>
</div>

<div class="row mb-4">
 <div class="col">
    <label for="">Address 2</label>
    <div class="border rounded p-2">{{$user[0]->address2}}</div>
 </div>
 <div class="col">
    <label for="">City</label>
    <div class="border rounded p-2">{{$user[0]->city}}</div>
 </div>
 <div class="col">
    <label for="">State</label>
    <div class="border rounded p-2">{{$user[0]->state}}</div>
 </div>
</div>

<div class="row">
 <div class="col">
    <label for="">Country</label>
    <div class="border rounded p-2">{{$user[0]->country}}</div>
 </div>
 <div class="col"></div>
 <div class="col"></div>
</div>
@endsection