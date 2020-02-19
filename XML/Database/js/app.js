document.getElementById("show_catalog_btn").addEventListener("click", showCatalog);

function showCatalog(){
  var tabla = document.getElementById("catalog");
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if(this.readyState==4 && this.status==200){
      tabla.innerHTML= this.responseText;
    }
  };
  xhr.open("POST", "./php/index.php");
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send();

}