var cuentaS=0;
var cuentaB=0;
var cuentaC=0;
var cuentaP=0;

function alerta_pago(){
    var opcion = confirm("Esta seguro que desea cerrar la mesa");
    if (opcion == true) {
        return true;
	} else {
	    return false;
	}
}

function alerta_borrar(){
    var opcion = confirm("Esta seguro que desea eliminar la mesa");
    if (opcion == true) {
        return true;
	} else {
	    return false;
	}
}

function hab_mesaG() {
    var mesa = "bmesa" + document.getElementById('num').value;
    var estado = document.getElementById(mesa).disabled;
    if (estado == true) {
        document.getElementById(mesa).disabled=false;
        document.getElementById(mesa).className="btn btn-dark btn-lg btn-social text-center rounded-square i";
        return true;
    }else{
        document.getElementById('ocupado').innerHTML='Mesa ocupada';
        window.setInterval(function(){
            document.getElementById('ocupado').innerHTML = "";
          },1000);
        return false;
    }
}

function duplicateS(){
    var dup = document.getElementById('rowSandwich');
    var clonS = dup.cloneNode('rowSandwich');
    cuentaS++;
    clonS.id='rowSandwich'+cuentaS;
    clonS.childNodes[0].childNodes[0].id="sandwich"+cuentaS;
    clonS.childNodes[2].childNodes[0].id="cantS"+cuentaS;
    clonS.childNodes[0].childNodes[0].name="sandwich"+cuentaS;
    clonS.childNodes[2].childNodes[0].name="cantS"+cuentaS;
    document.getElementById('divSandwich').appendChild(clonS);
}

function duplicateSE(){
    var dup = document.getElementById('rowSandwichE');
    var clonS = dup.cloneNode('rowSandwichE');
    cuentaS++;
    clonS.id='rowSandwichE'+cuentaS;
    clonS.childNodes[0].childNodes[0].id="sandwichE"+cuentaS;
    clonS.childNodes[2].childNodes[0].id="cantSE"+cuentaS;
    clonS.childNodes[0].childNodes[0].name="sandwichE"+cuentaS;
    clonS.childNodes[2].childNodes[0].name="cantSE"+cuentaS;
    document.getElementById('divSandwichE').appendChild(clonS);
}

function duplicateB(){
    var dup = document.getElementById('rowBebida');
    var clonS = dup.cloneNode('rowBebida');
    cuentaB++;
    clonS.id='rowBebida'+cuentaB;
    clonS.childNodes[0].childNodes[0].id="bebida"+cuentaB;
    clonS.childNodes[2].childNodes[0].id="cantB"+cuentaB;
    clonS.childNodes[0].childNodes[0].name="bebida"+cuentaB;
    clonS.childNodes[2].childNodes[0].name="cantB"+cuentaB;
    document.getElementById('divBebida').appendChild(clonS);
}

function duplicateBE(){
    var dup = document.getElementById('rowBebidaE');
    var clonS = dup.cloneNode('rowBebidaE');
    cuentaB++;
    clonS.id='rowBebidaE'+cuentaB;
    clonS.childNodes[0].childNodes[0].id="bebidaE"+cuentaB;
    clonS.childNodes[2].childNodes[0].id="cantBE"+cuentaB;
    clonS.childNodes[0].childNodes[0].name="bebidaE"+cuentaB;
    clonS.childNodes[2].childNodes[0].name="cantBE"+cuentaB;
    document.getElementById('divBebidaE').appendChild(clonS);
}

function duplicateC(){
    var dup = document.getElementById('rowCafe');
    var clonS = dup.cloneNode('rowCafe');
    cuentaC++;
    clonS.id='rowCafe'+cuentaC;
    clonS.childNodes[0].childNodes[0].id="cafe"+cuentaC;
    clonS.childNodes[2].childNodes[0].id="cantC"+cuentaC;
    clonS.childNodes[0].childNodes[0].name="cafe"+cuentaC;
    clonS.childNodes[2].childNodes[0].name="cantC"+cuentaC;
    document.getElementById('divCafe').appendChild(clonS);
}

function duplicateCE(){
    var dup = document.getElementById('rowCafeE');
    var clonS = dup.cloneNode('rowCafeE');
    cuentaC++;
    clonS.id='rowCafeE'+cuentaC;
    clonS.childNodes[0].childNodes[0].id="cafeE"+cuentaC;
    clonS.childNodes[2].childNodes[0].id="cantCE"+cuentaC;
    clonS.childNodes[0].childNodes[0].name="cafeE"+cuentaC;
    clonS.childNodes[2].childNodes[0].name="cantCE"+cuentaC;
    document.getElementById('divCafeE').appendChild(clonS);
}

function duplicateP(){
    var dup = document.getElementById('rowPastel');
    var clonS = dup.cloneNode('rowPastel');
    cuentaP++;
    clonS.id='rowPastel'+cuentaP;
    clonS.childNodes[0].childNodes[0].id="pastel"+cuentaP;
    clonS.childNodes[2].childNodes[0].id="cantP"+cuentaP;
    clonS.childNodes[0].childNodes[0].name="pastel"+cuentaP;
    clonS.childNodes[2].childNodes[0].name="cantP"+cuentaP;
    document.getElementById('divPastel').appendChild(clonS);
}

function duplicatePE(){
    var dup = document.getElementById('rowPastelE');
    var clonS = dup.cloneNode('rowPastelE');
    cuentaP++;
    clonS.id='rowPastelE'+cuentaP;
    clonS.childNodes[0].childNodes[0].id="pastelE"+cuentaP;
    clonS.childNodes[2].childNodes[0].id="cantPE"+cuentaP;
    clonS.childNodes[0].childNodes[0].name="pastelE"+cuentaP;
    clonS.childNodes[2].childNodes[0].name="cantPE"+cuentaP;
    document.getElementById('divPastelE').appendChild(clonS);
}

function destroyS(){
    if (cuentaS !=0) {
        var sand='rowSandwich'+cuentaS;
        var des = document.getElementById('divSandwich');
        des.removeChild( document.getElementById(sand));
        cuentaS--;
    } 
}

function destroySE(){
    if (cuentaS !=0) {
        var sand='rowSandwichE'+cuentaS;
        var des = document.getElementById('divSandwichE');
        des.removeChild( document.getElementById(sand));
        cuentaS--;
    } 
}

function destroyB(){
    if (cuentaB !=0) {
        var sand='rowBebida'+cuentaB;
        var des = document.getElementById('divBebida');
        des.removeChild( document.getElementById(sand));
        cuentaB--;
    }
}

function destroyBE(){
    if (cuentaB !=0) {
        var sand='rowBebidaE'+cuentaB;
        var des = document.getElementById('divBebidaE');
        des.removeChild( document.getElementById(sand));
        cuentaB--;
    }
}

function destroyC(){
    if (cuentaC !=0) {
        var sand='rowCafe'+cuentaC;
        var des = document.getElementById('divCafe');
        des.removeChild( document.getElementById(sand));
        cuentaC--;
    }
}

function destroyCE(){
    if (cuentaC !=0) {
        var sand='rowCafeE'+cuentaC;
        var des = document.getElementById('divCafeE');
        des.removeChild( document.getElementById(sand));
        cuentaC--;
    }
}

function destroyP(){
    if (cuentaP !=0) {
        var sand='rowPastel'+cuentaP;
        var des = document.getElementById('divPastel');
        des.removeChild( document.getElementById(sand));
        cuentaP--;
    }
}

function destroyPE(){
    if (cuentaP !=0) {
        var sand='rowPastelE'+cuentaP;
        var des = document.getElementById('divPastelE');
        des.removeChild( document.getElementById(sand));
        cuentaP--;
    }
}

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });

function hab_borrar(num){
    var padre=document.getElementById('mesa-atendida'+num);
    var div=document.getElementById('mesa-atendida'+num);
    while(true){
        if(div.firstChild!=null){
            div=div.firstChild;
        }else if(div.nextElementSibling!=null){
            div=div.nextElementSibling;
        }else if(div.nextElementSibling==null && div.firstChild==null){
            while (div.parentNode.nextSibling==null) {
                div=div.parentNode;
                if(div==padre){
                    break
                }
            }
            if(div!=padre){
                div=div.parentNode.nextSibling;
            }
        }
        if (div==padre) {
            break;
        }
        if(div.type=="hidden"){
            div.type="button";
        }
    }
}

function ver(num){
    var opciones = "width=219,height=400,scrollbars=NO";
    window.open("imprimir/"+num,"nombreventa na", opciones);
}


} 