@extends('layouts.auth')

@section('content')

<div id="layoutAuthentication">
	<div id="layoutAuthentication_content">
		<main>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-7">
						<div class="card shadow-lg border-0 rounded-lg mt-4">
							<div class="card-header"><h3 class="text-center font-weight-light my-3">Crear Cuenta</h3></div>
							<div class="card-body">
								<form method="POST" action="{{ route('register') }}">
									@csrf
									<div class="form-row">
										<div class="col-md-6">
											<div class="form-group">
												<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Ingresa Nombre" required autocomplete="name" autofocus>
												@error('name')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Ingresa Apellido" required autocomplete="last_name" autofocus>
												@error('last_name')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
									<div class="form-group">
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Ingresa Email" required autocomplete="email">
										@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
									<div class="form-row">
										<div class="col-md-6">
											<div class="form-group">
												<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Ingresa Contraseña" required autocomplete="new-password">
												@error('password')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required autocomplete="new-password">
											</div>
										</div>
									</div>
									<div class="form-row">
										<div class="col-md-6">
											<div class="form-group">
												<input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Ingresa Numero de Telefono" required autocomplete="phone" autofocus>
												@error('phone')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Ingresa dirección" required autocomplete="address" autofocus>
												@error('address')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
										</div>
									</div>
									<div class="form-group mt-4 mb-0">
										<button type="submit" class="btn btn-primary btn-block">Crear Cuenta </button>
									</div>
								</form>
							</div>
							<div class="card-footer text-center mb-2">
								<div class="small"><a href="{{ __('login') }}">¿Ya tienes cuenta? Inicia sesión</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div> <br>
	<div id="layoutAuthentication_footer">
		<footer class="py-4 bg-light mt-auto">
			<div class="container-fluid">
				<div class="d-flex align-items-center justify-content-between small">
					<div class="text-muted">Copyright &copy; 2020</div>
					<div>
						<a href="#">Privacy Policy</a>
						&middot;
						<a href="#">Terms &amp; Conditions</a>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>
@endsection
