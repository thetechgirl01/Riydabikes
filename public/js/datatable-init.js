/**
 * Safely initialize DataTables
 * This utility function prevents the "Cannot reinitialize DataTable" error
 * by checking if the table is already initialized before initializing it
 */
function initDataTable(selector, options) {
    if ($.fn.DataTable.isDataTable(selector)) {
        // If table already exists, destroy it first
        $(selector).DataTable().destroy();
    }
    
    // Initialize with options
    return $(selector).DataTable(options);
}

// Initialize ShipTable when document is ready
$(document).ready(function() {
    // Only run this if ShipTable exists in the page
    if ($('#ShipTable').length > 0) {
        initDataTable('#ShipTable', {
            "paging": false,
            "ordering": true,
            "info": false,
            "searching": false
        });
    }
});
