 $( document ).ready(function() {
    $('#divSuccess').hide();
    $('#divExists').hide();
    $('#divError').hide();
    $('#divSuccessUpdate').hide();

    // $('#tableCollaborator').DataTable();

    axios.get('/collaborator/employee_list', { 
    })
    .then( (response) => {   
        autocomplete(document.getElementById("myInput"),response.data);
    })
    .catch( (error) => {   
    }); 



    axios.get('/collaborator/list', { 
    })
    .then( (response) => {    
        populartable(response.data);  
    })
    .catch( (error) => {    
    });  
 });
  
 function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
 }

 function populartable(data)
 {
    $.each(data, function (key, item) {
        arquive = "<tr>"+
        +"<td>"+item.id+"</td>"
        +"<td>"+item.name+"</td>"
        +"<td>"+item.occupation+"</td>"
        +"<td>"+item.cpf+"</td>"
        +"<td>"+item.rg+"</td>"
        +"<td>"+item.admission_date+"</td>"
        +"<td>"+item.created_at+"</td>"
        +"<td>"+item.updated_at+"</td>"
        +"</tr>";

        $("#bodyCollaborator").append(arquive);
    }); 

 }

 function popularBody(data)
{    
   $.each(data, function (key, item) {
      $('#idCollaborator').val(item.id);
      $('#name').val(item.name);
      $('#admissionDate').val(item.admission_date);
      $('#cpf').val(item.cpf);
      $('#rg').val(item.rg);
      $('#occupation').val(item.occupation);  
   }); 
} 

 $('#frmSearchEmployee').submit(function(event) 
{  
     event.preventDefault();
     
     axios.post('/reception', {
         name: $('#myInput').val(), 
     })
     .then( (response) => {   
         popularBody(response.data);
     })
     .catch( (error) => {  
         $('#divNotFound').show(); 
     });
 });

 function resetInput()
{
    $('#idCollaborator').val('');
    $('#name').val('');
    $('#admissionDate').val('');
    $('#cpf').val('');
    $('#rg').val('');
    $('#occupation').val('');
}

$("#resetData").click(function(){ 
    resetInput();
});

$('#frmCollaborator').submit(function(event) 
{  
     event.preventDefault();
     axios.post('/collaborator', {
        id: $('#idCollaborator').val(), 
        name: $('#name').val(), 
        admission_date: $('#admissionDate').val(), 
        cpf: $('#cpf').val(), 
        rg: $('#rg').val(), 
        occupation: $('#occupation').val(), 
        photo: 'default-image.jpg',  
     })
     .then( (response) => {   
         switch(response.status)
         {
            case 201:

                $('#divSuccess').show();
                resetInput();

                setInterval(function(){
                    $('#divSuccess').hide();                              
                }, 5000);

            break;
            case 200:

                $('#divSuccessUpdate').show();
                resetInput();

                setInterval(function(){
                    $('#divSuccessUpdate').hide();                              
                }, 5000);

            break;
            case 204:
                $('#divExists').show();
                setInterval(function(){
                    $('#divExists').hide();                       
                }, 5000); 

            break; 
         } 
     })
     .catch( (error) => {  
        $('#divError').show(); 
        setInterval(function(){
            $('#divError').hide();                              
        }, 5000);
     });
 });