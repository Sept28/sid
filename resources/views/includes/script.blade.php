<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

  $("#villager").select2({
    placeholder: "Select a Name",
    allowClear: true
  });
</script>

<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
      $('#myTable').DataTable();
  } );
</script>