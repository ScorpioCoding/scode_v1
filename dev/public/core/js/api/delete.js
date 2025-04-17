import useHttp from "./usehttp.js";

export default function Delete() {
  const token = JSON.parse(sessionStorage.getItem("token"));

  let [sendRequest] = useHttp();

  const deleteData = (url, action) => {
    let headers = {
      "Content-Type": "application/json",
      Authorization: "Basic " + token,
    };
    let method = "DELETE";

    sendRequest(url, method, headers, null, action);
  };

  return [deleteData];
}
