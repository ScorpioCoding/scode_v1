const createUser = () => {
  // console.log("createUser");
  // apiTest();

  console.log("JAVASCRIPT usercreate.js: hier");
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const realm = document.getElementById("realm").value;
  const psw = document.getElementById("psw").value;
  const pswConfirm = document.getElementById("pswConfirm").value;

  const ul = document.getElementById("errorList");

  const getData = (data) => {
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
        console.log("User created !");
      }
    }
  };

  console.log("JAVASCRIPT usercreate.js: " + name);

  var [createData] = apiCreate();

  let url = "http://api.localhost:7084/user/create";
  let body = {
    name: name,
    email: email,
    realm: realm,
    validate: "0",
    archive: "0",
    psw: psw,
    pswConfirm: pswConfirm,
  };
  createData(url, body, getData);
};
