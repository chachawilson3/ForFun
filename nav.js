
var pageCounter = 1;
var stuffContainer = document.getElementById("stuff");
var btn = document.getElementById("btn");


btn.addEventListener("click", function(){
  //GET to recieve data, POST to send data
  var ourRequest = new XMLHttpRequest();
  ourRequest.open('GET','https://learnwebcode.github.io/json-example/animals-' + pageCounter + '.json');
  ourRequest.onload = function(){
    if(ourRequest.status>=200&& ourRequest.status<400){
      var ourData = JSON.parse(ourRequest.responseText);
      renderHtml(ourData);
    }else{
      console.log("we connected to the server , but it returned an error");
    }

  };


  ourRequest.onerror = function(){
    console.log("connection error");
  };



  ourRequest.send();
  pageCounter++;
  if(pageCounter>3){
    btn.ClassList.add("hide-me");
  }
});


function renderHtml(data){
  var htmlString = "";
  for(i=0; i<data.length; i++){
    htmlString += "<p>"+data[i].name + " is a "+ data[i].species +"that likes to eat ";

    for(ii=0; ii<data[i].foods.likes.length; ii++){
    if (ii==0){
      htmlString += data[i].foods.likes[ii];
    }else{
      htmlString += " and " + data[i].foods.likes[ii];
    }
    }
    htmlString+=' and dislikes ';

    for(ii=0; ii<data[i].foods.dislikes.length; ii++){
    if (ii==0){
      htmlString += data[i].foods.dislikes[ii];
    }else{
      htmlString += " and " + data[i].foods.dislikes[ii];
    }
    }

    htmlString+='.</p>';

  }
  stuffContainer.insertAdjacentHTML('beforeend',htmlString);
}
