@extends('userInfo.layout')

@section('content')

    <div class="col-sm-12">

		<div class="card text-center">
			  <div class="card-header">
			    Show Userinfo
			  </div>

			  <div class="card-body">
			    <h5 class="card-title">{{ $Uinfo->content }}</h5>
			  </div>

			  <div class="card-footer text-muted">
			    {{ $Uinfo->user_id }}
			  </div>

		</div>
    </div>

@endsection