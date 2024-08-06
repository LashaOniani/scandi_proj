document.addEventListener("DOMContentLoaded", function() {
    const productForm = document.getElementById("product_form");
    const selectDropdown = document.getElementById("productType");
    const messageForm = document.getElementById("messageform");
    const formLabels = document.getElementById("formlabels_add");
    const formInputs = document.getElementById("forminputs_add");

    function validateInput(input) {

        if (!input.value) {
            input.classList.add("red_input");
        } else {
            input.classList.remove("red_input");
        }
    }

    selectDropdown.addEventListener("change", e => {
        const selectedItem = selectDropdown.value;

        let label = '';
        let inpField = '';
        let message = '';

        if (selectedItem === "DVD") {
            label = `<label for="size">Size (MB)</label>`;
            inpField = `<input id="size" type="number" name="size" placeholder="Size" required>`;
            message = `<p>Please, provide size</p>`;
        } else if (selectedItem === "Book") {
            label = `<label for="weight">Weight (Kg)</label>`;
            inpField = `<input id="weight" type="number" name="weight" placeholder="Weight" required>`;
            message = `<p>Please, provide weight</p>`;
        } else if (selectedItem === "Furniture") {
            label = `
            <label for="height">Height (cm)</label>
            <label for="width">Width (cm)</label>
            <label for="length">Length (cm)</label>`;
            inpField = `
            <input id="height" type="number" name="height" placeholder="Height" required>
            <input id="width" type="number" name="width" placeholder="Width" required>
            <input id="length" type="number" name="length" placeholder="Length" required>`;
            message = `<p>Please, provide dimensions</p>`;
        }

        formLabels.innerHTML = label;
        formInputs.innerHTML = inpField;
        messageForm.innerHTML = message;

        const newInputs = formInputs.querySelectorAll("input");
        newInputs.forEach(input => {
            input.addEventListener("input", () => validateInput(input));
            input.addEventListener("blur", () => validateInput(input));
        });
    });

    const initialInputs = productForm.querySelectorAll("input");
    initialInputs.forEach(input => {
        input.addEventListener("input", () => validateInput(input));
        input.addEventListener("blur", () => validateInput(input));
    });

    productForm.addEventListener("submit", () => {
        console.log("display error")
    })

});