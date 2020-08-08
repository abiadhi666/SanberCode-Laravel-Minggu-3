@extends('adminlte.master')

@section('content')
<div class="container-fluid">
    <!-- <div class="row"> -->
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
        </div>
    </div>
    <!-- <div class="row"> -->
        <div class="mt-3 ml-3">
            <div class="card">
                <div class="card-body">
                    <a href="/pertanyaan/create" class="btn btn-primary btn-sm mb-3">Tambah Pertanyaan</a>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pertanyaan as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$p->judul}}</td>
                                <td>{{$p->isi}}</td>
                                <td class="text-center"><a href="/pertanyaan/{{$p->id}}" class="btn btn-xs btn-info">Detail</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection

@push('script')
    <!-- DataTables -->
    <script src="{{asset('/adminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Etc -->
    <script>
        $.widget.bridge("uibutton", $.ui.button);
        $(function () {
            $("#example1").DataTable();
        });
    </script>
@endpush