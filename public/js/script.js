document.addEventListener('DOMContentLoaded', () => {
    const customSelectWrapper = document.querySelector('.custom-select-wrapper');
    const customDropdownToggle = customSelectWrapper.querySelector('.custom-dropdown-toggle');
    const selectedDisplayText = customDropdownToggle.querySelector('.selected-display');
    const dropdownMenu = customSelectWrapper.querySelector('.custom-dropdown-menu');
    const idToSelect = customSelectWrapper.getAttribute('data-target-select-id'); 
    // console.log(idToSelect); 
    const nativeSelect = customSelectWrapper.querySelector('#'+idToSelect);

    const downArrow = customDropdownToggle.querySelector('.dropdown-arrow-down');
    const upArrow = customDropdownToggle.querySelector('.dropdown-arrow-up');


    // Function to populate the custom dropdown menu from the native select
    function populateDropdownMenu() {
        dropdownMenu.innerHTML = ''; // Clear existing items
        const options = Array.from(nativeSelect.options);

        options.forEach(option => {
            // Skip the disabled placeholder option from being added to the list
            if (option.disabled && option.value === "") {
                return;
            }

            const listItem = document.createElement('li');
            const dropdownItem = document.createElement('a');
            dropdownItem.classList.add('dropdown-item');
            dropdownItem.href = '#';
            dropdownItem.dataset.value = option.value;
            dropdownItem.dataset.text = option.textContent;

            const itemText = document.createElement('span');
            itemText.textContent = option.textContent;
            itemText.classList.add('flex-grow-1', 'text-truncate');

            // --- CHANGED: Create an <img> element for the tick mark SVG ---
            const tickMark = document.createElement('img');
            tickMark.classList.add('tick-mark');
            tickMark.src = base_url + 'public/images/vector-20.svg'; // Set the path to your SVG image
            tickMark.alt = 'Selected'; // Add alt text for accessibility
            // --- END CHANGED ---

            dropdownItem.appendChild(itemText);
            dropdownItem.appendChild(tickMark);
            listItem.appendChild(dropdownItem);
            dropdownMenu.appendChild(listItem);

            if (option.selected) {
                dropdownItem.classList.add('selected');
            }
        });
    }

    populateDropdownMenu();

    dropdownMenu.addEventListener('click', (event) => {
        const clickedItem = event.target.closest('.dropdown-item');
        if (clickedItem) {
            event.preventDefault();

            nativeSelect.value = clickedItem.dataset.value;

            selectedDisplayText.textContent = clickedItem.dataset.text;
            selectedDisplayText.classList.remove('placeholder-text');

            const currentSelected = dropdownMenu.querySelector('.dropdown-item.selected');
            if (currentSelected) {
                currentSelected.classList.remove('selected');
            }

            clickedItem.classList.add('selected');
        }
    });

    customDropdownToggle.addEventListener('show.bs.dropdown', function () {
        downArrow.classList.remove('active-arrow');
        upArrow.classList.add('active-arrow');
    });

    customDropdownToggle.addEventListener('hide.bs.dropdown', function () {
        upArrow.classList.remove('active-arrow');
        downArrow.classList.add('active-arrow');
    });
});
