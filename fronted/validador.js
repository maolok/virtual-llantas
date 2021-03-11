let btnGuardar = document.getElementById("guardar");
const xmlhttp = new XMLHttpRequest();
const render = document.getElementById("render");

setInterval(() => { serverGet(); }, 60000);

function serverGet(){

    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          
        let data = this.responseText;
        Render(data);
        
      }
    };
    
    xmlhttp.open("GET","../backend/getitems.php",true);
    xmlhttp.send();
  
}

function Render(data){

  let registros = JSON.parse(data);
      
       let html = ``;
      for(let i =0;i<registros.length;i++)
      {
        
        html = html + `<div class="container-md" id="productos">
                       <h2>${registros[i].titulo}</h2>
                       <h2 align="right">${registros[i].registro}</h2>
                       <div class="block"><img src=${registros[i].archivo} width="150" height="150"></div>
                       <div class="block"><b>${registros[i].contenido}</b></div>
                       </div><br>`;
    
        
      }
      
      render.innerHTML = html; 
}
$(document).ready(function(e){

  $("#formulario").on('submit', function(e){
      e.preventDefault();
      $.ajax({
          type: 'POST',
          url: '../backend/saveitem.php',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData:false,
          success: function(response){ 

            alert(response.message);
            
            if (response.status == 1)
            {
            setTimeout(() => {  serverGet(); }, 500);
            $('#formulario')[0].reset();
            }

          }
      });

  });
});

//btnGuardar.onclick = getFormData;