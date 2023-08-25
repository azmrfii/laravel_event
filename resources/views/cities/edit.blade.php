<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit city') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('cities.update', $city->id) }}" enctype="multipart/form-data"
                class="p-4 bg-white dark:bg-slate-800 rounded-md space-y-2">
                @csrf
                @method('PUT')
                 <div>
                    <label for="country_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                        Country</label>
                    <select id="country_id" x-model="country" x-on:change="onCountryChange" name="country_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Choose a country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @selected($country->id == $city->country_id)>{{ $country->name }}</option>
                        {{-- <option value="{{old('country_id',$country->id)==$country->id ? 'selected':''}}">{{ $country->name }}</option> --}}
                            {{-- <option value="{{ $country->id }}" {{ $country->id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option> --}}
                            {{-- <option value="{{ $country->id }}">{{ $country->name }}</option> --}}
                        @endforeach
                    </select>
                    @error('country_id')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" id="name" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('name', $city->name) }}">
                    @error('name')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
