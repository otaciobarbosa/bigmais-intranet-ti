<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese.json"></script>
    <script>
    $(document).ready(function() {
        $('#painel').DataTable({
            "bPaginate": false,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Portuguese.json"
            }
        });
    });
</script>