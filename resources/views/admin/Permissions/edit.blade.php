@extends('layouts.app')

@section('content')
@section('title', __('all.Permissions.Update-Permissions'))
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <form role="form" method="POST" action="#">
                @csrf
                @method('PUT')

            <div class="form-group">
                <label for="permission_name">{{ __('all.Permissions.Title') }}</label>
                <input type="text" class="form-control Role" name="permission_name" id="permission_name" placeholder="{{ __('all.Permission.Title') }}"  value="{{ $permission->name }}">
            </div>
            <div class="form-group">
                <label for="guard_name">{{ __('all.Permissions.Guard_name') }}</label>
                <input type="text" class="form-control Role" name="guard_name" id="guard_name" placeholder="{{ __('all.Permission.Guard_name') }}"  value="{{ $permission->guard_name }}">
            </div>

            <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('all.btn.Update') }}</button>

            </form>
        </div>
    </div>
</div>
@endsection
