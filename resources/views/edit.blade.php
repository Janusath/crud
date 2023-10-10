@extends('layouts.master')
@section('content')
<div class="row mt-2">
    <div class=" col-md-2 col-sm-12 "></div>
    <div class="card  col-md-8 col-sm-12">
      <h1 class="card-title text-center">Edit User</h1>
      <div class="card-body">
        <form class="row g-3" action="{{route('update',$u->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="col-md-6">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="username" placeholder="Enter Your Username" value="{{$u->name}}">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
       
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="inputEmail4" placeholder="Enter Your Email" value="{{$u->email}}">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          
          <div class="col-md-8">
            <label for="Profile" class="form-label">Profile</label>
            <input type="file" class="form-control  @error('profile') is-invalid @enderror" accept="image/*" name="profile" id="Profile" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
            @error('profile')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="col-md-4">
            <img src="{{url('/')}}/{{!empty($u->profile)?$u->profile:''}}" id="preview" class="img img-thumbnail" width="100">
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection