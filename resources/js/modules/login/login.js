$('#frmLogin').submit(function(event) 
{
     event.preventDefault();
     axios.post('/', {
         login: $('#inputLogin').val(),
         password: $('#inputPassword').val(),
     })
     .then( (response) => { 
        $(location).attr('href', '/');
     })
     .catch( (error) => {  
        return false;
     });
 });