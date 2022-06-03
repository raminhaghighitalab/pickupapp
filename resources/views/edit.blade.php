@extends('adminlte::page')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div >
	
<div align="left">
	<a href="{{ route('clientmsg.index') }}" class="btn btn-default">Back</a>
</div>
<br />

<form method="post" action="{{ route('clientmsg.update', $data->id) }}" enctype="multipart/form-data">

	@csrf
	@method('PATCH')

	<div class="form-group">
		<label class="col-md-4 text-right">Enter Full Name</label>
		<div class="col-md-8">
			<input type="text" name="name" value="{{ $data->name }}" class="form-control input-lg" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 text-right">Enter Full jobtitle</label>
		<div class="col-md-8">
			<input type="text" name="jobtitle" value="{{ $data->jobtitle }}" class="form-control input-lg" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 text-right">Enter Email</label>
		<div class="col-md-8">
			<input type="text" name="email" value="{{ $data->email }}" class="form-control input-lg" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 text-right">Enter phone </label>
		<div class="col-md-8">
			<input type="text" name="phone" value="{{ $data->phone }}" class="form-control input-lg" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 text-right">Add your note </label>
		<div class="col-md-8">
			<input type="text" name="dcr" value="{{ $data->dcr }}" class="form-control input-lg" />
		</div>
	</div>

		<div class="form-group text-center">
		<input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
	</div>
</form>
@endsection



