
@extends('layouts.master')
@section('title','Add Posts')
@section('content')
            
                    <div class="container-fluid px-4">
                     <div class="card mt-4">
                     @if ($errors->any())
                     <div class="alert alert-danger">
                     @foreach ($errors->all() as $error)
                     <div>{{$errors}}</div>
                     @endforeach
                      </div>
                      @endif
                     <div class="card-header">
                     <h4>Add Posts
                     <a href="{{ url('admin/add-post') }}"class="btn btn-primary float-end">Add Posts</a>
                     </h4>
                     </div>
                     <div class="card-body">
                     <form action="{{ url('admin/add-post') }}" method="POST">
                        @csrf

                     <div class="mb-3">

                     <lable for="">Category </lable>
                     <select name="category_id" class="form-control">
                        @foreach ($category as $cateitem)

                        <option value="{{ $cateitem->id }}">{{$cateitem->name}} </option>


                        @endforeach

                     </select>
                     </div>

                     <div class="mb-3">
                     <lable for="">Post Name </lable>
                     <input type="text" name="name" class="form-control" />
                     </div>

                     <div class="mb-3">
                     <lable for="">Slug </lable>
                     <input type="text" name="slug" class="form-control" />
                     </div>

                     <div class="mb-3">
                     <lable for="">Description </lable>
                     <textarea name="description" class="form-control" id="mysummernote" rows="4"></textarea>
                     </div>

                     <div class="mb-3">
                     <lable for="">YouTube Iflame Link </lable>
                     <input type="text" name="yt_iframe" class="form-control" />
                     </div>

                     <h4> SEO Tags</h4>
                     <div class="mb-3">
                     <lable for="">Meta Title </lable>
                     <input type="text" name="meta_title" class="form-control" />
                     </div>

                     <div class="mb-3">
                     <lable for="">Meta Description </lable>
                     <textarea name="meta_description" class="form-control" rows="3"></textarea>
                     </div>

                     <div class="mb-3">
                     <lable for="">Meta Keyword </lable>
                     <textarea name="meta_keyword" class="form-control" rows="3"></textarea>
                     </div>

                     <h4> Status</h4>
                     <div class="row">
                     <div class="col-md-4">
                     <div class="mb-3">
                     <lable for="">Status </lable>
                     <input type="checkbox" name="status" />
                     </div>
                     </div>
                     
                     <div class="col-md-8">
                     <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Save Post</button>



                     </div>
                     </div>
                     </div>




                     </form>
                    
                    </div>
                 </div>

         </div>
     @endsection