@extends('Layouts.master')

@section('content')

<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-product-img">
                    <img src="{{asset($product->imagepath)}}" alt="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="single-product-content">
                    <h3>{{session('locale')=='ar'? $product->name : $product->nameEN}}</h3>
                    <p class="single-product-pricing">{{__('string.price')}} :  ${{$product->price}}<span>{{__('string.quantity')}} : {{$product->quantity}}</span></p>
                    <p>{{$product->description}}</p>
                    <p><strong>{{__('string.category')}} :  </strong>{{session('locale')=='ar'? $product->category->name : $product->category->nameEN}}</p>
                    <p><a href="/addproducttocart/{{$product->id}}" class="cart-btn"><i class="fas fa-shopping-cart"></i>{{__('string.addtocard')}} </a></p>


                    <h4>{{__('string.share')}} :</h4>
                    <ul class="product-share">
                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="testimonail-section mt-80 mb-150">
    <div class="container">
        <div class="section-title text-center">
     <div class="section-title">
            <h3><span class="orange-text">{{__('string.Related')}}  </span>{{__('string.Photo')}} </h>
        </div>
</div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="testimonial-sliders">
                    @foreach($product ->ProductPhoto as $item)
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img style="width:50%; height: 500px; max-width:none !important;border:black 5px; border-radius: 5px 100px !important;" src="{{asset($item->imagepath)}}" alt="">
                        </div>


                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>



<div class="container">

<div class="section-title text-center">
     <div class="section-title">
            <h3><span class="orange-text">{{__('string.Related2')}}  </span>{{__('string.products')}} </h>
        </div>
</div>
    <div class="row">

        @foreach($relatedProducts as $item)
        <div class="col-lg-4 col-md-6 text-center">
            <div class="single-product-item">
                <div class="product-image">
                    <a href="/single-product/{{$item->id}}">
                        <img style="max-height: 250px! important;min-height:250px"
                            src="{{asset($item->imagepath)}}"
                            alt=""></a>


                </div>
                <h3>{{session('locale')=='ar'? $item->name : $item->nameEN}}</h3>
                <p class="product-price"><span>{{$item->quantity}}</span> {{$item->price}}$ </p>


                <a href="/addproducttocart/{{$item->id}}" class="cart-btn">
                    <i class="fas fa-shopping-cart">
                    </i>  {{__('string.addtocard')}} </a>
            </div>
        </div>
        @endforeach

    </div>

</div>



@endsection