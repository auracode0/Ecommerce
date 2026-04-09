@extends('Layouts.master')

@section('content')

<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card single-accordion">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        {{__('string.BillingAddress')}}
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <form action="/storeorder" id="store-order" name="store-order" method="post">
                                            @csrf
                                            <p><input type="text" require id="name" name="name" placeholder="{{__('string.name')}}"></p>
                                            <p><input type="email" require id="email" name="email" placeholder="{{__('string.EmailAddress')}}"></p>
                                            <p><input type="text" require id="address" name="address"  placeholder="{{__('string.address')}}"></p>
                                            <p><input type="tel" require id="phone" name="phone"  placeholder="{{__('string.Phone')}}"></p>
                                            <p><textarea name="note" id="note" cols="30" rows="10" placeholder="{{__('string.SaySomething')}}"></textarea></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card single-accordion">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        {{__('string.CardDetails')}} 
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="card-details">
                                        <div class="cart-section mt-150 mb-150">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-8 col-md-12">
                                                        <div class="cart-table-wrap">
                                                            <table class="cart-table">
                                                                <thead class="cart-table-head">
                                                                    <tr class="table-head-row">
                                                                        <th class="product-remove"></th>
                                                                        <th class="product-image">{{__('string.ProductImage')}} </th>
                                                                        <th class="product-name">{{__('string.name')}}</th>
                                                                        <th class="product-price">{{__('string.price')}}</th>
                                                                        <th class="product-quantity">{{__('string.quantity')}}</th>
                                                                        <th class="product-total">{{__('string.Total')}}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($cartProducts as $item)

                                                                    <tr class="table-body-row">
                                                                        <td class="product-remove"><a href="/deletecartitem/{{$item->id}}"><i class="far fa-window-close"></i></a></td>
                                                                        <td class="product-image"><img src="{{asset($item->Product->imagepath)}}" alt=""></td>
                                                                        <td class="product-name">
                                                                            <a href="/single-product/{{$item->product->id}}">
                                                                                {{session('locale')=='ar'? $item->Product->name : $item->Product->nameEN}}</a>
                                                                        </td>
                                                                        <td class="product-price">{{$item->Product->price}}</td>
                                                                        <td class="product-quantity">{{$item->quantity}}</td>
                                                                        <td class="product-total">{{number_format($item->quantity*$item->Product->price,2)}}$</td>
                                                                    </tr>

                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="total-section">
                                                            <table class="total-table">
                                                                <thead class="total-table-head">
                                                                    <tr class="table-total-row">
                                                                        <th>{{__('string.Total')}}</th>
                                                                        <th>{{__('string.price')}}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>


                                                                    <tr class="total-data">
                                                                        <td><strong>{{__('string.Total')}}: </strong></td>
                                                                        <td>
                                                                            {{$cartProducts->sum(function ($item) {
									return $item->Product->price*$item->quantity;
									}) }}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



            <div class="col-lg-12 mt-5">
                <div class="cart-buttons">
						<a href="#"
                        onclick="event.preventDefault(); document.getElementById('store-order').submit();"
                         class="boxed-btn">{{__('string.placeorder')}}</a>
					</div>
            </div>


        </div>
    </div>
</div>



@endsection