<div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">{{__('Volt')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Add tag')}}</li>
                </ol>
            </nav>
            <h2 class="h4">{{__('Add tag')}}</h2>
            <p class="mb-0">{{__('Your tag creation template.')}}</p>
        </div>
    </div>
    <div class="col-12 col-xl-8">
        <div class="card card-body shadow-sm mb-4">
            <h2 class="h5 mb-4">{{__('Tag information')}}</h2>
            <form wire:submit.prevent="add" action="#" method="POST">
                <div class="col-md-12 mb-3">
                    <div>
                        <label for="name">{{__('Name')}}</label>
                        <input wire:model="name" class="form-control @error('name') is-invalid @enderror" id="name"
                            type="text" placeholder="Name" required>
                    </div>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <div>
                        <label for="color">{{__('Color')}}</label>
                        <input type="color" wire:model="color" class="form-control @error('color') is-invalid @enderror"
                            id="color" placeholder="color" required>
                    </div>
                    @error('color') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-gray-800 mt-2 animate-up-2">Save All</button>
                </div>
            </form>
            @if ($showDemoNotification)
            <div class="alert alert-info mt-2" role="alert">
                {{__('You cannot do that in the demo version.')}}
            </div>
            @endif
        </div>
    </div>
</div>