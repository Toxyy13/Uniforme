  const popup = document.querySelector('.popup');
  const body = document.querySelector('body');
  const btnPrikaz = document.querySelector('.btn-prikaz');
  
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
  

  
  
  // document.getElementById('cartForm').addEventListener('submit', function(event) {
  //   // Spriječi podrazumevano ponašanje forme da osveži stranicu
  //   event.preventDefault();

  //   // Učitajte podatke forme u promenljivu formData
  //   const formData = new FormData(event.target);

  //   // Sada možete obraditi podatke forme na željeni način, na primer slanjem AJAX zahteva
  //   // Ovde ćemo jednostavno ispisati podatke forme u konzoli
  //   for (var pair of formData.entries()) {
  //     console.log(pair[0]+ ': ' + pair[1]);
  //   }
  // });

  // $(document).ready(function(){
  //     $("cartForm").submit(function(event){
  //         event.preventDefault();

  //         var velicina = document.querySelector('input[name="velicina"]:checked').value;

  //         $.post("functions.php",{ velicina:velicina})
  //     })
  // })



  // ----------------------------------------------------------------------------------------------
//DROPDOWN MENU JS
// // Get the button and dropdown list items
// const button = document.querySelector('.dropdown-menu button');
// const dropdownItems = document.querySelectorAll('.dropdown-menu .dropdown');

// // Add a click event listener to the button
// button.addEventListener('click', function(event) {
//   event.stopPropagation(); // Prevent the click from closing the dropdown
//   // Toggle the "show" class on each of the dropdown items
//   dropdownItems.forEach(function(item) {
//     item.classList.toggle('show');
//   });
// });

// // Add a click event listener to the document
// document.addEventListener('click', function(event) {
//   // If the user clicked outside of the dropdown, hide it
//   if (!event.target.closest('.dropdown-menu')) {
//     dropdownItems.forEach(function(item) {
//       item.classList.remove('show');
//     });
//   }
// });


//   $(document).ready(function() {
//     $('#cartForm').submit(function(event) {
//         // spriječavanje automatskog slanja forme
//         event.preventDefault();
        
//         // slanje podataka forme na server putem AJAX-a
//         $.ajax({
//             type: 'POST',
//             url: '',
//             data: $('#cartForm').serialize(), // podaci forme
//              success: function(response) {
//                  // prikazivanje odgovora bez refresovanja cijele stranice
//                 $('#response').html();
//             }
//         });
//     });
// });

function sendData() {
  var radios = document.getElementsByName('velicina');
  var selectedValue;
  for(var i = 0; i < radios.length; i++) {
    if(radios[i].checked) {
      selectedValue = radios[i].value;
      break;
    }
  }
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'prikaz.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if(xhr.status === 200) {
      console.log(xhr.responseText); // Ovdje možete manipulirati odgovorom
    }
  };
  var data = 'radio_button=' + encodeURIComponent(selectedValue);
  xhr.send(data);
}