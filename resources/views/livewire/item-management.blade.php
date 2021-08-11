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
                    <li class="breadcrumb-item"><a href="#">Volt</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Items List')}}</li>
                </ol>
            </nav>
            <h2 class="h4">{{__('Item Management')}}</h2>
            <p class="mb-0">{{__('Your item management dashboard template.')}}</p>
        </div>
        @if (auth()->user()->can('create', App\Models\Item::class))
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('new-item') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"><svg
                    class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg> {{__('New item')}}</a>
            <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
            </div>
        </div>
        @endif
    </div>
    <div class="card card-body shadow-sm table-wrapper table-responsive">
        <div class="table-settings mb-4">
            <div class="row justify-content-between align-items-center">
                <div class="col-9 col-lg-8 d-md-flex">
                    <div class="input-group me-2 me-lg-3 fmxw-300">
                        <span class="input-group-text"><svg class="icon icon-xs"
                                x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg></span></span>
                        <input wire:model="search" type="text" class="form-control" placeholder="Search items">
                    </div>
                    <div class="col-3 d-flex">
                        <select wire:model="entries" class="form-select fmxw-100 d-none d-md-inline" id="entries"
                            aria-label="Entries per page">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        @if($showSuccessNotification)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="fas fa-bullhorn me-1"></span>
                    {{__('Item deleted.')}}
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="fas fa-bullhorn me-1"></span>
                    {{ session('success') }}   
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <x-table>
            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('items.name')"
                    :direction="$sortField === 'items.name' ? $sortDirection : null">{{__('Name')}}
                </x-table.heading>
                <x-table.heading sortable wire:click="sortBy('items.category_id')"
                    :direction="$sortField === 'items.category_id' ? $sortDirection : null">{{__('Category')}}
                </x-table.heading>
                <x-table.heading sortable wire:click="sortBy('items.picture')"
                    :direction="$sortField === 'items.picture' ? $sortDirection : null">{{__('Picture')}}
                </x-table.heading>
                <x-table.heading sortable wire:click="sortBy('TagsName')"
                    :direction="$sortField === 'TagsName' ? $sortDirection : null">{{__('Tags')}}
                </x-table.heading>
                <x-table.heading sortable wire:click="sortBy('items.created_at')"
                    :direction="$sortField === 'items.created_at' ? $sortDirection : null">{{__('Date created')}}
                </x-table.heading>
                @can('manage-items', auth()->user())
                <x-table.heading>{{__('Action')}}</x-table.heading>
                @endcan
            </x-slot>

            <x-slot name="body">
                @foreach ($items as $item)
                <x-table.row>
                    <x-table.cell><span class="fw-bold">{{ $item->name }}</span></x-table.cell>
                    <x-table.cell>{{ $item->category->name }}</x-table.cell>
                    <x-table.cell><img src="{{  $item->pictureUrl()  }}" class="rounded" style="max-width: 150px;">
                    </x-table.cell>
                    <x-table.cell>
                        @foreach ($item->tags as $tag)
                        <span class="badge text-white"
                            style="background-color:{{ $tag->color }}">{{ $tag->name }}</span>
                        @endforeach
                    </x-table.cell>
                    <x-table.cell>{{ $item->date_for_humans }}</x-table.cell>
                    @can('manage-items', auth()->user())
                    <x-table.cell>
                        @if (auth()->user()->can('update', $item) || auth()->user()->can('delete', $item))
                        <x-button.link>
                            @can('update', $item)
                            <a class="dropdown-item d-flex align-items-center"
                                href="{{ route('edit-item', ['id' => $item->id]) }}"><span
                                    class="fas fa-user-shield me-2"></span>{{__('Edit item')}}</a>
                            @endcan
                            @can('delete', $item)
                            <a onclick="confirm('Are you sure you want to remove the item from this group?') || event.stopImmediatePropagation()"
                                wire:click="delete({{ $item->id }})"
                                class="dropdown-item text-danger rounded-bottom"><span
                                    class="fas fa-user-times me-2"></span>{{__('Delete item')}}</a>
                            @endcan
                        </x-button.link>
                        @endif
                    </x-table.cell>
                    @endcan
                </x-table.row>
                @endforeach
            </x-slot>
        </x-table>
        <div class="mt-3">
            {{ $items->links() }}
        </div>
    </div>
</div>