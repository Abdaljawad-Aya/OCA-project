changeNav();
scrollShow(".show", 1500);
scrollShow(".card_1", 3000);
addToCart();
user_Data_Func();
//Header();

//User Data On header
function user_Data_Func() {
  var Name = document.getElementById("Name_1");
  var Email = document.getElementById("Email_1");

  Name.innerHTML = "Name: " + localStorage.getItem("Name");
  Email.innerHTML = "Email: " + localStorage.getItem("Email");
}

//Change Nav/Header color when scroll down;
function changeNav() {
  window.addEventListener("scroll", function () {
    const user_Data = document.querySelector(".user_Data");

    const mainNav = document.getElementById("mainNav");
    console.log(window.pageYOffset);
    if (window.pageYOffset > 0) {
      mainNav.classList.add("bg-black");
      mainNav.classList.add("text-white");
    } else {
      mainNav.classList.remove("bg-black");
      mainNav.classList.remove("text-white");
    }
  });
}

//animation for Items when scroll
function scrollShow(link, value) {
  $(document).ready(function () {
    $(window).scroll(function () {
      $(link).each(function () {
        var bottom_of_object = $(this).offset().top;
        var bottom_of_window = $(window).scrollTop() + $(window).height();
        if (bottom_of_window >= bottom_of_object) {
          $(this).animate({ opacity: "1" }, value);
        }
      });
    });
  });
}

// function Header() {
//   $(function () {
//     $("#mainNav1").load("cal.html");
//   });
// }

//To Move Items from list one to list two
function addToCart() {
  document.addEventListener("DOMContentLoaded", function () {
    var buttons = document.querySelectorAll(".AddBtn");
    var list1 = document.querySelector(".Items_1");
    var list2 = document.querySelector(".Cart_1");
    var AddBtn = document.getElementsByClassName("removeBtn");
    var index = 0;
    function moveItem(e) {
      var moveTo;

      if (this.parentElement.parentElement == list1) {
        moveTo = list2;
        //console.log("index1= " + index);
        AddBtn[0].innerHTML = "Remove";
      } else {
        moveTo = list1;
        AddBtn[index++].innerHTML = "Add";

        //buttons[index++].innerHTML = "Add";
        // console.log("index = " + index);
      }
      if (index >= buttons.length) {
        index = 0;
      }
      moveTo.appendChild(this.parentElement);
    }

    for (var i = 0; i < buttons.length; i++) {
      buttons[i].addEventListener("click", moveItem);
    }
  });
}

// To Add Element inside menu Using TextBox
function newElement() {
  var li = document.createElement("li"); //<li></li>
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t); //<li>t</li>
  if (inputValue === "") {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function () {
      var div = this.parentElement;
      div.style.display = "none";
    };
  }
}

//Delete Element
var myNodelist = document.querySelectorAll(".close");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function () {
    var div = this.parentElement;
    div.style.display = "none";
  };
}
