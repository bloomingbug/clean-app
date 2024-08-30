<div class="d-flex justify-center align-items-center flex-nowrap gap-2">
    @can('user.edit')
    <a href="{{ route('admin.user.edit', $user->username) }}"
        class="d-flex align-items-center flex-nowrap btn btn-warning btn-sm">
        <i class="fas fa-edit"></i> <span class="ms-1 d-none d-lg-block" title="Edit">Edit</span>
    </a>
    @endcan

    @can('user.delete')
    <a href="{{ route('admin.user.destroy', $user->username) }}"
        class="d-flex align-items-center flex-nowrap btn btn-danger btn-sm" data-confirm-delete="true">
        <i class="fas fa-trash"></i> <span class="ms-1 d-none d-lg-block" title="Delete">Delete</span>
    </a>
    @endcan

</div>