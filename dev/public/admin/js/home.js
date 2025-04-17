const loginUser = () => {
  //
  console.log("JAVASCRIPT home.js: hier");
  const email = document.getElementById("email").value;
  const psw = document.getElementById("psw").value;

  const ul = document.getElementById("errorList");

  const getData = (data) => {
    console.log("hier in getData");
    if (data) {
      if (data.success === false) {
        console.log(data.errors);

        data.errors.forEach((item) => {
          let li = document.createElement("li");
          li.innerHTML = item;
          ul.append(li);
        });
      }
      if (data.success === true) {
        console.log("User logged in !");
        //Redirect user to backend Dashboard page
        //Add tokens and data into localstorage
      }
    }
  };

  console.log("JAVASCRIPT home.js: " + email);

  var [loginData] = apiLogin();

  let url = "http://api.localhost:7084/user/login";
  let body = {
    email: email,
    psw: psw,
  };
  loginData(url, body, getData);
};
