<link rel="stylesheet" href="{{asset('datatables.min.css')}}">

<script src="{{asset('jquery.min.js')}}"></script>
<script src="{{asset('datatables.min.js')}}"></script>



@extends('Layouts.master')
@section('content')

<div class="container mt-5 mb-5">

    <div class="text-right">
        <a href="/addproduct" class="btn btn-primary mt-5 mb-5 w-25">
            <i class="fas fa-plus">
            </i>{{__('string.add')}}  {{__('string.product')}}</a>
    </div>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>id</th>
                <th> {{__('string.name')}}</th>
                <th>{{__('string.price')}} </th>
                <th>{{__('string.quantity')}}</th>
                <th>{{__('string.image')}}</th>
                <th>{{__('string.action')}}</th>

            </tr>
        </thead>
        <tbody>
            @foreach($products as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{session('locale')=='ar'? $item->name : $item->nameEN}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->quantity}}</td>
                <td> <img src='{{$item->imagepath}}' width="100" height="100" /></td>

                <td>
                    <a href="/editproduct/{{$item->id}}" class="btn btn-primary">
                        <i class="fas fa-pen">
                        </i>  {{__('string.Edit')}}</a>

                    <a href="/removeproduct/{{$item->id}}" class="btn btn-danger" onclick="return confirm('هل انت متاكد من من حذف هذا المنتج؟؟')">
                        <i class="fas fa-trash">
                        </i>  {{__('string.delete')}}</a>

                    <a href="/AddProductImages/{{$item->id}}" class="btn btn-dark">
                        <i class="fas fa-image">
                        </i>  {{__('string.addimage')}}</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection


<script>
    $(document).ready(function() {
        let table = new DataTable('#myTable');
    });
</script>