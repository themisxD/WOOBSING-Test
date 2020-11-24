@extends('layouts.main')
@section('title', __('Create Permission'))
@section('breadcrumb', __('/admin/permissions/create'))
@section('content')

<div class="container">
    <form role="form" method="POST" action="{{ route('admin.permissions.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control Role" name="name" placeholder="Permission">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control Role" name="guard_name" placeholder="Guard name" value="web">
                </div>
            </div>
            <div class="col-md-12">
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary"><span class="fas fa-arrow-left" aria-hidden="true"></span> Volver</a>
                <button type="submit" class="btn btn-primary btn-user"> Create Permission</button>
            </div>
        </div>
    </form>
</div>
@endsection
