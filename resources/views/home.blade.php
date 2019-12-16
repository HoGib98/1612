@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl col-sm-6 offset-md-3">
        <table class="table table-striped">
          <caption>List of users</caption>
          <thead class="thead-dark|thead-light">
            <tr>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
</div>
@endsection
