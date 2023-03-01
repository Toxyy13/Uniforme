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
  
  // popup.addEventListener('click', function(e) {
  //   // ako se klikne izvan popupa zatvara se popup
  //   if (e.target !== popup) {
  //     togglePopup();
  //   }
  // });
  
  
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
  
  document.getElementById('cartForm').addEventListener('submit', function(event) {
    // Spriječi podrazumevano ponašanje forme da osveži stranicu
    event.preventDefault();

    // Učitajte podatke forme u promenljivu formData
    const formData = new FormData(event.target);

    // Sada možete obraditi podatke forme na željeni način, na primer slanjem AJAX zahteva
    // Ovde ćemo jednostavno ispisati podatke forme u konzoli
    for (var pair of formData.entries()) {
      console.log(pair[0]+ ': ' + pair[1]);
    }
  });

  $(document).ready(function(){
      $("cartForm").submit(function(event){
          event.preventDefault();

          var velicina = document.querySelector('input[name="velicina"]:checked').value;

          $.post("functions.php",{ velicina:velicina})
      })
  })