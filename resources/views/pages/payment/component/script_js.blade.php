
<script type="text/javascript">
    function formatRupiah(angka, prefix){
        var number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
            split   	    = number_string.split(','),
            sisa     		= split[0].length % 3,
            rupiah     		= split[0].substr(0, sisa),
            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] !== undefined ? rupiah + "," + split[1] : rupiah;
        return prefix === undefined ? rupiah : rupiah ? `Rp. ${rupiah}` : "";
    }

    oTable = $('#style-1').DataTable({
        oLanguage: {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        processing : true,
        serverSide : true,
        searching : false,
        ajax: {
            url: '{{route('resevation.datatable')}}',
            type: 'GET',
            data: function (d){

            }
        },
        columns : [
            {data: 'id',name: 'id', render: (data,type,row) => {
                    return row.type_reservation_id == 1 ? 'Home Care': 'Baby Spa';
                }
            },
            {data: 'id',name: 'id' , render: (data,type,row) => {
                    if(row.type_reservation_id == 1){
                        return row.master_data.name
                    } else {
                        return  row.master_data_2.name
                    }
                }
            },
            {data: 'master_data.price',name: 'master_data.price',render: (data,type,row) => {
                    if(row.type_reservation_id == 1){
                        return formatRupiah(row.master_data.price, 'Rp. ');
                    } else {
                        return formatRupiah(row.master_data_2.price, 'Rp. ');
                    }
                }
            },
            {data: 'total_price',name: 'total_price', render: (data,type,row) => {
                    let getTotalMeet = (row.reservation_meet != null ? row.reservation_meet * row.reservation_repeat.replace('_minggu','') : 1);
                    return `${getTotalMeet}x Pertemuan`
                }
            },
            {data: 'total_price',name: 'total_price', render: (data,type,row) => {
                    let getTotalPrice = (row.type_reservation_id == 1 ? row.master_data.price : row.master_data_2.price) *
                        (row.reservation_meet != null ? row.reservation_meet * row.reservation_repeat.replace('_minggu','') : 1);
                    return formatRupiah(getTotalPrice,'Rp. ')
                }
            },
            {data: 'total_price',name: 'total_price', render: (data,type,row) => {
                    return formatRupiah(row.total_price,'Rp. ')
                }
            },
            {data: 'date_reservation',name: 'date_reservation', render: (data,type,row) => {
                    let today = new Date(row.date_reservation);
                    let isDate = today.getFullYear() + '-' + (today.getMonth()+1) + '-' + today.getDate();
                    return isDate;
                }
            },
            {data: 'id',name: 'id', render: (data,type,row) => {
                    return `<button type="button" class="btn btn-primary" style="margin-left: 6em">Bayar Sekarang</button>`
                }
            },
        ],
        lengthMenu: [5, 10, 20, 50],
        pageLength: 5,
    });

    multiCheck(oTable);


    const updateStatus = id => {
        if(id > 0) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Update Status');
            $('#id').val(id);
            $('.submitStatus').click( (e) => {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '{{url('/resevation/edit')}}' + '/' + id,
                    data: new FormData($('#updateStatusForm')[0]),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: (data) => {
                        if(data.status == "ok"){
                            oTable.ajax.reload();
                            $('#modal-form').modal('hide');
                            toastr["success"](data.message);
                        }
                    },
                    error: (data) => {
                        var data = data.responseJSON;
                        if(data.status == "fail"){
                            toastr["error"](data.message);
                        }
                    }
                });
            })
        }
    }


    const deleteData = id => {
        alert(id)
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        swal({
            title: 'Yakin ingin menghapus data?',
            text: "Data yang sudah di hapus tidak bisa di kembalikan!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            padding: '2em'
        }).then(function(result) {
            if (result == true) {
                $.ajax({
                    url : "",
                    type : "POST",
                    data : {'_method' : 'DELETE', '_token' : csrf_token},
                    success : data => {
                        oTable.ajax.reload();
                        if(data.status == "ok"){
                            swal(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    },
                    error: function(data){
                        var data = data.responseJSON;
                        if(data.status == "fail"){
                            toastr["error"](data.message);
                        }
                    }
                });
            }
        })
    };
</script>
