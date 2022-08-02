<script type="text/javascript">
    $(document).ready( () => {
        $('#isService').change( function() {
            let val = $(this).val();
            let apiUrl = (val == 1) ? '/api/general/list/homecare' : '/api/general/list/babyspa';
            if(val == '1'){
                $('#noneService').removeClass('d-none')
                $('.isLabel').html('<label for="template-contactform-service ">List Harga Home Care</label>')
            } else if(val == '2'){
                $('#noneService').removeClass('d-none')
                $('.isLabel').html('<label for="template-contactform-service ">List Harga Baby SPA</label>')
            } else {
                $('#noneService').addClass('d-none')
            }

            $('.selectMaster').select2({
                ajax: {
                    url: apiUrl,
                    type: "get",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            filter: params.term, // search term
                            limit: 15,
                        };
                    },
                    processResults: function (response) {
                        console.log('vikyy',response)
                        return {
                            results: response.data
                        };
                    },
                    cache: true
                },
                templateResult: function (dataRow) {
                    return dataRow.name || dataRow.text;
                },
                templateSelection: function (dataRow) {
                    return dataRow.name || dataRow.text;
                }
            })
        });


        $('.storeReservation').click( (e) => {
            e.preventDefault();
            alert(123);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var form = $('#formReservation')[0];
            var formData = new FormData(form);

            $.ajax({
                type: 'POST',
                url: $(this).attr("action"),
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: (data) => {
                    if(data.status == "ok"){
                        $('.submitBtn').prop('disabled', true);
                        toastr["success"](data.message);
                        window.location.reload(true)
                    }
                },
                error: (data) => {
                    var data = data.responseJSON;
                    if(data.status == "fail"){
                        toastr["error"](data.message);
                    }
                }
            });
        });
    });
</script>
