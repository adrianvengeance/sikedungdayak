// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#alldata').DataTable({
    select: {
      style:    'os',
      selector: 'td:not(:last-child)'
  }
  });
});
