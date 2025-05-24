document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("toggleSidebar");
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("sidebar-overlay");
    const body = document.body;

    toggleButton.addEventListener("click", function () {
        sidebar.classList.toggle("active");
        const isActive = sidebar.classList.contains("active");
        overlay.style.display = isActive ? "block" : "none";
        body.classList.toggle("sidebar-open", isActive);
    });

    overlay.addEventListener("click", function () {
        sidebar.classList.remove("active");
        overlay.style.display = "none";
        body.classList.remove("sidebar-open");
    });

    // Ambil semua link sidebar
    const sidebarLinks = document.querySelectorAll('#sidebar a');

    // Ambil path URL saat ini (tanpa domain)
    const currentPath = window.location.pathname.split("/").pop();

    sidebarLinks.forEach(link => {
        const linkPath = link.getAttribute('href');

        if (linkPath === currentPath) {
            link.classList.add('active');
        }
    });

    // Replace Feather icons
    feather.replace();

    const hargaInput = document.getElementById("price");

    if (hargaInput) {
        hargaInput.addEventListener("input", function (e) {
            let value = e.target.value.replace(/[^0-9]/g, "");
            if (value) {
                e.target.value = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                    minimumFractionDigits: 0
                }).format(value);
            } else {
                e.target.value = "";
            }
        });

        // Format nilai awal jika ada
        let initialValue = hargaInput.value.replace(/[^0-9]/g, "");
        if (initialValue) {
            hargaInput.value = new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0
            }).format(initialValue);
        }

        // Sebelum submit, hilangkan format dan kirim angka asli saja
        const form = hargaInput.closest("form");
        if (form) {
            form.addEventListener("submit", function () {
                // Hapus semua karakter selain angka
                hargaInput.value = hargaInput.value.replace(/[^0-9]/g, "");
            });
        }
    }

});



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
        console.log('script jalan')
      }
    });

    
//chart
      new Chart(document.getElementById("revenueChart"), {
      type: 'line',
      data: {
        labels: ['Jan 1', 'Jan 2', 'Jan 3', 'Jan 4', 'Jan 5', 'Jan 6', 'Jan 7'],
        datasets: [
          {
            label: 'This month',
            data: [2000, 3000, 2500, 4000, 3200, 2800, 3000],
            borderColor: '#28c76f',
            backgroundColor: 'rgba(40,199,111,0.1)',
            tension: 0.4,
            fill: true
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: true } },
        scales: { y: { beginAtZero: true } }
      }
    });

    // Doughnut Chart - Customers
    new Chart(document.getElementById("customerChart"), {
        type: 'doughnut',
        data: {
        labels: ['Current Customers', 'New Customers'],
        datasets: [{
            data: [32, 68],
            backgroundColor: ['#28c76f', '#ea5455'],
            borderWidth: 0
        }]
        },
        options: {
        cutout: '70%',
        plugins: { legend: { display: false } }
        }
    });
    function previewImage(event) {
      const reader = new FileReader();
      reader.onload = function () {
        document.getElementById('preview').src = reader.result;
      };
      if (event.target.files[0]) {
        reader.readAsDataURL(event.target.files[0]);
      }
    };

    
 // Stop propagation untuk dropdown cart
    // $('.cart-dropdown').on('click', function (e) {
    //     e.stopPropagation();
    // });

  