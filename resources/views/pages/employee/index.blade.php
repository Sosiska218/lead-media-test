<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Employees') }}
            </h2>
            <a href="{{ route('employee.create') }}">
                <button
                    class="rounded-md bg-indigo-700 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-indigo-800 focus:shadow-none active:bg-indigo-800 hover:bg-indigo-800 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2"
                    type="button">
                    Create
                </button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative flex flex-col rounded-lg bg-white shadow-sm border border-slate-200">
                        <nav class="flex min-w-[240px] flex-col gap-1 p-1.5">
                            @forelse ($employees as $employee)
                                <div
                                    class="text-slate-800 flex w-full items-center rounded-md p-3 transition-all hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100 justify-between"
                                    role="button">
                                    {{ "{$employee->id}) $employee->full_name" }}
                                    <div class="flex items-center justify-center">
                                        <a href="{{ route('employee.edit', $employee) }}">
                                            <button class="rounded-md bg-indigo-700 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-indigo-800 focus:shadow-none active:bg-indigo-800 hover:bg-indigo-800 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2" type="button">
                                                Edit
                                            </button>
                                        </a>
                                        <x-form :action="route('employee.delete', $employee)" method="DELETE">
                                            <button class="rounded-md bg-indigo-700 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-indigo-800 focus:shadow-none active:bg-indigo-800 hover:bg-indigo-800 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none ml-2" type="submit">
                                                Delete
                                            </button>
                                        </x-form>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="text-slate-800 flex w-full items-center rounded-md p-3 transition-all hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100"
                                    role="button">
                                    No employees
                                </div>
                            @endforelse
                        </nav>
                    </div>
                </div>
                @if($employees->hasPages())
                    <div class="p-6 text-gray-900">
                        {{ $employees->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
