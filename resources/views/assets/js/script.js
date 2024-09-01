// JavaScript
const sidebar = document.getElementById('sidebar');

function adjustSidebar() {
  if (window.innerWidth <= 768) {
    sidebar.classList.add('collapsed');
  } else {
    sidebar.classList.remove('collapsed');
  }
}

// Panggil fungsi untuk pertama kalinya saat halaman dimuat
adjustSidebar();

// Tambahkan event listener untuk merespons perubahan lebar layar
window.addEventListener('resize', adjustSidebar);


const toggler = document.querySelector(".btn");
toggler.addEventListener("click",function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});