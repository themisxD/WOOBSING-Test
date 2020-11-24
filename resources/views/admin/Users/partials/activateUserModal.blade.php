<!-- Active Modal-->
<div class="modal fade" id="ActivateUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="ActivateUser" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">{{ __('all.User.Active-Modal-Title') }}</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">{{ __('all.User.Active-Modal-Text') }}:   <b> {{ $user->name}}.</b> </div>
            <div class="modal-footer">
                @can('Activate User')
                <a class="btn btn-primary" href="{{ route('admin.users.activate', $user->id) }}">
                    {{ __('all.User.Activate') }}
                </a>
                @endcan
                <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('all.btn.Cancel') }}</button>
            </div>
        </div>
    </div>
</div>