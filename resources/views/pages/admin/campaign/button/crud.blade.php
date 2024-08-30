<div class="d-flex justify-center align-items-center flex-nowrap gap-2">
    @can('campaign.approve')
    @if($campaign->is_approved)
    <button class="d-flex align-items-center flex-nowrap btn btn-primary btn-sm" title="Approve"
        onclick="handleApprove('{{ $campaign->slug }}')">
        <i class="fa-regular fa-circle-check"></i>
        <span class="ms-1 d-none d-lg-block">Approve</span>
    </button>
    @else
    <button class="d-flex align-items-center flex-nowrap btn btn-outline-primary btn-sm" title="Approve"
        onclick="handleApprove('{{ $campaign->slug }}')">
        <i class="fa-regular fa-circle-check"></i>
        <span class="ms-1 d-none d-lg-block">Approve</span>
    </button>
    @endif
    @endcan

    @can('campaign.fund')
    @if($campaign->is_approved)
    <a href="{{ route('admin.cleanfund.edit', $campaign->slug) }}"
        class="d-flex align-items-center flex-nowrap btn btn-info btn-sm" title="CleanFund">
        <i class="fa-solid fa-circle-dollar-to-slot"></i> <span class="ms-1 d-none d-lg-block">Fund</span>
    </a>
    @endif
    @endcan

    @can('campaign.act')
    @if($campaign->is_approved)
    <a href="{{ route('admin.cleanact.edit', $campaign->slug) }}"
        class="d-flex align-items-center flex-nowrap btn btn-info btn-sm" title="CleanAct">
        <i class="fa-solid fa-fire"></i> <span class="ms-1 d-none d-lg-block">Act</span>
    </a>
    @endif
    @endcan

    @can('campaign.edit')
    <a href="{{ route('admin.campaign.edit', $campaign->slug) }}"
        class="d-flex align-items-center flex-nowrap btn btn-warning btn-sm" title="Edit">
        <i class="fas fa-edit"></i> <span class="ms-1 d-none d-lg-block">Edit</span>
    </a>
    @endcan

    @can('campaign.delete')
    <a href="{{ route('admin.campaign.destroy', $campaign->slug) }}"
        class="d-flex align-items-center flex-nowrap btn btn-danger btn-sm" data-confirm-delete="true" title="Delete">
        <i class="fas fa-trash"></i> <span class="ms-1 d-none d-lg-block">Delete</span>
    </a>
    @endcan

</div>