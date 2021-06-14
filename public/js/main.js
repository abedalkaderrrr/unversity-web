


var vvd = document.querySelectorAll('.open-model');
//console.log(vvd[0]);
for(let i = 0; i < vvd.length; i++)
    vvd[i].addEventListener(
        "click",
        () => {
         var ss = vvd[i].getAttribute('data-day');
         var ll = vvd[i].getAttribute('data-lecture');
         document.querySelector('.day-model').setAttribute('value',ss);
         document.querySelector('.lecture-model').setAttribute('value',ll);

         // console.log(ss);
          //console.log(ll);
        },
        false
      );
      
var section = document.querySelector('.section');
if(section){
  section.addEventListener("change",()=>{ 
  
    onClick();
    console.log('test');

 },false);

}


 function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}
//const container = document.querySelector('#container');



function onClick() {
    var sectionselected = document.querySelector('.section').value;
    var dayselected = document.querySelector('.day').getAttribute('value');
    var lectureselected = document.querySelector('.lecture').value;
    // console.log(lectureselected + sectionselected + dayselected );
     var data = {day:dayselected,section: sectionselected,lecture:lectureselected };
     let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
     var url = document.querySelector('.url').value;




    // var form = document.getElementById("measurement-form");
    // var action = form.getAttribute("action");

    // gather form data
    // var form_data = new FormData(form);
    // for ([key, value] of form_data.entries()) {
    //   console.log(key + ': ' + value);
    // }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
   // do not set content-type with FormData
   xhr.setRequestHeader("Content-Type", "application/json");
   xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
   xhr.setRequestHeader('X-CSRF-TOKEN', token);
    xhr.onreadystatechange = function () {
      if(xhr.readyState == 4 && xhr.status == 200) {
        var result = xhr.responseText;
        console.log('Result: ' + result);
         var json = JSON.parse(result);
         console.log('gasgasga :' + json['section']);
         sec = document.querySelector('.sectionSelected');
         removeAllChildNodes(sec);
        json['section'].forEach(element => {
            console.log(element);
            const option = document.createElement("option");
            option.setAttribute('value',element['id']);
            
            option.innerHTML = element['section'] ;
            
            if(element['id'] != 'undefined'){
                sec.appendChild(option);
            }

        });
        room = document.querySelector('.roomSelected');
        removeAllChildNodes(room);

        json['room'].forEach(element => {
            console.log(element);
            const option = document.createElement("option");
            option.setAttribute('value',element['id']);
            option.innerHTML = element['name'] ;
            room.appendChild(option);
        });

        // if(json.hasOwnProperty('errors') && json.errors.length > 0) {
        //   displayErrors(json.errors);
        // } else {
        //   postResult(json.volume);
        // }
       

      }
    };
    xhr.send(JSON.stringify(data));
  }

  function aga(){
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    var url = document.querySelector('.url').value;

    fetch(url, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
            method: 'post',
            credentials: "same-origin",
            body: JSON.stringify({
                name: 'Tushar',
                number: '78987'
            })
        })
        .then((data) => {
            window.location.href = 'http://system2.test/teacher/index#';
            console.log('success');
        })
        .catch(function(error) {
            console.log(error);
        });
 }
 console.log('afhafha');
$('#exampleModal3').on('show.bs.modal', function (event) {
   console.log('afhafha');
   var button = $(event.relatedTarget) // Button that triggered the modal
  
   var recipient = button.data('whatever') // Extract info from data-* attributes
   var title = button.data('title')
   var id = button.data('id')
   console.log('gggggggggg' + recipient);
   // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
   // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
   var modal = $(this)
 //  modal.find('.modal-title').text('New message to ' + recipient)
   modal.find('.modal-body textarea').val(recipient)
   modal.find('.modal-body input[name="title"]').val(title)
   modal.find('.modal-body input[name="id"]').val(id)
 });


 $('#exampleModal9').on('show.bs.modal', function (event) {
  console.log('afhafha');
  var button = $(event.relatedTarget) // Button that triggered the modal
 
  var recipient = button.data('whatever') // Extract info from data-* attributes
  var id = button.data('id')
  console.log('gggggggggg' + id);
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
//  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body textarea').val(recipient)
  modal.find('.modal-body input[name="id"]').val(id)
});








//  $('#exampleModal9').on('show.bs.modal', function (event) {
//   console.log('afhafha');
//   var button = $(event.relatedTarget) // Button that triggered the modal
 
//   var recipient = button.data('whatever') // Extract info from data-* attributes
//   //var photo = button.data('photo')
//   var id = button.data('id')
//  // var date = button.data('date')
//   console.log('gggggggggg' + recipient);
//   // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
//   // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
//   var modal = $(this)
// //  modal.find('.modal-title').text('New message to ' + recipient)
// modal.find('.modal-body textarea"]').val(recipient)
// console.log('gggggggggg' + recipient);
//  // modal.find('.modal-body input[name="photo"]').val(photo)
//   modal.find('.modal-body input[name="id"]').val(id)
  
// });
















 $('#exampleModal4').on('show.bs.modal', function (event) {
    console.log('afhafha');
    var button = $(event.relatedTarget) // Button that triggered the modal
   
    var recipient = button.data('whatever') // Extract info from data-* attributes
    var title = button.data('title')
    var id = button.data('id')
    var date = button.data('date')
    console.log('gggggggggg' + recipient);
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
  //  modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input[name="content"]').val(recipient)
    modal.find('.modal-body input[name="title"]').val(title)
    modal.find('.modal-body input[name="id"]').val(id)
    modal.find('.modal-body input[name="date"]').val(date)
  });


  



  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });