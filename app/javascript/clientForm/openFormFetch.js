document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById("reportModal");
  const openBtn = document.getElementById("openReportBtn");
  const closeBtn = document.querySelector(".close");

  function openModal() {
    modal.style.display = "block";
    document.body.style.overflow = 'hidden';

    const { address, city, country, neighbourhood } = guessInitialLocation();
    document.getElementById("address").value = address ?? "";
    document.getElementById("city").value = city ?? "";
    document.getElementById("country").value = country ?? "";
    document.getElementById("neighbourhood").value = neighbourhood ?? "";
  }

  function closeModal() {
    modal.style.display = "none";
    document.body.style.overflow = 'auto';
  }

  if (openBtn) openBtn.onclick = openModal;
  if (closeBtn) closeBtn.onclick = closeModal;
});
