<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

<style>
    .select2-container--default
    .select2-selection--multiple
    .select2-selection__choice {
        color: #000;
    }

    .select2-container--default
    .select2-selection--single {
        height: 35px;
    }
</style>
