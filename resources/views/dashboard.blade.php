<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-6">
                <div class="flex-1">
                    @foreach ($posts as $post)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-2">
                            <div class="text-gray-900 dark:text-gray-100">
                                <div class="flex justify-between p-6 pb-0">
                                    <div class="flex flex-row items-center gap-4 pb-5">
                                        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-200">
                                            {{ \App\Models\User::find($post->user_id)?->name }}
                                        </h2>
                                        <p class="text-gray-600 dark:text-gray-400">
                                            {{ $post->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-gray-600 dark:text-gray-400">
                                            -
                                        </p>
                                    </div>
                                </div>
                                <p class="w-11/12 text-start text-wrap px-6">
                                    {{ Str::limit($post->subject, 300) }}
                                </p>
                                <div class="flex flex-row items-center gap-4 mt-4 border-t border-gray-200 p-4">
                                    <a href="" class="text-gray-600 dark:text-gray-400">
                                        ({{ \Illuminate\Support\Number::forHumans($post->likes_count) }} curtidas)
                                    </a>
                                    <a href="" class="text-gray-600 dark:text-gray-400">
                                        ({{ \Illuminate\Support\Number::forHumans(\App\Models\Comment::where('post_id', $post->id)->count()) }}
                                        comentários)
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                <aside class="w-80 space-y-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="w-80 space-y-4 ">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-900 dark:text-gray-200 mb-4">Recomendações</h3>
                                    @foreach ($recommendedUsers as $user)
                                        <form class="flex justify-between  items-center gap-4 mb-4"
                                            action="{{ route('follow.store', $user->id) }}" method="POST">
                                            @csrf
                                            <div>
                                                <h4 class="text-gray-900 dark:text-gray-200">{{ $user->name }}</h4>
                                                <p class="text-gray-600 dark:text-gray-400">{{ $user->bio }}</p>
                                            </div>
                                            
                                            <button type="submit" class="text-blue-500 hover:underline">
                                                Seguir
                                            </button>
                                        </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <form class="p-4" action="{{ route('dashboard') }}" method="GET">
                            <input type="text" name="search"
                                class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
                                placeholder="Procurar usuários...">
                            <button type="submit"
                                class="w-full mt-2 bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                Pesquisar
                            </button>
                        </form>


                        <div class="p-4 pt-0" id="searchResults">
                            @forelse ($search as $user)
                                <form class="flex justify-between  items-center gap-4 mb-4"
                                    action="{{ route('follow.store', $user->id) }}" method="POST">
                                    @csrf
                                    <div>
                                        <h4 class="text-gray-900 dark:text-gray-200">{{ $user->name }}</h4>
                                        <p class="text-gray-600 dark:text-gray-400">{{ $user->bio }}</p>
                                    </div>
                                    <button type="submit" class="text-blue-500 hover:underline">
                                        Seguir
                                    </button>
                                </form>
                                @empty 
                                    <p class="text-gray-600 dark:text-gray-400">Nenhum usuário encontrado.</p>
                            @endforelse($search as $user)
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</x-app-layout>
