@extends('notes.layout')

@section('content')

    <div class="row">
	  <div class="form-row">
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

	  <div class="form-group">
	    <label for="inputAddress">User id</label>
	    <input type="text" name="leve"class="form-control" id="inputAddress"  value="{{ $note->user_id }}">
	  </div>
    </div>

@endsection