<style>
    /* Selected row color */
    table.display.dataTable>tbody>tr.selected>*,
    table.display.dataTable>tbody>tr.odd.selected>*,
    table.display.dataTable>tbody>tr.selected:hover>* {
        box-shadow: inset 0 0 0 9999px #B19470;
    }

    table.dataTable thead th[data-is-resizable=true] {
        border-left: 1px solid transparent;
        border-right: 1px dashed #bfbfbf;
    }

    table.dataTable thead th.dt-colresizable-hover {
        cursor: col-resize;
        background-color: #eaeaea;
        border-left: 1px solid #bfbfbf;
    }

    table.dataTable thead th.dt-colresizable-bound-min,
    table.dataTable thead th.dt-colresizable-bound-max {
        opacity: 0.2;
        cursor: not-allowed !important;
    }
</style>
