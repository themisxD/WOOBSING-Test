@extends('layouts.main')
@section('title', __('List Roles'))
@section('breadcrumb', __('/admin/roles'))
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Listar Roles</h6>
				<a href="{{ route('admin.roles.create')}}" class="btn btn-primary btn-circle btn-sm float-right"><i class="fa fa-edit"></i></a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="roles-dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID </th>
							<th> Name </th>
							<th>Guard </th>
							<th>Roles-Permissions </th>
							<th> Actions </th>
						</tr>
					</thead>
					<tbody>

						@foreach($roles as $role)
						<tr>
							<td> {{ $role->id }}</td>
							<td>{{ $role->name }}</td>
							<td>{{ $role->guard_name }}</td>
							<td> {!! $role->permissions()->pluck('name')->implode(",<br>") !!}</td>
							<td>
								<div class="form-inline">
									<!-- Edit Role 
									-->
										<a href="#" class="btn btn-success btn-circle btn-sm"><i class="fas fa-pen"></i></a>

									<!-- Destroy Roles {{ route('admin.roles.destroy', $role->id) }} -->
										<form action="#" method="post">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></button>
										</form>
									<!-- Destroy Roles {{-- route('admin.roles.permissions', $role->id) --}}-->
										<a href="#" class="btn btn-info btn-circle btn-sm"><i class="fa fa-cogs"></i></a>
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
            $('#roles-dataTable').DataTable();
        });
    </script>
@endpush