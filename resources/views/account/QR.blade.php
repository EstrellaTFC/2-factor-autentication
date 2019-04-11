@extends('layouts.app')

@section('content')
@php
$data = Session::get('data');
foreach($data as $row){
}
$x = mt_rand(100000, 999999);
@endphp
<div class="container">
	<div class="row">

		<div class="col-sm-5 panel panel-primary">
			<div class="panel-header">Continue transfer......</div>
			<div class="panel-body">
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div><br />
				@endif

				@if(Session::has('error'))
				<div class="alert alert-danger">
					{{ Session::get('error') }}
				</div>
				@endif

				<form method="post" action="/confirmtransfer">
					{{ csrf_field() }}


					<input type="hidden" name="acc_num" value="{{ $row['acc_num'] }}" readonly="" class="form-control">

					<input type="hidden" name="code1" value="{{ $x }}">

					<input type="hidden" name="acc_name" value="{{ $row['acc_name'] }}" readonly="" class="form-control">

					<input type="hidden" name="balance" value="{{ $row['balance'] }}" readonly="" class="form-control">


					<input type="hidden" name="amount" value="{{ $row['amount'] }}" class="form-control">


					<input type="hidden" name="name" readonly="" value="{{ $row['initiator'] }}" class="form-control">


					<input type="hidden" name="phone" value="{{ $row['phone'] }}" class="form-control">

					<div class="form-group">
						<label>Enter Token here</label>
						<input type="text" name="token" required="" class="form-control">
					</div>

					{!! QrCode::size(200)->generate($x) !!}

					<input type="submit" name="submit" value="confirm transfer" class="btn btn-primary">

				</form>



			</div>
		</div>

	</div>
</div>
@endsection
