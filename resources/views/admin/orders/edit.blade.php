@extends('layouts.template')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h3 class="mt-4">Edit order</h3 class="mt-4">

           <br/>
            @if(count($errors))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
            @endif
            <br/>

            <form method="POST" action="{{ route('admin.orders.update', $order->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group mb-3">
                    <input type="hidden" name="id" value="{{ $order->id }}">
                </div>
                <div class="form-group">
                    <label>Harga Total</label>
                    <input type="string" name="total_price" class="form-control" value="{{$order->total_price}}">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input type="string" name="status" class="form-control" value="{{$order->status}}">
                </div>
                <div class="form-group">
                    <label>Kode Pos</label>
                    <input type="integer" name="zip_code" class="form-control" value="{{$order->zip_code}}">
                </div>
                <div class="form-group">
                    <label>Alamat Pengiriman</label>
                    <textarea name="shipping_address" id="ckview" value="{{$order->shipping_address}}"></textarea>
                </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>

<!-- Style -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
<script>tinymce.init({ selector:'#ckview' });</script>
@endsection