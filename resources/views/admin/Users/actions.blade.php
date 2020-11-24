<!-- Edit User -->
@if(auth()->user()->can('Edit User') && !isset($deleted_at))
    <a href="{{ route('admin.usersServerSide.edit', $id) }}" class="btn btn-success btn-circle btn-sm"><i class="fa fa-user-edit"></i></a>
@endif

<!-- Inactivate & Activate Users -->
    <!-- Modal Inactivate User -->
    @if(auth()->user()->can('Delete User') && !isset($deleted_at) )
        <a class="btn btn-danger btn-circle btn-sm" href="#" data-toggle="modal" data-target="#inactivateUserModalDT{{ $id }}"> <i class="fa fa-user-times"></i></a>
        @include('Users.partials.datatables.inactivateUserModalDT')
    @endif

    <!-- Modal Activate User -->
    @if(auth()->user()->can('Activate User') && isset($deleted_at))
        <a class="btn btn-info btn-circle btn-sm" href="#" data-toggle="modal" data-target="#activateUserModalDT{{ $id }}"> <i class="fa fa-user-check"></i></a>
        @include('Users.partials.datatables.activateUserModalDT')
    @endif

    <!-- Modal DELETE User -->
    @if(auth()->user()->can('Hard-Delete User') )
        <a class="btn btn-danger btn-circle btn-sm" href="#" data-toggle="modal" data-target="#HardDeleteUserModalDT{{ $id }}"> <i class="fas fa-user-slash"></i></a>
        @include('Users.partials.datatables.HardDeleteUserModalDT')
    @endif