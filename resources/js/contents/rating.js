$(function () {
    'use strict';

    /*** COLUMN DEFINE ***/
    var columnDefs = [
        {
            headerName: 'User Name',
            field: 'user',
            editable: false,
            sortable: true,
            filter: true,
            width: 300
        },
        {
            headerName: 'User Email',
            field: 'userEmail',
            editable: false,
            sortable: true,
            filter: true,
            width: 500
        },
        {
            headerName: 'Rating',
            field: 'rating',
            editable: false,
            sortable: true,
            filter: true,
            width: 175,
            checkboxSelection: true,
            headerCheckboxSelectionFilteredOnly: true,
            headerCheckboxSelection: true
        },
        {
            headerName: 'Music Name',
            field: 'music',
            editable: false,
            sortable: true,
            filter: true,
            width: 500
        },
        {
            headerName: 'Time Song Star Rating',
            field: 'created_at',
            editable: false,
            sortable: true,
            filter: true,
            width: 500
        }
    ];

    /*** GRID OPTIONS ***/
    var gridOptions = {
        columnDefs: columnDefs,
        rowSelection: 'multiple',
        floatingFilter: true,
        filter: true,
        pagination: true,
        paginationPageSize: 20,
        pivotPanelShow: 'always',
        colResizeDefault: 'shift',
        animateRows: true,
        resizable: true
    };

    /*** DEFINED TABLE VARIABLE ***/
    var gridTable = document.getElementById('myGrid');

    var assetPath = '../../../app-assets/';
    if ($('body').attr('data-framework') === 'laravel') {
        assetPath = $('body').attr('data-asset-path');
    }

    /*** GET TABLE DATA FROM URL ***/

    agGrid.simpleHttpRequest({ url: 'http://127.0.0.1:8000/api/rating-json' }).then(function (data) {
        gridOptions.api.setRowData(data);
    });

    /*** FILTER TABLE ***/
    function updateSearchQuery(val) {
        gridOptions.api.setQuickFilter(val);
    }

    $('.ag-grid-filter').on('keyup', function () {
        updateSearchQuery($(this).val());
    });

    /*** CHANGE DATA PER PAGE ***/
    function changePageSize(value) {
        gridOptions.api.paginationSetPageSize(Number(value));
    }

    $('.sort-dropdown .dropdown-item').on('click', function () {
        var $this = $(this);
        changePageSize($this.text());
        $('.filter-btn').text('1 - ' + $this.text() + ' of 500');
    });

    /*** EXPORT AS CSV BTN ***/
    $('.ag-grid-export-btn').on('click', function (params) {
        gridOptions.api.exportDataAsCsv();
    });

    /*** INIT TABLE ***/
    new agGrid.Grid(gridTable, gridOptions);
});
