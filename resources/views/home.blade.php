@extends('layouts.app')

<style>
    .kanan {
        margin-left: 75%;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sertifikat') }}
                    <button type="button" class="kanan btn btn-primary btn-sm" data-toggle="modal"
                        data-target="#modalCreate">
                        <i class="fas fa-plus-square"></i> Tambah
                    </button>
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No Sertifikat</th>
                                <th scope="col">ID Test</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sertifikat as $sertif)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sertif->nama_lengkap }}</td>
                                <td>{{ $sertif->no_sertifikat }}</td>
                                <td>{{ $sertif->id_test }}</td>
                                <td>
                                    <form action="{{ route('deleteSertifikat', $sertif->id) }}" method="POST">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                        			data-target="#modalView">
                        			<i class="fas fa-eye"></i>
                    			</button>
                                        <a href="{{ route('editSertifikat', $sertif->id) }}" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-icon-split" id="deleteBtn"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" data-id="{{ $sertif->id }}">
                                            <i class="fas fa-trash"></i>
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
        <!-- Modal Create -->
        <div class="modal fade" id="modalCreate" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <form action="{{ route('saveSertifikat')}}" method="POST" enctype="multipart/form-data" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title float-left" id="scrollmodalLabel">Sertifikat Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <strong>Nama Lenkap: </strong>
                            <input type="text" name="nama_lengkap" class="form-control"
                                placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <strong>Tanggal lahir : </strong>
                            <input type="text" name="tanggal_lahir" class="date form-control" id="tanggallahir"
                                placeholder="Masukkan Tanggal lahir">
                        </div>
                        <div class="form-group">
                            <strong>Gender : </strong>
                            <select name="gender" class="form-control" id="gender">
                                <option value="">-- Plih Gender --</option>
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <strong>No Sertifikat: </strong>
                            <input type="number" name="no_sertifikat" class="form-control"
                                placeholder="Masukkan No Sertifikat">
                        </div>
                        <div class="form-group">
                            <strong>Tanggal test : </strong>
                            <input type="text" name="tanggal_test" class="date form-control" id="tanggaltest"
                                placeholder="Masukkan Tanggal test">
                        </div>
                        <div class="form-group">
                            <strong>Id test: </strong>
                            <input type="number" name="id_test" class="form-control"
                                placeholder="Masukkan Id test">
                        </div>
                        <div class="form-group">
                            <strong>Section 1 : </strong>
                            <input type="text" name="sect_1" class="form-control"
                                placeholder="Masukkan Section 1">
                        </div>
                        <div class="form-group">
                            <strong>Score: </strong>
                            <input type="number" name="score_1" class="form-control"
                                placeholder="Masukkan Score">
                        </div>
                        <div class="form-group">
                            <strong>Section 2 : </strong>
                            <input type="text" name="sect_2" class="form-control"
                                placeholder="Masukkan Section 2">
                        </div>
                        <div class="form-group">
                            <strong>Score: </strong>
                            <input type="number" name="score_2" class="form-control"
                                placeholder="Masukkan Score">
                        </div>
                        <div class="form-group">
                            <strong>Section 3 : </strong>
                            <input type="text" name="sect_3" class="form-control"
                                placeholder="Masukkan Section 3">
                        </div>
                        <div class="form-group">
                            <strong>Score: </strong>
                            <input type="number" name="score_3" class="form-control"
                                placeholder="Masukkan Score">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="modalView" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <form action="{{ route('saveSertifikat')}}" method="POST" enctype="multipart/form-data" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title float-left" id="scrollmodalLabel">Sertifikat Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="visible-print text-center">
    				{!! QrCode::size(100)->generate(route('viewSertifikat', $sertif->id)); !!}
    				<a href="{{ route('viewSertifikat', $sertif->id) }}"> Detail Sertifikat </a>
			    </div>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    $(document).ready(function ()
    {
        $(document).on('click', '.date', function(){
            $(this).datepicker({
                changeMonth: true,
                changeYear: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true
            }).focus();
        });
    });
</script>
@endsection
