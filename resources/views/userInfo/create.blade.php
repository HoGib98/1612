@extends('userInfo.layout')
 <form 	method='post' action='{{ route('Uinfo.store') }}'>

   	  @csrf

	  <div class="form-row">
	    <div class="form-group col-md-6">
	      <label for="inputEmail4">Content</label>
	      <input type="text" name="content" class="form-control"  value="{{ old('content') }}">
	    </div>

	  <select name='user_id' class="custom-select">
	  	@foreach ($users as $user)
    		<option selected value="{{ $user->id }}">{{ $user->name }}</option>
	  	@endforeach
	  </select>

	  <button type="submit" class="btn-primary">Create</button>
	</form>
	
	@if ($errors->any())
    <div class="alert alert-danger col-sm-12">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif

{{-- {{ dd($errors->any()) }} --}}