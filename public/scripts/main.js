// Flash message close button functionality
const flashMessages = document.querySelectorAll(".flash");

flashMessages.forEach((flash) => {
  const flashClose = flash.querySelector(".flash-close");
  flashClose.addEventListener("click", () => {
    flash.classList.remove("show");
  });
});
