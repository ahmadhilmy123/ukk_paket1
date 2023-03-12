@extends('layouts.app')

@section('title', 'Data Petugas')

@push('style')
<link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.bootstrap4.min.css" />
<link rel="shortcut icon" href="{{ asset('img/avatar/taruna.ico') }}" type="image/x-icon">
@endpush

@section('main')
<div class="main-content warna">
    <section class="section">
        <div class="section-header">
            <h1>Data Petugas<h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-lu1">
                    <div class="card-body lu1 cal1">
                        <button class="icon-btn add-btn float-right mb-3">
							<div class="add-icon"></div>
							<a href="{{ url('dashboard/data-petugas/create') }}" class="btn-txt"><b>Tambah Petugas</a>
						</button>
                        <div class="table-responsive">
                            <table class="table-striped table" id="table-1">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">LEVEL</th>
                                        <th scope="col">DIBUAT</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($users as $value)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->level }}</td>
                                        <td>{{ $value->created_at->format('d M, Y') }}</td>
                                        <td>
                                            <div class="container d-flex" style="margin: 0;padding: 0;">
                                                    <a href="{{ url('dashboard/data-petugas/'. $value->id .'/edit') }}"class="btn btn-primary m-1  mb-5 btn-lg">
                                                        <i class="fas fa-pencil-alt "></i>
                                                    </a>
                                                    @if(auth()->user()->id != $value->id)
                                                    <form method="post"
                                                        action="{{ url('dashboard/data-petugas', $value->id) }}"
                                                        id="delete{{ $value->id }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" class="btn btn-icon btn-danger m-1 ml-3  mb-3 btn-lg delete swal-confrim"
                                                            onclick="deleteData1({{ $value->id }})">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                    </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                    $i++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        {{-- @if($users->lastPage() != 1)
                        <div class="btn-group float-right">
                            <a href="{{ $users->previousPageUrl() }}" class="btn btn-success">
                                <i class="mdi mdi-chevron-left"></i>
                            </a>
                            @for($i = 1; $i <= $users->lastPage(); $i++)
                                <a class="btn btn-success {{ $i == $users->currentPage() ? 'active' : '' }}"
                                    href="{{ $users->url($i) }}">{{ $i }}</a>
                                @endfor
                                <a href="{{ $users->nextPageUrl() }}" class="btn btn-success">
                                    <i class="mdi mdi-chevron-right"></i>
                                </a>
                        </div>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
        <script>
            function deleteData1(id) {
                Swal.fire({
                    title: 'PERINGATAN!',
                    text: "Yakin ingin menghapus data petugas?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.value) {
                        $('#delete' + id).submit();
                    }
                })
            }
</script>
 @endsection
        