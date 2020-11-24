@extends('layouts.main')
@section('title', __('Create Role'))
@section('breadcrumb', __('/admin/roles/create'))
@section('content')
<div class="container">
    <form role="form" method="POST" action="{{ route('admin.roles.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control Role" name="name" placeholder="Role name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control Role" name="guard_name" placeholder="Guard name" value="web">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-6">
                    <label>Permisos</label>
                    @foreach ($permissions as $id => $name)
                        <div class="checkbox">
                            <label>
                                <input name="permissions[]" type="checkbox" value="{{ $name }}"
                                    {{ $role->permissions->contains($id)
                                        || collect( old('permissions') )->contains($name)
                                        ? 'checked':'' }}
                                > {{ $name }}
                            </label>
                        </div>
                    @endforeach

                </div> 
            </div>
            <div class="col-md-12">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary"><span class="fas fa-arrow-left" aria-hidden="true"></span> Volver</a>
                <button type="submit" class="btn btn-primary btn-user"> Crear Role</button>
            </div>
        </div>
    </form>
</div>
@endsection