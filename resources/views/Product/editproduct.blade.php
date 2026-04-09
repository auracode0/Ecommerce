@extends('Layouts.master')

@section('content')

<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">{{__('string.Edit')}}</span> {{__('string.product')}}</h3>
                    <img src="data:image/svg+xml;base64,{{base64_encode($qrcode)}}" width="100" class="m-5" alt="QR Code">
                    <div class="m-5">
                    {!!$barcode!!}

                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">

                <div id="form_status"></div>
                <div class="contact-form">
                    <form method="POST" enctype="multipart/form-data" action="/storeproduct" style="text-align: right;" dir="rtl">
                        @csrf
                        <p>
                            <input type="hidden" require style="width: 100%" placeholder="" name="id" id="id"
                                value="{{$product->id}}">

                        
                            <input type="text" require style="width: 100%" placeholder="{{__('string.name')}}" name="name" id="name"
                                value="{{session('locale')=='ar'? $product->name : $product->nameEN}}">
                            <span class="text-danger">
                                @error('name')
                                {{$message}}

                                @enderror
                            </span>
                        </p>
                        <p style="display: flex;">
                            <input type="number" require style="width: 50%" class="ml-4" placeholder="{{__('string.price')}}" name="price" id="price"
                                value="{{$product->price}}">
                            <span class="text-danger">
                                @error('price')
                                {{$message}}

                                @enderror
                            </span>
                            <input type="number" require style="width: 50%" class="ml-2" placeholder="{{__('string.quantity')}}" name="quantity" id="quantity"
                                value="{{$product->quantity}}">
                            <span class="text-danger">
                                @error('quantity')
                                {{$message}}

                                @enderror
                            </span>
                        </p>
                        <p><textarea name="description" require id="description" cols="30" rows="10"
                                placeholder="الوصف">
                            {{__('string.description')}}
                            </textarea>
                        </p>
                        <span class="text-danger">
                            @error('description')
                            {{$message}}

                            @enderror
                        </span>

                        <p>
                            <select class="form-control" style="width: 40%" class="mr-4" name="category_id" id="category_id">
                                @foreach($allcategories as $item)
                                @if($item ->id==$product->category_id)
                                <option value="{{$item->id}}" selected>{{session('locale')=='ar'? $item->name : $item->nameEN}}</option>
                                @else
                                <option value="{{$item->id}}">{{session('locale')=='ar'? $item->name : $item->nameEN}}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('category_id')
                            {{$message}}

                            @enderror

                        </p>

                        <input type="file" class="form-control" name="imagepath" id="imagepath">
                            <span class="text-danger">
                                @error('imagepath')
                                    {{$message}}

                                @enderror
                            </span>
                        <p>
                            <img src="{{asset($product->imagepath)}}" width="200" height="200" />
                            
                        </p>


                        <p><input type="submit" value="{{__('string.save')}}"></p>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection