@php
	$user = \Auth::User()->active;
	//echo $user;


if($user == 0)
{
	@endphp
<li><a href="{!! url('/home'); !!}">Dashboard</a></li>
<li><a href="{!! url('/addaccount'); !!}">Add Account</a></li>
<li><a href="{!! url('/allaccount'); !!}">View Customer(s)</a></li>
<li><a href="{!! url('/deposit'); !!}">Deposit</a></li>
<li><a href="{!! url('/withdraw'); !!}">withdraw</a></li>
@php
}
elseif($user == 2){
@endphp
<li><a href="{!! url('/transfer'); !!}">transfer</a></li>
@php
}
elseif($user == 1){
@endphp
	<meta http-equiv='refesh'  content="o;url='confirm'">

@php
}
@endphp


