<div class="sidebar sidebar-show d-print-none">
    <nav class="sidebar-nav">
        <ul class="nav">
            <x-nav-group title="Geography">
                <x-nav-item href="{{route('concept',['concept'=>'Place'])}}" icon="fas fa-map-marked-alt">Places</x-nav-item>
            </x-nav-group>
            <x-nav-group title="Characters">
                <x-nav-item href="{{route('concept',['concept'=>'Character'])}}" icon="fas fa-user">Characters</x-nav-item>
                <x-nav-item href="{{route('concept',['concept'=>'Player Character'])}}" icon="fas fa-user-shield">Player Characters</x-nav-item>
                <x-nav-item href="{{route('concept',['concept'=>'Group'])}}" icon="fas fa-users">Groups</x-nav-item>
            </x-nav-group>
            <x-nav-group title="Events">
                <x-nav-item href="{{route('concept',['concept'=>'Adventure'])}}" icon="fas fa-compass">Adventure</x-nav-item>
                <x-nav-item href="{{route('concept',['concept'=>'Session Log'])}}" icon="fas fa-book">Session Logs</x-nav-item>
                <x-nav-item href="{{route('concept',['concept'=>'Event'])}}" icon="fas fa-stopwatch">Events</x-nav-item>
            </x-nav-group>
            <x-nav-group title="Notes">
                <x-nav-item href="{{route('concept',['concept'=>'Item'])}}" icon="fas fa-treasure-chest">Items</x-nav-item>
                <x-nav-item href="{{route('concept',['concept'=>'Folder'])}}" icon="fas fa-folder">Folders</x-nav-item>
                <x-nav-item href="{{route('concept',['concept'=>'Note'])}}" icon="fas fa-sticky-note">Notes</x-nav-item>
            </x-nav-group>
        </ul>
    </nav>
</div>
