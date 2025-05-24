$(document).ready(function () {
    const pesan = $("#pesan").data("pesan");
    if (pesan) {
      Swal.fire({
        icon: "error",  
        title: "login gagal",
        text: pesan,
        timer: 3000,
        showConfirmButton: false
      });
    }
  });
//       document.addEventListener("DOMContentLoaded", function () {
//         feather.replace();
//       });



