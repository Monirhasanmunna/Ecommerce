@extends('admin.layouts.main')

@section('css')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Product Add</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form id="demo-form2" method="POST" action="{{route('admin.product.update',[$product->id])}}" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Title<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" name="title" required="required" value="{{$product->title}}" class="form-control ">
                            </div>
                        </div>

                        {{-- <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Title<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <textarea id="summernote" name="editordata"></textarea>
                            </div>
                        </div> --}}

                        <div class=" item form-group">
                            <label class="col-form-label label-align col-md-3 col-sm-3 ">Select Category</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="select2_group form-control" name="category">
                                    <option disabled selected hidden >Choose one</option>
                                    @foreach ($categories as $category)
                                        <optgroup label="{{$category->name}}">
                                            @foreach ($category->subcategories as $subcategory)
                                                <option {{$product->sub_category_id == $subcategory->id ? 'selected' : ''}} value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                            @endforeach

                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Price<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" id="first-name" name="price" value="{{$product->price}}" required="required" class="form-control ">
                            </div>
                        </div>
                          
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Image<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="file" id="first-name" name="image" required="required" >
                            </div>
                        </div>

                        <br>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                            </label>
                            <div class="checkbox" class="col-md-6 col-sm-6">
                                <label class="">
                                    <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" {{$product->status == 1 ? 'checked' : ''}} name="status" value="1" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Status
                                </label>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script>
        $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>
@endsection