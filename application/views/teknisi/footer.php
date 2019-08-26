		<!--begin::Page Vendors -->
		<script src="<?=base_url()?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<!--end::Page Vendors -->
		<!--begin::Page Snippets -->
		<script src="<?=base_url()?>assets/app/js/dashboard.js" type="text/javascript"></script>
		<!--end::Page Snippets -->
		<script src="http://localhost:35729/livereload.js"></script>
		<script type="text/javascript">
            var swadel = swal.mixin({
                title: 'Hapus?',
                text: 'Anda yakin ingin menghapus data ini? Data yang sudah dihapus tidak dapat dikembalikan.',
                type: 'question',
                showCancelButton: true,
                cancelButtonText: 'Batal',
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#f4516c',
                reverseButtons: true,
                focusCancel: true,
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !swal.isLoading()
            });
		</script>
	</body>
	<!-- end::Body -->
	</html>
