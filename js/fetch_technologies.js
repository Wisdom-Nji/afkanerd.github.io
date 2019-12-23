var ajax = new XMLHttpRequest;
ajax.onreadystatechange = function () {
  if (this.status == 200 && this.readyState == 4) {
    var sr = JSON.parse(this.responseText);

    console.log(sr);

    for (var repo in sr) {
      var repo = sr[repo];

      var repo_name = document.createElement("h5");
      repo_name.setAttribute("class", "text-danger roboto");
      repo_name.appendChild(document.createTextNode(`${repo.name} | ${repo.language}`));

      var repo_description = document.createElement("p");
      repo_description.setAttribute("class", "text-light lato py-4");
      repo_description.appendChild(document.createTextNode(repo.description));

      var repo_link = document.createElement("a");
      repo_link.setAttribute("style", "cursor: pointer;");
      repo_link.setAttribute("class", "btn btn-outline-light  lato rounded-pill py-2 px-5 my-3 ");
      repo_link.href = repo.html_url;
      repo_link.appendChild(document.createTextNode("learn more"));

      var div = document.createElement("div");
      div.setAttribute("class", "repo-bg p-3 rounded mb-5 p-2");
      div.appendChild(repo_name);
      div.appendChild(repo_description);
      div.appendChild(repo_link);

      var div_column = document.createElement("div");
      div_column.setAttribute("class", "col-md-6");
      div_column.appendChild(div);

      var main_body = document.getElementById("main_body");
      main_body.appendChild(div_column)

    }
  }
}

ajax.open("GET", "https://api.github.com/orgs/afkanerd/repos");
ajax.setRequestHeader("Content-Type", "application/json")
ajax.send();
