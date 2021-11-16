@extends('layouts.atlantis')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">BARANG</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">BARANG</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <!-- data table start -->
        <div class="col-md-12 col-12">
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <h4 class="card-title">Data Barang</h4>
                        </div>
                        <div class="col-md-6 col-12 text-right">
                            <button type="hidden" onclick="add()"
                            class="btn btn-rounded btn-outline-info float-right mb-3"><i
                                class="ti-plus"> </i>
                            Tambah</button>
                        <button type="hidden" onclick="reload_table()"
                            class="btn btn-rounded btn-outline-secondary float-right mb-3 mr-1"><i
                                class="ti-reload"> </i> Reload</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="display table table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Satuan</th>
                                    <th>Pemasukan</th>
                                    <th>Pengeluaran</th>
                                    <th>Sisa</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>
</div>
<!-- main content area end -->
@include('barang.modal')
@endsection

@section('js')
<script src="{{ url('atlantis/assets/vendor/number/jquery.number.min.js') }}"></script>

<script type="text/javascript">
    var table;
    var tipe;

    $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                  url: "{{ route('barang.index') }}",
                  type: "GET",
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                {data: 'nama'},
                {data: 'satuan'},
                {data: 'pemasukan'},
                {data: 'pengeluaran'},
                {data: 'sisa'},
                {data: 'action'},
            ],
        });

    });
        
    function info() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
                });
            Toast.fire({
                icon: 'info',
                title: 'Sukses Filter Data !'
            })          
    }

    function reload_table(){
            table.ajax.reload(null,false);
        }

        function delete_data(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },
            })
            swalWithBootstrapButtons.fire({
                title: 'Konfirmasi !',
                text: "Anda Akan Menghapus Data ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus !',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                $.ajax({
                    url : "jurnal-harian/" + id,
                    type: "DELETE",
                    dataType: "JSON",
                    success: function(data){
                        reload_table();
                        sukses();
                    },
                    error: function (jqXHR, textStatus , errorThrown){ 
                        console.log(errorThrown);
                    }
                })
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Batal',
                    'Data tidak dihapus',
                    'error'
                )
                }
            })
        }
    

        function add(){
            $('#form')[0].reset(); // reset form on modals
            $('#modal-form').modal('show'); // show bootstrap modal
            $('.modal-title').text('Input Data Barang'); // Set Title to Bootstrap modal title
        }

        function save(){
            $.ajax({
                url : "{{ route('barang.store') }}",
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data){
                    console.log(data);
                    if(data.status) {
                        $('#modal-form').modal('hide');
                        reload_table();
                        sukses();
                    }else{
                        if(data.errors.nama){
                            $('#nama').text(data.errors.nama[0]);
                        }if(data.errors.satuan){
                            $('#satuan').text(data.errors.satuan[0]);
                        }
                    }
                },
                error: function (jqXHR, textStatus , errorThrown){ 
                    alert(errorThrown);
                }
            });
        }

</script>
@endsection