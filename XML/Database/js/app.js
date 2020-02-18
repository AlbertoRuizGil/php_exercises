document.getElementById("fetch").addEventListener("click", getElements);

async function getElements(e){
  e.preventDefault();
  var form = document.getElementById("form");
  var data = new FormData(form);
  data.append("clave", "valor");
  var res = await fetch("./php/index.php", {
    method: "post",
    body: data
  });
  var element = await res.json();
  console.log(element);
}