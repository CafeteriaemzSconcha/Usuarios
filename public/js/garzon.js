var cuentaS=0;
var cuentaB=0;
var cuentaC=0;
var cuentaP=0;
var cuentaPO=0;
var cuentaD=0;
var cuentaH=0;
var cuentaA=0;
var cuentaSE=0;
var cuentaBE=0;
var cuentaCE=0;
var cuentaPE=0;
var cuentaPOE=0;
var cuentaDE=0;
var cuentaHE=0;
var cuentaAE=0;
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
    clonS.childNodes[2].childNodes[0].id="sandwich"+cuentaS;
    clonS.childNodes[2].childNodes[0].name="sandwich"+cuentaS;
    clonS.childNodes[4].childNodes[0].id="cantS"+cuentaS;
    clonS.childNodes[4].childNodes[0].name="cantS"+cuentaS;
    clonS.childNodes[4].childNodes[0].value=1;
    clonS.childNodes[6].childNodes[0].id="descS"+cuentaS;
    clonS.childNodes[6].childNodes[0].name="descS"+cuentaS;
    clonS.childNodes[6].childNodes[0].value=0;
    document.getElementById('divSandwich').appendChild(clonS);
}

function duplicateSE(num){
    var dup = document.getElementById('rowSandwichE'+num);
    var clonS = dup.cloneNode('rowSandwichE'+num);
    cuentaSE++;
    clonS.id='rowSandwichE'+num+""+cuentaSE;
    clonS.childNodes[3].childNodes[1].id="sandwichE"+num+""+cuentaSE;
    clonS.childNodes[3].childNodes[1].name="sandwichE"+num+""+cuentaSE;
    clonS.childNodes[5].childNodes[1].id="cantSE"+num+""+cuentaSE;
    clonS.childNodes[5].childNodes[1].name="cantSE"+num+""+cuentaSE;
    clonS.childNodes[5].childNodes[1].value=1;
    clonS.childNodes[7].childNodes[1].id="descSE"+num+""+cuentaSE;
    clonS.childNodes[7].childNodes[1].name="descSE"+num+""+cuentaSE;
    clonS.childNodes[7].childNodes[1].value=0;
    document.getElementById('divSandwichE'+num).appendChild(clonS);
}

function duplicateB(){
    var dup = document.getElementById('rowBebida');
    var clonS = dup.cloneNode('rowBebida');
    cuentaB++;
    clonS.id='rowBebida'+cuentaB;
    clonS.childNodes[2].childNodes[0].id="bebida"+cuentaB;
    clonS.childNodes[2].childNodes[0].name="bebida"+cuentaB;
    clonS.childNodes[4].childNodes[0].id="cantB"+cuentaB;
    clonS.childNodes[4].childNodes[0].name="cantB"+cuentaB;
    clonS.childNodes[4].childNodes[0].value=1;
    clonS.childNodes[6].childNodes[0].id="descB"+cuentaB;
    clonS.childNodes[6].childNodes[0].name="descB"+cuentaB;
    clonS.childNodes[6].childNodes[0].value=0;
    document.getElementById('divBebida').appendChild(clonS);
}

function duplicateBE(num){
    var dup = document.getElementById('rowBebidaE'+num);
    var clonS = dup.cloneNode('rowBebidaE'+num);
    cuentaBE++;
    clonS.id='rowBebidaE'+num+""+cuentaBE;
    clonS.childNodes[3].childNodes[1].id="bebidaE"+num+""+cuentaBE;
    clonS.childNodes[3].childNodes[1].name="bebidaE"+num+""+cuentaBE;
    clonS.childNodes[5].childNodes[1].id="cantBE"+num+""+cuentaBE;
    clonS.childNodes[5].childNodes[1].name="cantBE"+num+""+cuentaBE;
    clonS.childNodes[5].childNodes[1].value=1;
    clonS.childNodes[7].childNodes[1].id="descBE"+num+""+cuentaBE;
    clonS.childNodes[7].childNodes[1].name="descBE"+num+""+cuentaBE;
    clonS.childNodes[7].childNodes[1].value=0;
    document.getElementById('divBebidaE'+num).appendChild(clonS);
}

function duplicateC(){
    var dup = document.getElementById('rowCafe');
    var clonS = dup.cloneNode('rowCafe');
    cuentaC++;
    clonS.id='rowCafe'+cuentaC;
    clonS.childNodes[2].childNodes[0].id="cafe"+cuentaC;
    clonS.childNodes[2].childNodes[0].name="cafe"+cuentaC;
    clonS.childNodes[4].childNodes[0].id="cantC"+cuentaC;
    clonS.childNodes[4].childNodes[0].name="cantC"+cuentaC;
    clonS.childNodes[4].childNodes[0].value=1;
    clonS.childNodes[6].childNodes[0].id="descC"+cuentaC;
    clonS.childNodes[6].childNodes[0].name="descC"+cuentaC;
    clonS.childNodes[6].childNodes[0].value=0;
    document.getElementById('divCafe').appendChild(clonS);
}

function duplicateCE(num){
    var dup = document.getElementById('rowCafeE'+num);
    var clonS = dup.cloneNode('rowCafeE'+num);
    cuentaCE++;
    clonS.id='rowCafeE'+num+""+cuentaCE;
    clonS.childNodes[3].childNodes[1].id="cafeE"+num+""+cuentaCE;
    clonS.childNodes[3].childNodes[1].name="cafeE"+num+""+cuentaCE;
    clonS.childNodes[5].childNodes[1].id="cantCE"+num+""+cuentaCE;
    clonS.childNodes[5].childNodes[1].name="cantCE"+num+""+cuentaCE;
    clonS.childNodes[5].childNodes[1].value=1;
    clonS.childNodes[7].childNodes[1].id="descCE"+num+""+cuentaCE;
    clonS.childNodes[7].childNodes[1].name="descCE"+num+""+cuentaCE;
    clonS.childNodes[7].childNodes[1].value=0;
    document.getElementById('divCafeE'+num).appendChild(clonS);
}

function duplicateP(){
    var dup = document.getElementById('rowPastel');
    var clonS = dup.cloneNode('rowPastel');
    cuentaP++;
    clonS.id='rowPastel'+cuentaP;
    clonS.childNodes[2].childNodes[0].id="pastel"+cuentaP;
    clonS.childNodes[2].childNodes[0].name="pastel"+cuentaP;
    clonS.childNodes[4].childNodes[0].id="cantP"+cuentaP;
    clonS.childNodes[4].childNodes[0].name="cantP"+cuentaP;
    clonS.childNodes[4].childNodes[0].value=1;
    clonS.childNodes[6].childNodes[0].id="descP"+cuentaP;
    clonS.childNodes[6].childNodes[0].name="descP"+cuentaP;
    clonS.childNodes[6].childNodes[0].value=0;
    document.getElementById('divPastel').appendChild(clonS);
}

function duplicatePE(num){
    var dup = document.getElementById('rowPastelE'+num);
    var clonS = dup.cloneNode('rowPastelE'+num);
    cuentaPE++;
    clonS.id='rowPastelE'+num+""+cuentaPE;
    clonS.childNodes[3].childNodes[1].id="pastelE"+num+""+cuentaPE;
    clonS.childNodes[3].childNodes[1].name="pastelE"+num+""+cuentaPE;
    clonS.childNodes[5].childNodes[1].id="cantPE"+num+""+cuentaPE;
    clonS.childNodes[5].childNodes[1].name="cantPE"+num+""+cuentaPE;
    clonS.childNodes[5].childNodes[1].value=1;
    clonS.childNodes[7].childNodes[1].id="descPE"+num+""+cuentaPE;
    clonS.childNodes[7].childNodes[1].name="descPE"+num+""+cuentaPE;
    clonS.childNodes[7].childNodes[1].value=0;
    document.getElementById('divPastelE'+num).appendChild(clonS);
}

function duplicatePO(){
    var dup = document.getElementById('rowPostre');
    var clonS = dup.cloneNode('rowPostre');
    cuentaPO++;
    clonS.id='rowPostre'+cuentaPO;
    clonS.childNodes[2].childNodes[0].id="postre"+cuentaPO;
    clonS.childNodes[2].childNodes[0].name="postre"+cuentaPO;
    clonS.childNodes[4].childNodes[0].id="cantPO"+cuentaPO;
    clonS.childNodes[4].childNodes[0].name="cantPO"+cuentaPO;
    clonS.childNodes[4].childNodes[0].value=1;
    clonS.childNodes[6].childNodes[0].id="descPO"+cuentaPO;
    clonS.childNodes[6].childNodes[0].name="descPO"+cuentaPO;
    clonS.childNodes[6].childNodes[0].value=0;
    document.getElementById('divPostre').appendChild(clonS);
}

function duplicatePOE(num){
    var dup = document.getElementById('rowPostreE'+num);
    var clonS = dup.cloneNode('rowPostreE'+num);
    cuentaPOE++;
    clonS.id='rowPostreE'+num+""+cuentaPOE;
    clonS.childNodes[3].childNodes[1].id="postreE"+num+""+cuentaPOE;
    clonS.childNodes[3].childNodes[1].name="postreE"+num+""+cuentaPOE;
    clonS.childNodes[5].childNodes[1].id="cantPOE"+num+""+cuentaPOE;
    clonS.childNodes[5].childNodes[1].name="cantPOE"+num+""+cuentaPOE;
    clonS.childNodes[5].childNodes[1].value=1;
    clonS.childNodes[7].childNodes[1].id="descPOE"+num+""+cuentaPOE;
    clonS.childNodes[7].childNodes[1].name="descPOE"+num+""+cuentaPOE;
    clonS.childNodes[7].childNodes[1].value=0;
    document.getElementById('divPostreE'+num).appendChild(clonS);
}

function duplicateD(){
    var dup = document.getElementById('rowDesayuno');
    var clonS = dup.cloneNode('rowDesayuno');
    cuentaD++;
    clonS.id='rowDesayuno'+cuentaD;
    clonS.childNodes[2].childNodes[0].id="desayuno"+cuentaD;
    clonS.childNodes[2].childNodes[0].name="desayuno"+cuentaD;
    clonS.childNodes[4].childNodes[0].id="cantD"+cuentaD;
    clonS.childNodes[4].childNodes[0].name="cantD"+cuentaD;
    clonS.childNodes[4].childNodes[0].value=1;
    clonS.childNodes[6].childNodes[0].id="descD"+cuentaD;
    clonS.childNodes[6].childNodes[0].name="descD"+cuentaD;
    clonS.childNodes[6].childNodes[0].value=0;
    document.getElementById('divDesayuno').appendChild(clonS);
}

function duplicateDE(num){
    var dup = document.getElementById('rowDesayunoE'+num);
    var clonS = dup.cloneNode('rowDesayunoE'+num);
    cuentaDE++;
    clonS.id='rowDesayunoE'+num+""+cuentaDE;
    console.log(clonS);
    clonS.childNodes[3].childNodes[1].id="desayunoE"+num+""+cuentaDE;
    clonS.childNodes[3].childNodes[1].name="desayunoE"+num+""+cuentaDE;
    clonS.childNodes[5].childNodes[1].id="cantDE"+num+""+cuentaDE;
    clonS.childNodes[5].childNodes[1].name="cantDE"+num+""+cuentaDE;
    clonS.childNodes[5].childNodes[1].value=1;
    clonS.childNodes[7].childNodes[1].id="descDE"+num+""+cuentaDE;
    clonS.childNodes[7].childNodes[1].name="descDE"+num+""+cuentaDE;
    clonS.childNodes[7].childNodes[1].value=0;
    document.getElementById('divDesayunoE'+num).appendChild(clonS);
}

function duplicateH(){
    var dup = document.getElementById('rowHelado');
    var clonS = dup.cloneNode('rowHelado');
    cuentaH++;
    clonS.id='rowHelado'+cuentaH;
    clonS.childNodes[2].childNodes[0].id="helado"+cuentaH;
    clonS.childNodes[2].childNodes[0].name="helado"+cuentaH;
    clonS.childNodes[4].childNodes[0].id="cantH"+cuentaH;
    clonS.childNodes[4].childNodes[0].name="cantH"+cuentaH;
    clonS.childNodes[4].childNodes[0].value=1;
    clonS.childNodes[6].childNodes[0].id="descH"+cuentaH;
    clonS.childNodes[6].childNodes[0].name="descH"+cuentaH;
    clonS.childNodes[6].childNodes[0].value=0;
    document.getElementById('divHelado').appendChild(clonS);
}

function duplicateHE(num){
    var dup = document.getElementById('rowHeladoE'+num);
    var clonS = dup.cloneNode('rowHeladoE'+num);
    cuentaHE++;
    clonS.id='rowHeladoE'+num+""+cuentaHE;
    clonS.childNodes[3].childNodes[1].id="heladoE"+num+""+cuentaHE;
    clonS.childNodes[3].childNodes[1].name="heladoE"+num+""+cuentaHE;
    clonS.childNodes[5].childNodes[1].id="cantHE"+num+""+cuentaHE;
    clonS.childNodes[5].childNodes[1].name="cantHE"+num+""+cuentaHE;
    clonS.childNodes[5].childNodes[1].value=1;
    clonS.childNodes[7].childNodes[1].id="descHE"+num+""+cuentaHE;
    clonS.childNodes[7].childNodes[1].name="descDE"+num+""+cuentaHE;
    clonS.childNodes[7].childNodes[1].value=0;
    document.getElementById('divHeladoE'+num).appendChild(clonS);
}

function duplicateA(){
    var dup = document.getElementById('rowAgregado');
    var clonS = dup.cloneNode('rowAgregado');
    cuentaA++;
    clonS.id='rowAgregado'+cuentaA;
    clonS.childNodes[2].childNodes[0].id="agregado"+cuentaA;
    clonS.childNodes[2].childNodes[0].name="agregado"+cuentaA;
    clonS.childNodes[4].childNodes[0].id="descA"+cuentaA;
    clonS.childNodes[4].childNodes[0].name="descA"+cuentaA;
    clonS.childNodes[4].childNodes[0].value=0;
    document.getElementById('divAgregado').appendChild(clonS);
}

function duplicateAE(num){
    var dup = document.getElementById('rowAgregadoE'+num);
    var clonS = dup.cloneNode('rowAgregadoE'+num);
    cuentaAE++;
    clonS.id='rowAgregadoE'+num+""+cuentaAE;
    clonS.childNodes[3].childNodes[1].id="agregadoE"+num+""+cuentaAE;
    clonS.childNodes[3].childNodes[1].name="agregadoE"+num+""+cuentaAE;
    clonS.childNodes[5].childNodes[1].id="descAE"+num+""+cuentaAE;
    clonS.childNodes[5].childNodes[1].name="descAE"+num+""+cuentaAE;
    clonS.childNodes[5].childNodes[1].value=0;
    document.getElementById('divAgregadoE'+num).appendChild(clonS);
}

function destroyS(){
    if (cuentaS !=0) {
        var sand='rowSandwich'+cuentaS;
        var des = document.getElementById('divSandwich');
        des.removeChild( document.getElementById(sand));
        cuentaS--;
    } 
}

function destroySE(num){
    if (cuentaSE !=0) {
        var sand='rowSandwichE'+num+""+cuentaSE;
        var des = document.getElementById('divSandwichE'+num);
        des.removeChild( document.getElementById(sand));
        cuentaSE--;
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

function destroyBE(num){
    if (cuentaBE !=0) {
        var sand='rowBebidaE'+num+""+cuentaBE;
        var des = document.getElementById('divBebidaE'+num);
        des.removeChild( document.getElementById(sand));
        cuentaBE--;
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

function destroyCE(num){
    if (cuentaCE !=0) {
        var sand='rowCafeE'+num+""+cuentaCE;
        var des = document.getElementById('divCafeE'+num);
        des.removeChild( document.getElementById(sand));
        cuentaCE--;
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

function destroyPE(num){
    if (cuentaPE !=0) {
        var sand='rowPastelE'+num+""+cuentaPE;
        var des = document.getElementById('divPastelE'+num);
        des.removeChild( document.getElementById(sand));
        cuentaPE--;
    }
}

function destroyPO(){
    if (cuentaPO !=0) {
        var sand='rowPostre'+cuentaPO;
        var des = document.getElementById('divPostre');
        des.removeChild( document.getElementById(sand));
        cuentaPO--;
    }
}

function destroyPOE(num){
    if (cuentaPOE !=0) {
        var sand='rowPostreE'+num+""+cuentaPOE;
        var des = document.getElementById('divPostreE'+num);
        des.removeChild( document.getElementById(sand));
        cuentaPOE--;
    }
}

function destroyD(){
    if (cuentaD !=0) {
        var sand='rowDesayuno'+cuentaD;
        var des = document.getElementById('divDesayuno');
        des.removeChild( document.getElementById(sand));
        cuentaD--;
    }
}

function destroyDE(num){
    if (cuentaDE !=0) {
        var sand='rowDesayunoE'+num+""+cuentaDE;
        var des = document.getElementById('divDesayunoE'+num);
        des.removeChild( document.getElementById(sand));
        cuentaDE--;
    }
}

function destroyH(){
    if (cuentaH !=0) {
        var sand='rowHelado'+cuentaH;
        var des = document.getElementById('divHelado');
        des.removeChild( document.getElementById(sand));
        cuentaH--;
    }
}

function destroyHE(num){
    if (cuentaHE !=0) {
        var sand='rowHeladoE'+num+""+cuentaHE;
        var des = document.getElementById('divHeladoE'+num);
        des.removeChild( document.getElementById(sand));
        cuentaHE--;
    }
}

function destroyA(){
    if (cuentaA !=0) {
        var sand='rowAgregado'+cuentaA;
        var des = document.getElementById('divAgregado');
        des.removeChild( document.getElementById(sand));
        cuentaA--;
    }
}

function destroyAE(num){
    if (cuentaAE !=0) {
        var sand='rowAgregadoE'+num+""+cuentaAE;
        var des = document.getElementById('divAgregadoE'+num);
        des.removeChild( document.getElementById(sand));
        cuentaAE--;
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
}
function hab_borrar(num){
    var padre=document.getElementById('mesa-atendida'+num);
    var div=document.getElementById('mesa-atendida'+num);
    document.getElementById('eliminarE'+num).type='submit';
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
        if(div.type=="hidden" && div.value=="X"){
            div.type="checkbox";
        }else if (div.type=="hidden") {
            div.type="number";
        }
    }

}

function borrar_producto(num) {
    var i=1;
    var borrar= [];
    while(document.getElementById('sandwich'+i+num)!=null){
        if (document.getElementById('sandwich'+i+num).childNodes[0].childNodes[0].checked) {
            var nombre=document.getElementById('sandwich'+i+num).childNodes[2].childNodes[0].nodeValue;
            var cant = document.getElementById('sandwich'+i+num).childNodes[1].childNodes[0].nodeValue;
            var el = document.getElementById('sandwich'+i+num).childNodes[5].childNodes[1].value;
            var sand = [num,nombre,cant,el,"sandwich"];
            borrar.push(sand); 
        }
        i++;
    }
  
    i=1;
    while(document.getElementById('bebida'+i+num)!=null){
        if (document.getElementById('bebida'+i+num).childNodes[0].childNodes[0].checked){
            var nombre=document.getElementById('bebida'+i+num).childNodes[2].childNodes[0].nodeValue;
            var cant = document.getElementById('bebida'+i+num).childNodes[1].childNodes[0].nodeValue;
            var el = document.getElementById('bebida'+i+num).childNodes[5].childNodes[1].value;
            var sand = [num,nombre,cant,el,"bebida"];
            borrar.push(sand);
        }
        i++;
    }
 
    i=1;
    while(document.getElementById('pastel'+i+num)!=null){
        if (document.getElementById('pastel'+i+num).childNodes[0].childNodes[0].checked){
            var nombre=document.getElementById('pastel'+i+num).childNodes[2].childNodes[0].nodeValue;
            var cant = document.getElementById('pastel'+i+num).childNodes[1].childNodes[0].nodeValue;
            var el = document.getElementById('pastel'+i+num).childNodes[5].childNodes[1].value;
            var sand = [num,nombre,cant,el,"pastel"];
            borrar.push(sand);      
        }
        i++;
    }

    i=1;
    while(document.getElementById('cafe'+i+num)!=null){
        if (document.getElementById('cafe'+i+num).childNodes[0].childNodes[0].checked){
            var nombre=document.getElementById('cafe'+i+num).childNodes[2].childNodes[0].nodeValue;
            var cant = document.getElementById('cafe'+i+num).childNodes[1].childNodes[0].nodeValue;
            var el = document.getElementById('cafe'+i+num).childNodes[5].childNodes[1].value;
            var sand = [num,nombre,cant,el,"cafe"];
            borrar.push(sand);   
        }
        i++;
    }

    i=1;
    while(document.getElementById('agregado'+i+num)!=null){
        if (document.getElementById('agregado'+i+num).childNodes[0].childNodes[0].checked){
            var nombre=document.getElementById('agregado'+i+num).childNodes[2].childNodes[0].nodeValue;
            var el = document.getElementById('agregado'+i+num).childNodes[5].childNodes[1].value;
            var sand = [num,nombre,cant,el,"agregado"];
            borrar.push(sand);          
        }
        i++;
    }

    i=1;
    while(document.getElementById('postre'+i+num)!=null){
        if (document.getElementById('postre'+i+num).childNodes[0].childNodes[0].checked){
            var nombre=document.getElementById('postre'+i+num).childNodes[2].childNodes[0].nodeValue;
            var cant = document.getElementById('postre'+i+num).childNodes[1].childNodes[0].nodeValue;
            var el = document.getElementById('postre'+i+num).childNodes[5].childNodes[1].value;
            var sand = [num,nombre,cant,el,"postre"];
            borrar.push(sand);           
        }
        i++;
    }

    i=1;
    while(document.getElementById('helado'+i+num)!=null){
        if (document.getElementById('helado'+i+num).childNodes[0].childNodes[0].checked){
            var nombre=document.getElementById('helado'+i+num).childNodes[2].childNodes[0].nodeValue;
            var cant = document.getElementById('helado'+i+num).childNodes[1].childNodes[0].nodeValue;
            var el = document.getElementById('helado'+i+num).childNodes[5].childNodes[1].value;
            var sand = [num,nombre,cant,el,"helado"];
            borrar.push(sand);           
        }
        i++;
    }

    i=1;
    while(document.getElementById('desayuno'+i+num)!=null){
        if (document.getElementById('desayuno'+i+num).childNodes[0].childNodes[0].checked){
            var nombre=document.getElementById('desayuno'+i+num).childNodes[2].childNodes[0].nodeValue;
            var cant = document.getElementById('desayuno'+i+num).childNodes[1].childNodes[0].nodeValue;
            var el = document.getElementById('desayuno'+i+num).childNodes[5].childNodes[1].value;
            var sand = [num,nombre,cant,el,"desayuno"];
            borrar.push(sand);           
        }
        i++;
    }
    borrar = JSON.stringify(borrar);
    document.getElementById('formel'+num).action="editMesa/"+borrar;
    return true;
}

function ver(num){
    var opciones = "width=219,height=400,scrollbars=NO";
    var desc=document.getElementById('descuento'+num).value;
    if(desc==""){
        desc=0;
    }
    //window.open("imprimir/"+num+"/"+desc,"imprimir", opciones);*/
    window.open("imprimir/"+num+"/"+desc,"imprimir", opciones);
}
