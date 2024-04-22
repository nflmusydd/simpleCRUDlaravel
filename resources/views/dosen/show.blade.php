@extends('dosen.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><span class="text-info">{{ $dosen->Nama }}</span></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('dosen.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('Foto/person.png') }}" style="max-width:100%;" />
        </div>
        <br>
        <div class="col-md-8">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>ID Dosen:</strong><br>
                    <span class="text-info">{{ $dosen->KodeDosen }}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Email:</strong><br>
                    <span class="text-info">{{ $dosen->Email }}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>No Telp:</strong><br>
                    <span class="text-info">{{ $dosen->NoTelp }}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Domisili:</strong><br>
                    <span class="text-info">{{ $dosen->Domisili }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
