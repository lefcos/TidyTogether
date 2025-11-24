document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById("reportModal");
  const openBtn = document.getElementById("openReportBtn");
  const closeBtn = document.querySelector(".close");

  async function openModal() {
    modal.style.display = "block";
    document.body.style.overflow = 'hidden';

    const { address, city, country, neighbourhood } = await guessInitialLocation();
      console.log(address);
      console.log(city);
      console.log(country);
      console.log(neighbourhood);


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
