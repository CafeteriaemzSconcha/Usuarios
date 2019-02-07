function hab_mesaG() {
    var mesa = "bmesa" + document.getElementById('num').value;
    
    var estado = document.getElementById(mesa).disabled;
    if (estado == true) {
        console.log(mesa);
        document.getElementById(mesa).disabled=false;
        return true;
    }else{
        document.getElementById('ocupado').innerHTML='Mesa ocupada';
        return false;
    }
}