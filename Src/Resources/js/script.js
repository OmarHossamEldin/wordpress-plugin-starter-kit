//http://localhost/wordpress/wp-json/blog/v1/post
//http://localhost/wordpress/wp-json/blog/v1/post/{id} => id => 1
window.onload = () => {
  httpRequest = new HttpRequest(window.ajaxurl);

  const postsRequests = httpRequest.post("?action=posts", {
    title: "Is Peter <smart> & funny?",
    body: " ",
  });

  postsRequests.then((response) => {
    console.log(response);
  });
  // or async await approach
};
