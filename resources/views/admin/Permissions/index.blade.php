@extends('layouts.main')
@section('title', __('List permissions'))
@section('breadcrumb', __('/admin/permissions'))
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Listar Permisos</h6>
				<a href="{{ route('admin.permissions.create')}}" class="btn btn-primary btn-circle btn-sm float-right"><i class="fa fa-edit"></i></a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="permissions-dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> ID </th>
							<th> Name </th>
							<th> Guard </th>
							<th> Created At </th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>
					@foreach($permissions as $permission)
					<tr>
						<td> {{ $permission->id }}</td>
						<td>{{ $permission->name }}</td>
						<td>{{ $permission->guard_name }}</td>
						<td>{{ $permission->created_at }}</td>
						<td>
							<div class="form-inline">
								<!-- Edit Permission -->
									<a href="#" class="btn btn-success btn-circle btn-sm"><i class="fa fa-check"></i></a>

								<!-- Destroy Permission -->
									<form action="#" method="post">
										@csrf
										@method('DELETE')
										&nbsp;
										<button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></button>
									</form>
							</div>
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('#permissions-dataTable').DataTable();
        });
    </script>
@endpush