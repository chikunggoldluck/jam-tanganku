@extends('layouts.template')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col mt-4">
			<h2>List Order</h2>
			<div>
				<a href="{{ route('admin.orders.create') }}" class="btn btn-primary">Tambah Produk</a>
			</div>
			<br />
			<div class="table-responsive">
				<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th>Harga Total</th>
							<th>Status</th>
							<th>Kode Pos</th>
							<th>Alamat Pengiriman</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $order)
						<tr>
							<td>{{ $order['total_price'] }}</td>
							<td>{{ $order['status'] }}</td>
							<td>{{ $order['zip_code'] }}</td>
							<td>{{ $order['shipping_address'] }}</td>
							<td>
							<a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary">Edit order</a>
							</td>
							<td>
								<form action="{{ route('admin.orders.destroy', $order->id)}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger" type="submit">Delete</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
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