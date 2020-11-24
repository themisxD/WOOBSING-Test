@extends('layouts.main')
@section('title', 'Listar Usuarios')
@section('breadcrumb', __('/admin/users'))
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			@can('Create User')
				<a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm float-right"><span class="fas fa-plus" aria-hidden="true"></span> Nuevo Usuario</a>
			@endcan
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover table-sm" id="Users-Datatable" width="100%" cellspacing="0">
					<thead class="thead-dark">
						<tr>
							<th>#</th>
							<th>Name </th>
							<th>Email </th>
							<th>Roles </th>
							<th>Status </th>
							<th>Actions </th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td> {{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->getRoleNames()->implode('') }}</td>
							<td>
								@if(!isset($user->deleted_at))
									Active
								@else
									Inactive
								@endif
							</td>
							<td>
								<!-- Edit User -->
								@if(auth()->user()->can('Edit User') && !isset($user->deleted_at))
									<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></a>
								@endif 

								<!-- Show User -->
								@can('Show User-permissions2')
								<a class="btn btn-outline-success btn-sm" href="#" data-toggle="modal" data-target="#ShowUser{{ $user->id }}"> <i class="fa fa-user-tag"></i></a>
									@include('Users.partials.showUser')
								@endcan

									<!-- Modal DELETE User -->
									@if(auth()->user()->can('Delete User') )
										<a class="btn btn-outline-danger btn-sm" href="#" data-toggle="modal" data-target="#HardDeleteUserModal{{ $user->id }}"> <i class="fas fa-trash"></i></a>
										@include('admin.Users.partials.HardDeleteUserModal')
									@endif
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
			$('#Users-Datatable').DataTable();
        });
    </script>
@endpush