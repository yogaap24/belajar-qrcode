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
                    <a href="{{ route('home')}}" type="button" class="kanan btn btn-primary btn-sm">
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                       <div class="form-group">
				            <input type="hidden" value="{{$sertifikat->id}}" name="id">
                                <strong>Nama Lenkap: </strong>
                                <input type="text" name="nama_lengkap" class="form-control" value="{{$sertifikat->nama_lengkap}}" disabled
                                    placeholder="Masukkan Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <strong>Tanggal lahir : </strong>
                                <input type="text" name="tanggal_lahir" class="date form-control" value="{{$sertifikat->tanggal_lahir}}" disabled
                                    placeholder="Masukkan Tanggal lahir">
                            </div>
                            <div class="form-group">
                                <strong>Gender : </strong>
                                <select name="gender" class="form-control" disabled>
                                    <option value="">-- Plih Gender --</option>
                                    <option value="1" {{ $sertifikat->gender == 1 ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="2" {{ $sertifikat->gender == 2 ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <strong>No Sertifikat: </strong>
                                <input type="number" name="no_sertifikat" class="form-control" value="{{$sertifikat->no_sertifikat}}" disabled
                                    placeholder="Masukkan No Sertifikat">
                            </div>
                            <div class="form-group">
                                <strong>Tanggal test : </strong>
                                <input type="text" name="tanggal_test" class="date form-control" value="{{$sertifikat->tanggal_test}}" disabled
                                    placeholder="Masukkan Tanggal test">
                            </div>
                            <div class="form-group">
                                <strong>Id test: </strong>
                                <input type="number" name="id_test" class="form-control" value="{{$sertifikat->id_test}}" disabled
                                    placeholder="Masukkan Id test">
                            </div>
                            <div class="form-group">
                                <strong>Section 1 : </strong>
                                <input type="text" name="sect_1" class="form-control" value="{{$sertifikat->sect_1}}" disabled
                                    placeholder="Masukkan Section 1">
                            </div>
                            <div class="form-group">
                                <strong>Score: </strong>
                                <input type="number" name="score_1" class="form-control" value="{{$sertifikat->score_1}}" disabled
                                    placeholder="Masukkan Score">
                            </div>
                            <div class="form-group">
                                <strong>Section 2 : </strong>
                                <input type="text" name="sect_2" class="form-control" value="{{$sertifikat->sect_2}}" disabled
                                    placeholder="Masukkan Section 2">
                            </div>
                            <div class="form-group">
                                <strong>Score: </strong>
                                <input type="number" name="score_2" class="form-control" value="{{$sertifikat->score_2}}" disabled
                                    placeholder="Masukkan Score">
                            </div>
                            <div class="form-group">
                                <strong>Section 3 : </strong>
                                <input type="text" name="sect_3" class="form-control" value="{{$sertifikat->sect_3}}" disabled
                                    placeholder="Masukkan Section 3">
                            </div>
                            <div class="form-group">
                                <strong>Score: </strong>
                                <input type="number" name="score_3" class="form-control" value="{{$sertifikat->score_3}}" disabled
                                    placeholder="Masukkan Score">
                            </div>
                            <div class="form-group">
                                <strong>Total Score: </strong>
                                <input type="number" name="score_3" class="form-control" value="{{$sertifikat->score_1 + $sertifikat->score_2 + $sertifikat->score_3 }}" disabled
                                    placeholder="Masukkan Score">
                            </div>
		</div>
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
