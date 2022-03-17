//${protocol}//${hostname}/wp-json/posts
//${protocol}//${hostname}/wp-json/posts/{id} => id => 1
window.onload = () => {
  const protocol = location.protocol,
        hostname = location.hostname,
        basUrl   = `${protocol}//${hostname}/wp-json`,
        httpRequest = new HttpRequest(basUrl);

  const postsRequests = httpRequest.get("/posts");

  postsRequests.then((response) => {
    console.log(response);
  });
  // or async await approach
};
