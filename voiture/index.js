let windo = document.querySelectorAll(".all");
      windo.forEach((element) => {
        element.addEventListener("click", (e) => {
          e.target.parentElement.classList.toggle("active");
        });
      });
      