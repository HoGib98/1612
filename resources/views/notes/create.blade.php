@extends('layouts.app')
 <form 	method='post' action='{{ route('Notes.store') }}'>

   	  @csrf

	  <div class="form-row">
	    <div class="form-group col-md-6">
	      <label for="inputEmail4">Address</label>
	      <input type="text" name="address" class="form-control" id="inputEmail4" value="{{ old('address') }}">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="inputPassword4">Age</label>
	      <input type="text" name="age" class="form-control" id="inputPassword4"  value="{{ old('age') }}">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="inputAddress">Level</label>
	    <input type="text" name="leve"class="form-control" id="inputAddress"  value="{{ old('leve') }}">
	  </div>

	  <select name='user_id' class="custom-select">
	  	@foreach ($users as $user)
    		<option selected value="{{ $user->id }}">{{ $user->name }}</option>
	  	@endforeach
	  </select>

	  <button type="submit" class="btn-primary">Create</button>
	</form>
	
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif

{{-- {{ dd($errors->any()) }} --}}