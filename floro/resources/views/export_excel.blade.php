@extends('layouts.app')
@section('content')

<!doctype html>
<head>
EXPORT USERS
</head>
<body>
<div class="container">
<div align="centre">
<a href="{{route('export_excel.excel')}}"
class="btn btn-success">export</a>
</div>
<div class="table-responsive">
<table class="table table-striped table-bordered">
<tr>
<td>UserName</td>
<td>Email</td>
<td>FirstName</td>
<td>LastName</td>
</tr>
@foreach($data as $user)
<tr>
<td>{{$user->user_name}}</td>
<td>{{$user->email}}</td>
<td>{{$user->first_name}}</td>
<td>{{$user->last_name}}</td>
</tr>

@endforeach
</table>
</div>
</div>

</body>
@endsection