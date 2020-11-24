@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifica tu cuenta</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                        <p>
                            Antes de continuar, consulte su correo electrónico para ver si hay un enlace de verificación.
                        </p>
                        
                            Si no recibió el correo electrónico
                        
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">presione aqui para recibir otro link de verificación</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
