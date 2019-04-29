var ajax = new XMLHttpRequest;
ajax.onreadystatechange = function() {
  if(this.status == 200 && this.readyState == 4) {
    var sr = JSON.parse(this.responseText);

    for(var repo in sr) {
      var repo = sr[repo];
      var kbd = document.createElement("kbd");
      kbd.appendChild(document.createTextNode(`${repo.name} | ${repo.language}`));

      var h5 = document.createElement("h5");
      h5.appendChild(kbd);

      var samp = document.createElement("samp");
      samp.appendChild(document.createTextNode(repo.description));

      var p = document.createElement("p");
      p.setAttribute("style", "text-align: justify");
      p.appendChild(samp);

      var div = document.createElement("div");
      div.setAttribute("class", "card-body bg-dark text-light");
      div.appendChild(p);

      var kbd_ = document.createElement("a");
      kbd_.setAttribute("style", "cursor: pointer");
      kbd_.setAttribute("class", "btn btn-secondary");
      // kbd_.setAttribute("onclick", `window.open(${repo.html_url})`);
      kbd_.href = repo.html_url;
      kbd_.appendChild(document.createTextNode("Github"));

      var h5_ = document.createElement("h5");
      h5_.appendChild(kbd_);

      var div_ = document.createElement("div");
      div_.setAttribute("class", "card-footer");
      div_.appendChild(h5_);

      var div__ = document.createElement("div");
      div__.setAttribute("class", "card  bg-dark text-light");
      div__.appendChild(div);
      div__.appendChild(div_);

      var div___ = document.createElement("div");
      div___.setAttribute("class", "col-12 text-center");
      div___.appendChild(h5);
      div___.appendChild(div__);

      var div____ = document.createElement("div");
      div____.setAttribute("class", "row");
      div____.appendChild(div___);

      var br = document.createElement("hr");

      var main_body = document.getElementById("main_body");
      main_body.appendChild(div____)
      main_body.appendChild(br);

    }
  }
}

ajax.open("GET", "https://api.github.com/orgs/afkanerd/repos");
ajax.setRequestHeader("Content-Type", "application/json")
ajax.send();
