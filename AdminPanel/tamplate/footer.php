<script>
  $(document).ready(function() {
    const pesan = $("#pesan").data("pesan"); 
    if (pesan) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: pesan,
        timer: 3000,
        showConfirmButton: false
      });
      console.log("error muncul");
    }

    const sukses = $("#sukses").data("sukses");
    if (sukses) {
      Swal.fire({
        icon: "success",
        title: "Berhasil",
        text: sukses,
        timer: 3000,
        showConfirmButton: false,
        willClose: () => {
        window.location.href = "produk_list.php";
      }
      });
      console.log("success muncul");
    }
  });
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../asset/js/main.js?v=<?= time(); ?>"></script>


</body>
</html>
