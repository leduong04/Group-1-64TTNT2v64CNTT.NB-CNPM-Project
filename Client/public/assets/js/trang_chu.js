window.addEventListener('scroll', function() {
  var scrollPosition = window.scrollY;
  var navbar = document.getElementById('header_bar');
  if (scrollPosition > 50) {
    navbar.style.backgroundColor = '#342E37';
  } else {
    navbar.style.backgroundColor = '#f9f9f900';
  }
});




function taoSlider(tenSlider) {
  const slider = document.querySelector(`.${tenSlider} .slider`);
  const slides = document.querySelectorAll(`.${tenSlider} .slide`);
  const pagination = document.querySelector(`.${tenSlider} .pagination`);

  let currentIndex = 0;

  function capNhatSlider() {
    slider.style.transform = `translateX(${-currentIndex * 100}%)`;
  }

  function capNhatPagination() {
    pagination.innerHTML = '';
    slides.forEach((_, index) => {
      const dot = document.createElement('span');
      dot.classList.add('dot');
      dot.addEventListener('click', () => {
        currentIndex = index;
        capNhatSlider();
        capNhatPagination();
      });
      pagination.appendChild(dot);
    });
    pagination.children[currentIndex].classList.add('active');
  }

  function chuyenDenTrangTiep() {
    currentIndex = (currentIndex + 1) % slides.length;
    capNhatSlider();
    capNhatPagination();
  }

  function chuyenDenTrangTruoc() {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    capNhatSlider();
    capNhatPagination();
  }

  document.addEventListener('keydown', function (event) {
    if (event.key === 'ArrowRight') {
      chuyenDenTrangTiep();
    } else if (event.key === 'ArrowLeft') {
      chuyenDenTrangTruoc();
    }
  });

  document.querySelector(`.${tenSlider} .arrow-left`).addEventListener('click', chuyenDenTrangTruoc);
  document.querySelector(`.${tenSlider} .arrow-right`).addEventListener('click', chuyenDenTrangTiep);

  capNhatPagination();
}

document.addEventListener('DOMContentLoaded', function () {
  taoSlider('room_suit');
  taoSlider('room_suit_1');
});



var images = [
  "https://photos.mandarinoriental.com/is/image/MandarinOriental/dmo-Seven-suites-01-Beijing",
  "https://lotusaromasapa.com/files/images/banner/bn2.jpg",
  "https://photos.mandarinoriental.com/is/image/MandarinOriental/dmo-Seven-suites-01-Beijing",
];
var contents = [
    "KHÁCH SẠN TỐT NHẤT AVIP HOTEL LUXURY",
    "CHÀO MỪNG ĐẾN VỚI AVIP HOTEL LUXURY",
    "KHÁCH SẠN TỐT NHẤT AVIP HOTEL LUXURY",
    // Thêm nếu cần thiết
];

var image_text = document.getElementById("image-text");
var currentIndex = 0;
var imageContainer = document.querySelector('.image-container');

function changeBackground() {
  currentIndex= (currentIndex + 1) % images.length;
  imageContainer.style.backgroundImage = "url('" + images[currentIndex] + "')";
  image_text.innerHTML = contents[currentIndex];
}
setInterval(changeBackground, 5000);

