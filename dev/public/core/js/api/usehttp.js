//
export default function useHttp() {
  const sendHttpRequest = async (url, method, headers, body, action) => {
    // setTimeout(send, 200000);

    // function send() {
    //   hide();
    //   alert("HELLO WORLD");
    // }

    await fetch(url, {
      mode: "cors",
      method: method,
      headers: headers,
      body: body ? JSON.stringify(body) : null,
    })
      .then(async (response) => {
        if (response.status === 200) {
          let results = await response.json();
          action(results);
        } else {
          throw new Error(response.statusText);
        }
      })
      .catch((error) => {
        console.log(error.message);
      });
  };

  return [sendHttpRequest];
}
