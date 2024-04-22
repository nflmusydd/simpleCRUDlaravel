@extends('mahasiswa.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>List Mahasiswa</h2>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-success" href="{{ route('mahasiswa.create') }}">Tambahkan Mahasiswa Baru</a>
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
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>Domisili</th>
            <th width="280px">Operasi</th>
        </tr>
        @foreach ($mahasiswas as $mahasiswa)
        <tr>
            {{-- {{ $mahasiswa->namaKolomDiDatabase }} --}}
            {{-- <td>{{ $mahasiswa->id }}</td> --}}
            <td>{{ $mahasiswa->NIM }}</td>
            <td>{{ $mahasiswa->Nama }}</td>
            <td>{{ $mahasiswa->Email }}</td>
            <td>{{ $mahasiswa->NoTelp }}</td>
            {{-- Hanya menampilkan 1 kata terakhir dari domisili --}}
            <td>{{ explode(' ', $mahasiswa->Domisili)[count(explode(' ', $mahasiswa->Domisili)) - 1] }}</td>

            <td>
                <form action="{{ route('mahasiswa.destroy',$mahasiswa->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('mahasiswa.show',$mahasiswa->id) }}">Lihat</a>
                    <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mahasiswa->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    {{-- <button type="submit" class="btn btn-danger">Hapus</button> --}}
                    <button class="btn btn-danger deleteBtn" data-url="{{ route('mahasiswa.destroy', $mahasiswa->id) }}">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    
    <div class="col-lg-12">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('mahasiswa.create') }}">Tambahkan Mahasiswa Baru</a>
        </div>
    </div>

    {{ $mahasiswas->links() }}

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data Mahasiswa ini?
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> --}}
                    <button type="button" class="btn btn-secondary" id="closeModalBtn">Batal</button>
                    <br>
                    <form id="deleteForm" action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST">
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
