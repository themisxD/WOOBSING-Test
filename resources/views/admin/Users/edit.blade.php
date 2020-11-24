@extends('layouts.main')

@section('content')
@section('title', 'Editar Usuario')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form role="form" method="POST" action="{{ action('\App\Http\Controllers\UsersController@update', ['user' => $user->id]) }}">
                @csrf
                @method('PUT')
            <div class="form-group">
                <label for="name">Nombres</label>
                <input type="text" class="form-control user" name="name"  value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="last_name">Apellidos</label>
                <input type="text" class="form-control user" name="last_name"  value="{{ $user->last_name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="Email" class="form-control user" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" class="form-control" name="address" value="{{ $user->address }}">
            </div>
            <div class="form-group">
                <label for="phone">Telefono</label>
                <input type="number" class="form-control" name="phone" value="{{ $user->phone }}">
            </div>
            <div class="form-group">
                <label for="password">{{ __('all.User.Password') }}</label>
                <input type="password" class="form-control user" name="password" placeholder="* * * * * * *"> 
            </div>
            <div class="form-group">
                <label for="">{{ __('all.User.Select.Role') }}</label>
                    <select name="role" class="form-control">
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" {{ (in_array($role->name, $user->roles()->pluck('name', 'id')->toArray())) ? 'selected':'' }} >{{ $role->name }}</option>
                        @endforeach
                    </select>                
            </div>

            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary"><span class="fas fa-arrow-left" aria-hidden="true"></span> Volver</a>
            <button type="submit" class="btn btn-primary btn-user">Editar</button>

            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>

    </script>
@endpush
