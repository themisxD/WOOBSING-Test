<!-- Active Modal-->
<div class="modal fade" id="HardDeleteUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="ActivateUser" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-danger">
            <h5 class="modal-title text-gray-100">Eliminar </h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">{{ __('all.User.HardDelete-Modal-Text') }}: <b> {{ $user->name}}</b> </div>
            <div class="modal-footer">
                @can('Delete User')
                <a class="btn btn-warning" href="{{ route('admin.users.delete', $user->id) }}">
                    Eliminar usuario
                </a>
                @endcan
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>