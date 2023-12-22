let currentIndex = 0;
const itemsPerPage = 4;

window.onload = function() {
    seeMore();
};

function seeMore() {
    const container = document.getElementById('product_cart');
    const items = container.getElementsByClassName('cart');
    const seeMoreBtn = document.getElementById('seeMoreBtn');

    for (let i = currentIndex; i < currentIndex + itemsPerPage; i++) {
        if (items[i]) {
            items[i].style.display = 'block';
        }
    }

    currentIndex += itemsPerPage;

    if (currentIndex >= items.length) {
        seeMoreBtn.style.display = 'none';
    }
}
document.querySelectorAll('.quantity-input').forEach(function (input) {
    input.addEventListener('input', function () {
        var currentValue = parseInt(input.value, 10);
        var availableRooms = parseInt(input.closest('.cart').querySelector('#so_phong').innerText, 10);

        if (currentValue < 1 || isNaN(currentValue)) {
            input.value = 1;
        } else if (currentValue > availableRooms) {
            input.value = availableRooms;
        }
    });
});

function increaseQuantity(button, cart) {
    var inputElement = cart.querySelector('.quantity-input');
    var currentValue = parseInt(inputElement.value);
    var maxLimit = parseInt(cart.querySelector('.cart_right_sl #so_phong').textContent);

    if (isNaN(currentValue)) {
        inputElement.value = '1';
    } else {
        if (currentValue < maxLimit) {
            currentValue += 1;
        }
        inputElement.value = currentValue;
    }
}

function decreaseQuantity(button, cart) {
    var inputElement = cart.querySelector('.quantity-input');
    var currentValue = parseInt(inputElement.value);
    
    if (isNaN(currentValue)) {
        inputElement.value = '1';
    } else {
        if (currentValue > 1) {
            currentValue -= 1;
        }
        inputElement.value = currentValue;
    }
}



