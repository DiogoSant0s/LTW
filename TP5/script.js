function attachBuyEvents() {
    const buttons = document.querySelectorAll('#products button');
    for (const button of buttons) {
        button.addEventListener('click', function(e) {
            // Get the parent article of the clicked button
            const parentArticle = e.currentTarget.parentElement;
            
            // Get the value of the data-id attribute of the parent article
            const dataId = parentArticle.getAttribute('data-id');
            
            // Get the name of the product
            const productName = parentArticle.querySelector('.name').textContent;
            
            // Get the price of the product
            const productPrice = parseInt(parentArticle.querySelector('.price').textContent);
            
            // Get the chosen quantity
            const productQuantity = parseInt(parentArticle.querySelector('.quantity').value);
            
            // Calculate the total price
            const totalPrice = productPrice * productQuantity;
            
            // Get the cart table body
            const cartTable = document.querySelector('#cart table tbody');
            if (!cartTable) {
                const newTbody = document.createElement('tbody');
                document.querySelector('#cart table').appendChild(newTbody);
            }
            
            // Check if a row with the same id already exists in the cart
            let existingRow = document.querySelector(`#cart table tbody tr[data-id="${dataId}"]`);
            if (existingRow) {
                // Update the existing row's values
                const quantityCell = existingRow.querySelector('.quantity');
                const totalCell = existingRow.querySelector('.total');
                const newQuantity = parseInt(quantityCell.textContent) + productQuantity;
                quantityCell.textContent = newQuantity;
                totalCell.textContent = productPrice * newQuantity;
            } else {
                // Create a new row
                const newRow = document.createElement('tr');
                newRow.setAttribute('data-id', dataId);
                
                // Create data cells for the row
                const idCell = document.createElement('td');
                idCell.textContent = dataId;
                
                const nameCell = document.createElement('td');
                nameCell.textContent = productName;
                
                const quantityCell = document.createElement('td');
                quantityCell.classList.add('quantity');
                quantityCell.textContent = productQuantity;
                
                const priceCell = document.createElement('td');
                priceCell.textContent = productPrice;
                
                const totalCell = document.createElement('td');
                totalCell.classList.add('total');
                totalCell.textContent = totalPrice;
                
                const deleteCell = document.createElement('td');
                const deleteLink = document.createElement('a');
                deleteLink.href = '#';
                deleteLink.textContent = 'Delete';
                deleteLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    newRow.remove();
                    updateCartTotal();
                });
                deleteCell.appendChild(deleteLink);
                
                // Append the cells to the row
                newRow.appendChild(idCell);
                newRow.appendChild(nameCell);
                newRow.appendChild(quantityCell);
                newRow.appendChild(priceCell);
                newRow.appendChild(totalCell);
                newRow.appendChild(deleteCell);
                
                // Append the row to the table body
                document.querySelector('#cart table tbody').appendChild(newRow);
            }
            
            // Update the cart's total
            updateCartTotal();
        });
    }
}

function updateCartTotal() {
    const totalCell = document.querySelector('#cart tfoot th:last-child');
    const total = Array.from(document.querySelectorAll('#cart table tbody tr .total'))
        .reduce((sum, cell) => sum + parseInt(cell.textContent), 0);
    totalCell.textContent = total;
}

attachBuyEvents();