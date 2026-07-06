@extends('layouts.app')

@section('title','Isi KRS')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0 rounded-4">

        <div class="card-header bg-primary text-white">

            <h4 class="mb-0">

                <i class="bi bi-journal-plus"></i>

                Form Pengisian KRS

            </h4>

        </div>

        <div class="card-body">

            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('krs.store') }}" method="POST">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Tahun Ajaran

                        </label>

                        <input type="text"
                               name="tahun_ajaran"
                               class="form-control"
                               placeholder="2026/2027"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Semester

                        </label>

                        <select name="semester"
                                class="form-select"
                                required>

                            <option value="">Pilih Semester</option>

                            <option value="ganjil">

                                Ganjil

                            </option>

                            <option value="genap">

                                Genap

                            </option>

                        </select>

                    </div>

                </div>

                <hr>

                <h5 class="fw-bold">

                    Pilih Mata Kuliah

                </h5>

                <div class="table-responsive">

                    <table class="table table-bordered align-middle">

                        <thead class="table-light">

                        <tr>

                            <th width="60">Pilih</th>

                            <th>Kode</th>

                            <th>Mata Kuliah</th>

                            <th>Dosen</th>

                            <th>Hari</th>

                            <th>Jam</th>

                            <th>SKS</th>

                        </tr>

                        </thead>

                        <tbody>

                        @foreach($kelas as $item)

                        <tr>

                            <td>

                                <input
                                    type="checkbox"
                                    name="kelas[]"
                                    value="{{ $item->id }}"
                                    class="kelas-checkbox"
                                    data-sks="{{ $item->mataKuliah->sks }}">

                            </td>

                            <td>

                                {{ $item->kode_kelas }}

                            </td>

                            <td>

                                {{ $item->mataKuliah->nama_matkul }}

                            </td>

                            <td>

                                {{ $item->dosen->nama_dosen }}

                            </td>

                            <td>

                                {{ $item->hari }}

                            </td>

                            <td>

                                {{ $item->jam }}

                            </td>

                            <td>

                                {{ $item->mataKuliah->sks }}

                            </td>

                        </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

                <div class="alert alert-info mt-3">

                    Total SKS :

                    <strong>

                        <span id="totalSKS">

                            0

                        </span>

                    </strong>

                </div>

                <div class="text-end">

                    <a href="{{ route('krs.index') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                    <button class="btn btn-primary">

                        Simpan KRS

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

let total = 0;

const totalSKS = document.getElementById('totalSKS');

document.querySelectorAll('.kelas-checkbox').forEach(function(item){

    item.addEventListener('change',function(){

        if(this.checked){

            total += parseInt(this.dataset.sks);

        }else{

            total -= parseInt(this.dataset.sks);

        }

        totalSKS.innerHTML = total;

    });

});

</script>

@endpush