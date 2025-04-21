/**
 * Function checkSetup
 * Trigger -> Admin Template Starter -> body -> onload
 */
const checkSetup = () => {
  var [e] = apiCheck();
  e(apiUri + "/user/check", (e) => {
    e &&
      (!1 === e.success &&
        ((ul.innerHTML = ""),
        e.errors.forEach((e) => {
          let c = document.createElement("li");
          (c.innerHTML = e), ul.append(c);
        })),
      !0 === e.success &&
        (console.log(e.data),
        e.data > 0
          ? (window.location.href = "/en/home")
          : (window.location.href = "/setup/register")));
  });
};

/**
 * USER REGISTER
 */
const registerUser = () => {
  //
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const realm = document.getElementById("realm").value;
  const psw = document.getElementById("psw").value;
  const pswConfirm = document.getElementById("pswConfirm").value;

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
        console.log("User created !");
        window.location.href = "/setup/email/send";
      }
    }
  };

  var [registerData] = apiRegister();

  let url = apiUri + "/user/register";
  let body = {
    name: name,
    email: email,
    realm: realm,
    validate: "0",
    archive: "0",
    psw: psw,
    pswConfirm: pswConfirm,
  };
  registerData(url, body, getData);
};

/**
 * USER REGISTER
 */
const emailValidate = () => {
  //
  const token = document.getElementById("token").value;

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
        console.log("User validated !");
        window.location.href = "/en/home";
      }
    }
  };

  var [validateData] = apiValidate();

  let url = apiUri + "/user/update/validate";
  let body = {
    token: token,
  };
  validateData(url, body, getData);
};
