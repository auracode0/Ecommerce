@extends('Layouts.master')

@section('content')



<div class="cart-section mt-150 mb-150">
	<div class="container">
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
					<div class="cart-buttons">

						<a href="/completeorder" class="boxed-btn black">{{__('string.checkout')}}</a>
						<a href="/previousorder" class="boxed-btn black">{{__('string.previousrequests')}}</a>

					</div>
				</div>


			</div>
		</div>
	</div>
</div>




@endsection