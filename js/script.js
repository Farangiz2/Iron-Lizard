document.addEventListener("DOMContentLoaded", function() {
    fetch("api/getCars.php")
    .then(response => response.json())
    .then(data => {
        const carList = document.getElementById("carList");
        data.forEach(car => {
            const carDiv = document.createElement("div");
            carDiv.classList.add("car");
            carDiv.innerHTML = `
                <h2>${car.car_name}</h2>
                <p>Price: ${car.car_price}</p>
                <p>${car.car_description}</p>
                <img src="${car.car_image}" alt="${car.car_name}">
            `;
            carList.appendChild(carDiv);
        });
    })
    .catch(error => console.error('Error:', error));
});
