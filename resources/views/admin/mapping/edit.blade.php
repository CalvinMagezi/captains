@include('partials.admin-header')

@include('partials.admin-header')

<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                        <p class="m-b-0">Welcome {{Auth::user()->first_name.' '.Auth::user()->last_name }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
      <div class="pcoded-inner-content">
          <!-- Main-body start -->
          <div class="main-body">
              <div class="page-wrapper">
                  <!-- Page-body start -->
                  <div class="page-body">
                      <div class="row justify-content-center"> 
                        @if (session('success'))
                        <div class="alert alert-danger">
                            {{session('sucess')}}
                        </div>
                    @endif





                        
                      </div>
                  </div>
                  <!-- Page-body end -->
              </div>
              <div id="styleSelector"> </div>
          </div>
      </div>
  </div>
</div>
</div>
</div>
</div>



@include('partials.admin-footer')
{{-- <script type="text/javascript" src="{{ asset('admin/js/mapping.js') }}"></script> --}}
<script>
//     $(document).ready(function(){
//     let row_number = {{ count(old('products', [''])) }};
//     $("#add_row").click(function(e){
//       e.preventDefault();
//       let new_row_number = row_number - 1;
//       $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
//       $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
//       row_number++;
//     });

//     $("#delete_row").click(function(e){
//       e.preventDefault();
//       if(row_number > 1){
//         $("#product" + (row_number - 1)).html('');
//         row_number--;
//       }
//     });
//   });

var posts = {{ $posts->toJson() }};

posts.forEach(function(post) {
   // do something
   console.log(post);
});

const words = 
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
  </script>
</body>

</html>

















@include('partials.admin-footer')