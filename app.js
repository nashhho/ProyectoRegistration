window.addEventListener("click", function(event) {

    let modal = document.getElementById('id01');
    
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
    
    window.addEventListener("click", function(event) {
        
        let modal = document.getElementById('id02');
        
          if (event.target === modal) {
            modal.style.display = "none";
          }
        });

    let seconds = 0;
    let minutes = 0;
    let hours = 0;

    let displaySeconds = 0;
    let displayMinutes= 0;
    let displayHours = 0;

    let interval = null;

    let status = "stopped";

    function stopWatch() {
        seconds++;

        if (seconds / 60 === 1) {
            seconds = 0;
            minutes++;

            if (minutes / 60 === 1) {
                minutes = 0;
                hours++;
            }
        }

        if (seconds < 10) {
            displaySeconds = "0" + seconds.toString();
        }

        else {
            displaySeconds = seconds;
        }

        if (minutes < 10) {
            displayMinutes = "0" + minutes.toString();
        }

        else {
            displayMinutes = minutes;
        }

        if (hours < 10) {
            displayHours = "0" + hours.toString();
        }

        else {
            displayHours = hours;
        }

        document.getElementById("display").innerHTML = displayHours + ":" + displayMinutes + ":" + displaySeconds;
    }

    
    function startStop() {
        if (status === "stopped") {

            interval = window.setInterval(stopWatch, 1000);
            document.getElementById("startStop").innerHTML = "Stop";
            status = "started";
        }

        else {
            window.clearInterval(interval);
            document.getElementById("startStop").innerHTML = "Start";
            status = "stopped";
        }
    }

    function reset() {

        window.clearInterval(interval);
        seconds = 0;
        minutes = 0;
        hours = 0;
        document.getElementById("display").innerHTML = "00:00:00";
        document.getElementById("startStop").innerHTML = "Start";
    }


    // Create a "close" button and append it to each list item
var myList = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myList.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close02";
  span.appendChild(txt);
  myList[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close02");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}


// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close02";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}