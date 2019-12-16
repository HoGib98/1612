@extends('userInfo.layout')

@section('content')

	<div class="container">
        <div class="col-sm-12">
            <h1 class="text-sm-center">Page userInfo</h1>
        </div>
        <div class="col-sm-12" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('Uinfo.create') }}"> Add Student</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success col-sm-12">
            {{ $message }}
        </div>
    @endif

	<div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl col-sm-8">
		<table class="table table-striped|table-dark|table-bordered|table-borderless|table-hover|table-sm">
		  <caption>List of users</caption>
		  <thead class="thead-dark|thead-light">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">First</th>
		      <th scope="col">Last</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach ($Uinfos as $Uinfo)
		  	<tr>
		  	  <td>{{ ++$i }}</td>
		      <td>{{ $Uinfo->content }}</td>
		      <td>{{ $Uinfo->user_id }}</td>
		      <td>
	                <form action="{{ route('Uinfo.destroy',$Uinfo->id) }}" method="POST">

	                    <a class="btn btn-info" href="{{ route('Uinfo.show',$Uinfo->id) }}">Show</a>
	                    <a class="btn btn-primary" href="{{ route('Uinfo.edit',$Uinfo->id) }}">Edit</a>

	                    @csrf
	                    @method('DELETE')
	                    <button type="submit" class="btn btn-danger">Delete</button>
	                </form>
		      </td>
		    </tr>
		  	@endforeach
		  </tbody>
		</table>

		{!! $Uinfos->links() !!}
	</div>
@endsection