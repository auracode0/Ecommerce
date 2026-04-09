@extends('Layouts.master')

@section('content')

<div class="container mt-5 mb-5" style="text-align: center;">


    <form action="/storeproductimage" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mt-5 mb-5">
            <input type="hidden"  style="width: 100%" name="product_id" id="product_id" value="{{$productid}}">


            <div class="col-5 pt-3">
                <input type="file" class="form-control"  name="imagepath" id="imagepath">
            </div>
            <div class="col-3">
                <input type="submit" class="w-80" value="{{__('string.save')}}">
            </div>
               

                <span class="text-danger">
                    @error('imagepath')
                    {{$message}}

                    @enderror
                </span>
        </div>
    </form>




    <div class="row">
        @foreach($productImages as $item)
        <div class="col-4">
            <img class="m-2" src="{{asset($item->imagepath)}}" width="334" height="300" alt="">
            <a href="/removeproductphoto/{{$item->id}}" class="btn btn-danger" onclick="return confirm('{{__('string.deleteshor')}}')">
                <i class="fas fa-trash">
                </i> {{__('string.delete')}}</a>
        </div>
        @endforeach

    </div>


</div>



@endsection