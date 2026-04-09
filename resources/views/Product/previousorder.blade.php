@extends('Layouts.master')

@section('content')

<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">

                    @foreach($orders as $item)
                        <div class="card single-accordion">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        {{__('string.OrderNumber')}}{{$item->id}}
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <form>
                                            
                                            <p><input type="tel" value=" {{__('string.orderon')}}:
                                            {{$item->created_at}}" require id="phone" name="phone" placeholder="Phone"></p>
                                            <p><input type="text" value="{{$item->name}}" require id="name" name="name" placeholder="{{__('string.name')}}"></p>
                                            <p><input type="email" value="{{$item->email}}" require id="email" name="email" placeholder="{{__('string.EmailAddress')}}"></p>
                                            <p><input type="text" value="{{$item->address}}" require id="address" name="address" placeholder="{{__('string.address')}}"></p>
                                            <p><input type="tel" value="{{$item->phone}}" require id="phone" name="phone" placeholder="{{__('string.Phone')}}"></p>
                                            <p><textarea name="note"  id="note" cols="30" rows="10" placeholder="{{__('string.SaySomething')}}">{{$item->note}}</textarea></p>
                                        </form>

                                        <div class="row">
                                                    <div class="col-lg-8 col-md-12">
                                                        <div class="cart-table-wrap">
                                                            <table class="cart-table">
                                                                <thead class="cart-table-head">
                                                                    <tr class="table-head-row">
                                                                        <th class="product-remove"></th>
                                                                        <th class="product-image">{{__('string.ProductImage')}}</th>
                                                                        <th class="product-name">{{__('string.name')}}</th>
                                                                        <th class="product-price">{{__('string.price')}}</th>
                                                                        <th class="product-quantity">{{__('string.quantity')}}</th>
                                                                        <th class="product-total">{{__('string.Total')}}</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($item->orderDetails as $detail)

                                                                    <tr class="table-body-row">
                                                                        <td class="product-image"><img src="{{asset($detail->Product->imagepath)}}" alt=""></td>
                                                                        <td class="product-name">
                                                                            <a href="/single-product/{{$detail->product->id}}">
                                                                            {{session('locale')=='ar'? $detail->Product->name : $detail->Product->nameEN}}</a>
                                                                        </td>
                                                                        <td class="product-price">{{$detail->Product->price}}</td>
                                                                        <td class="product-quantity">{{$detail->quantity}}</td>
                                                                        <td class="product-total">{{number_format($detail->quantity*$detail->Product->price,2)}}$</td>
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
                                                                            {{$item->orderdetails->sum(function ($x) {
                                                                                return $x->Product->price*$x->quantity;
                                                                                }) }}
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="cart-buttons"></div>

                                                        </div>


                                                    </div>
                                                </div>
                                    </div>

                                         
                                </div>
                            </div>
                        </div>
                    @endforeach


                    </div>
                </div>

            </div>
        </div>



        


    </div>
</div>
</div>



@endsection