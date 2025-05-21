<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @foreach (\App\Models\Post::all() as $post)
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
                                ({{ \Illuminate\Support\Number::forHumans(\App\Models\Comment::where('post_id', $post->id)->count()) }} comentários)
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
