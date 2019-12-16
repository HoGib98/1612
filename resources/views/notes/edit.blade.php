@extends('notes.layout')   

@section('content')

	<div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Edit Student</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('Notes.index') }}"> Back</a>
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

    <form action="{{ route('Notes.update', $note->id) }}" method="POST">
        @csrf
        @method('PUT')

	    <div class="form-group col-md-6">
	      <label for="inputEmail4">Address</label>
	      <input type="text" name="address" class="form-control" id="inputEmail4" value="{{ $note->address }}">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="inputPassword4">Age</label>
	      <input type="text" name="age" class="form-control" id="inputPassword4"  value="{{ $note->age }}">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputAddress">Level</label>
	    <input type="text" name="leve"class="form-control" id="inputAddress"  value="{{ $note->leve }}">
	  </div>

	  <select name='user_id' class="custom-select">
	  	@foreach ($users as $user)
    		<option selected value="{{ $user->id }}">{{ $user->name }}</option>
	  	@endforeach
	  </select>
	  <button type="submit" class="btn-primary">Update</button>

    </form>
    
@endsection