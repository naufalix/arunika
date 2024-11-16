<script>var hostUrl = "assets/";</script>
    <!--begin::Javascript-->
    
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="/assets/plugins/custom/datatables.net-bs4/jquery.dataTables.js"></script>
    <script src="/assets/plugins/custom/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="/assets/plugins/custom/select2/select2.min.js"></script>
    {{-- <script src="/assets/plugins/global/plugins.bundle.js"></script> --}}
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="/assets/js/custom/widgets.js"></script>
    <script src="/assets/js/custom/documentation/charts/chartjs.js"></script>
    <script src="/assets/js/custom/documentation/documentation.js"></script>
    <script src="/assets/js/custom/documentation/search.js"></script>
    <script src="/assets/js/custom/authentication/sign-in/general.js"></script>
    <!--end::Page Custom Javascript-->
    <script>
      $(document).ready(function () {
        $('#myTable').DataTable({
          "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All Pages"]],
          "pageLength": 25,
          "language": {
            "paginate": {
              "previous": "<",
              "next": ">"
            }
          }
        });
      });
    </script>
    <!--end::Javascript-->


    <script>
      success: function (response) {
				if (response.success) {
					Swal.fire({
						// position: 'top-end',
						icon: response.message.icon,
						title: response.message.title,
						text: response.message.text,
						showConfirmButton: true,
					}).then((response.message) => {
						/* Read more about isConfirmed, isDenied below */
						alert(response);
						// window.location.href = "dashboard";
					});
				} else {
					$("#progress-bar").width("0px");
					$("#loader-icon").html(
						'<p style="color:#EA4335;">Terdapat inputan yang tidak sesuai, mohon cek ulang.</p>'
					);
					if (response.message.alert_type == "swal") {
						Swal.fire({
							// position: 'top-end',
							icon: "error",
							text: response.message.message,
							showConfirmButton: true,
						});
					} else if (response.message.alert_type == "classic") {
						var message = response.message;
						$("#judulErr").text(message.title_error);
						$("#descErr").text(message.desc_error);
						$("#copyErr").text(message.paket_harga_error);
						$("#kertasErr").text(message.kertas_error);
						$("#berkasErr").text(message.berkas_error);
						$("#is_coverErr").text(message.is_cover_error);
						$("#is_kdtErr").text(message.is_kdt_error);
						$("#pembacaErr").text(message.pembaca_error);
						$("#catatCoverErr").text(message.catat_cover_error);
						$("#uploadCoverErr").text(message.upload_cover_error);
						$("#alamatErr").text(message.alamat_error);
						$("#typeErr").text(message.jk_error);
					}
				}
			},
    </script>