document.getElementById("show_catalog_btn").addEventListener("click", showCatalog);
document.getElementById("add_book").addEventListener("click", addBook);
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

function addBook(){
  var xhr = new XMLHttpRequest();
  var author = document.getElementById("author").value;
  var title = document.getElementById("title").value;
  var genre = document.getElementById("genre").value;
  var price = document.getElementById("price").value;
  var publication = document.getElementById("publication").value;
  xhr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      showCatalog();
      document.getElementById("error").innerHTML = this.responseText;
    }
  };
  xhr.open("POST", "./php/insertBook.php");
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("author=" + author + "&title=" + title + "&genre=" + genre + "&price=" + price + "&publication=" + publication);
}