async function carregaItens() {
  verificalogin();

  await fetch("./arq.json")
    .then((response) => response.json())
    .then((json) => json.forEach((e) => {}));
}

function consumirAPI() {
  /*const receitas = require("receitas.json");

    const data = JSON.parse(receitas);
    console.log(data);*/

  let i = 0;
  //document.querySelectorAll(".card-compra > img").forEach((e) => {

  const userAction = async () => {
    removeAll("paginated-list");
    removeAll("pagination-numbers");

    const response = await fetch("./arq.json");

    var myJson = await response.json();
    let i = 1;
    myJson.forEach((e) => {
      //console.log(e["id"])
      var elem = novoElemento("div", "card-compra");
      var img = novoElemento("img", "");
      img.src = `images/${e['serie']}.jpg`;
      img.setAttribute("idvideo", e["id"]);
      img.setAttribute("onclick", "video(this);");
      elem.appendChild(img);

      var texto = novoElemento("p", "texto-card");
      texto.textContent = e["titulo"]; //"Temporada " + e["temporada"] + " - " +
      elem.appendChild(texto);

      document.getElementsByClassName("grade-cards")[0].appendChild(elem);
      i++;
      //Response
      //body: null
      //bodyUsed: false
      //headers: Headers {}
      //ok: false
      //redirected: false
      //status: 0
      //statusText: ""
      //type: "opaque"
      //"url: ""
    });

    paginacao();
  };
  userAction();

  //})
}

function pesquisar() {
  var item = "";
  termo = document.getElementById("pesquisar").value;
  termo = termo.toUpperCase()
  removeAll("paginated-list");
  removeAll("pagination-numbers");
  const userAction = async () => {
    const response = await fetch("./arq.json");

    var myJson = await response.json();
    let i = 1;
    myJson.forEach((e) => {
      //console.log(e["id"])
      item = e["titulo"];
      if (item.toUpperCase().includes(termo)) {
        var elem = novoElemento("div", "card-compra");
        var img = novoElemento("img", "");
        img.src = `images/${e['serie']}.jpg`;
        img.setAttribute("idvideo", e["id"]);
        img.setAttribute("onclick", "video(this);");
        elem.appendChild(img);

        var texto = novoElemento("p", "texto-card");
        texto.textContent = e["titulo"]; //"Temporada " + e["temporada"] + " - " +
        elem.appendChild(texto);

        document.getElementsByClassName("grade-cards")[0].appendChild(elem);
        i++;
        //Response
        //body: null
        //bodyUsed: false
        //headers: Headers {}
        //ok: false
        //redirected: false
        //status: 0
        //statusText: ""
        //type: "opaque"
        //"url: ""
      }
    });

    paginacao();
  };
  userAction();
}

function filtraMenu(elemento) {
  var item = "";
  serie = elemento.getAttribute("serie")
  temporada = elemento.getAttribute("temporada")
  removeAll("paginated-list");
  removeAll("pagination-numbers");
  const userAction = async () => {
    const response = await fetch("./arq.json");

    var myJson = await response.json();
    let i = 1;
    myJson.forEach((e) => {
      //console.log(e["id"])
      item = e["titulo"];
      if (e['serie']==serie && e['temporada']==temporada) {
        var elem = novoElemento("div", "card-compra");
        var img = novoElemento("img", "");
        img.src = `images/${e['serie']}.jpg`;
        img.setAttribute("idvideo", e["id"]);
        img.setAttribute("onclick", "video(this);");
        elem.appendChild(img);

        var texto = novoElemento("p", "texto-card");
        texto.textContent = e["titulo"]; //"Temporada " + e["temporada"] + " - " +
        elem.appendChild(texto);

        document.getElementsByClassName("grade-cards")[0].appendChild(elem);
        i++;
        //Response
        //body: null
        //bodyUsed: false
        //headers: Headers {}
        //ok: false
        //redirected: false
        //status: 0
        //statusText: ""
        //type: "opaque"
        //"url: ""
      }
    });

    paginacao();
  };
  userAction();
}

function novoElemento(tagName, className) {
  const elem = document.createElement(tagName);
  elem.className = className;

  return elem;
}

function removeAll(id) {
  const div = document.getElementById(id);
  while (div.children.length > 0) {
    for (child of div.children) {
      child.remove();
    }
  }
}


function video(item) {
  //console.log(item.getAttribute("idvideo"));
  //removeAll('conteudo')
  /*var div = novoElemento('div', 'teste')
    var elem = novoElemento('iframe', 'videoplay')
    elem.setAttribute("width","600")
    elem.setAttribute("heigth","350")
    elem.setAttribute("allow","autoplay")
    elem.setAttribute("allowfullscreen")

    document.getElementsByClassName("conteudo")[0].removeAll
    document.getElementsByClassName("conteudo")[0].appendChild(div)
    document.getElementsByClassName("teste")[0].appendChild(elem)*/
  
  let id = item.getAttribute("idvideo");
    //console.log(link)

  //var dir = "http://localhost:3000/";seriesflix.samsites.tech
  var dir = "https://seriesflix.samsites.tech/";
  window.location.assign(dir + "assistir.html?id="+id);
  //await new Promise(r => setTimeout(r, 1000));
  
}

function carregaVideo(){
  let id = variavel = queryString("id")
  let link = "https://drive.google.com/file/d/" + id + "/preview?usp=drivesdk";
  document.getElementsByClassName("videoplay")[0].setAttribute("src", link);
}

function queryString(parameter) {  
  var loc = location.search.substring(1, location.search.length);   
  var param_value = false;   
  var params = loc.split("&");   
  for (i=0; i<params.length;i++) {   
      param_name = params[i].substring(0,params[i].indexOf('='));   
      if (param_name == parameter) {                                          
          param_value = params[i].substring(params[i].indexOf('=')+1)   
      }   
  }   
  if (param_value) {   
      return param_value;   
  }   
  else {   
      return undefined;   
  }   
}

function paginacao() {
  const paginationNumbers = document.getElementById("pagination-numbers");
  const paginatedList = document.getElementById("paginated-list");
  const listItems = paginatedList.querySelectorAll(".card-compra");
  //console.log(listItems.length)
  const nextButton = document.getElementById("next-button");
  const prevButton = document.getElementById("prev-button");

  const paginationLimit = 9;
  const pageCount = Math.ceil(listItems.length / paginationLimit);
  let currentPage = 1;

  const disableButton = (button) => {
    button.classList.add("disabled");
    button.setAttribute("disabled", true);
  };

  const enableButton = (button) => {
    button.classList.remove("disabled");
    button.removeAttribute("disabled");
  };

  const handlePageButtonsStatus = () => {
    if (currentPage === 1) {
      disableButton(prevButton);
    } else {
      enableButton(prevButton);
    }

    if (pageCount === currentPage) {
      disableButton(nextButton);
    } else {
      enableButton(nextButton);
    }
  };

  const handleActivePageNumber = () => {
    document.querySelectorAll(".pagination-number").forEach((button) => {
      button.classList.remove("active");
      const pageIndex = Number(button.getAttribute("page-index"));
      if (pageIndex == currentPage) {
        button.classList.add("active");
      }
    });
  };

  const appendPageNumber = (index) => {
    const pageNumber = document.createElement("button");
    pageNumber.className = "pagination-number";
    pageNumber.innerHTML = index;
    pageNumber.setAttribute("page-index", index);
    pageNumber.setAttribute("aria-label", "Page " + index);

    paginationNumbers.appendChild(pageNumber);
  };

  const getPaginationNumbers = () => {
    for (let i = 1; i <= pageCount; i++) {
      appendPageNumber(i);
    }
  };

  const setCurrentPage = (pageNum) => {
    currentPage = pageNum;

    handleActivePageNumber();
    handlePageButtonsStatus();

    const prevRange = (pageNum - 1) * paginationLimit;
    const currRange = pageNum * paginationLimit;

    listItems.forEach((item, index) => {
      //item.classList.removeAll
      item.classList.add("hidden");
      if (index >= prevRange && index < currRange) {
        item.classList.remove("hidden");
        //item.classList.add("card-compra");
      }
    });
  };

  //window.addEventListener("load", () => {
  getPaginationNumbers();
  setCurrentPage(1);

  prevButton.addEventListener("click", () => {
    setCurrentPage(currentPage - 1);
  });

  nextButton.addEventListener("click", () => {
    setCurrentPage(currentPage + 1);
  });

  document.querySelectorAll(".pagination-number").forEach((button) => {
    const pageIndex = Number(button.getAttribute("page-index"));

    if (pageIndex) {
      button.addEventListener("click", () => {
        setCurrentPage(pageIndex);
      });
    }
  });
  //});
}
