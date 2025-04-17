import useHttp from "./usehttp.js";

export default function Login() {
  let [sendRequest] = useHttp();

  const loginData = (url, body, action) => {
    let headers = {
      "Content-Type": "application/json",
    };
    let method = "POST";

    sendRequest(url, method, headers, body, action);
  };

  return [loginData];
}
