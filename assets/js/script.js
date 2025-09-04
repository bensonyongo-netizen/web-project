
// assets/js/script.js - shows page location and last modified date
document.addEventListener('DOMContentLoaded', () => {
  const el = document.getElementById('footer-info');
  if (el){
    const here = window.location.href;
    const last = document.lastModified;
    el.textContent = `Location: ${here} | Last modified: ${last}`;
  }
});
