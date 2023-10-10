@extends('layouts.master')
@section('content')
<div class="row mt-2">
    <div class=" col-md-2 col-sm-12 "></div>
    <div class="card  col-md-8 col-sm-12">
      <h1 class="card-title text-center">Import CSV</h1>
      <div class="card-body">
        <form class="row g-3" action="{{route('import')}}" method="POST" enctype="multipart/form-data">
            @csrf
         
          <div class="col-md-8">
            <label for="file" class="form-label">Upload CSV</label>
            <input type="file" class="form-control  @error('file') is-invalid @enderror" accept="image/*" name="file" id="file" accept="application/vnd.ms-excel" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
            @error('file')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="col-md-4">
            <img src="default.png" id="preview" class="img img-thumbnail" width="100">
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Import</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection