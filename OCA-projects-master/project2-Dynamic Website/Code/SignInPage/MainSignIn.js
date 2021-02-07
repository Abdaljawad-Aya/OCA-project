// Saving data on Session Storage //
// class sigIn_1
// {
//    Name;
//    Password ;
//    date ;
//    country ;
//    number ;

//   constructor(Name,Password,date,country ,number)
//   {

//   }
// }

function saveOnSession() {
  var Name = document.getElementById("Name_1").value;
  var Password = document.getElementById("Password_1").value;
  var Email = document.getElementById("Email_1").value;
  var date = document.getElementById("date_1").value;
  var country = document.getElementById("country").value;
  var number = document.getElementById("number_1").value;

  sessionStorage.setItem("Name", Name);
  sessionStorage.setItem("Password", Password);
  sessionStorage.setItem("Email", Email);
  sessionStorage.setItem("country", country);
  sessionStorage.setItem("date", date);
  sessionStorage.setItem("number", number);
}
function saveOnLocal() {
  var Name = document.getElementById("Name_1").value;
  var Password = document.getElementById("Password_1").value;
  var Email = document.getElementById("Email_1").value;
  var date = document.getElementById("date_1").value;
  var country = document.getElementById("country").value;
  var number = document.getElementById("number_1").value;
  localStorage.setItem("Name", Name);
  localStorage.setItem("Password", Password);
  localStorage.setItem("Email", Email);
  localStorage.setItem("country", country);
  localStorage.setItem("date", date);
  localStorage.setItem("number", number);
}

function newFunction() {
  document.getElementById("btnClear").reset();
  sessionStorage.clear("btnClear", btnClear);
}

// function signin() {
//   var UserName_1 = document.getElementById("userName").value;
//   const button = document.querySelector(".BtnSignIn");
//   if (UserName_1 == sessionStorage.getItem("Name")) {
//     button.disable = false;
//   } else {
//     button.disable = true;
//   }
// }

// Animation For The Form //

$(".message a").click(function () {
  $("form").animate({ height: "toggle", opacity: "toggle" });
});

// to start using regex //

// var loginform = document.getElementById("login-form");
const BtnLogin = document.getElementById("BtnSignIn");
var username = document.getElementById("username");
var usernameErrPara = document.getElementById("username-err");
var password = document.getElementById("password");
var passwordErrPara = document.getElementById("password-err");

// UserName Validation //

var check;
username.addEventListener("input", function (e) {
  var pattern = /^[\w]{3,10}$/;
  var currentValue = e.target.value;
  if (currentValue == localStorage.getItem("Name")) {
    //console.log("Corret");
    check = true;
  } else {
    console.log("the UserName undefine");
    check = false;
  }
  var valid = pattern.test(currentValue);

  if (valid) {
    usernameErrPara.style.display = "none";
  } else {
    usernameErrPara.style.display = "block";
  }
});

// function signinBtn(check) {
//   return check;
// }

// Password Validation //
password.addEventListener("input", function (b) {
  var pattern = /^[\w]{6,10}$/;
  var currentValue = b.target.value;
  if (currentValue == localStorage.getItem("Password") && check) {
    document.getElementById("BtnSignIn").removeAttribute("disabled");
    location.replace("../HomePage/index.html");
    console.log("Corret");
  } else {
    console.log("the Password undefine");
  }
  var valid = pattern.test(currentValue);
  if (valid) {
    passwordErrPara.style.display = "none";
  } else {
    passwordErrPara.style.display = "block";
  }
});

// My Attempts connect checkbox to the Create buttons //

// $(function () {
//   var button = $("#Create");
//   button.attr("disabled", "disabled");
//   $("#CheckBox").change(function (c) {
//     if (this.checked) {
//       button.removeAttr("disables");
//     } else {
//       button.attr("disabled", "disabled");
//     }
//   });
// });

// it worked but there is something i cant put my finger on //

// function EnableDisable(CheckBox) {
//   var Create = document.getElementById(CheckBox);
//   Create.disable = CheckBox.checked ? false : true;
//   if (!Create.disabled) {
//     Create.focus();
//   }
// }

// third Attempt //

function Enable(CheckBox) {
  var d = document.getElementById("Create");
  d.disabled = CheckBox.checked ? false : true;
  if (!d.disabled) {
    d.focus();
  }
}

// function myOnClickFn() {
//   document.Iocation.href = 'index.html'
// }

// var regex = /^[\w]{6,8}$/
// var str = 'userna'
// regex.test(str)

// str = 'username12345'
// regex.test(str)
