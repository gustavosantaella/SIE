function selectMun(url,link){
  $("#btn-enviar").css({transform:'scale(0.0)'})
  $("#estados").change(function(){

    $(document).ready(function(){


     let datos=$('#formulario').serialize();
     $.ajax({
      type:"POST",
      url:link,
      data:datos,
      success:function(r){

        mun=JSON.parse(r)

        if(mun.status==true && url=="SIE/VIEW/agregar/contagiadosMun.php"){
         html = ''
         html2=''
         html3=''
         html4=''
         for(var i in mun.data){

           html+=`<input type='text' class='input' readonly="" name='mun[]'style='font-weight:bold;border:1px solid rgba(100,100,100,.3)'  value='${mun.data[i].desmun}'>
           <input type='hidden' name='codmun[]' value='${mun.data[i].codmun}'>`
           html2 +=`<input type='number' name='valorR[]' placeholder='Campo numérico' class='input val' required style='border:1px solid rgba(100,100,100,.3)' >`
           html3 +=`<input type='number' name='valorC[]' placeholder='Campo numérico' class='input val' required style='border:1px solid rgba(100,100,100,.3)' >`
           html4 +=`<input type='number' name='valorF[]' placeholder='Campo numérico' class='input val' required style='border:1px solid rgba(100,100,100,.3)' >`

         }   

         $("#resultMun").html(html)
         $("#inputR").html(html2)
         $("#inputC").html(html3)
         $("#inputF").html(html4)
         val=$(".val")
         val.keyup(()=>{
          $("#btn-enviar").css({transform:'scale(1.0)'})

          val=$(".val")
          for (var i = 0; i <val.length; i++) {
           if (val[i].value.length===0) {
            $("#btn-enviar").css({transform:'scale(0.0)'})
          }
        }
      })


       }else if(mun.status==false && url=="SIE/VIEW/agregar/contagiadosMun.php"){

        $("#resultMun").html("No existe")


        setTimeout(()=>{location.reload()},1720)


      }else{
       return Swal.fire("Mensaje de error","Por favor verifique el sistema, hubo un error con la base de datos, recomendamos llamar a tecnología para solventar el problema","error")
     }
   }
 });

     return false;

   });

  });
}


function selectMunPar(){


  $("#btn-enviar").css({transform:'scale(0.0)'})
  $("#estados").change(function(){

    $(document).ready(function(){


     let datos=$('#formulario').serialize();
     $.ajax({
      type:"POST",
      url:'../../CONTROLLERS/agregar/select_munPar.php',
      data:datos,
      success:function(r){

        if (r) {

          $("#resultMun").html(r)

          if ($("#selectMun").value==' '||$("#selectMun").value==null||$("#selectMun").value.length==0) {

           $("#resultPar").html("Por favor escoja un municipio")

           $("#btn-enviar").css({transform:'scale(0.0)'})
         }
       }else if(r=='No existe'){
         $("#resultMun").html('No existe')
         location.reload()
       }
       else{
        $("#resultMun").html(r)
        return Swal.fire("Mensaje de error","Por favor verifique el sistema, hubo un error con la base de datos, recomendamos llamar a tecnología para solventar el problema","error")
      }
    }
  });

     return false;

   });

  });

}


function selectPar(){
  $("#resultMun").change(function(){
    $(document).ready(function(){

     let datos=$('#formulario').serialize();
     $.ajax({
      type:"POST",
      url:"../../CONTROLLERS/agregar/select_par.php",
      data:datos,
      success:function(s){

        parroquias=JSON.parse(s)
        if(parroquias.status==true){

          /*  console.log(s)*/
          html='';
          html2='';
          html3='';
          html4='';
          for(var i in parroquias.data){

           html+=`<input type='text' class='input' readonly="" name='par[]'style='font-weight:bold;border:1px solid rgba(100,100,100,.3);text-align:center'  value='${parroquias.data[i].despar}'>
           <input type='hidden' name='codpar[]' value='${parroquias.data[i].codpar}'>`
           html2 +=`<input type='number' name='valorR[]' placeholder='Campo numérico' class='input val' required style='border:1px solid rgba(100,100,100,.3)' >`
           html3 +=`<input type='number' name='valorC[]' placeholder='Campo numérico' class='input val' required style='border:1px solid rgba(100,100,100,.3)' >`
           html4 +=`<input type='number' name='valorF[]' placeholder='Campo numérico' class='input val' required style='border:1px solid rgba(100,100,100,.3)' >`

         }   

         $("#resultPar").html(html)
         $("#inputR").html(html2)
         $("#inputC").html(html3)
         $("#inputF").html(html4)

         val=$(".val")
         val.keyup(()=>{
          $("#btn-enviar").css({transform:'scale(1.0)'})

          val=$(".val")
          for (var i = 0; i <val.length; i++) {
           if (val[i].value.length===0) {
            $("#btn-enviar").css({transform:'scale(0.0)'})
          }
        }
      })

         $("#btn-enviar").click((e)=>{
          e.preventDefault();
          if ($("#fecha").val()==='') {

            $("#fecha").css({border:'1px solid red'})   

          }else{
            $(document).ready(function(){


              let datos=$('#formulario').serialize();
              $.ajax({
                type:"POST",
                url:"../../CONTROLLERS/agregar/covidPar.php",
                data:datos,
                success:function(r){
                  if(r==true){
                   setTimeout(()=>{animation()},450)
                   setTimeout(()=>{location.reload();},2500)
                   /*   */
                 }else if(r==400){

                   $("#fecha").css({border:'1px solid red'})   

                 }else{
                   return Swal.fire("Mensaje de error","Por favor verifique el sistema, hubo un error con la base de datos, recomendamos llamar a tecnología para solventar el problema","error")
                 }
               }
             });

              return false;

            });

          }

        })
         

                //  document.getElementById("formulario").reset();
              }else if(parroquias.status==false){

                $("#resultPar").html("No existe")
                location.reload()

              }else{
                    return Swal.fire("Mensaje de error","Por favor verifique el sistema, hubo un error con la base de datos, recomendamos llamar a tecnología para solventar el problema","error")
             }
           }
         });

     return false;

   });

  });
}


const selectMunAdmin = ()=>{

 $("#estados").change(()=>{

   $(document).ready(function(){

     let datos= $("#estados").val();
     console.log(datos)
     $.ajax({
       type:"POST",
       url:"../../CONTROLLERS/administrar/parroquias.php",
       data:{estados:datos},
       success:function(r){
        json = JSON.parse(r);
        if(json.status==true){

          console.log(json);
          html = '';
          for(var i in json.data){

            html+=`<option value='${json.data[i].codmun}'>${json.data[i].desmun}</option>`

          }

          $("#municipios").html(html);

        }else if(json.status==0){


          html=`<option value=''>Sin municipio</option>`
          $("#municipios").html(html);
        }else{
          return Swal.fire("Mensaje de error","Por favor verifique el sistema, hubo un error con la base de datos, recomendamos llamar a tecnología para solventar el problema","error")
        }
      }
    });

     return false;

   });
 })
}