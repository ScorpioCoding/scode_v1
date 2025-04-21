const checkSetup = () => {
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
        if (data.data > 0) {
          window.location.href = "/en/home";
        } else {
          window.location.href = "/setup/register";
        }
      }
    }
  };

  var [checkData] = apiCheck();

  let url = apiUri + "/user/check";
  checkData(url, getData);
};
