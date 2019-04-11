@extends('layouts.app')

@section('content')
@php
$x = rand();
@endphp
<div class="container">
    <div class="row">

    	<div class="col-lg-2"></div>

    	<div class="col-lg-6 panel panel-primary">
    		<div class="panel-heading">Add New Account</div>
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

                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif
                <form method="post" action="{{ 
                route('add_account')}}">
                {{ csrf_field() }}
                <div class="form-group">
                   <label>Account Name</label>
                   <input type="text" name="name" class="form-control" required="">
               </div>

               <div class="form-group">
                   <label>Account Number</label>
                   <input type="text" name="num" value="{{ $x }}" readonly="" class="form-control">
               </div>

               <div class="form-group">
                   <label>Customer Email</label>
                   <input type="email" name="email" class="form-control">
               </div>

               <div class="form-group">
                   <label>Phone Number</label>
                   <input type="text" name="phone" class="form-control" required="">
               </div>

               <div class="form-group">
                   <label>BVN</label>
                   <input type="text" name="bvn" class="form-control" required="">
               </div>

               <div class="form-group">
                   <label>Date of Birth</label>
                   <input type="date" name="dob" class="form-control">
               </div>

               <div class="form-group">
                   <label>Account type</label>
                   <select name="type" class="form-control">
                      <option>Select</option>
                      <option>Savings</option>
                      <option>Current</option>
                  </select>
              </div>

              <input type="submit" name="submit" class="btn btn-primary">

          </form>
      </div>
  </div>


</div>
</div>
@endsection
