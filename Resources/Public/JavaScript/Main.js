define([
	'jquery',
	'TYPO3/CMS/Backend/Modal',
	'TYPO3/CMS/Backend/Tooltip',
	'datatables'
], function ($, Modal, Tooltip) {
	"use strict";

	$(document).ready(function () {
		$('.client-list').DataTable({
			"order": [[0, "desc"]],
			paging: false,
			lengthChange: false,
			stateSave: true,
			searching: false,
			dom: 'tir',
			ordering: true
		});
	});

	return {};

});
