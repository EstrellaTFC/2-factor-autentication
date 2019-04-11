

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="container col-sm-12">
	<div class="col-sm-4"></div>
	<div class="col-sm-4 panel panel-primary">
			<div class="alert alert-success">
				A 10 digit code have been sent to your mail, check your mail to confirm the code and activate your account
			</div>

			<form method="post" action="{{ url('/confirm_form') }}">

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

				{{ csrf_field() }}
				<input type="hidden" name="email" value="{{ \Auth::User()->email }}">

				<div class="form-group">
					<label>Enter code here</label>
					<input type="text" name="code" class="form-control">
				</div>

				<input type="submit" name="submit" value="verify" class="btn btn-success">

			</form>

		</div>
</div>
