@extends('Layouts.master')


@section('content')




<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            

                            @foreach ($categories as $item)
                            <li data-filter="._{{$item->id}}">{{session('locale')=='ar'? $item->name : $item->nameEN}}</li>
                            @endforeach
                            <li class="active" data-filter="*">{{__('string.all')}}</li>

                        </ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists">
                @foreach ($products as $item)
				<div class="col-lg-4 col-md-6 text-center _{{$item->category_id }}">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/single-product/{{$item->id}}">
                                <img style="max-height: 25opx;min-height: 250px" src="{{$item->imagepath}}" alt=""></a>
						</div>
						<h3>{{session('locale')=='ar'? $item->name : $item->nameEN}}</h3>
						<p class="product-price"><span>{{__('string.price')}}:</span> {{$item->price}} </p>
                        <p class="product-price"><span>{{__('string.quantity')}}:</span> {{$item->quantity}} </p>
						<a href="/addproducttocart/{{$item->id}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> {{__('string.addtocard')}}</a>

						@if(Auth::user()->role =='admin'|| Auth::user()->role =='salesman')
							<a href="/removeproduct/{{$item->id}}" class="btn btn-danger" onclick="return confirm('{{__('string.deleteshor')}}')">
								<i class="fas fa-trash">
							</i> {{__('string.delete')}}</a>

							<a href="/editproduct/{{$item->id}}" class="btn btn-primary">
								<i class="fas fa-trash">
							</i> {{__('string.Edit')}}</a>
						@endif

					</div>
				</div>
                @endforeach
				
			</div>

			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">{{__('string.Prev')}}</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">{{__('string.next')}}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->
@endsection