@extends('layouts.app')

@section('content')
@section('title', __('all.Roles.Assign-Roles'))
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> {{ __('all.Roles.List-Roles-Name')}} </th>
                                <th> {{ __('all.List-Actions') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                        <form role="form" method="POST" action="{{ action('RolesController@postPermissionsRole', ['id' => $role->id]) }}">
                            @csrf
                            @method('PUT')
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ (in_array($permission->name, $role->getAllPermissions()->pluck('name', 'id')->toArray())) ? 'checked="checked" ' : '' }} >
                                    </td>
                                </tr>
                            @endforeach
                        <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('all.btn.Update') }}</button>
                        </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
