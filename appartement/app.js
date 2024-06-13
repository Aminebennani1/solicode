let windo = document.querySelectorAll(".open");
      windo.forEach((element) => {
        element.addEventListener("click", (e) => {
          e.target.parentElement.classList.toggle("active");
        });
      });
      