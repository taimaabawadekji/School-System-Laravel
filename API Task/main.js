fetch("https://fakestoreapi.com/products")
  .then((response) => response.json())
  .then((data) => {
    const container = document.getElementById("product-list");
    data.forEach((product) => {
      const card = document.createElement("div");
      card.className = "product-card";
      card.innerHTML = `
        <img src="${product.image}" alt="">
        <h3>${product.title}</h3>
        <p class="price">$${product.price}</p>
        <p class="desc">${product.description.substring(0, 100)}...</p>
        <button>Add to Cart</button>
      `;

      container.appendChild(card);
    });
  });

//Add Product
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("productForm");
  if (!form) return;

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const product = {
      title: document.getElementById("title").value,
      price: parseFloat(document.getElementById("price").value),
      description: document.getElementById("description").value,
      category: document.getElementById("category").value,
      image: document.getElementById("image").value,
    };

    fetch("https://fakestoreapi.com/products", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(product),
    })
      .then((res) => res.json())
      .then((data) => {
        console.log("Product added:", data);
        alert("Product submitted successfully!");
        form.reset();
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("Error submitting product.");
      });
  });
});
