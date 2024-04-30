document.addEventListener('DOMContentLoaded', function() {
    if (window.screen.width < 1000) {
      let a = document.querySelectorAll("a");
      a.forEach((e) => {
        let url = new URL(e.href);
        // Replace only the hostname part of the URL
        url.hostname = '';
        e.href = url.href;
      });
    }
  });