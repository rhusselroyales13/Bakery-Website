

function openReviewModal(button) {
    const productId = button.getAttribute("data-product-id");
    const form = document.getElementById("reviewForm");

    // Inject product ID into form action
    form.action = "/products/" + productId + "/rate";

    // Show modal
    document.getElementById("reviewModal").style.display = "block";
}

//  close when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById("reviewModal");
    if (event.target === modal) {
        modal.style.display = "none";
    }
}



function openModal() {
    document.getElementById("authModal").style.display = "flex";
        showLogin();
}

function closeModal() {
    document.getElementById("authModal").style.display = "none";
    document.getElementById("productDetails").style.display = "none";
}

function showRegister() {
    document.getElementById("loginForm").style.display = "none";
    document.getElementById("registerForm").style.display = "block";
}

function showLogin() {
    document.getElementById("registerForm").style.display = "none";
    document.getElementById("loginForm").style.display = "block";
}

function openModalDetails(modalId) {
    document.getElementById(modalId).style.display = "flex";
}

window.onclick = function(event) {
    // Get all modals
    let modals = document.getElementsByClassName('modal-detail');
    

    for (let modal of modals) {
        // If the click target is the modal background itself
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
}




    document.addEventListener('DOMContentLoaded', () => {
    function calculateTotal() {
        let grandTotal = 0;
        let grandQty = 0;
        const hiddenInputsDiv = document.getElementById('hiddenInputs');
        if (hiddenInputsDiv) hiddenInputsDiv.innerHTML = '';

        document.querySelectorAll('.quantity').forEach(input => {
            const quantity = parseInt(input.value) || 0;
            const price = parseFloat(input.getAttribute('data-price'));
            const productId = input.getAttribute('data-product-id');
            const name = input.getAttribute('data-name');
            const subtotal = quantity * price;

            // Update summary
            const summaryItem = document.querySelector(`.summaryitem[data-product-id="${productId}"]`);
            if (summaryItem) {
                const nameEl = summaryItem.querySelector('.name');
                const priceEl = summaryItem.querySelector('.price');
                if (nameEl) nameEl.textContent = name + (quantity > 1 ? ` ×${quantity}` : '');
                if (priceEl) priceEl.textContent = '₱' + subtotal.toFixed(2);
            }

            // Hidden inputs
            if (hiddenInputsDiv) {
                hiddenInputsDiv.innerHTML += `
                    <input type="hidden" name="products[${productId}][id]" value="${productId}">
                    <input type="hidden" name="products[${productId}][quantity]" value="${quantity}">
                    <input type="hidden" name="products[${productId}][subtotal]" value="${subtotal.toFixed(2)}">
                `;
            }

            grandTotal += subtotal;
            grandQty += quantity;
        });

        document.getElementById('totalInput').value = grandQty;
        document.getElementById('totalDisplay').value = 'Total: ₱' + grandTotal.toFixed(2);
    }

    // Attach events
    document.querySelectorAll('.quantity').forEach(input => {
        input.addEventListener('input', calculateTotal);
    });
    document.querySelectorAll('.increment').forEach(button => {
        button.addEventListener('click', () => {
            const input = button.previousElementSibling;
            input.value = (parseInt(input.value) || 0) + 1;
            calculateTotal();
        });
    });
    document.querySelectorAll('.decrement').forEach(button => {
        button.addEventListener('click', () => {
            const input = button.nextElementSibling;
            let value = parseInt(input.value) || 0;
            if (value > 1) {
                input.value = value - 1;
                calculateTotal();
            }
        });
    });

    calculateTotal();
});

function confirmation(ev) {
    ev.preventDefault();

    var url = ev.currentTarget.getAttribute('href');

    console.log(url);

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Cancel my order!"
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = url;
        Swal.fire({
            title: "Order Cancelled!",
            text: "Your info in this order has been deleted.",
            icon: "success",    
    });
    
  }
});
}

















// // Increment and decrement buttons
// document.querySelectorAll('.increment').forEach(button => {
//     button.addEventListener('click', () => {
//         const input = button.previousElementSibling; // the quantity input
//         let value = parseInt(input.value) || 0;
//         input.value = value + 1;
//         calculateTotal();
//     });
// });

// document.querySelectorAll('.decrement').forEach(button => {
//     button.addEventListener('click', () => {
//         const input = button.nextElementSibling; // the quantity input
//         let value = parseInt(input.value) || 0;
//         if (value > 1) { // prevent going below 1
//             input.value = value - 1;
//             calculateTotal();
//         }
//     });
// });

