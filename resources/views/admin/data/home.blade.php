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
                            <a href="{{ route('admin/datas/create') }}" class="btn btn-primary">Tambah Data</a>
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
                                    <td class="align-middle">{{ $data->formatted_nominal }}
                                    </td>
                                    <td class="align-middle">
                                    <td class="align-middle">
                                        @if (Auth::user()->usertype == 'admin')
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('admin/datas/edit', ['id' => $data->id]) }}"
                                                    class="btn btn-secondary">Edit</a>
                                                <a href="{{ route('admin/datas/delete', ['id' => $data->id]) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </div>
                                        @else
                                            <span class="text-muted">View Only</span>
                                        @endif
                                    </td>

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
