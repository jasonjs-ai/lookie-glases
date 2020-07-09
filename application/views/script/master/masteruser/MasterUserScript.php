<script>
    $(document).ready(function() {
        $("#menuMaster").addClass("menu-open").find(">.nav-link").slideDown(500);
        $("#menuMasterParent").addClass("active");
        $("#menuMasterUser").addClass("active");
        $('#level').select2({
            placeholder: "Pilih Level"
        });

        $('#tanggal_lahir').daterangepicker({
            locale: {
                format: 'DD/MM/YYYY',
            },  
            singleDatePicker: true,
        });

        GetListLevel();
        // Setup - add a text input to each footer cell
        $('#tbdata thead tr').clone(true).appendTo('#tbdata thead');
        $('#tbdata thead tr:eq(1) th').each(function(i) {

            if (i > 1) {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Cari ' + title + '" />');

                $('input', this).on('keyup change', function() {
                    if (tbdata.column(i).search() !== this.value) {
                        tbdata
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            } else {
                var title = $(this).text();
                $(this).html('');
            }
        });
        var tbdata = $("#tbdata").DataTable({
            dom: "Bfrtip",
            orderCellsTop: true,
            fixedHeader: true,
            buttons: [{
                text: "+ Tambah data baru",
                action: function(e, dt, node, config) {
                    $("#crudLabel").text("Tambah Data");
                    $("#action").val("add");
                    $('#crudModal').modal('show');
                    InitElement("add");
                },
                className: "btn-sm btn-default btn-new newdata"
            }],
            ajax: {
                "url": window.location.href + "/GetListData",
                "type": "POST",
                "data": function(d) {

                }
            },
            "columnDefs": [{
                    "data": "user_id",
                    "visible": false,
                    "orderable": false,
                    "targets": 0
                },
                {
                    "data": null,
                    "orderable": false,
                    "width": "10%",
                    "render": function(data, type, full, meta) {
                        var actionbutton = "";
                        actionbutton = "<center>";
                        actionbutton += "<a href=\"#\" id=\"btedit\"><i class=\"fas fa-edit\" rel=\"tooltip\" title=\"Sunting\"></i> </a>&nbsp;&nbsp;";
                        if ($("#session_level").val() == "1" || $("#session_level").val() == "2") {
                            actionbutton += "<a href=\"#\" id=\"btdelete\"><i class=\"fas fa-trash\" rel=\"tooltip\" title=\"Hapus\"></i> </a>&nbsp;&nbsp;";
                        }
                        return actionbutton;
                    },
                    "targets": 1
                },
                {
                    "data": "username",
                    "targets": 2,
                    "width": "20%"
                },
                {
                    "data": "first_name",
                    "targets": 3,
                    "width": "20%"
                },
                {
                    "data": "last_name",
                    "targets": 4,
                    "width": "20%"
                },
                {
                    "data": "level_name",
                    "targets": 5,
                    "width": "20%"
                },
                {
                    "data": "email",
                    "targets": 6,
                    "width": "20%"
                },
                {
                    "data": "keterangan",
                    "targets": 7,
                    "width": "30%"
                },
            ],
            "scrollX": true,
            "order": [],
            "fnDrawCallback": function() {
                if (Math.ceil((this.fnSettings().fnRecordsDisplay()) / this.fnSettings()._iDisplayLength) > 1) {
                    $(".dataTables_paginate").css("display", "block");
                } else {
                    $(".dataTables_paginate").css("display", "none");
                }

                if ($("#session_level").val() == "1" || $("#session_level").val() == "2") {

                } else {

                }
            }
        });

        $('#btSubmit').click(function(e) {
            event.preventDefault();
            $("#formData").submit();
        });

        $("#formData").submit(function(e) {
            e.preventDefault();
            if (CheckRequired()) {
                if (CheckValidate()) {
                    var idData = ($("#id").val() != "" && $("#id").val() != undefined) ? $("#id").val() : null;
                    $.ajax({
                        type: 'POST',
                        url: window.location.href + "/Save",
                        data: {
                            id: idData,
                            data: $("#formData").serialize()
                        },
                        success: function(response) {
                            if (response.status) {
                                $('#crudModal').modal('hide');
                                swal("Berhasil disimpan !", response.messages, "success", ).then(function() {
                                    location.reload();
                                });
                            } else {
                                swal("Gagal !", response.messages, "error", ).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            }
        });

        $("#tbdata tbody").on("click", "#btedit", function(event) {
            event.preventDefault();
            $("#crudLabel").text("Edit Data");
            $("#action").val("edit");
            InitElement("edit");
            var data = tbdata.row($(this).parents('tr')).data();
            $.ajax({
                url: window.location.href + "/Edit",
                type: "POST",
                data: {
                    id: data.user_id
                },
                success: function(response) {
                    $("#id").val(response.User_ID);
                    $("#username").val(response.Username);
                    $("#first_name").val(response.First_Name);
                    $("#last_name").val(response.Last_Name);
                    $("#tempat_lahir").val(response.POB);
                    $("#tanggal_lahir").val(response.DOB);
                    $("#email").val(response.Email);
                    $("#no_hp").val(response.Phone);
                    $("#keterangan").val(response.Keterangan);
                    $("#crudModal").modal('show');
                    $("#level").val(response.Level_Code).trigger("change");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal(
                        "Gagal !",
                        textStatus + " : " + errorThrown,
                        "error"
                    ).then(function() {
                        location.reload();
                    });
                }
            });

        });


        $("#tbdata tbody").on("click", "#btdelete", function(event) {
            event.preventDefault();
            var data = tbdata.row($(this).parents('tr')).data();
            swal({
                title: "Hapus data ?",
                text: "Anda tidak akan dapat mengembalikan ini!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-success",
                cancelButtonClass: "btn btn-danger m-l-10",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak"
            }).then(function(inputValue) {
                if (inputValue.value) {
                    $.ajax({
                        url: window.location.href + "/Delete",
                        type: "POST",
                        data: {
                            id: data.user_id
                        },
                        success: function(response) {
                            if (response.status) {
                                swal(
                                    "Terhapus",
                                    "Data berhasil dihapus.",
                                    "success"
                                ).then(function() {
                                    location.reload();
                                });
                            } else {
                                swal(
                                    "Gagal !",
                                    response.messages,
                                    "error"
                                ).then(function() {
                                    location.reload();
                                });
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal(
                                "Gagal !",
                                textStatus + " : " + errorThrown,
                                "error"
                            ).then(function() {
                                location.reload();
                            });
                        }
                    });
                }
            })
        });
    });

    function CheckRequired() {
        var fields = document.getElementById("formData").querySelectorAll("[required]");
        var result = true;
        $.each(fields, function(i, field) {
            if (!field.value) {
                toastr.error(field.name.charAt(0).toUpperCase() + field.name.slice(1) + ' tidak boleh kosong');
                result = false;
            }
        });
        return result;
    }

    function InitElement(action) {
        if (action == "add") {
            $("#id").val("");
            $("#formData").each(function() {
                $(this).find('.form-control').val("");
            });
            $("#username").prop('disabled', false);
            $("#level").val("").trigger("change");
        } else if (action == "edit") {
            $("#username").prop('disabled', true);
        }
    }

    function CheckValidate() {

        var message = "";
        var result = true;

        if (!result) {
            toastr.error(message);
            return false;
        } else {
            return true;
        }
    }

    function GetListLevel() {
        $('#level').empty().trigger("change");
        $.ajax({
            type: 'GET',
            url: "<?= base_url(); ?>" + "SelectList/GetListLevel",
            success: function(data) {
                for (var i = 0; i < data.length; i++) {
                    var newOption = new Option(data[i].text, data[i].value, true, true);
                    $("#level").append(newOption).trigger('change');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                toastr.error('Gagal mendapatkan data daftar akses pengguna');
            }
        });

    }
</script>
</body>

</html>