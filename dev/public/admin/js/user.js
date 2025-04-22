/**
 * OnLoad Run the following functins
 */
const runOnLoad = () => {
  //
  authCheck();
  // Read User data
  readAllUser();
};
const readAllUser = () => {
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
        console.log(data.data);
        data.data.forEach((user) => {
          let ul = document.createElement("ul");
          ul.classList.add("frame", "rad-shadow");
          Object.keys(user).forEach((key) => {
            let li = document.createElement("li");
            li.innerHTML = key + " : " + user[key];
            ul.append(li);
          });
          if (user["realm"] !== "super") {
            let btnEdit = document.createElement("button");
            btnEdit.innerHTML = "Edit";
            btnEdit.setAttribute("class", "btn-fern");
            btnEdit.setAttribute("onclick", "editUser(" + user["id"] + ")");
            ul.append(btnEdit);

            let btnDelete = document.createElement("button");
            btnDelete.innerHTML = "Delete";
            btnDelete.setAttribute("class", "btn-crimson float");
            btnDelete.setAttribute("onclick", "deleteUser(" + user["id"] + ")");
            ul.append(btnDelete);
          }
          document.querySelector("#list").append(ul);
        });
      }
    }
  };

  var [readData] = apiRead();

  let url = apiUri + "/user/readall";
  readData(url, getData);
};

/**
 * USER CREATE
 */
const createUser = () => {
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
      }
    }
  };

  console.log("JAVASCRIPT usercreate.js: " + name);

  var [createData] = apiCreate();

  let url = apiUri + "/user/create";
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

const editUser = (id) => {
  console.log(id);
};
