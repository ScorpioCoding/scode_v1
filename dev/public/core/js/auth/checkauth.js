export default function CheckAuth() {
  const auth = JSON.parse(window.sessionStorage.getItem("auth"));
  if (auth === "false") window.location.href = "/";
}
