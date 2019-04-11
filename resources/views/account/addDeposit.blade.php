@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    	<div class="panel panel-primary col-sm-5">
    		<div class="panel-heading">Deposit</div>
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

    			<form method="post" action="{{ url('depositNow') }}">
    				{{ csrf_field() }}
    				@foreach($data as $row)
    				<div class="form-group">
    					<label>Account number</label>
    					<input type="text" name="acc_num" value="{{ $row->acc_no }}" readonly="" class="form-control">
    				</div>

    				<div class="form-group">
    					<label>Account name</label>
    					<input type="text" name="acc_name" value="{{ $row->name }}" readonly="" class="form-control">
    				</div>

    				<div class="form-group">
    					<label>Account Balance</label>
    					<input type="text" name="balance" value="{{ $row->balance }}" readonly="" class="form-control">
    				</div>

    				<div class="form-group">
    					<label>Deposit Amount</label>
    					<input type="text" name="amount" class="form-control">
    				</div>

    				<div class="form-group">
    					<label>Depositor Name</label>
    					<input type="text" name="name" class="form-control">
    				</div>

    				<div class="form-group">
    					<label>Depositor Phone</label>
    					<input type="text" name="phone" class="form-control">
    				</div>

    				<input type="submit" name="submit" value="Deposit" class="btn btn-primary">
    				@endforeach
    			</form>

    		</div>
    	</div>


    </div>
</div>
@endsection
