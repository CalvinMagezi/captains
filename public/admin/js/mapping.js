(function ($) {
    "user strict";

    const words = [" 1 ", " 2 ", " 3 ", " 4 ", " 5 ", " 6 ", " 7 ", " 8 "," 9 ", " 10 ", " 11 ",
" 12 ", " 13 ", " 14 ", " 15 ", " 16 ", " 17 ", " 18 ", " 19 ", " 20 "]
const outside_tables = document.querySelector(".outside-tables")
const inside_tables = document.querySelector(".inside-tables")
outside_tables.style.top = "200px"

function placeTablesOut(array) {
  let index = 0
  let top = 100
  let left = 30
  array.forEach(word => {
   let magnet = document.createElement('div')
   magnet.append(word)
    magnet.setAttribute("class", "word")
    magnet.setAttribute("id", word + index)
    outside_tables.appendChild(magnet)
    magnet.style.top = top + "px"
    magnet.style.left = left + "px"
    dragElement(document.getElementById(word+index));
    
    if (left > window.innerWidth/1.5) {
      top += magnet.offsetHeight + 8
      left = 30
    }
    else {
      left += magnet.offsetWidth + 8

    }
    console.log(window.innerWidth)
    index++
  })
}

function placeTablesIn(array) {
  let index = 0
  let top = 100
  let left = 30
  array.forEach(word => {
   let magnet = document.createElement('div')
   magnet.append(word)
    magnet.setAttribute("class", "word")
    magnet.setAttribute("id", word + index)
    inside_tables.appendChild(magnet)
    magnet.style.top = top + "px"
    magnet.style.left = left + "px"
    dragElement(document.getElementById(word+index));
    
    if (left > window.innerWidth/1.5) {
      top += magnet.offsetHeight + 8
      left = 30
    }
    else {
      left += magnet.offsetWidth + 8

    }
    console.log(window.innerWidth)
    index++
  })
}

function dragElement(elmnt) {
    elmnt.onmousedown = dragMouseDown;

function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
  }
}

placeTablesIn(words)
placeTablesOut(words)

})(jQuery);