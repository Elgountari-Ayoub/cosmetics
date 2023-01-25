document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("btn").addEventListener("click", function (e) {
    e.preventDefault();
    let formAdd = document.querySelector(".form_add");
    let deleteBtn = document.createElement("BUTTON");
    // deleteBtn.classList.add("btn btn-danger");
    deleteBtn.setAttribute("class", "btn btn-danger mt-3");
    deleteBtn.innerHTML = "Delete";

    let formGroup = document.createElement("div");
    formGroup.classList.add("form-group", "mt-3");
    formGroup.setAttribute("id", "form_id");

    let inputFile = document.createElement("input");
    inputFile.setAttribute("type", "file");
    inputFile.setAttribute("class", "mt-3");
    inputFile.setAttribute("multiple", "");
    inputFile.classList.add("form-control");
    inputFile.setAttribute("name", "images[]");
    formGroup.appendChild(inputFile);

    let inputTitle = document.createElement("input");
    inputTitle.setAttribute("type", "text");
    inputTitle.classList.add("form-control");
    inputTitle.setAttribute("name", "title[]");
    inputTitle.setAttribute("placeholder", "Title");
    formGroup.appendChild(inputTitle);

    let inputPrice = document.createElement("input");
    inputPrice.setAttribute("type", "number");
    inputPrice.setAttribute("class", "mt-3");
    inputPrice.classList.add("form-control");
    inputPrice.setAttribute("name", "price[]");
    inputPrice.setAttribute("placeholder", "Price");
    formGroup.appendChild(inputPrice);

    let textArea = document.createElement("textarea");
    textArea.setAttribute("rows", "2");
    textArea.setAttribute("cols", "20");
    textArea.setAttribute("class", "mt-3");
    textArea.classList.add("form-control");
    textArea.setAttribute("name", "description[]");
    textArea.setAttribute("placeholder", "Description");
    formGroup.appendChild(textArea);

    formGroup.appendChild(deleteBtn);
    formAdd.appendChild(formGroup);

    deleteBtn.addEventListener("click", function () {
      formGroup.remove();
    });
  });
});

var searchInput = document.getElementById("search-input");
var productTitle = document.getElementsByClassName("product-title");
let found = false;
searchInput.addEventListener("input", () => {
  const arrayProd = Array.from(productTitle);
  arrayProd.forEach((ele) => {
    if (
      ele.textContent.toLowerCase().includes(searchInput.value.toLowerCase())
    ) {
      ele.parentElement.parentElement.style.display = "block";
      found = true;
    } else {
      ele.parentElement.parentElement.style.display = "none";
      console.log("not found");
    }
  });
  const notFound = document.querySelector(".not-found");
  if (!found) {
    notFound.style.visibility = "visible";
  } else {
    notFound.style.visibility = "hidden";
    notFound.style.color = "red";
    found = false;
  }
});
