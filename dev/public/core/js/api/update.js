import useHttp from "./usehttp.js";

export default function Update() {
  const token = JSON.parse(sessionStorage.getItem("token"));

  let [sendRequest] = useHttp();

  const updateData = (url, body, action) => {
    let headers = {
      "Content-Type": "application/json",
      Authorization: "Basic " + token,
    };
    let method = "PUT";

    sendRequest(url, method, headers, body, action);
  };

  return [updateData];
}
