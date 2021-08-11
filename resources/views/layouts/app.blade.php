<x-layouts.base>


    @if(in_array(request()->route()->getName(), ['dashboard', 'profile', 'profile-example', 'kanban', 'messages', 'single-message',
    'user-management', 'new-user', 'edit-user', 'role-management', 'new-role', 'edit-role', 'category-management', 'new-category', 'edit-category',
    'tag-management', 'new-tag', 'edit-tag', 'item-management', 'new-item', 'edit-item', 'bootstrap-tables', 'transactions', 'buttons',
    'forms', 'modals', 'notifications', 'typography', 'traffic-sources', 'app-analysis', 'tasks', 'calendar', 'map',
    'datatables', 'bootstrap-tables', 'pricing', 'billing', 'invoice', 'widgets']))

        {{-- Nav --}}
        @include('layouts.nav')
        {{-- SideNav --}}
        @include('layouts.sidenav')
        <main class="content">
            {{-- TopBar --}}
            @include('layouts.topbar')
            {{ $slot }}
            {{-- Footer --}}
            @include('layouts.footer')
        </main>

    @elseif(in_array(request()->route()->getName(), ['404', '500', 'lock']))

        {{ $slot }}

    @elseif(in_array(request()->route()->getName(), ['sign-up', 'sign-in','forgot-password',
    'reset-password','reset-password-example', 'sign-in-example', 'sign-up-example',
    'forgot-password-example', 'reset-password-example']))

        {{ $slot }}
        {{-- Footer --}}
        @include('layouts.footer2')


    @endif

</x-layouts.base>