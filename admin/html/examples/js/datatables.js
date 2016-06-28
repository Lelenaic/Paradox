(function ($) {

	/* Set the defaults for DataTables initialisation */
	var DataTable = $.fn.dataTable;
	$.extend( true, DataTable.defaults, {
		dom:
			"<'row'<'col-sm-6'l><'col-sm-6'f>>" +
			"<'table-responsive'tr>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>",
		renderer: 'bootstrap'
	} );
}(jQuery));