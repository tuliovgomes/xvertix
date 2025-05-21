<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Followers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @foreach ($followers as $follow)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-2">
                    <div class="text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between p-6 pb-0">
                            <div class="flex flex-row items-center gap-4 pb-5">
                                <img class="w-16 h-16 rounded-full" src="https://api.samplefaces.com/face?width=150&n={{ $follow->id }}}">
                                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-200">
                                    {{ \App\Models\User::find($follow->follow_id)?->name }}
                                </h2>
                                <p class="text-gray-600 dark:text-gray-400">
                                    {{ $follow->created_at->diffForHumans() }}
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-600 dark:text-gray-400">
                                    <form action="{{ route('followers.trash', $follow->id) }}" method="POST">
                                        @csrf
                                        <button type='submit' class=" bg-red-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            UnFollow
                                        </button>
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
