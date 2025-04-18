import useHttp from "./usehttp.js";

export default function Create() {
  const token = JSON.parse(sessionStorage.getItem("token"));

  let [sendRequest] = useHttp();

  const createData = (url, body, action) => {
    let headers = {
      "Content-Type": "application/json",
      Authorization: "Basic " + token,
    };
    let method = "POST";

    sendRequest(url, method, headers, body, action);
  };

  return [createData];
}
