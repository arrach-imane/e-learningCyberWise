<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            responsive: true,
            select: {
                style: 'multi'
            },
        
            dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>' +
                '<"row"<"col-sm-12"tr>>' +
                '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            buttons: [
                // Group 1: Export buttons
                {
                    extend: 'collection',
                    text: '<img class="img-fluid px-2" src="/assets/Icons/Upload.png" style="width: 40px;" alt="Export"/> Export',
                    className: 'btn btn-primary',
                    buttons: [{
                            extend: 'copyHtml5',
                            text: '<img class="img-fluid px-2" src="/assets/Icons/Copy.png" style="width: 40px;" alt="Copy"/> Copy',
                            className: 'btn btn-light'
                        },
                        {
                            extend: 'excelHtml5',
                            text: '<img class="img-fluid px-2" src="/assets/Icons/Excel.png" style="width: 40px;" alt="Excel"/> Excel',
                            className: 'btn btn-light'
                        },
                        {
                            extend: 'csvHtml5',
                            text: '<img class="img-fluid px-2" src="/assets/Icons/CSV.png" style="width: 40px;" alt="CSV"/> CSV',
                            className: 'btn btn-light'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<img class="img-fluid px-2" src="/assets/Icons/PDF.png" style="width: 40px;" alt="PDF"/> PDF',
                            className: 'btn btn-light'
                        },
                        {
                            extend: 'print',
                            text: '<img class="img-fluid px-2" src="/assets/Icons/Print.png" style="width: 40px;" alt="Print"/> Print',
                            className: 'btn btn-light'
                        }
                    ]
                },

                // Group 2: Columns button
                {
                    extend: 'colvis',
                    text: '<img class="img-fluid px-2" src="/assets/Icons/Columns.png" style="width: 40px;" alt="Columns"/> Columns',
                    className: 'btn btn-secondary'
                },
                // Group 3: Select and Delete buttons
                {
                    extend: 'collection',
                    text: '<img class="img-fluid px-2" src="/assets/Icons/Tools.png" style="width: 40px;" alt="Tools"/> Tools',
                    className: 'btn btn-secondary',
                    buttons: [{
                            text: '<img class="img-fluid px-2" src="/assets/Icons/Select_All.png" style="width: 40px;" alt="Select All"/> Select All (Ctrl+A)',
                            action: function() {
                                table.rows().select();
                            }
                        },
                        {
                            text: '<img class="img-fluid px-2" src="/assets/Icons/Deselect_All.png" style="width: 40px;" alt="Deselect All"/> Deselect All (Ctrl+D)',
                            action: function() {
                                table.rows().deselect();
                            }
                        },
                        {
                            text: '<img class="img-fluid px-2" src="/assets/Icons/Delete.png" style="width: 40px;" alt="Delete Selected"/> Delete Selected',
                            action: function() {
                                var selectedCount = table.rows({
                                    selected: true
                                }).count();
                                if (selectedCount === 0) {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'No Selection',
                                        text: 'No rows selected!'
                                    });
                                    return;
                                }
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: `You are about to delete ${selectedCount} row(s). This action cannot be undone!`,
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete them!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        var selectedIds = table.rows({
                                            selected: true
                                        }).data().toArray().map(function(row) {
                                            return row[
                                                0
                                            ]; // Assuming your ID is in the first column, adjust as needed
                                        });

                                        // Send AJAX request to delete items
                                        $.ajax({
                                            url: globalUrl,
                                            method: 'DELETE',
                                            data: {
                                                ids: selectedIds,
                                                _token: '{{ csrf_token() }}'
                                            },
                                            success: function(response) {
                                                table.rows('.selected')
                                                    .remove().draw(
                                                        false);
                                                Swal.fire(
                                                    'Deleted!',
                                                    `${selectedCount} row(s) have been deleted.`,
                                                    'success'
                                                );
                                            },
                                            error: function(xhr, status,
                                                error) {
                                                location.reload();
                                            }
                                        });
                                    }
                                });
                            }
                        }
                    ]
                }
            ],
            language: {
                buttons: {
                    colvis: "Toggle Columns"
                },
                select: {
                    rows: {
                        _: "%d rows selected",
                        0: "",
                        1: "1 row selected"
                    }
                }
            }
        });

        // Update info on selection change
        table.on('select deselect', function() {
            var selectedCount = table.rows({
                selected: true
            }).count();
            var totalCount = table.rows().count();
            $('.dataTables_info').html('Selected ' + selectedCount + ' out of ' + totalCount + ' rows');
        });

        // Keyboard shortcut for select all: Ctrl+A
        $(document).keydown(function(e) {
            if (e.ctrlKey && e.keyCode == 65) {
                e.preventDefault();
                table.rows().select();
            }
        });

        // Keyboard shortcut for deselect all: Ctrl+D
        $(document).keydown(function(e) {
            if (e.ctrlKey && e.keyCode == 68) {
                e.preventDefault();
                table.rows().deselect();
            }
        });

        table.on('select deselect', function() {
            $(table.rows({
                selected: true
            }).nodes()).addClass('table-secondary');
            $(table.rows({
                selected: false
            }).nodes()).removeClass('table-secondary');
        });
    });

    
</script>
