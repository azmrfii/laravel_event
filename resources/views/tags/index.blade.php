<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tag') }}
            </h2>
            <div>
                <a href="{{ route('tags.create') }}" class="dark:text-white hover:text-slate-200">New tag</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>   
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4">
                                    {{ $tag->name }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('tags.show', $tag->slug) }}"
                                            class="text-primary-400 hover:text-primary-600">Show</a>
                                        <a href="{{ route('tags.edit', $tag->slug) }}"
                                            class="text-green-400 hover:text-green-600">Edit</a>
                                        <form method="POST" class="text-red-400 hover:text-red-600"
                                            action="{{ route('tags.destroy', $tag->slug) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('tags.destroy', $tag->name) }}"
                                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                                Delete
                                            </a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
