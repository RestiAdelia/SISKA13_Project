<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success_add'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success_add') }}",
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif

@if (session('success_update'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Update!',
            text: "{{ session('success_update') }}",
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif
