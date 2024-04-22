@extends('dosen.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>List Dosen</h2>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-success" href="{{ route('dosen.create') }}">Tambahkan Dosen Baru</a>
            </div> --}}
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            {{-- <th>ID</th> --}}
            <th>Kode Dosen</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>Domisili</th>
            <th width="280px">Operasi</th>
        </tr>
        @foreach ($dosens as $dosen)
        <tr>
            {{-- {{ $dosen->namaKolomDiDatabase }} --}}
            {{-- <td>{{ $dosen->id }}</td> --}}
            <td>{{ $dosen->KodeDosen }}</td>
            <td>{{ $dosen->Nama }}</td>
            <td>{{ $dosen->Email }}</td>
            <td>{{ $dosen->NoTelp }}</td>
            {{-- Hanya menampilkan 1 kata terakhir dari domisili --}}
            <td>{{ explode(' ', $dosen->Domisili)[count(explode(' ', $dosen->Domisili)) - 1] }}</td>

            <td>
                <form action="{{ route('dosen.destroy',$dosen->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('dosen.show',$dosen->id) }}">Lihat</a>
                    <a class="btn btn-primary" href="{{ route('dosen.edit',$dosen->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    {{-- <button type="submit" class="btn btn-danger">Hapus</button> --}}
                    <button class="btn btn-danger deleteBtn" data-url="{{ route('dosen.destroy', $dosen->id) }}">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
    <div class="col-lg-12">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('dosen.create') }}">Tambahkan Dosen Baru</a>
        </div>
    </div>

    {{ $dosens->links() }}

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data Dosen ini?
                </div>
                <div class="modal-footer">
                    {{-- {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> --}}
                    <button type="button" class="btn btn-secondary" id="closeModalBtn">Batal</button>
                    <br>
                    {{-- <form id="deleteForm" action="{{ route('dosen.destroy', $dosen->id) }}" method="POST"> --}}
                        <form id="deleteForm" action="{{ route('dosen.destroy', isset($dosen) ? $dosen->id : '') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 

    <!-- JavaScript to trigger the modal -->
    
    <script>
        $(document).ready(function(){
            $('.deleteBtn').on('click', function(e){
                e.preventDefault(); // Prevent default form submission
                $('#deleteConfirmationModal').modal('show');
                $('#deleteForm').attr('action', $(this).data('url'));
            });
            $('#closeModalBtn').on('click', function() {
                $('#deleteConfirmationModal').modal('hide');
            });
        });

    </script>
     
@endsection
