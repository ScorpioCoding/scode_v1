const loginUser = () => {
  //
  const email = document.getElementById("email").value;
  const psw = document.getElementById("psw").value;

  const ul = document.getElementById("errorList");

  const getData = (data) => {
    if (data) {
      if (data.success === false) {
        //console.log(data.errors);

        ul.innerHTML = "";

        data.errors.forEach((item) => {
          let li = document.createElement("li");
          li.innerHTML = item;
          ul.append(li);
        });
      }
      if (data.success === true) {
        //
        // Add tokens and data into localstorage
        authSetStorage(data.data);
        // POST Redirect user to backend Dashboard page
        authPostRedirect("/en/dashboard", data.data, false);
      }
    }
  };

  var [loginData] = apiLogin();

  let url = apiUri + "/user/login";
  let body = {
    email: email,
    psw: psw,
  };
  loginData(url, body, getData);
};
