import useHttp from "./usehttp.js";

export default function Register() {
  let [sendRequest] = useHttp();

  const registerData = (url, body, action) => {
    let headers = {
      "Content-Type": "application/json",
    };
    let method = "POST";

    sendRequest(url, method, headers, body, action);
  };

  return [registerData];
}
