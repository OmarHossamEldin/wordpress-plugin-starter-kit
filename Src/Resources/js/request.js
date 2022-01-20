//http://localhost/wordpress/wp-admin/admin-ajax.php?action=your_action
async function request(baseUrl, method, data) {
  let response;
  switch (method) {
    case "POST":
    case "PUT":
    case "PATCH":
    case "DELETE":
      response = await fetch(baseUrl, {
        method,
        headers: {
          "Content-type": "application/json",
        },
        body: data,
      });
      break;
    case "GET":
      response = await fetch(`${baseUrl}?${data}`, {
        method,
        headers: {
          "Content-type": "application/json",
        },
      });
      break;
    default:
      console.error("unsupported request type");
  }
  await response.json();
  return response;
}
