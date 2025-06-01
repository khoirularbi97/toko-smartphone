    const cartDropdown = document.getElementById("cartDropdown");
    const cartToggle = document.getElementById("cartToggle");
    const cartItems = document.getElementById("cartItems");
    const cartTotal = document.getElementById("cartTotal");
    const cartCount = document.getElementById("cartCount");

    cartToggle.addEventListener("click", function(e){
      e.preventDefault();
      if(cartDropdown.style.display === "block"){
        cartDropdown.style.display = "none";
      } else {
        cartDropdown.style.display = "block";
      }
    });

    document.addEventListener("click", function(e){
      const isClickInsideToggle = cartToggle.contains(e.target);
      const isClickInsideDropdown = cartDropdown.contains(e.target);
      const isClickOnQtyOrRemove = e.target.closest('[data-ignore="true"]') !== null;

      if(!isClickInsideToggle && !isClickInsideDropdown && !isClickOnQtyOrRemove){
        cartDropdown.style.display = "none";
      }
    });

    function formatRupiah(angka) {
      return "Rp " + angka.toLocaleString("id-ID");
    }

    function updateCart(){
      cartItems.innerHTML = "";
      let total = 0;
      let count = 0;

      cart.forEach((item, index) => {
        total += item.price * item.qty;
        count += item.qty;

        cartItems.innerHTML += `
          <div class="cart-item">
            <img src="${item.image}" alt="${item.name}">
            <div class="flex-grow-1">
              <h6>${item.name}</h6>
              <small>${formatRupiah(item.price)} x ${item.qty}</small><br>
              <div class="d-flex align-items-center mt-1">
                <button class="qty-btn" data-index="${index}" data-delta="-1" data-ignore="true">-</button>
                <input class="qty-number mx-1" value="${item.qty}" readonly>
                <button class="qty-btn" data-index="${index}" data-delta="1" data-ignore="true">+</button>
              </div>
            </div>
            <button class="btn btn-sm btn-outline-danger ms-2 remove-btn" data-index="${index}" data-ignore="true">
              <i class="fa fa-trash"></i>
            </button>
          </div>
        `;
      });

      cartTotal.textContent = formatRupiah(total);
      cartCount.textContent = count;

      document.querySelectorAll(".qty-btn").forEach(btn => {
        btn.addEventListener("click", function(){
          const index = +this.getAttribute("data-index");
          const delta = +this.getAttribute("data-delta");
          changeQty(index, delta);
        });
      });

      document.querySelectorAll(".remove-btn").forEach(btn => {
        btn.addEventListener("click", function(){
          const index = +this.getAttribute("data-index");
          removeItem(index);
        });
      });
    }

    function changeQty(index, delta){
      cart[index].qty += delta;
      if(cart[index].qty <= 0){
        removeItem(index);
      } else {
        updateCart();
      }
    }

    function removeItem(index){
      cart.splice(index, 1);
      updateCart();
    }

    updateCart();