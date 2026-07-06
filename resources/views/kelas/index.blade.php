@extends('layouts.app')

@section('title', 'Data Kelas')

@push('styles')

<link rel="stylesheet"
      href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

<style>

.card{
    border:none;
    border-radius:15px;
}

.table thead th{
    vertical-align:middle;
}

.table td{
    vertical-align:middle;
}

.btn{
    border-radius:8px;
}

.badge{
    font-size:13px;
}

</style>

@endpush

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">

                <i class="bi bi-building text-primary"></i>

                Data Kelas

            </h2>

            <small class="text-muted">

                Kelola seluruh data kelas

            </small>

        </div>

        <a href="{{ route('kelas.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Tambah Kelas

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table
                    id="tableKelas"
                    class="table table-hover">

                    <thead class="table-primary">

                        <tr>

                            <th>No</th>

                            <th>Kode Kelas</th>

                            <th>Mata Kuliah</th>

                            <th>Dosen</th>

                            <th>Hari</th>

                            <th>Jam</th>

                            <th>Ruang</th>

                            <th>Semester</th>

                            <th>Mahasiswa</th>

                            <th width="170">

                                Aksi

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @foreach($kelas as $k)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                <span class="badge bg-primary">

                                    {{ $k->kode_kelas }}

                                </span>

                            </td>

                            <td>

                                {{ $k->mataKuliah->nama_matkul ?? '-' }}

                            </td>

                            <td>

                                {{ $k->dosen->fullname ?? '-' }}

                            </td>

                            <td>

                                {{ $k->hari }}

                            </td>

                            <td>

                                {{ $k->jam }}

                            </td>

                            <td>

                                {{ $k->ruang_kelas }}

                            </td>

                            <td>

                                <span class="badge bg-success">

                                    {{ $k->semester }}

                                </span>

                            </td>

                            <td>

                                {{ $k->jumlah_mahasiswa }}

                                /

                                {{ $k->jumlah_max }}

                            </td>

                            <td>

                                <a
                                    href="{{ route('kelas.show',$k->id) }}"
                                    class="btn btn-info btn-sm">

                                    <i class="bi bi-eye"></i>

                                </a>

                                <a
                                    href="{{ route('kelas.edit',$k->id) }}"
                                    class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                <form
                                    action="{{ route('kelas.destroy',$k->id) }}"
                                    method="POST"
                                    class="d-inline form-delete">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

$(document).ready(function(){

    $('#tableKelas').DataTable({

        responsive:true,

        language:{

            search:"🔍 Cari :",

            lengthMenu:"Tampilkan _MENU_ data",

            zeroRecords:"Data tidak ditemukan",

            info:"Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

            infoEmpty:"Belum ada data",

            paginate:{

                previous:"←",

                next:"→"

            }

        }

    });

});

$('.form-delete').submit(function(e){

    e.preventDefault();

    let form=this;

    Swal.fire({

        title:'Hapus Data?',

        text:'Data yang dihapus tidak dapat dikembalikan.',

        icon:'warning',

        showCancelButton:true,

        confirmButtonColor:'#dc3545',

        cancelButtonColor:'#6c757d',

        confirmButtonText:'Ya, Hapus',

        cancelButtonText:'Batal'

    }).then((result)=>{

        if(result.isConfirmed){

            form.submit();

        }

    });

});

</script>

@endpush