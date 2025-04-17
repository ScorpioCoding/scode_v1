import useHttp from "./usehttp.js";

export default function Read() {
  const token = JSON.parse(sessionStorage.getItem("token"));

  let [sendRequest] = useHttp();
  const readData = (url, action) => {
    let headers = {
      "Content-Type": "application/json",
      Authorization: "Basic " + token,
    };
    let method = "GET";

    sendRequest(url, method, headers, null, action);
  };

  return [readData];
}
