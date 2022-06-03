@extends('adminlte::page')

@section('content')

<div align="right">

<!-- 
	<a class="btn btn-danger btn-sm" href="{{ route('logout') }}"
            onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
             </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
</div> -->


<br />
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered table-striped">
	<tr>
		<th width="10%">Name</th>
		<th width="9%">jobtitle</th>
		<th width="20%">Email</th>
		<th width="15%">Phone</th>
		<th width="35%">Message</th>
		<th width="15%">Ip</th>
		<th width="15%">Action</th>


	</tr>
	@foreach($data as $row)
		<tr>
			<td>{{ $row->name }}</td>
			<td>{{ $row->jobtitle }}</td>
			<td>{{ $row->email }}</td>
			<td>{{ $row->phone }}</td>
			<td>{{ $row->dcr }}</td>
			<td>{{ $row->ip }}</td>
			<td>
				
					<form action="{{ route('clientmsg.destroy', $row->id) }}" method="post">
				     <a id="tel" href="tel:{{ $row->phone }}" class="btn btn-info">Call</a>
					<a href="{{ route('clientmsg.edit', $row->id) }}" class="btn btn-warning">Edit</a>

					@csrf
					@method('DELETE')
					<!-- onclick="return confirm('Are you sure?')" -->
					<!-- <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button> -->
					<input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
				</form>
			</td>
		</tr>
	@endforeach
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
{!! $data->links() !!}
@endsection