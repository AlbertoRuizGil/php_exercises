window.addEventListener("load", showCatalog);
document.getElementById("add_book").addEventListener("click", addBook);
document.getElementById("search").addEventListener("keyup", showCatalog);

function showCatalog(){
  var tabla = document.getElementById("catalog");
  var input = document.getElementById("search").value;
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if(this.readyState==4 && this.status==200){
      tabla.innerHTML= this.responseText;
    }
  };
  xhr.open("POST", "./php/index.php");
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("search=" + input);
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
      document.getElementById("error").innerHTML = this.responseText;
      document.getElementById("author").value = "";
      document.getElementById("title").value = "";
      document.getElementById("genre").value = "";
      document.getElementById("price").value = "";
      document.getElementById("publication").value = "";
      showCatalog();
    }
  };
  xhr.open("POST", "./php/insertBook.php");
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("author=" + author + "&title=" + title + "&genre=" + genre + "&price=" + price + "&publication=" + publication);
}

function deleteBook(id){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
      document.getElementById("error").innerHTML = this.responseText;
      showCatalog();
    }
  };
  xhr.open("POST", "./php/deleteBook.php");
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("id=" + id);
}