<script>
    $(document).ready(function() {
        $("#menuSettings").addClass("active");

        var btClearImage = $("#btClearImages");
        if (btClearImage != undefined) {
            var img_url = $("#img_url").val();
            if (img_url != "" && img_url != null) {
                btClearImage.show();
            } else {
                btClearImage.hide();
            }
        }

        $('#btnSave').click(function() {
            event.preventDefault();
            if (CheckRequired()) {
                if (CheckValidate()) {
                    var form_data = new FormData();
                    var logo_data = null;
                    if ($("#logo").val() != "") {
                        logo_data = document.querySelector('#logo').files[0];
                        form_data.append("logo", logo_data);
                    }
                    form_data.append('COMPANY_NAME', $("#company_name").val());
                    form_data.append('ADDRESS', $("#address").val());
                    form_data.append('PHONE', $("#phone").val());
                    form_data.append('EMAIL', $("#email").val());

                    $.ajax({
                        type: 'POST',
                        url: window.location.href + "/Save",
                        data: form_data,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.status) {
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
    });

    function previewFile() {
        var preview = document.querySelector('#preview_logo ');;
        var file = document.querySelector('#logo').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
            $("#btClearImages").show();
        } else {
            preview.src = "<?= base_url() . "assets/img/upload.png"; ?>";
            $("#btClearImages").hide();
        }
    }

    function clearImages() {
        $("#logo").val(null);
        var preview = document.querySelector('#preview_logo ');
        preview.src = "<?= base_url() . "assets/img/upload.png"; ?>";
        $("#btClearImages").hide();
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