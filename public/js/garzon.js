var cuentaS=0;
var cuentaB=0;
var cuentaC=0;
var cuentaP=0;

function hab_mesaG() {
    var mesa = "bmesa" + document.getElementById('num').value;
    
    var estado = document.getElementById(mesa).disabled;
    if (estado == true) {
        document.getElementById(mesa).disabled=false;
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
    var dup = document.getElementById('sandwich');
    var cant = document.getElementById('cantS');
    var clonS = dup.cloneNode('sandwich');
    var clonc = cant.cloneNode('cantS');
    cuentaS++;
    clonS.id='sandwich'+cuentaS;
    clonS.name='sandwich'+cuentaS;
    clonc.id='cantS'+cuentaS;
    clonc.name='cantS'+cuentaS;
    document.getElementById('divSandwich').appendChild(clonS);
    document.getElementById('divSandwich').appendChild(clonc);
}

function duplicateB(){
    var dup = document.getElementById('bebida');
    var cant = document.getElementById('cantB');
    var clonB = dup.cloneNode('bebida');
    var clonc = cant.cloneNode('cantB');
    cuentaB++;
    clonB.id='bebida'+cuentaB;
    clonc.id='cantB'+cuentaB;
    clonB.name='bebida'+cuentaB;
    clonc.name='cantB'+cuentaB;
    document.getElementById('divBebidas').appendChild(clonB);
    document.getElementById('divBebidas').appendChild(clonc);
}

function duplicateC(){
    var dup = document.getElementById('cafe');
    var cant = document.getElementById('cantC');
    var clon = dup.cloneNode('cafe');
    var clonc = cant.cloneNode('cantC');
    cuentaC++;
    clon.id='cafe'+cuentaC;
    clonc.id='cantC'+cuentaC;
    clon.name='cafe'+cuentaC;
    clonc.name='cantC'+cuentaC;
    document.getElementById('divCafe').appendChild(clon);
    document.getElementById('divCafe').appendChild(clonc);
}

function duplicateP(){
    var dup = document.getElementById('pastel');
    var cant = document.getElementById('cantP');
    var clon = dup.cloneNode('pastel');
    var clonc = cant.cloneNode('cantP');
    cuentaP++;
    clon.id='pastel'+cuentaP;
    clonc.id='cantP'+cuentaP;
    clon.name='pastel'+cuentaP;
    clonc.name='cantP'+cuentaP;
    document.getElementById('divPastel').appendChild(clon);
    document.getElementById('divPastel').appendChild(clonc);
}

function destroyS(){
    if (cuentaS !=0) {
        var sand='sandwich'+cuentaS;
        var cant = 'cantS'+cuentaS;
        var des = document.getElementById('divSandwich');
        des.removeChild( document.getElementById(sand));
        des.removeChild( document.getElementById(cant));
        cuentaS--;
    }
    
}

function destroyB(){
    if (cuentaB !=0) {
        var sand='bebida'+cuentaB;
        var cant = 'cantB'+cuentaB;
        var des = document.getElementById('divBebidas');
        des.removeChild( document.getElementById(sand));
        des.removeChild( document.getElementById(cant));
        cuentaB--;
    }
    
}

function destroyC(){
    if (cuentaC !=0) {
        var sand='cafe'+cuentaC;
        var cant = 'cantC'+cuentaC;
        var des = document.getElementById('divCafe');
        des.removeChild( document.getElementById(sand));
        des.removeChild( document.getElementById(cant));
        cuentaC--;
    }
    
}

function destroyP(){
    if (cuentaP !=0) {
        var sand='pastel'+cuentaP;
        var cant = 'cantP'+cuentaP;
        var des = document.getElementById('divPastel');
        des.removeChild( document.getElementById(sand));
        des.removeChild( document.getElementById(cant));
        cuentaP--;
    }
    
}