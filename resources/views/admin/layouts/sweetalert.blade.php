<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
    @elseif (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
            confirmButtonText: 'Coba Lagi'
        });
    @endif
</script>
<script>
    document.querySelectorAll('.btn-soft-delete').forEach(button => {
        button.addEventListener('click', function() {
            const url = this.dataset.url;

            Swal.fire({
                title: 'Yakin ingin memindahkan ke Trash?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ffc107',
                confirmButtonText: 'Ya, Trash',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.action = url;
                    form.method = 'POST';

                    const csrf = document.createElement('input');
                    csrf.type = 'hidden';
                    csrf.name = '_token';
                    csrf.value = '{{ csrf_token() }}';

                    const method = document.createElement('input');
                    method.type = 'hidden';
                    method.name = '_method';
                    method.value = 'DELETE';

                    form.appendChild(csrf);
                    form.appendChild(method);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });

    document.querySelectorAll('.btn-force-delete').forEach(button => {
        button.addEventListener('click', function() {
            const url = this.dataset.url;

            Swal.fire({
                title: 'Hapus role secara permanen?',
                text: "Tindakan ini tidak bisa dibatalkan!",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                confirmButtonText: 'Ya, Hapus Permanen',
                cancelButtonText: 'Batal'
            }).then((result) => {
                const form = document.createElement('form');
                form.action = url;
                form.method = 'POST';

                const csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = '{{ csrf_token() }}';

                if (result.isConfirmed) {
                    const method = document.createElement('input');
                    method.type = 'hidden';
                    method.name = '_method';
                    method.value = 'DELETE';

                    form.appendChild(csrf);
                    form.appendChild(method);
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    });
</script>
<script>
    document.querySelectorAll('.btn-restore').forEach(button => {
        button.addEventListener('click', function() {
            const url = this.dataset.url;

            Swal.fire({
                title: 'Pulihkan Role?',
                text: "Role akan dipulihkan dari trash.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Pulihkan!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete-id');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            });
        });
    });
</script>
<script>
    document.getElementById('logout-button').addEventListener('click', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Yakin ingin logout?',
            text: "Sesi Anda akan berakhir.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, logout!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    });
</script>
<script>
    function konfirmasiBayar(tenantId, bulan) {
        Swal.fire({
            title: 'Yakin ingin menandai sebagai sudah bayar?',
            text: "Data akan disimpan ke sistem!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Tandai Bayar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`form-bayar-${tenantId}-${bulan}`).submit();
            }
        });
    }
</script>
