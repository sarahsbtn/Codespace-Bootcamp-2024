console.log("testing");

const userItem = document.querySelector("#user-item");
const addToCart = document.querySelector("#add-to-list");
const items = document.querySelector(".items");
const product = document.querySelector(".todo-item");

// Create item elements
function createNewItem(string) {
  let div = document.createElement("div");
  let h4 = document.createElement("h4");
  let checkbox = document.createElement("input"); // Create a checkbox
  let iconWrapper = document.createElement("div"); // Create a wrapper for icons
  let spanEdit = document.createElement("span");
  let spanDelete = document.createElement("span");
  let iDelete = document.createElement("i");
  let iEdit = document.createElement("i");

  div.setAttribute("id", `div_${string}`);
  checkbox.setAttribute("id",`c_${string}`);
  iEdit.setAttribute("id",`e_${string}`);
  spanEdit.setAttribute("class", "ed");
  spanEdit.setAttribute("id", `${string}`);
  spanDelete.setAttribute("class", "del");
  h4.setAttribute("id", `h4_${string}`);
  checkbox.setAttribute("type", "checkbox"); // Set checkbox type
  div.style.borderBottom = "2px solid #000";

  spanDelete.appendChild(iDelete).classList.add("delete");
  spanDelete.appendChild(iDelete).classList.add("bi");
  spanDelete.appendChild(iDelete).classList.add("bi-trash3-fill");

  spanEdit.appendChild(iEdit).classList.add("mark-complete");
  // spanEdit.appendChild(iEdit).classList.add("cross");
  spanEdit.appendChild(iEdit).classList.add("bi");
  spanEdit.appendChild(iEdit).classList.add("bi-pencil-fill");

  // Create icon wrapper            
  iconWrapper.classList.add("icons");
  iconWrapper.appendChild(spanEdit);
  iconWrapper.appendChild(spanDelete);

  items.appendChild(div).classList.add("todo-item");
  div.appendChild(checkbox); // Add checkbox to the item
  div.appendChild(h4).innerText = string;
  div.appendChild(iconWrapper); // Add icon wrapper

  // Checkbox event listener
  checkbox.addEventListener("change", () => {
    h4.classList.toggle("complete", checkbox.checked);
  });

  // Edit event listener
  spanEdit.addEventListener("click", () => {
    editItem(h4);
  });

  removeItem();
}

// Function to edit item on list 
function editItem(h4) {
  const newText = prompt("Edit your item:", h4.innerText);
  if (newText !== null && newText.trim() !== "") {
    h4.innerText = newText.trim();
  }
}

function removeItem() {
  const els = document.querySelectorAll(".delete");
  els.forEach(el => {
    el.addEventListener("click", (e) => {
      const itemDiv = e.target.closest(".todo-item");
      if (itemDiv) {
        itemDiv.remove(); // Remove the entire item div            
      }
    });
  });
}

addToCart.addEventListener("click", () => {
  let newItem = userItem.value;
  if (newItem) {
    createNewItem(newItem);
    userItem.value = ''; // Clears input box after submit 
  }
});

// Enter key for input
userItem.addEventListener("keydown", (e) => {
  if (e.key === "Enter") {
    let newItem = userItem.value.trim();
    if (newItem) {
      createNewItem(newItem);
      userItem.value = ''; // Clears input box after enter key
    }
  }
});

function setupClearList() { // Clears the entire list
  const clearListButton = document.querySelector("#clear-full-list");
  clearListButton.addEventListener("click", () => {
    items.innerHTML = '';
  });
}

setupClearList();
