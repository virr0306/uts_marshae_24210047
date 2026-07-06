@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@push('styles')
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

.dataTables_filter input{
    border-radius:8px !important;
}

.dataTables_length select{
    border-radius:8px !important;
}

</style>
@endpush

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                <i class="bi bi-mortarboard-fill text-primary"></i>
                Data Mahasiswa
            </h2>

            <small class="text-muted">
                Kelola seluruh data mahasiswa ITBSS
            </small>

        </div>

        <a href="{{ route('mahasiswa.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Tambah Mahasiswa

        </a>

    </div>

    <!-- Card -->
    <div class="card shadow border-0 rounded-4">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h5 class="fw-bold mb-0">

                    Daftar Mahasiswa

                </h5>

                <span class="badge bg-primary fs-6">

                    {{ $mahasiswa->count() }} Data

                </span>

            </div>

            <div class="table-responsive">

                <table id="tableMahasiswa"
                       class="table table-hover align-middle">

                    <thead class="table-primary">

                        <tr>

                            <th>No</th>

                            <th>Nama Lengkap</th>

                            <th>NIM</th>

                            <th>NIDN</th>

                            <th>Tempat / Tanggal Lahir</th>

                            <th>Alamat</th>

                            <th>Dibuat</th>

                            <th width="170">

                                Aksi

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @foreach($mahasiswa as $m)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>

                                <strong>

                                    {{ $m->fullname }}

                                </strong>

                            </td>

                            <td>

                                <span class="badge bg-primary">

                                    {{ $m->NIM }}

                                </span>

                            </td>

                            <td>

                                {{ $m->NIDN }}

                            </td>

                            <td>

                                {{ $m->tempat_lahir }}

                                <br>

                                <small class="text-muted">

                                    {{ $m->tanggal_lahir->format('d F Y') }}

                                </small>

                            </td>

                            <td>

                                {{ $m->alamat }}

                            </td>

                            <td>

                                {{ $m->created_at->format('d/m/Y') }}

                            </td>

                            <td>

                                <a href="{{ route('mahasiswa.edit',$m->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                <form action="{{ route('mahasiswa.destroy',$m->id) }}"
                                      method="POST"
                                      class="d-inline form-delete">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
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

@if(session('success'))

<script>

Swal.fire({

icon:'success',

title:'Berhasil',

text:'{{ session('success') }}',

timer:1800,

showConfirmButton:false

});

</script>

@endif

<script>

$(function(){

$('#tableMahasiswa').DataTable({

responsive:true,

autoWidth:false,

pageLength:10,

lengthMenu:[
[10,25,50,100],
[10,25,50,100]
],

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