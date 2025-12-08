<nav x-data="{ open: false }" style="background-color: #0f172a; border-bottom: 1px solid #334155;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('phones.index') }}" style="color: white; font-weight: bold; font-size: 1.25rem; text-decoration: none; display: flex; align-items: center; gap: 8px;">
                        <svg style="width: 24px; height: 24px; color: #3b82f6;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        PhoneSystem
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('phones.index')" :active="request()->routeIs('phones.index')" 
                        style="color: {{ request()->routeIs('phones.index') ? '#ffffff' : '#cbd5e1' }}; border-bottom: {{ request()->routeIs('phones.index') ? '2px solid #3b82f6' : 'none' }};">
                        Телефони
                    </x-nav-link>
                    
                    <x-nav-link :href="route('manufacturers.index')" :active="request()->routeIs('manufacturers.*')" 
                        style="color: {{ request()->routeIs('manufacturers.*') ? '#ffffff' : '#cbd5e1' }}; border-bottom: {{ request()->routeIs('manufacturers.*') ? '2px solid #3b82f6' : 'none' }};">
                        Марки
                    </x-nav-link>
                    
                    <x-nav-link :href="route('models.index')" :active="request()->routeIs('models.*')" 
                        style="color: {{ request()->routeIs('models.*') ? '#ffffff' : '#cbd5e1' }}; border-bottom: {{ request()->routeIs('models.*') ? '2px solid #3b82f6' : 'none' }};">
                        Модели
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <div class="flex items-center gap-4">
                        <span style="color: #cbd5e1; font-size: 0.875rem;">Здравей, {{ auth()->user()->name }}</span>
                        
                        @if(auth()->user()->is_admin)
                             <a href="{{ route('admin.dashboard') }}" style="background-color: #facc15; color: #0f172a; padding: 2px 8px; border-radius: 9999px; font-size: 0.75rem; font-weight: bold; text-decoration: none;">ADMIN</a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                            @csrf
                            <button type="submit" style="color: #f87171; font-size: 0.875rem; font-weight: 600; background: none; border: none; cursor: pointer;">Изход</button>
                        </form>
                    </div>
                @else
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" style="color: #cbd5e1; font-weight: 500; text-decoration: none;">Вход</a>
                        <a href="{{ route('register') }}" style="background-color: #2563eb; color: white; padding: 8px 16px; border-radius: 8px; font-size: 0.875rem; font-weight: 500; text-decoration: none;">Регистрация</a>
                    </div>
                @endauth
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" style="color: #cbd5e1; background: none; border: none; padding: 8px;">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden" style="background-color: #1e293b; border-top: 1px solid #334155;">
        <div class="pt-2 pb-3 space-y-1 px-2">
             <x-responsive-nav-link :href="route('phones.index')" style="color: #e2e8f0; display: block; padding: 8px 12px;">Телефони</x-responsive-nav-link>
             <x-responsive-nav-link :href="route('manufacturers.index')" style="color: #e2e8f0; display: block; padding: 8px 12px;">Марки</x-responsive-nav-link>
             <x-responsive-nav-link :href="route('models.index')" style="color: #e2e8f0; display: block; padding: 8px 12px;">Модели</x-responsive-nav-link>
        </div>
        
        <div class="pt-4 pb-1 border-t border-gray-700 px-4">
            @auth
                <div style="font-weight: 500; color: white; margin-bottom: 4px;">{{ auth()->user()->name }}</div>
                <div style="font-size: 0.875rem; color: #94a3b8;">{{ auth()->user()->email }}</div>
                <form method="POST" action="{{ route('logout') }}" style="margin-top: 12px;">
                    @csrf
                    <button style="color: #f87171; width: 100%; text-align: left; background: none; border: none; padding: 0;">Изход</button>
                </form>
            @else
                <a href="{{ route('login') }}" style="display: block; color: white; margin-bottom: 8px;">Вход</a>
                <a href="{{ route('register') }}" style="display: block; color: #facc15;">Регистрация</a>
            @endauth
        </div>
    </div>
</nav>