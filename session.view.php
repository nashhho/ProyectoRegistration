<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Project | Work Time Registration</title>
    <script src="https://kit.fontawesome.com/bfbccd75f9.js" crossorigin="anonymous"></script>
    
</head>

<body>

<!--barra de navegación, logo, formularios*/-->
<div 
        class="navbar">
    <div 
        class="logo">
    <img src="stopwatch.png"> 
        Work Time Registration 
</div>

<div class="btns">

    <a href="close.php"><button
        class="btn01"
        onclick= "document.getElementById('id01').style.display='block'">
        Logout
    </button></a>

    <button
        class="btn03"
        onclick= "document.getElementById('id02').style.display='block'">
        <?php  echo $_SESSION['usuario'];  ?>
    </button>

</div>
</div>

<!--LOGIN-->

<div id="id02" class="modal">
<div
    class="close"
    onclick="document.getElementById('id02').style.display='none'">
    <i class="fas fa-times"></i>
</div>
</div>


</div>

    <!--SIGNUP-->

<div id="id01" class="modal">
    <div
        onclick="document.getElementById('id01').style.display='none'" 
        class="close" >
        <i class="fas fa-times"></i>
    </div>
</div>


<div class="cajita">
    <div class="date">
        <label>Date</label>
        <input type="date">
    </div>
<br/>
    <div class="project">
        <label class="project01">
            Project:  &nbsp
        </label>
        
        <input type="text" class="project02"></input>
    </div>

    <br/>
    <br/>
    <div id="display">
     00:00:00

    </div>

    <br/>

    <div class="buttons">
        <button id="startStop" onclick="startStop()">Start</button> <button id="reset" onclick="reset()">Reset</button>
    </div>

    <br/>
    <br/>

    <div class="prueba">
    <div id="myDIV" class="header">
        <h2 >Tasks</h2>
        <br/>
        <input type="text" id="myInput" placeholder="Title...">
        <span onclick="newElement()" class="addBtn">Add</span>
      <br/>
      <br/>
      <ul id="myUL">
        <li>hola</li>


      </ul>
    </div>

    <div class="description">
        <label class="description01" for="description02">Description:</label>
    <br/>
    <br/>
    <textarea class="description02" name="description02" rows="12" cols="50">
      
      </textarea>
    </div>

</div>

<br/>
    <div class="btnsave">
        <button class="btnSave" onclick="save()">Save</button>
    </div>

    


</div>





<script src=app.js></script>
</body>
</html>