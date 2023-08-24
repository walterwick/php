document.addEventListener("DOMContentLoaded", function() {

  const modeToggle = document.querySelector('.mode-toggle');
  const body = document.body;
  
  function enableNightMode() {
      body.classList.add('night-mode');
      modeToggle.querySelector('.fa-sun').style.display = 'inline';
      modeToggle.querySelector('.fa-moon').style.display = 'none';
  }
  
  function disableNightMode() {
      body.classList.remove('night-mode');
      modeToggle.querySelector('.fa-sun').style.display = 'none';
      modeToggle.querySelector('.fa-moon').style.display = 'inline';
  }
  
  modeToggle.addEventListener('click', () => {
      body.classList.toggle('night-mode');
      const isNightMode = body.classList.contains('night-mode');
  
      if (isNightMode) {
          enableNightMode();
      } else {
          disableNightMode();
      }
  });
  
 /* // Check if dark mode is preferred
  const isDarkMode = window.matchMedia("(prefers-color-scheme: dark)").matches;
  console.log("Dark mode detected:", isDarkMode);
  */
  // Apply dark mode by default if preferred
  if (isDarkMode) {
      enableNightMode();
  }
});
