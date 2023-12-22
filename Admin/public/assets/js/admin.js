new DataTable('#example');

let arrow = document.querySelectorAll(".arrow");
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");

function handleSidebarToggle() {
  sidebar.classList.toggle("close");
}

function checkMaxWidthAndHandleSidebar() {
  if (window.innerWidth <= 1043) {
    sidebarBtn.removeEventListener("click", handleSidebarToggle);
    sidebar.classList.add("close");
  } else {
    sidebarBtn.addEventListener("click", handleSidebarToggle);
    sidebar.classList.remove("close");
  }
}

for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e) => {
    let arrowParent = e.target.parentElement.parentElement;
    arrowParent.classList.toggle("showMenu");
  });
}

sidebarBtn.addEventListener("click", handleSidebarToggle);

checkMaxWidthAndHandleSidebar();

window.addEventListener("resize", () => {
  checkMaxWidthAndHandleSidebar();
});

function displayImage() {
    var input = document.getElementById('fileInput');
    var preview = document.getElementById('previewImage');

    var file = input.files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
}