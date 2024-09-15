<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company') }}: {{ $company->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border border-4 rounded-lg shadow relative m-10">

                    <div class="flex items-start justify-between p-5 border-b rounded-t">
                        <h2 class="text-xl font-semibold">
                            {{ $company->name }}
                        </h2>
                        <a href="{{ route('company.index') }}">
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </a>
                    </div>

                    <div class="p-6 space-y-6">
                        <x-form :action="route('company.update', $company)" method="PATCH">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    @if($message = session('success'))
                                        <label for="first_name"
                                               class="text-sm font-medium text-indigo-700 block mb-2">
                                            {{ $message }}
                                        </label>
                                    @endif
                                    <label for="name"
                                           class="text-sm font-medium text-gray-900 block mb-2">
                                        Name
                                    </label>
                                    @error('name')
                                    <label class="text-sm font-medium text-red-700 block mb-2">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                    <input type="text" name="name" id="name"
                                           class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-700 focus:border-indigo-700 block w-full p-2.5"
                                           placeholder="Name example" required value="{{ old('name') ?? $company->name }}">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email"
                                           class="text-sm font-medium text-gray-900 block mb-2">
                                        Email
                                    </label>
                                    @error('email')
                                    <label class="text-sm font-medium text-red-700 block mb-2">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                    <input type="email" name="email" id="email"
                                           class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-700 focus:border-indigo-700 block w-full p-2.5"
                                           placeholder="Email example" required value="{{ old('email') ?? $company->email }}">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="site_url" class="text-sm font-medium text-gray-900 block mb-2">
                                        Site URL
                                    </label>
                                    @error('site_url')
                                    <label class="text-sm font-medium text-red-700 block mb-2">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                    <input type="text" name="site_url" id="site_url"
                                           class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-indigo-700 focus:border-indigo-700 block w-full p-2.5"
                                           placeholder="Site URL example" required value="{{ old('site_url') ?? $company->site_url }}">
                                </div>
                            </div>
                            <button
                                class="mt-6 rounded-md bg-indigo-700 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-indogo-700 focus:shadow-none active:bg-indigo-800 hover:bg-indigo-800 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="submit">
                                Save all
                            </button>
                        </x-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
