<?php
// inisialisasi
$transaction_id = $id;
$transaction_date = date('d/m/Y H:i');
?>

<?php if (isset($_SESSION['gagal'])): ?>
    <div id="message" class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <?= $_SESSION['gagal']; ?>
    </div>
<?php endif; ?>

<div class="main-content-container container-fluid px-4 pb-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col">
            <span class="text-uppercase page-subtitle">In & Out</span>
            <h3 class="page-title">
                <i class="material-icons">swap_horiz</i>
                Transaction Out
            </h3>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- File Manager -->
    <div class="row">
        <div class="col-lg-10">
            <div class="card card-small mb-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">
                                <form id="frmgenerate" action="<?= site_url('transaction/in/generate'); ?>"
                                      method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="transaction_id">Transaction ID</label>
                                            <input type="text" class="form-control" name="transaction_id"
                                                   id="transaction_id"
                                                   placeholder="ID" value="<?= $transaction_id; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="transaction_date">Transaction Date</label>
                                            <input type="text" class="form-control" name="transaction_date"
                                                   id="transaction_date"
                                                   placeholder="Date" value="<?= $transaction_date; ?>">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="transaction_item">Item</label>
                                            <select name="transaction_item" id="transaction_item" class="form-control"
                                                    required>
                                                <option value="">Select Item</option>
                                                <?php if ($items): ?>
                                                    <?php foreach ($items as $item): ?>
                                                        <option value="<?= $item->item_id; ?>"><?= $item->item_name; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <style>
                                            #DataTables_Table_0_wrapper {
                                                box-shadow: none;
                                            }
                                        </style>
                                        <div class="col-md-12">
                                            <table class="table table-sm table-responsive">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <input type="checkbox" name="select_all" id="select_all"
                                                               value="1">
                                                    </th>
                                                    <th>Item</th>
                                                    <th>Bahan</th>
                                                    <th>Sablon / BS</th>
                                                    <th>Jahitan / BS</th>
                                                    <th>Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <input type="hidden" id="transaction_qty" name="transaction_qty" value="0">
                                    <button type="submit" class="btn btn-accent">Generate</button>
                                    <a href="<?= base_url('transaction'); ?>" class="btn btn-danger">Return to In &
                                        Out</a>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Default Light Table -->
</div>
<script>
    $(document).ready(function () {
        var rows_selected = [];
        var qty = $('#transaction_qty');
        var table = $('.table').DataTable({
            'columnDefs': [{
                'targets': 0,
                'searchable': false,
                'orderable': false,
                'width': '1%',
                'render': function (data, type, full, meta) {
                    return '<input type="checkbox">';
                }
            }],
            'order': [[1, 'asc']],
            'rowCallback': function (row, data, dataIndex) {
                // Get row ID
                var rowId = data[0];

                // If row ID is in the list of selected row IDs
                if ($.inArray(rowId, rows_selected) !== -1) {
                    $(row).find('input[type="checkbox"]').prop('checked', true);
                    $(row).addClass('selected');
                }
            }
        });

        // Handle click on table cells with checkboxes
        table.on('click', 'tbody td, thead th:first-child', function (e) {
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        // Handle click on "Select all" control
        $('thead input[name="select_all"]', table.table().container()).on('click', function (e) {
            if (this.checked) {
                $('.table tbody input[type="checkbox"]:not(:checked)').trigger('click');
            } else {
                $('.table tbody input[type="checkbox"]:checked').trigger('click');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        // Handle click on checkbox
        table.on('click', 'input[type="checkbox"]', function (e) {
            var hasil_array = [];
            var $row = $(this).closest('tr');

            // Get row data
            var data = table.row($row).data();

            // Get row ID
            var rowId = data[0];

            // Determine whether row ID is in the list of selected row IDs
            var index = $.inArray(rowId, rows_selected);

            var qty_val = parseInt(qty.val());
            var total_val = parseInt(data[5]);

            // If checkbox is checked and row ID is not in list of selected row IDs
            if (this.checked && index === -1) {
                rows_selected.push(rowId);
                qty.val(qty_val + total_val);

                // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
            } else if (!this.checked && index !== -1) {
                rows_selected.splice(index, 1);

                qty.val(qty_val - total_val);
            }

            if (this.checked) {
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            console.log(rows_selected);

            // Update state of "Select all" control
            updateDataTableSelectAllCtrl(table);

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        // Handle table draw event
        table.on('draw', function () {
            // Update state of "Select all" control
            updateDataTableSelectAllCtrl(table);
        });

        // Handle form submission event
        $('#frmgenerate').on('submit', function (e) {
            var form = this;

            // Iterate over all selected checkboxes
            $.each(rows_selected, function (index, rowId) {
                // Create a hidden element
                $(form).append(
                    $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'item_prd_id[]')
                        .val(rowId)
                );
            });
        });

        $('[id^=transaction_item]').select2({
            theme: 'bootstrap4'
        }).on('select2:select', function () {
            var val = $(this).val();

            $.ajax({
                dataType: 'json',
                url: '<?= site_url('transaction/api_get_prd/'); ?>' + val
            }).then(function (data) {
                table.clear().draw().rows.add(data.data).columns.adjust().draw();
            });
        });


        $('#transaction_id').keydown(function (e) {
            e.preventDefault();
        });

        $('#transaction_date').keydown(function (e) {
            e.preventDefault();
        });
    });

    function updateDataTableSelectAllCtrl(table) {
        var $table = table.table().node();
        var $chkbox_all = $('tbody input[type="checkbox"]', $table);
        var $chkbox_checked = $('tbody input[type="checkbox"]:checked', $table);
        var chkbox_select_all = $('thead input[name="select_all"]', $table).get(0);

        // If none of the checkboxes are checked
        if ($chkbox_checked.length === 0) {
            chkbox_select_all.checked = false;
            if ('indeterminate' in chkbox_select_all) {
                chkbox_select_all.indeterminate = false;
            }

            // If all of the checkboxes are checked
        } else if ($chkbox_checked.length === $chkbox_all.length) {
            chkbox_select_all.checked = true;
            if ('indeterminate' in chkbox_select_all) {
                chkbox_select_all.indeterminate = false;
            }

            // If some of the checkboxes are checked
        } else {
            chkbox_select_all.checked = true;
            if ('indeterminate' in chkbox_select_all) {
                chkbox_select_all.indeterminate = true;
            }
        }
    }

</script>