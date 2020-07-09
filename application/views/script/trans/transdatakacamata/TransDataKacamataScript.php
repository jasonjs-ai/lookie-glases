<script>
    $(document).ready(function() {
        $("#menuTrans").addClass("menu-open").find(">.nav-link").slideDown(500);
        $("#menuTransParent").addClass("active");
        $("#menuTransDataKacamata").addClass("active");
        // Setup - add a text input to each footer cell
        $('#tbdata thead tr').clone(true).appendTo('#tbdata thead');
        $('#tbdata thead tr:eq(1) th').each(function(i) {

            if (i > 1 && i < 4 || i == 7) {
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
                    "data": "ID",
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
                    "data": "code",
                    "targets": 2,
                    "width": "10%"
                },
                {
                    "data": "name",
                    "targets": 3,
                    "width": "20%"
                },
                {
                    "data": "front",
                    "targets": 4,
                    "width": "20%",
                    "render": function(url, type, full) {
                        return '<img height="20%" width="50%" src="' +  "<?= base_url() . $this->config->item('GlassesImageUploadPath') ; ?>" + full.code.toLowerCase() + "/" + full.front.toLowerCase() + '"/>';
                    }
                },
                {
                    "data": "left",
                    "targets": 5,
                    "width": "20%",
                    "render": function(url, type, full) {
                        return '<img height="20%" width="50%" src="' +  "<?= base_url() . $this->config->item('GlassesImageUploadPath') ; ?>" + full.code.toLowerCase() + "/" + full.left.toLowerCase() + '"/>';
                    }
                },
                {
                    "data": "right",
                    "targets": 6,
                    "width": "20%",
                    "render": function(url, type, full) {
                        return '<img height="20%" width="50%" src="' +  "<?= base_url() . $this->config->item('GlassesImageUploadPath') ; ?>" + full.code.toLowerCase() + "/" + full.right.toLowerCase() + '"/>';
                    }
                },
                {
                    "data": "keterangan",
                    "targets": 7,
                    "width": "10%"
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
                    var idData = ($("#id").val() != "" && $("#id").val() != undefined) ? $("#id").val() : "";
                    var form_data = new FormData();
                    var front_data = null;
                    if ($("#front").val() != "") {
                        front_data = document.querySelector('#front').files[0];
                        form_data.append("front", front_data);
                    }
                    var left_data = null;
                    if ($("#left").val() != "") {
                        left_data = document.querySelector('#left').files[0];
                        form_data.append("left", left_data);
                    }
                    var right_data = null;
                    if ($("#right").val() != "") {
                        right_data = document.querySelector('#right').files[0];
                        form_data.append("right", right_data);
                    }
                    form_data.append('id', idData);
                    form_data.append('code', $("#code").val());
                    form_data.append('name', $("#name").val());
                    form_data.append('keterangan', $("#keterangan").val());
                    $.ajax({
                        type: 'POST',
                        url: window.location.href + "/Save",
                        data: form_data,
                        contentType: false,
                        processData: false,
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
                    id: data.ID
                },
                success: function(response) {
                    $("#id").val(response.ID);
                    $("#code").val(response.Code);
                    $("#name").val(response.Name);
                    $("#front_url").val(response.Front);
                    $("#left_url").val(response.Left);
                    $("#right_url").val(response.Right);
                    $("#keterangan").val(response.Keterangan);
                    $("#preview_front").attr("src", response.Front);
                    $("#preview_left").attr("src", response.Left);
                    $("#preview_right").attr("src", response.Right);
                    $("#crudModal").modal('show');
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
                            id: data.ID
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

    function previewFileFront() {
        var preview = document.querySelector('#preview_front');;
        var file = document.querySelector('#front').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
            $("#btClearImagesFront").show();
            $("#front_url").val(file);
        } else {
            preview.src = "<?= base_url() . "assets/img/upload.png"; ?>";
            $("#btClearImagesFront").hide();
        }
    }

    function clearImagesFront() {
        $("#front").val(null);
        var preview = document.querySelector('#preview_front');
        preview.src = "<?= base_url() . "assets/img/upload.png"; ?>";
        $("#btClearImagesFront").hide();
    }

    function previewFileLeft() {
        var preview = document.querySelector('#preview_left');;
        var file = document.querySelector('#left').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
            $("#btClearImagesLeft").show();
            $("#left_url").val(file);
        } else {
            preview.src = "<?= base_url() . "assets/img/upload.png"; ?>";
            $("#btClearImagesLeft").hide();
        }
    }

    function clearImagesLeft() {
        $("#left").val(null);
        var preview = document.querySelector('#preview_left');
        preview.src = "<?= base_url() . "assets/img/upload.png"; ?>";
        $("#btClearImagesLeft").hide();
    }

    function previewFileRight() {
        var preview = document.querySelector('#preview_right');;
        var file = document.querySelector('#right').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
            $("#btClearImagesRight").show();
            $("#right_url").val(file);
        } else {
            preview.src = "<?= base_url() . "assets/img/upload.png"; ?>";
            $("#btClearImagesRight").hide();
        }
    }

    function clearImagesRight() {
        $("#right").val(null);
        var preview = document.querySelector('#preview_right');
        preview.src = "<?= base_url() . "assets/img/upload.png"; ?>";
        $("#btClearImagesRight").hide();
    }

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
            $("#code").val("<AUTO_GENERATE>");
            $("#code").prop('disabled', false);
            $("#front_url").val("");
            $("#left_url").val("");
            $("#right_url").val("");
            $("#preview_front").attr("src", "<?= base_url() . "assets/img/upload.png"; ?>");
            $("#preview_left").attr("src", "<?= base_url() . "assets/img/upload.png"; ?>");
            $("#preview_right").attr("src", "<?= base_url() . "assets/img/upload.png"; ?>");
        } else if (action == "edit") {
            $("#code").prop('disabled', true);
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
</script>
</body>

</html>