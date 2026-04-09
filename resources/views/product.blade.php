@extends('Layouts.master')


@section('content')




<div class="product-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">{{__('string.Our')}}</span> {{__('string.products')}}</h3>
					<p>{{__('string.d2')}}</p>
				</div>
			</div>
		</div>

		<div class="row">

			@foreach($products as $item)
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


					<a href="/addproducttocart/{{$item->id}}" class="cart-btn" >
						<i class="fas fa-shopping-cart">
						</i> {{__('string.addtocard')}}</a>

					@if(Auth::user()->role =='admin')
						<p class="mt-3">
							<a href="/removeproduct/{{$item->id}}" class="btn btn-danger" onclick="return confirm('هل انت متاكد من من حذف هذا المنتج؟؟')">
								<i class="fas fa-trash">
								</i> {{__('string.delete')}}</a>

							<a href="/editproduct/{{$item->id}}" class="btn btn-primary">
								<i class="fas fa-trash">
								</i> {{__('string.Edit')}}</a>
					    </p>
					@endif
					

				</div>
			</div>
			@endforeach

			<div style="text-align: center; margin:0px auto">
				{{$products->links()}}


			</div>


		</div>
	</div>
</div>


@endsection


<style>
	svg {
		height: 50px !important;
	}
</style>