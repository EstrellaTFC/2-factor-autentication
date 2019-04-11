
@if(\Auth::User()->active == 1)
<li><a href="{!! url('/home'); !!}">Dashboard</a></li>
<li><a href="{!! url('/addaccount'); !!}">Add Account</a></li>
<li><a href="{!! url('/allaccount'); !!}">View Customer(s)</a></li>
<li><a href="{!! url('/deposit'); !!}">Deposit</a></li>
<li><a href="{!! url('/withdraw'); !!}">withdraw</a></li>

@elseif(\Auth::User()->active == 2)

<li><a href="{!! url('/transfer'); !!}">transfer</a></li>

@endif
hhhhh
