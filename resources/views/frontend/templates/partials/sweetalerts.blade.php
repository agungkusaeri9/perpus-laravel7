@if (session('success'))
<script>
    swal({
        title: "Berhasil!",
        text: "{{ session('success') }}",
        icon: "success",
        button: "OK!",
        });
</script>
@endif

@if (session('error'))
<script>
    swal({
        title: "Gagal!",
        text: "{{ session('error') }}",
        icon: "error",
        button: "OK!",
        });
</script>
@endif