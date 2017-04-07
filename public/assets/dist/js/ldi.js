/* 
 * JavaScript desenvolvido pela equipe
 */

// Troca icone plus/minus
function trocaPlusMinus(id){
  var x = document.getElementById("pm" + id).className;

    if(x === "fa fa-plus-circle"){
        document.getElementById("pm" + id).className = "fa fa-minus-circle";
    }else{
        document.getElementById("pm" + id).className = "fa fa-plus-circle";
    };
};