<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <p class="mt-4">
                        <a href="datas"
                            class="text-black h-12 border-black border-2 p-2.5 bg-blue-400 hover:bg-blue-500 hover:shadow-[2px_2px_0px_rgba(0,0,0,1)] active:bg-blue-700 rounded-md no-underline">
                            Data
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
