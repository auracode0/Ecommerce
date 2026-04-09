@extends('Layouts.master')

@section('content')


        <div class="product-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3><span class="orange-text">{{__('string.add')}}</span> {{__('string.product')}}</h3>
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
                                    <input type="text" require style="width: 100%" placeholder="{{__('string.name')}}" name="name" id="name" value="{{old('name')}}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{$message}}

                                        @enderror
                                    </span>
                                </p>
                                <p style="display: flex;">
                                    <input type="number" require style="width: 50%" class="ml-4" placeholder="{{__('string.price')}}" name="price" id="price" value="{{old('price')}}">
                                    <span class="text-danger">
                                        @error('price')
                                            {{$message}}

                                        @enderror
                                    </span>
                                    <input type="number" require style="width: 50%" class="ml-2" placeholder="{{__('string.quantity')}}" name="quantity" id="quantity" value="{{old('quantity')}}">
                                    <span class="text-danger">
                                        @error('quantity')
                                            {{$message}}

                                        @enderror
                                    </span>
                                </p>
                                <p><textarea name="description" require id="description" cols="30" rows="10"
                                placeholder="{{__('string.description')}}" >
                                    {{old('description')}}
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
                                        <option value="{{$item->id}}">{{session('locale')=='ar'? $item->name : $item->nameEN}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('category_id')
                                            {{$message}}

                                        @enderror
                                    </span>

                                    </p>


                                    <p>
                                        <input type="file" class="form-control" name="imagepath" id="imagepath" placeholder="{{__('string.chose')}}">
                                    <span class="text-danger">
                                        @error('imagepath')
                                            {{$message}}

                                        @enderror
                                    </span>
                                    </p>
                                    

                                <p><input type="submit" value="{{__('string.save')}}"></p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>



@endsection