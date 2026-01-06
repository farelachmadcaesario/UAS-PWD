document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("searchFleet");
  const cards = document.querySelectorAll(".card");

  if (searchInput) {
    searchInput.addEventListener("keyup", function (e) {
      const term = e.target.value.toLowerCase();

      cards.forEach((card) => {
        const content = card.textContent.toLowerCase();

        if (content.includes(term)) {
          card.style.display = "block";
          card.style.animation = "fadeIn 0.5s";
        } else {
          card.style.display = "none";
        }
      });
    });
  }

  const deleteButtons = document.querySelectorAll(
    '.btn-action[href*="hapus.php"]'
  );

  deleteButtons.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      const href = this.getAttribute("href");

      Swal.fire({
        title: "Yakin hapus pesawat ini?",
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = href;
        }
      });
    });
  });
});

const style = document.createElement("style");
style.innerHTML = `
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }
`;
document.head.appendChild(style);
