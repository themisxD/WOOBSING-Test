<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav">
				<div class="sb-sidenav-menu-heading">Vistas</div>
				<a class="nav-link" href="{{ route('home') }}">
					<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
					Dashboard
				</a>
				<div class="sb-sidenav-menu-heading">Administrador</div>
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="false" aria-controls="collapseLayouts">
					<div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
					Usuarios
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
					<div class="collapse" id="users" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
						<nav class="sb-sidenav-menu-nested nav">
							@can('Create User')
							<a class="nav-link" href="{{ route('admin.users.create') }}">Crear Usuarios</a>
							@endcan
							<a class="nav-link" href="{{ route('admin.users.index') }}">Listar Usuarios</a>
						</nav>
					</div>
				@can('Create User')
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#roles" aria-expanded="false" aria-controls="collapseLayouts">
					<div class="sb-nav-link-icon"><i class="fas fa-user-shield"></i></div>
					Roles
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
					<div class="collapse" id="roles" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
						<nav class="sb-sidenav-menu-nested nav">
							<a class="nav-link" href="{{ route('admin.roles.create') }}">Crear Role</a>
							<a class="nav-link" href="{{ route('admin.roles.index') }}">Listar Roles</a>
						</nav>
					</div>

				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#permissions" aria-expanded="false" aria-controls="collapseLayouts">
					<div class="sb-nav-link-icon"><i class="fas fa-user-tag"></i></div>
					Permisos
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
					<div class="collapse" id="permissions" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
						<nav class="sb-sidenav-menu-nested nav">
							<a class="nav-link" href="{{ route('admin.permissions.create') }}">Crear Permiso</a>
							<a class="nav-link" href="{{ route('admin.permissions.index') }}">Listar Permiso</a>
						</nav>
					</div>
				@endcan


	</nav>
</div>