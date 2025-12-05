document.getElementById("updateBtn").onclick = function () {
  let inputs = document.querySelectorAll("#profileForm input");
  inputs.forEach((input) => (input.disabled = false));
  document.getElementById("saveBtn").style.display = "inline-block";
  document.getElementById("updateBtn").style.display = "none";
};


const logoutBtn = document.getElementById("logoutBtn");
const deleteBtn = document.getElementById("deleteBtn");


const profileBtn = document.getElementById("profileBtn");
const searchBtn = document.getElementById("searchBtn");
const searchBar = document.getElementById("searchBar");



if ('/profile') {
    logoutBtn.classList.remove("hide");
    deleteBtn.classList.remove("hide");
    productBtn.classList.remove("hide");

        profileBtn.classList.add("hide");
        searchBtn.classList.add("hide");
        searchBar.classList.add("hide");
} else {
    logoutBtn.classList.add("hide");
    deleteBtn.classList.add("hide");

}

