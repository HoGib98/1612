@extends('notes.layout')

@section('content')

	<div class="row">
        <div class="col-lg-12">
            <h1 class="text-center">Page Notes</h1>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('Notes.create') }}"> Add Student</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

	<div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
		<table class="table table-striped|table-dark|table-bordered|table-borderless|table-hover|table-sm">
		  <caption>List of users</caption>
		  <thead class="thead-dark|thead-light">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">First</th>
		      <th scope="col">First</th>
		      <th scope="col">Last</th>
		      <th scope="col">Handle</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($notes as $note)
		  	<tr>
		  	  <td>{{ ++$i }}</td>
		      <th>{{ $note->address }}</th>
		      <td>{{ $note->age }}</td>
		      <td>{{ $note->leve }}</td>
		      <td>{{ $note->user_id }}</td>
		      <td>
	                <form action="{{ route('Notes.destroy',$note->id) }}" method="POST">

	                    <a class="btn btn-info" href="{{ route('Notes.show',$note->id) }}">Show</a>
	                    <a class="btn btn-primary" href="{{ route('Notes.edit',$note->id) }}">Edit</a>

	                    @csrf
	                    @method('DELETE')
	                    <button type="submit" class="btn btn-danger">Delete</button>
	                </form>
		      </td>
		    </tr>
		  	@endforeach
		  </tbody>
		</table>

		{!! $notes->links() !!}
	</div>
@endsection