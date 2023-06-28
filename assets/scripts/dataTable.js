$(document).ready(function () {
  $("#salesTable").DataTable({
    language: {
      decimal: "",
      emptyTable: "No data available in table",
      info: "Showing _START_ to _END_ of _TOTAL_ entries",
      infoEmpty: "Showing 0 to 0 of 0 entries",
      infoFiltered: "(filtered from _MAX_ total entries)",
      infoPostFix: "",
      thousands: ",",
      lengthMenu: "Show _MENU_ entries",
      loadingRecords: "Loading...",
      processing: "",
      search: "Search:",
      zeroRecords: "No matching records found",
      paginate: {
        first: "First",
        last: "Last",
        next: "<i class='fa-solid fa-arrow-right'></i>",
        previous: "<i class='fa-solid fa-arrow-left'></i>",
      },
      aria: {
        sortAscending: ": activate to sort column ascending",
        sortDescending: ": activate to sort column descending",
      },
    },
    searching: false,
    lengthChange: false,
    ordering: true,
    info: false,
    columnDefs: [{ className: "dt-center", targets: "_all" }],
  });
});
