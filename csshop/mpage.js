function toggle_visibility(id) {
  var e = document.getElementById(id);
  if(e.style.display == 'block')
    e.style.display = 'none';
  else
    e.style.display = 'block';
}
window.onresize = function(event) {
  var e = document.getElementById("menu");
  var w = window.innerWidth;
  if(w > 599)
    e.style.display = 'block';
  else
    e.style.display = 'none';
};

function updateArticle(url) {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.onload = function() {
    if (xhr.status === 200) {
    document.getElementById('dynamicArticle').innerHTML = xhr.responseText;
  } else {
    console.error('Request failed.');
    }
  };
  xhr.send();
}


function test(pid) {
  var ans = confirm("ต้องการลบ " + pid + "?");
  if (ans == true) {
      document.location = `./product/api/DeleteProduct.php?pid=${pid}`;
  }
}