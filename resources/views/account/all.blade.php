@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

<div class="col-sm-11">
		<table class="table table-hover table-striped table-bordered" border="1">
			<tr>
				<th>Name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Account number</th>
				<th>BVN</th>
				<th>DOB</th>
				<th>Account Type</th>
				<th>Account Balance</th>
			</tr>
			@foreach($data as $row)
			<tr>
				<td>{{ $row->name }}</td>
				<td>{{ $row->phone }}</td>
				<td>{{ $row->email }}</td>
				<td>{{ $row->acc_no }}</td>
				<td>{{ $row->bvn }}</td>
				<td>{{ $row->dob }}</td>
				<td>{{ $row->type }}</td>
				<td>{{ $row->balance }}</td>
			</tr>
			@endforeach
			
		</table>
		{{ $data->links() }}
		</div>


	</div>
</div>
@endsection
