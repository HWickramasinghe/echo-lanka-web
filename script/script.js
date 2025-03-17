const addProduct = document.querySelectorAll("#add-item");
const cart = document.getElementById("cart");
const cartItems = document.getElementById("cart-items");
const cartPrice = document.getElementById("cart-price");
const modalTableBody = document.getElementById("modal-tbody");
const products = document.getElementById("products");

let data = {
  items: 0,
  price: 0,
};

products.addEventListener("click", (e) => {
  if (e.target.id === "add-item") {
    let productQtyValue = e.target.parentNode.querySelector("#product-qty");
    const productQty = parseInt(productQtyValue.value);

    const productName =
      e.target.parentNode.querySelector("#product-name").textContent;
    const productPrice = parseInt(
      e.target.parentNode
        
        
    );

    // Data structure
    data.price += productPrice * productQty;
    data.items++;

    // Read into DOM
    const itemHtml = `<i class="fa fa-shopping-cart" aria-hidden="true"></i> <br> <span>${data.items} items</span>`;
    const priceHtml = `<span>$ ${data.price}</span>`;
    const modalHtml = `<tr> <td id="product-name">${productName}</td> <td id="product-qty">${productQty}</td> <td id="product-price">${
      productPrice * productQty
    }</td> <td><button type="button" class="btn-product" id="delete-item">Delete</button></td> </tr>`;

    cartItems.innerHTML = itemHtml;
    cartPrice.innerHTML = priceHtml;

    modalTableBody.insertAdjacentHTML("beforeend", modalHtml);

    productQtyValue.value = 1; //reseting value
  }
});

//delete item
const deleteItem = document.getElementById("delete-item");

modalTableBody.addEventListener("click", (e) => {
  if (e.target.id === "delete-item") {
    const modalPrice = parseInt(
      e.target.parentNode.parentNode.querySelector("#product-price").textContent
    );

    data.price -= modalPrice;
    data.items--;

    const priceHtml = `<span>$ ${data.price}</span>`;
    const itemHtml = `<i class="fa fa-shopping-cart" aria-hidden="true"></i> <br> <span>${data.items} items</span>`;
    cartPrice.innerHTML = priceHtml;
    cartItems.innerHTML = itemHtml;

    e.target.parentNode.parentNode.remove();
  }
});
