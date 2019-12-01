var ajax = new XMLHttpRequest;
ajax.onreadystatechange = function () {
  if (this.status == 200 && this.readyState == 4) {
    var sr = JSON.parse(this.responseText);

    for (var repo in sr) {
      var repo = sr[repo];
      var kbd = document.createElement("kbd");
      //kbd.setAttribute("style", " background-image: linear-gradient(-60deg, #000428 , #004e92);");
      kbd.setAttribute("class", "bg-light text-dark roboto");
      kbd.appendChild(document.createTextNode(`${repo.name} | ${repo.language}`));

      var h5 = document.createElement("h5");
      h5.appendChild(kbd);

      var samp = document.createElement("samp");
      samp.appendChild(document.createTextNode(repo.description));

      var p = document.createElement("p");
      p.setAttribute("class", " lato");
      p.appendChild(samp);


      var kbd_ = document.createElement("a");
      kbd_.setAttribute("style", "cursor: pointer;");
      //kbd_.setAttribute("style", " background-image: linear-gradient(45deg, #43cea2 , #185a9d);");
      kbd_.setAttribute("class", "btn btn-outline-success  lato rounded-pill py-2 px-4");
      // kbd_.setAttribute("onclick", `window.open(${repo.html_url})`);
      kbd_.href = repo.html_url;
      kbd_.appendChild(document.createTextNode("Github"));

      var h5_ = document.createElement("h5");
      h5_.appendChild(kbd_);

      var div = document.createElement("div");
      div.setAttribute("class", "card-body text-light");
      div.setAttribute("style", " background-image: linear-gradient(-90deg, #000428 ,#185a9d, #004e92);");
      div.appendChild(h5_);
      div.appendChild(p);

      var div_ = document.createElement("div");
      div_.setAttribute("class", "card-footer lato bg-light shadow p-3 mb-1 ");
      //div_.setAttribute("style", " background-image: linear-gradient(-360deg, #000428 , #004e92);");
      div_.appendChild(h5_);

      var div__ = document.createElement("div");
      div__.setAttribute("class", "card");
      div__.appendChild(div);
      div__.appendChild(div_);

      var div___ = document.createElement("div");
      div___.setAttribute("class", "col-12");
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
