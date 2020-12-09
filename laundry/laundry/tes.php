<!DOCTYPE html>
<html>
<body>

Name: <input type="text" id="myText">

<p id="demo">Click the button to disable the text field.</p>
<input type="text"  id="txt" style="visibility: hidden;">
<input type="checkbox" id="checkbox" onclick="myFunction()">Check Me</input>
<script>
    var y="";
function myFunction() {
    document.getElementById("txt").style.visibility = "hidden";
  if(y == ""||y=="off")
  {
      y="on";
      document.getElementById("txt").style.visibility = "visible";
      console.log(y);
  }
  else if(y=="on")
  {
    
      y="off";
      document.getElementById("txt").style.visibility = "hidden";
      console.log(y);
  }
  
}
</script>

</body>
</html>

