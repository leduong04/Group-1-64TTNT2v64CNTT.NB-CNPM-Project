window.addEventListener('scroll', function() {
    var scrollPosition = window.scrollY;
    var navbar = document.getElementById('header_bar');
    if (scrollPosition > 50) {
      navbar.style.backgroundColor = '#342E37';
    } else {
      navbar.style.backgroundColor = '#f9f9f900';
    }
});
document.addEventListener('DOMContentLoaded', function () {
    var thumbnails = document.querySelectorAll('.thumbnail');
    var mainImage = document.getElementById('main-image');
    if (thumbnails.length > 0) {
        mainImage.src = thumbnails[0].src;
    }
    thumbnails.forEach(function (thumbnail) {
        thumbnail.addEventListener('click', function () {
            changeMainImage(thumbnail.src);
        });
    });
});

function changeMainImage(newImagePath) {
    var mainImage = document.getElementById('main-image');
    mainImage.src = newImagePath;
}

let currentIndex = 0;
const itemsPerPage = 3;

window.onload = function() {
    seeMore();
};

function seeMore() {
    const container = document.getElementById('myContainer');
    const items = container.getElementsByClassName('other_img');
    const seeMoreBtn = document.getElementById('seeMoreBtn');

    for (let i = currentIndex; i < currentIndex + itemsPerPage; i++) {
        if (items[i]) {
            items[i].style.display = 'block';
        }
    }

    currentIndex += itemsPerPage;

    // Ẩn nút "See more" khi đã hiển thị hết sản phẩm
    if (currentIndex >= items.length) {
        seeMoreBtn.style.display = 'none';
    }
}





  
  