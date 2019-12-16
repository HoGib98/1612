@extends('userInfo.layout')   

@section('content')

	<div class="container">
        <div class="col-sm-12">
            <h2 class="text-center">Edit Student</h2>
        </div>
        <div class="col-sm-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('Uinfo.index') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('Uinfo.update', $Uinfo->id) }}" method="POST" class="col-sm-12">
        @csrf
        @method('PUT')

	    <div class="form-group">
	      <label for="inputEmail4">Address</label>
	      <input type="text" name="address" class="form-control" id="inputEmail4" value="{{ $Uinfo->content }}">
	    </div>

	  <select name='user_id' class="custom-select">
	  	@foreach ($users as $user)
    		<option selected value="{{ $user->id }}">{{ $user->name }}</option>
	  	@endforeach
	  </select>

	  <button type="submit" class="btn-primary">Update</button>

    </form>
    
@endsection