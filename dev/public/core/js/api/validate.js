import useHttp from "./usehttp.js";

export default function Validate() {
  let [sendRequest] = useHttp();

  const validateData = (url, body, action) => {
    let headers = {
      "Content-Type": "application/json",
    };
    let method = "PUT";

    sendRequest(url, method, headers, body, action);
  };

  return [validateData];
}
