@extends('Layouts.master')

@section('content')


<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">{{__('string.Customer')}}</span> {{__('string.opinions')}}</h3>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">

                <div id="form_status"></div>
                <div class="contact-form">
                    <form method="POST" action="/storereview" style="text-align: right;" dir="rtl">
                    @csrf    
                    <p>
                            <input type="text" require class="ml-2"  placeholder="{{__('string.name')}}" name="name" id="name" value="{{old('name')}}">
                            <span class="text-danger">
                                @error('name')
                                    {{$message}}

                                @enderror
                            </span>

                             <input type="email" require  class="ml-2" placeholder="{{__('string.EmailAddress')}}" name="email" id="email" value="{{old('email')}}">
                            <span class="text-danger">
                                @error('email')
                                    {{$message}}

                                @enderror
                            </span>
                        </p>
                        <p style="display: flex;">
                            <input type="text" require style="width: 50%" class="ml-2" placeholder=" {{__('string.Phone')}}" name="phone" id="phone" value="{{old('phone')}}">
                            <span class="text-danger">
                                @error('phone')
                                    {{$message}}

                                @enderror
                            </span>

                             <input type="text" require style="width: 50%" class="ml-2" placeholder=" {{__('string.subject')}}" name="subject" id="subject" value="{{old('subject')}}">
                            <span class="text-danger">
                                @error('subject')
                                    {{$message}}

                                @enderror
                            </span>
                           
                        </p>

                        <p><textarea name="message"  id="message" cols="30" rows="10"
                         placeholder="{{__('string.message')}}" >
                            {{old('message')}}
                        </textarea>
                    </p>
                    <span class="text-danger">
                                @error('message')
                                    {{$message}}

                                @enderror
                            </span>

                            
                            

                        <p><input type="submit" value="{{__('string.save')}}"></p>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>







<div class="testimonail-section mt-80 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
                        @foreach($reviews as $item)
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>{{$item->name}}<span>{{$item->subject}}</span></h3>
								<p class="testimonial-body">
									{{$item->message}}
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
                        @endforeach
						
						
					</div>
				</div>
			</div>
		</div>
	</div>

	



@endsection


