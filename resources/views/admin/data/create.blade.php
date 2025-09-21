<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Add Data</h1>
                    <hr />
                    @if (session()->has('error'))
                        <div>
                            {{ session('error') }}
                        </div>
                    @endif
                    <p><a href="{{ route('admin/datas') }}"
                            class="inline-flex items-center justify-center text-black h-10 w-20 border-black border-2 bg-blue-400 hover:bg-blue-500 hover:shadow-[2px_2px_0px_rgba(0,0,0,1)] active:bg-blue-700 rounded-md no-underline">Go
                            Back</a></p>

                    <form action="{{ route('admin/datas/save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="kategori"
                                    class="w-100 border-black border-1 p-2.5 focus:outline-none focus:shadow-[2px_2px_0px_rgba(0,0,0,1)] focus:bg-blue-200 active:shadow-[2px_2px_0px_rgba(0,0,0,1)] rounded-md"
                                    placeholder="Kategori">
                                @error('kategori')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="uraian"
                                    class="w-100 border-black border-1 p-2.5 focus:outline-none focus:shadow-[2px_2px_0px_rgba(0,0,0,1)] focus:bg-blue-200 active:shadow-[2px_2px_0px_rgba(0,0,0,1)] rounded-md"
                                    placeholder="Uraian">
                                @error('uraian')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="nominal"
                                    class="w-100 border-black border-1 p-2.5 focus:outline-none focus:shadow-[2px_2px_0px_rgba(0,0,0,1)] focus:bg-blue-200 active:shadow-[2px_2px_0px_rgba(0,0,0,1)] rounded-md"
                                    placeholder="Nominal">
                                @error('nominal')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-grid">
                                <button
                                    class="text-black h-12 border-black border-2 p-2.5 bg-blue-400 hover:bg-blue-500 hover:shadow-[2px_2px_0px_rgba(0,0,0,1)] active:bg-blue-700 rounded-md no-underline">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
