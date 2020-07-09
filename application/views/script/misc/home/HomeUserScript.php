<script>
    $(document).ready(function() {
        $("#menuDashboard").addClass("active");
        $("#menuDashboard2").addClass("active");

        var tbpelangganterbaik = $("#tbpelangganterbaik").DataTable({
            dom: "Bfrtip",
            orderCellsTop: true,
            fixedHeader: true,
            buttons: [],
            ajax: {
                "url": window.location.href + "/GetListPelangganTerbaik",
                "type": "POST",
                "data": function(d) {

                }
            },
            "columnDefs": [{
                    "data": null,
                    "orderable": false,
                    "width": "10%",
                    "targets": 0
                },
                {
                    "data": "customer_code",
                    "targets": 1,
                    "width": "20%"
                },
                {
                    "data": "customer_name",
                    "targets": 2,
                    "width": "20%"
                },
                {
                    "data": "total_service",
                    "targets": 3,
                    "width": "20%",
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
                $('#tbpelangganterbaik_info').css('padding-left', 10);
                
            }
        });
        tbpelangganterbaik.on('order.dt search.dt', function() {
            tbpelangganterbaik.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        $('#tbhutang thead tr').clone(true).appendTo('#tbhutang thead');
        $('#tbhutang thead tr:eq(1) th').each(function(i) {

            if (i > 0) {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Cari ' + title + '" />');

                $('input', this).on('keyup change', function() {
                    if (tbhutang.column(i).search() !== this.value) {
                        tbhutang
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
        var tbhutang = $("#tbhutang").DataTable({
            dom: "Bfrtip",
            orderCellsTop: true,
            fixedHeader: true,
            buttons: [],
            ajax: {
                "url": window.location.href + "/GetListPiutang",
                "type": "POST",
                "data": function(d) {
                    d.cust = "<?= $base_controller->LoginInfo->username ?>";
                }
            },
            "columnDefs": [{
                    "data": null,
                    "orderable": false,
                    "width": "10%",
                    "targets": 0
                },
                {
                    "data": "code",
                    "targets": 1,
                    "width": "20%"
                },
                {
                    "data": "name",
                    "targets": 2,
                    "width": "20%"
                },
                {
                    "data": "total_service",
                    "targets": 3,
                    "width": "20%",
                    render: $.fn.dataTable.render.number('.', ',', 0, 'Rp. ')
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
                $('#tbhutang_info').css('padding-left', 10);
            }
        });
        tbhutang.on('order.dt search.dt', function() {
            tbhutang.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        $('#tbhutang thead tr').clone(true).appendTo('#tbhutang thead');
        $('#tbhutang thead tr:eq(1) th').each(function(i) {

            if (i > 0) {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Cari ' + title + '" />');

                $('input', this).on('keyup change', function() {
                    if (tbhutang.column(i).search() !== this.value) {
                        tbhutang
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
        var tbservice = $("#tbservice").DataTable({
            dom: "Bfrtip",
            orderCellsTop: true,
            fixedHeader: true,
            buttons: [],
            ajax: {
                "url": window.location.href + "/GetListService",
                "type": "POST",
                "data": function(d) {
                   
                }
            },
            "columnDefs": [{
                    "data": null,
                    "orderable": false,
                    "width": "10%",
                    "targets": 0
                },
                {
                    "data": "tanggal",
                    "targets": 1,
                    "width": "20%"
                },
                {
                    "data": "code",
                    "targets": 2,
                    "width": "20%"
                },
                {
                    "data": "unit",
                    "targets": 3,
                    "width": "20%"
                },
                {
                    "data": "service_status_name",
                    "targets": 4,
                    "width": "10%"
                },
                {
                    "data": "total",
                    "targets": 5,
                    "width": "30%",
                    render: $.fn.dataTable.render.number('.', ',', 0, 'Rp. ')
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
                $('#tbservice_info').css('padding-left', 10);
            }
        });
        tbservice.on('order.dt search.dt', function() {
            tbservice.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();


        //initChart();
    });

    function initChart() {

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }


        var mode = 'index'
        var intersect = true


        var $salesChart = $('#labarugi-chart')
            $.ajax({
                url:  window.location.href + "/GetChartLabaRugi",
                method: 'GET',
                dataType: 'json',
                success: function(d) {
                    var salesChart = new Chart($salesChart, {
                        type: 'bar',
                        data: {
                            labels: d.month,
                            datasets: [{
                                    label: 'Pemasukan',
                                    backgroundColor: '#007bff',
                                    borderColor: '#007bff',
                                    data: d.pemasukan
                                },
                                {
                                    label: 'Pengeluaran',
                                    backgroundColor: '#ced4da',
                                    borderColor: '#ced4da',
                                    data: d.pengeluaran
                                }
                            ]
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                mode: mode,
                                intersect: intersect,
                                callbacks: {
                                    label: function(tooltipItem, data) {
                                        return "Rp. " + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                                            return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
                                        });
                                    }
                                },
                            },
                            hover: {
                                mode: mode,
                                intersect: intersect
                            },
                            legend: {
                                display: true,
                                labels: {
                                    fontColor: "#000080",
                                }
                            },
                            scales: {
                                yAxes: [{
                                    // display: false,
                                    gridLines: {
                                        display: true,
                                        lineWidth: '4px',
                                        color: 'rgba(0, 0, 0, .2)',
                                        zeroLineColor: 'transparent'
                                    },
                                    ticks: $.extend({
                                        beginAtZero: true,

                                        // Include a dollar sign in the ticks
                                        callback: function(value, index, values) {
                                            /*if (value >= 1000000) {
                                                value /= 1000
                                                value += 'jt'
                                            } else if (value >= 1000) {
                                                value /= 1000
                                                value += 'rb'
                                            }*/
                                            return "Rp. " + Number(value).toFixed(0).replace(/./g, function(c, i, a) {
                                            return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
                                        });
                                        }
                                    }, ticksStyle)
                                }],
                                xAxes: [{
                                    display: true,
                                    gridLines: {
                                        display: false
                                    },
                                    ticks: ticksStyle
                                }]
                            }
                        }
                    })
                }
            });
    }

    $(function() {

        'use strict'

        // Make the dashboard widgets sortable Using jquery UI
        $('.connectedSortable').sortable({
            placeholder: 'sort-highlight',
            connectWith: '.connectedSortable',
            handle: '.card-header, .nav-tabs',
            forcePlaceholderSize: true,
            zIndex: 999999
        })
        $('.connectedSortable .card-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move')

        // jQuery UI sortable for the todo list
        $('.todo-list').sortable({
            placeholder: 'sort-highlight',
            handle: '.handle',
            forcePlaceholderSize: true,
            zIndex: 999999
        })

        // bootstrap WYSIHTML5 - text editor
        $('.textarea').summernote()

        $('.daterange').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate: moment()
        }, function(start, end) {
            window.alert('You chose: ' + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        })

        /* jQueryKnob */
        $('.knob').knob()

        // The Calender
        $('#calendar').datetimepicker({
            format: 'L',
            inline: true
        })

        // SLIMSCROLL FOR CHAT WIDGET
        $('#chat-box').overlayScrollbars({
            height: '250px'
        })


        var $sidebar = $('.control-sidebar')
        var $container = $('<div />', {
            class: 'p-3 control-sidebar-content'
        })

        $sidebar.append($container)

        var navbar_dark_skins = [
            'navbar-primary',
            'navbar-secondary',
            'navbar-info',
            'navbar-success',
            'navbar-danger',
            'navbar-indigo',
            'navbar-purple',
            'navbar-pink',
            'navbar-navy',
            'navbar-lightblue',
            'navbar-teal',
            'navbar-cyan',
            'navbar-dark',
            'navbar-gray-dark',
            'navbar-gray',
        ]

        var navbar_light_skins = [
            'navbar-light',
            'navbar-warning',
            'navbar-white',
            'navbar-orange',
        ]

        $container.append(
            '<h5>Customize AdminLTE</h5><hr class="mb-2"/>'
        )

        var $no_border_checkbox = $('<input />', {
            type: 'checkbox',
            value: 1,
            checked: $('.main-header').hasClass('border-bottom-0'),
            'class': 'mr-1'
        }).on('click', function() {
            if ($(this).is(':checked')) {
                $('.main-header').addClass('border-bottom-0')
            } else {
                $('.main-header').removeClass('border-bottom-0')
            }
        })
        var $no_border_container = $('<div />', {
            'class': 'mb-1'
        }).append($no_border_checkbox).append('<span>No Navbar border</span>')
        $container.append($no_border_container)

        var $text_sm_body_checkbox = $('<input />', {
            type: 'checkbox',
            value: 1,
            checked: $('body').hasClass('text-sm'),
            'class': 'mr-1'
        }).on('click', function() {
            if ($(this).is(':checked')) {
                $('body').addClass('text-sm')
            } else {
                $('body').removeClass('text-sm')
            }
        })
        var $text_sm_body_container = $('<div />', {
            'class': 'mb-1'
        }).append($text_sm_body_checkbox).append('<span>Body small text</span>')
        $container.append($text_sm_body_container)

        var $text_sm_header_checkbox = $('<input />', {
            type: 'checkbox',
            value: 1,
            checked: $('.main-header').hasClass('text-sm'),
            'class': 'mr-1'
        }).on('click', function() {
            if ($(this).is(':checked')) {
                $('.main-header').addClass('text-sm')
            } else {
                $('.main-header').removeClass('text-sm')
            }
        })
        var $text_sm_header_container = $('<div />', {
            'class': 'mb-1'
        }).append($text_sm_header_checkbox).append('<span>Navbar small text</span>')
        $container.append($text_sm_header_container)

        var $text_sm_sidebar_checkbox = $('<input />', {
            type: 'checkbox',
            value: 1,
            checked: $('.nav-sidebar').hasClass('text-sm'),
            'class': 'mr-1'
        }).on('click', function() {
            if ($(this).is(':checked')) {
                $('.nav-sidebar').addClass('text-sm')
            } else {
                $('.nav-sidebar').removeClass('text-sm')
            }
        })
        var $text_sm_sidebar_container = $('<div />', {
            'class': 'mb-1'
        }).append($text_sm_sidebar_checkbox).append('<span>Sidebar nav small text</span>')
        $container.append($text_sm_sidebar_container)

        var $text_sm_footer_checkbox = $('<input />', {
            type: 'checkbox',
            value: 1,
            checked: $('.main-footer').hasClass('text-sm'),
            'class': 'mr-1'
        }).on('click', function() {
            if ($(this).is(':checked')) {
                $('.main-footer').addClass('text-sm')
            } else {
                $('.main-footer').removeClass('text-sm')
            }
        })
        var $text_sm_footer_container = $('<div />', {
            'class': 'mb-1'
        }).append($text_sm_footer_checkbox).append('<span>Footer small text</span>')
        $container.append($text_sm_footer_container)

        var $flat_sidebar_checkbox = $('<input />', {
            type: 'checkbox',
            value: 1,
            checked: $('.nav-sidebar').hasClass('nav-flat'),
            'class': 'mr-1'
        }).on('click', function() {
            if ($(this).is(':checked')) {
                $('.nav-sidebar').addClass('nav-flat')
            } else {
                $('.nav-sidebar').removeClass('nav-flat')
            }
        })
        var $flat_sidebar_container = $('<div />', {
            'class': 'mb-1'
        }).append($flat_sidebar_checkbox).append('<span>Sidebar nav flat style</span>')
        $container.append($flat_sidebar_container)

        var $legacy_sidebar_checkbox = $('<input />', {
            type: 'checkbox',
            value: 1,
            checked: $('.nav-sidebar').hasClass('nav-legacy'),
            'class': 'mr-1'
        }).on('click', function() {
            if ($(this).is(':checked')) {
                $('.nav-sidebar').addClass('nav-legacy')
            } else {
                $('.nav-sidebar').removeClass('nav-legacy')
            }
        })
        var $legacy_sidebar_container = $('<div />', {
            'class': 'mb-1'
        }).append($legacy_sidebar_checkbox).append('<span>Sidebar nav legacy style</span>')
        $container.append($legacy_sidebar_container)

        var $compact_sidebar_checkbox = $('<input />', {
            type: 'checkbox',
            value: 1,
            checked: $('.nav-sidebar').hasClass('nav-compact'),
            'class': 'mr-1'
        }).on('click', function() {
            if ($(this).is(':checked')) {
                $('.nav-sidebar').addClass('nav-compact')
            } else {
                $('.nav-sidebar').removeClass('nav-compact')
            }
        })
        var $compact_sidebar_container = $('<div />', {
            'class': 'mb-1'
        }).append($compact_sidebar_checkbox).append('<span>Sidebar nav compact</span>')
        $container.append($compact_sidebar_container)

        var $child_indent_sidebar_checkbox = $('<input />', {
            type: 'checkbox',
            value: 1,
            checked: $('.nav-sidebar').hasClass('nav-child-indent'),
            'class': 'mr-1'
        }).on('click', function() {
            if ($(this).is(':checked')) {
                $('.nav-sidebar').addClass('nav-child-indent')
            } else {
                $('.nav-sidebar').removeClass('nav-child-indent')
            }
        })
        var $child_indent_sidebar_container = $('<div />', {
            'class': 'mb-1'
        }).append($child_indent_sidebar_checkbox).append('<span>Sidebar nav child indent</span>')
        $container.append($child_indent_sidebar_container)

        var $no_expand_sidebar_checkbox = $('<input />', {
            type: 'checkbox',
            value: 1,
            checked: $('.main-sidebar').hasClass('sidebar-no-expand'),
            'class': 'mr-1'
        }).on('click', function() {
            if ($(this).is(':checked')) {
                $('.main-sidebar').addClass('sidebar-no-expand')
            } else {
                $('.main-sidebar').removeClass('sidebar-no-expand')
            }
        })
        var $no_expand_sidebar_container = $('<div />', {
            'class': 'mb-1'
        }).append($no_expand_sidebar_checkbox).append('<span>Main Sidebar disable hover/focus auto expand</span>')
        $container.append($no_expand_sidebar_container)

        var $text_sm_brand_checkbox = $('<input />', {
            type: 'checkbox',
            value: 1,
            checked: $('.brand-link').hasClass('text-sm'),
            'class': 'mr-1'
        }).on('click', function() {
            if ($(this).is(':checked')) {
                $('.brand-link').addClass('text-sm')
            } else {
                $('.brand-link').removeClass('text-sm')
            }
        })
        var $text_sm_brand_container = $('<div />', {
            'class': 'mb-4'
        }).append($text_sm_brand_checkbox).append('<span>Brand small text</span>')
        $container.append($text_sm_brand_container)

        $container.append('<h6>Navbar Variants</h6>')

        var $navbar_variants = $('<div />', {
            'class': 'd-flex'
        })
        var navbar_all_colors = navbar_dark_skins.concat(navbar_light_skins)
        var $navbar_variants_colors = createSkinBlock(navbar_all_colors, function(e) {
            var color = $(this).data('color')
            var $main_header = $('.main-header')
            $main_header.removeClass('navbar-dark').removeClass('navbar-light')
            navbar_all_colors.map(function(color) {
                $main_header.removeClass(color)
            })

            if (navbar_dark_skins.indexOf(color) > -1) {
                $main_header.addClass('navbar-dark')
            } else {
                $main_header.addClass('navbar-light')
            }

            $main_header.addClass(color)
        })

        $navbar_variants.append($navbar_variants_colors)

        $container.append($navbar_variants)

        var sidebar_colors = [
            'bg-primary',
            'bg-warning',
            'bg-info',
            'bg-danger',
            'bg-success',
            'bg-indigo',
            'bg-lightblue',
            'bg-navy',
            'bg-purple',
            'bg-fuchsia',
            'bg-pink',
            'bg-maroon',
            'bg-orange',
            'bg-lime',
            'bg-teal',
            'bg-olive'
        ]

        var accent_colors = [
            'accent-primary',
            'accent-warning',
            'accent-info',
            'accent-danger',
            'accent-success',
            'accent-indigo',
            'accent-lightblue',
            'accent-navy',
            'accent-purple',
            'accent-fuchsia',
            'accent-pink',
            'accent-maroon',
            'accent-orange',
            'accent-lime',
            'accent-teal',
            'accent-olive'
        ]

        var sidebar_skins = [
            'sidebar-dark-primary',
            'sidebar-dark-warning',
            'sidebar-dark-info',
            'sidebar-dark-danger',
            'sidebar-dark-success',
            'sidebar-dark-indigo',
            'sidebar-dark-lightblue',
            'sidebar-dark-navy',
            'sidebar-dark-purple',
            'sidebar-dark-fuchsia',
            'sidebar-dark-pink',
            'sidebar-dark-maroon',
            'sidebar-dark-orange',
            'sidebar-dark-lime',
            'sidebar-dark-teal',
            'sidebar-dark-olive',
            'sidebar-light-primary',
            'sidebar-light-warning',
            'sidebar-light-info',
            'sidebar-light-danger',
            'sidebar-light-success',
            'sidebar-light-indigo',
            'sidebar-light-lightblue',
            'sidebar-light-navy',
            'sidebar-light-purple',
            'sidebar-light-fuchsia',
            'sidebar-light-pink',
            'sidebar-light-maroon',
            'sidebar-light-orange',
            'sidebar-light-lime',
            'sidebar-light-teal',
            'sidebar-light-olive'
        ]

        $container.append('<h6>Accent Color Variants</h6>')
        var $accent_variants = $('<div />', {
            'class': 'd-flex'
        })
        $container.append($accent_variants)
        $container.append(createSkinBlock(accent_colors, function() {
            var color = $(this).data('color')
            var accent_class = color
            var $body = $('body')
            accent_colors.map(function(skin) {
                $body.removeClass(skin)
            })

            $body.addClass(accent_class)
        }))

        $container.append('<h6>Dark Sidebar Variants</h6>')
        var $sidebar_variants_dark = $('<div />', {
            'class': 'd-flex'
        })
        $container.append($sidebar_variants_dark)
        $container.append(createSkinBlock(sidebar_colors, function() {
            var color = $(this).data('color')
            var sidebar_class = 'sidebar-dark-' + color.replace('bg-', '')
            var $sidebar = $('.main-sidebar')
            sidebar_skins.map(function(skin) {
                $sidebar.removeClass(skin)
            })

            $sidebar.addClass(sidebar_class)
        }))

        $container.append('<h6>Light Sidebar Variants</h6>')
        var $sidebar_variants_light = $('<div />', {
            'class': 'd-flex'
        })
        $container.append($sidebar_variants_light)
        $container.append(createSkinBlock(sidebar_colors, function() {
            var color = $(this).data('color')
            var sidebar_class = 'sidebar-light-' + color.replace('bg-', '')
            var $sidebar = $('.main-sidebar')
            sidebar_skins.map(function(skin) {
                $sidebar.removeClass(skin)
            })

            $sidebar.addClass(sidebar_class)
        }))

        var logo_skins = navbar_all_colors
        $container.append('<h6>Brand Logo Variants</h6>')
        var $logo_variants = $('<div />', {
            'class': 'd-flex'
        })
        $container.append($logo_variants)
        var $clear_btn = $('<a />', {
            href: 'javascript:void(0)'
        }).text('clear').on('click', function() {
            var $logo = $('.brand-link')
            logo_skins.map(function(skin) {
                $logo.removeClass(skin)
            })
        })
        $container.append(createSkinBlock(logo_skins, function() {
            var color = $(this).data('color')
            var $logo = $('.brand-link')
            logo_skins.map(function(skin) {
                $logo.removeClass(skin)
            })
            $logo.addClass(color)
        }).append($clear_btn))

        function createSkinBlock(colors, callback) {
            var $block = $('<div />', {
                'class': 'd-flex flex-wrap mb-3'
            })

            colors.map(function(color) {
                var $color = $('<div />', {
                    'class': (typeof color === 'object' ? color.join(' ') : color).replace('navbar-', 'bg-').replace('accent-', 'bg-') + ' elevation-2'
                })

                $block.append($color)

                $color.data('color', color)

                $color.css({
                    width: '40px',
                    height: '20px',
                    borderRadius: '25px',
                    marginRight: 10,
                    marginBottom: 10,
                    opacity: 0.8,
                    cursor: 'pointer'
                })

                $color.hover(function() {
                    $(this).css({
                        opacity: 1
                    }).removeClass('elevation-2').addClass('elevation-4')
                }, function() {
                    $(this).css({
                        opacity: 0.8
                    }).removeClass('elevation-4').addClass('elevation-2')
                })

                if (callback) {
                    $color.on('click', callback)
                }
            })

            return $block
        }

    });
</script>
</body>

</html>