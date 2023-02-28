$(document).ready(function() {
    $('#my-form').submit(function(e) {
      e.preventDefault(); // sprečava automatsko slanje forme
  
      $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: $(this).serialize(),
        success: function(response) {
          // ovde možete da obradite odgovor sa servera
          console.log(response);
        },
        error: function(xhr, status, error) {
          // ovde možete da obradite grešku
          console.error(error);
        }
      });
    });
  });
  
  
  const popup = document.querySelector('.popup');
  const body = document.querySelector('body');
  const btnPrikaz = document.querySelector('.btn-prikaz');
  
  function submitForm(){
      document.getElementById("formTest").submit();
  }
  
  btnPrikaz.addEventListener('click', function() {
    togglePopup();
  });   
  
  
  function togglePopup() {
    popup.classList.toggle('open-popup');
    body.classList.toggle('blur');
    // provjerava da li je popup otvoren
    
  }
  
  popup.addEventListener('click', function(e) {
    // ako se klikne izvan popupa zatvara se popup
    if (e.target !== popup) {
      togglePopup();
    }
  });
  
  
  document.addEventListener('keyup', function(e) {
    // ako se pritisne Escape zatvara se popup
    if (e.key === 'Escape' && popup.classList.contains('open-popup')) {
      togglePopup();
    }
  });
  
  // Sakrij popup element kada se stranica učita
  popup.classList.remove('open-popup');
  
  
  // let btnPosalji = document.getElementByID("btnForm");
  
  // btnPosalji.addEventListener("click", e =>){
  //     e.preventDefault();
  
  //     let form = document.getElementById("cartForm");
  //     // uraditi bilo šta sa formom ovde, kao što je slanje AJAX zahteva
  //     form.submit(); // ručno slanje forme na server nakon obrade u JavaScript-u
  
  // }
  
  // function submitForm() {
  //   var form = document.getElementById("cartForm");
  //   var xhr = new XMLHttpRequest();                        ne brisati
  //   xhr.open("GET", "prikaz.php", true);
  //   xhr.onload = function() {
  //     if (xhr.readyState === 4 && xhr.status === 200) {
  //       console.log(xhr.responseText);
  //     }
  //   };
  //   xhr.send(new FormData(form));
  // }
  