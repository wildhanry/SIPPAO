<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">Data Anggaran</h1>
                        @if (Auth::user()->usertype == 'admin')
                            <a href="{{ route('admin/datas/create') }}"
                                class="text-black h-12 border-black border-2 p-2.5 bg-blue-400 hover:bg-blue-500 hover:shadow-[2px_2px_0px_rgba(0,0,0,1)] active:bg-blue-700 rounded-md no-underline">
                                Tambah Data
                            </a>
                        @endif
                    </div>
                    <hr />
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Uraian</th>
                                <th>Nominal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $data)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $data->kategori }}</td>
                                    <td class="align-middle">{{ $data->uraian }}</td>
                                    <td class="align-middle">{{ $data->formatted_nominal }}</td>
                                    <td class="align-middle">
                                        @if (Auth::user()->usertype == 'admin')
                                            <div class="flex gap-2">
                                                <a href="{{ route('admin/datas/edit', ['id' => $data->id]) }}"
                                                    class="flex items-center justify-center text-black h-10 w-20 border-black border-2 bg-blue-400 hover:bg-blue-500 hover:shadow-[2px_2px_0px_rgba(0,0,0,1)] active:bg-blue-700 rounded-md no-underline">
                                                    Edit
                                                </a>
                                                <a href="{{ route('admin/datas/delete', ['id' => $data->id]) }}"
                                                    class="flex items-center justify-center text-black h-10 w-20 border-black border-2 bg-red-400 hover:bg-red-500 hover:shadow-[2px_2px_0px_rgba(0,0,0,1)] active:bg-red-700 rounded-md no-underline">
                                                    Delete
                                                </a>
                                            </div>
                                        @else
                                            <span class="text-muted">View Only</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">Data Belum Ada</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
