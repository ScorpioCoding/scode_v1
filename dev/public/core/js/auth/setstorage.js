export default function SetStorage(data) {
  const sessionStorage = window.sessionStorage;
  sessionStorage.setItem("auth", JSON.stringify(data.auth));
  sessionStorage.setItem("name", JSON.stringify(data.name));
  sessionStorage.setItem("email", JSON.stringify(data.email));
  sessionStorage.setItem("realm", JSON.stringify(data.realm));
  sessionStorage.setItem("token", JSON.stringify(data.token));
}
