import useHttp from "./usehttp.js";

export default function Check() {
  let [sendRequest] = useHttp();
  const checkData = (url, action) => {
    let headers = {
      "Content-Type": "application/json",
    };
    let method = "GET";

    sendRequest(url, method, headers, null, action);
  };

  return [checkData];
}
