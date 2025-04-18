//
export default function GetStorage() {
  const sessionStorage = window.sessionStorage;
  const data = {};
  data.auth = JSON.parse(sessionStorage.getItem("auth"));
  data.name = JSON.parse(sessionStorage.getItem("name"));
  data.email = JSON.parse(sessionStorage.getItem("email"));
  data.realm = JSON.parse(sessionStorage.getItem("realm"));
  data.token = JSON.parse(sessionStorage.getItem("token"));
  return data;
}
