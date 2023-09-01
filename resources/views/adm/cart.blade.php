@extends('layouts.adm')

@section('title', 'Users Page')

@section('content')



    <table class="table table-light">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th scope="col">Time</th>
            <th>#</th>
        </tr>
        </thead>
        <tbody>
        @for($i=1; $i<=count($itemsInCart); $i++)
        <tr>
            <th scope="row">{{$i}}</th>
            <td>{{$itemsInCart[$i-1]->name}}</td>
            <td>{{$itemsInCart[$i-1]->phone}}</td>
            <td>{{$itemsInCart[$i-1]->email}}</td>
            <td>{{$itemsInCart[$i-1]->text}}</td>
            <td>{{$itemsInCart[$i-1]->created_at}}</td>
            <td>
                <form action="{{route('adm.cart.confirm', $itemsInCart[$i-1]->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-success" type="submit">Confirm</button>
                </form>
            </td>
        </tr>
        @endfor
        </tbody>
    </table>
@endsection
