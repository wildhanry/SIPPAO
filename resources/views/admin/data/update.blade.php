<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Edit Data</h1>

                    <p><a href="{{ route('admin/datas') }}"
                            class="inline-flex items-center justify-center text-black h-10 w-20 border-black border-2 bg-blue-400 hover:bg-blue-500 hover:shadow-[2px_2px_0px_rgba(0,0,0,1)] active:bg-blue-700 rounded-md no-underline">Go
                            Back</a></p>

                    <hr />
                    <form action="{{ route('admin/datas/update', $datas->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Data Name</label>
                                <input type="text" name="kategori"
                                    class="w-100 border-black border-1 p-2.5 focus:outline-none focus:shadow-[2px_2px_0px_rgba(0,0,0,1)] focus:bg-blue-200 active:shadow-[2px_2px_0px_rgba(0,0,0,1)] rounded-md"
                                    placeholder="Kategori" value="{{ $datas->title }}">
                                @error('uraian')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Category</label>
                                <input type="text" name="uraian"
                                    class="w-100 border-black border-1 p-2.5 focus:outline-none focus:shadow-[2px_2px_0px_rgba(0,0,0,1)] focus:bg-blue-200 active:shadow-[2px_2px_0px_rgba(0,0,0,1)] rounded-md"
                                    placeholder="Uraian" value="{{ $datas->category }}">
                                @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Nominal</label>
                                <input type="text" name="nominal"
                                    class="w-100 border-black border-1 p-2.5 focus:outline-none focus:shadow-[2px_2px_0px_rgba(0,0,0,1)] focus:bg-blue-200 active:shadow-[2px_2px_0px_rgba(0,0,0,1)] rounded-md"
                                    placeholder="Nominal" value="{{ $datas->nominal }}">
                                @error('nominal')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid">
                                <button
                                    class="text-black h-12 border-black border-2 p-2.5 bg-yellow-400 hover:bg-yellow-500 hover:shadow-[2px_2px_0px_rgba(0,0,0,1)] active:bg-yellow-700 rounded-md no-underline">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
