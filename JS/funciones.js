/*document.oncontextmenu = function () {
    return false;
};*/
/********************MENU SLAIDER****************/ $("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
/*****************GIF CARGANDO**********/ $(window).ready(function () {
    setTimeout(() => {
        $(".loader").fadeOut("slow");
    }, 2000);
});
$(window).ready(function () {
    setTimeout(() => {
        $("#mensaje").show();
    }, 5000);
});
const imgZoom = () => {
    img = document.getElementById("imgOC");
    img.animate([{ transform: "scale(0.8)" }, { transform: "scale(0.6)" }, { transform: "scale(0.8)" }], { duration: 1700, iterations: Infinity });
};
const listar = (url) => {
    $(document).ready(function () {
        let datos = $("#formulario").serialize();
        $.ajax({
            type: "POST",
            url: url,
            DataType: "json",
            success: function (r) {
                if (r) {
                    $("#result").html(r);
                } else {
                    return Swal.fire("Mensaje de error", "Por favor verifique el sistema, hubo un error con la base de datos, recomendamos llamar a tecnología para solventar el problema", "error");
                } /*   alert("Hubo un error con la base de datos");*/
            },
        });
        return false;
    });
};
const Eliminar = (url, datos, vista) => {
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            data: { cod: datos },
            url: url,
            success: function (r) {
                if (r == 1) {
                    console.log(r);
                    window.location.reload();
                } else {
                    console.log(r);
                    return Swal.fire("Mensaje de advertencia", "Por favor verifique que el registro no este asociado a ningun registro", "warning");
                }
            },
        });
        return false;
    });
};
 const rutas = () => {
    $(".btn-enviar, .btn-op").click((value) => {
      btn_value = value.target.value;
      vista = value.target.accept;
      if (btn_value === "PDF") 
      {
        reportes(vista);

      }
      else if (btn_value === "EXCEL") 
      {
        reportes(vista);


      }
      else if (btn_value === "GRÁFICA") 
      {
        reportes(vista);


      }
      else if (!vista)
      {
        alert("la vista no existe");

      }
      else if (!btn_value)
      {
        alert("El valor del boton no es ninguno de los formatos");

      } 
      else 
      {          
       reportes(vista);
       return Swal.fire("Advertencia","Puede que haya algún error al generar",'warning');
 
        console.log(vista+' '+btn_value);


      }
    });
  };
/*const rutas = () => {
    $(".btn-enviar, .btn-op").click((value) => {
        btn_value = value.target.value;
        vista = value.target.accept;
        if (btn_value === "PDF") {
            reportes(vista); 
        } else if (btn_value === "EXCEL") {
            reportes(vista);
        } else if (btn_value === "GRÁFICA") {
            reportes(vista);
        } else if (btn_value == "Modificar") {
            reportes(vista);
        } else if (!vista) {
            alert("la vista no existe");
        } else if (!btn_value) {
            alert("El valor del boton no es ninguno de los formatos");
        } else {
            alert("error");
        }
    });
};*/
const reportes = (vista) => {
    datos = $("#formulario").serialize();
    $(location).attr("href", vista + datos);
};
const enviar = (url, vista) => {
    $("#btn-enviar").click((e) => {
        e.preventDefault();
        if ($("#fecha").val() === "") {
            return Swal.fire("Mensaje de error", "Por favor rellene los campos vacios", "error");
            $("#fecha").css({ border: "1px solid red" });
        } else {
            datos = $("#formulario").serialize();
            type = "POST";
            ajax(url, datos, type, vista);
        }
    });
};
const ajax = (url, datos, type, vista) => {
    $(document).ready(function () {
        $.ajax({
            type: type,
            data: datos,
            url: url,
            success: function (r) {
                if (r == true) {
                    console.log(r);
                    animation();
                    document.getElementById("formulario").reset(); /* setTimeout(()=>{animation()},450) setTimeout(()=>{ $(location).attr('href',vista)},1720)*/
                } else if (r == 400 || r == 404) {
                    return Swal.fire("Mensaje de error", "La fecha que ha introducido ya existe", "error");
                } else {
                    console.log(r);
                    return Swal.fire("Mensaje de error", "Por favor verifique el sistema, hubo un error con la base de datos, recomendamos llamar a tecnología para solventar el problema", "error");
                }
            },
        });
        return false;
    });
};
const animation = () => {
    /*  img = $("<img>") img.attr({src:'../../IMG/visto.gif', style:'position:absolute;top:0px;margin-left:auto;margin-rigth:auto;width:40%;left:35%'}) $("#formulario").append(img)*/ return Swal.fire(
        "Enhorabuena",
        " la petición a la base de datos ha sido satisfactoria",
        "success"
    );
    document.getElementById("form-agg").reset();
    document.getElementById("form").reset();
    document.getElementById("formu").reset();
};
const BtnEnviar_Modificar = () => {
    $(document).ready(() => {
        $("#btn-enviar").css({ transform: "scale(1.0)" });
        x = $(".val");
        x.keyup(() => {
            $("#btn-enviar").css({ transform: "scale(1.0)" });
            for (i = 0; i < x.length; i++) {
                if (x[i].value.length > 0) {
                } else {
                    $("#btn-enviar").css({ transform: "scale(0.0)" });
                }
            }
        });
    });
};
const BtnAgregar = () => {
    $(document).ready(() => {
        $("#btn-enviar").css({ transform: "scale(0.0)", transition: "1000ms" });
        x = $(".val");
        x.keyup(() => {
            $("#btn-enviar").css({ transform: "scale(1.0)" });
            for (i = 0; i < x.length; i++) {
                if (!x[i].value.length > 0) {
                    $("#btn-enviar").css({ transform: "scale(0.0)" });
                }
            }
        });
    });
};
const agregar_data_admin = () => {
    btn = $("#agregar_data");
    btnC = $("#btn-cancelar");
    btnA = $("#btn-agregar_data");
    btn.click(() => {
        $(".modal-content").css({ transform: "scale(1.0)", transition: "all 1000ms" });
        $(".btns").attr("disabled", true);
        $(".disabled").attr("readonly", true);
        $("#page-content-wrapper").css({ background: "rgba(100,100,100,.3)", transition: "all 1000ms" });
    });
    btnC.click(() => {
        $(".modal-content").css({ transform: "scale(0.0)", transition: "all 1000ms" });
        $(".btns").attr("disabled", false);
        $(".disabled").attr("readonly", false);
        document.getElementById("form-agg").reset();
        $("#page-content-wrapper").css({ background: "none", transition: "all 1000ms" });
    });
};
const EnviarAdmin = (url) => {
    btn = $("#btn-enviar");
    btn.click((e) => {
        e.preventDefault();
        $(document).ready(function () {
            var datos = $("#form-agg").serialize();
            console.log(datos);
            $.ajax({
                type: "POST",
                url: url,
                data: datos,
                success: function (r) {
                    if (r == true) {
                        animation();
                        document.getElementById("form-agg").reset();
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else if (r == 404) {
                        return Swal.fire("Mensaje de error", "Por favor verifique", "error");
                    } else {
                        console.log(r);
                        return Swal.fire("Mensaje de error", "Hubo un error con la base de datos, por favor comuniquiese con tecnología", "error");
                    }
                },
            });
            return false;
        });
    });
};
$("title").text("SIE - Sistema indicador estadistico");

