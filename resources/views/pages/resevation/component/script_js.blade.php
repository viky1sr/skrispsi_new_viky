
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
            {data: 'date_reservation',name: 'date_reservation', render: (data,type,row) => {
                    let today = new Date(row.date_reservation);
                    let isDate = today.getFullYear() + '-' + (today.getMonth()+1) + '-' + today.getDate();
                    return isDate;
                }
            },
            {data: 'hour_reservation',name: 'hour_reservation'},
            {data: 'id',name: 'id', render: (data,type,row) => {
                    return row.r_genetic != undefined ? 'Yes' : 'No'
                }
            },
            {data: 'status.status_name',name: 'status.status_name'},
            @role('admin')
            {data: 'id',name: 'id', render: (data,type,row) => {
                    let checkStatusDel =  row.status_id >= 0 ? true : false;
                    let checkStatusUp =  row.status_id > 1 ? true : false;

                    return  `
                     <div class="dropdown custom-dropdown text-center">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink4">
                                <a class="dropdown-item" href="javascript:void(0);">View</a>
                                <a class="dropdown-item ${checkStatusUp == true ? 'd-none': ''}" onclick="updateStatus(${row.id})" >Update Status</a>
                                <a class="dropdown-item  ${checkStatusDel ==  true ? 'd-none': ''}" onclick="deleteData(${row.id})">Delete</a>
                            </div>
                        </div>
                    `
                }
            },
            @endrole
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
                $('.submitStatus').addClass('d-none');
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
                            setTimeout(() => {
                                $('.submitStatus').removeClass('d-none');
                            },2000)
                        }
                    },
                    error: (data) => {
                        var data = data.responseJSON;
                        if(data.status == "fail"){
                            toastr["error"](data.message);
                            $('.submitStatus').removeClass('d-none');
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
