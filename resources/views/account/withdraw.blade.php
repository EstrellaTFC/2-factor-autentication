@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    	<div class="panel panel-primary col-sm-5">
    		<div class="panel-heading">Withdrawal</div>
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

                @if(Session::has('success'))
                <div class="alert alert-success">
                	{{ Session::get('success') }}
                </div>
                @endif
    			<form method="post" action="{{ url('withdrawal') }}">
    				{{ csrf_field() }}
    				<div class="form-group">
    					<label>Account number</label>
    					<input type="text" name="acc_num" class="form-control">
    				</div>
    				<input type="submit" name="submit" value="continue" class="btn btn-danger">
    			</form>
    		</div>
    	</div>


    </div>
</div>
@endsection
