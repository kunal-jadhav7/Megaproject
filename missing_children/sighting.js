document.addEventListener("DOMContentLoaded", function() {
    let childDropdown = document.getElementById('child_id');

    fetch('get_children.php')
        .then(response => response.json())
        .then(data => {
            data.forEach(child => {
                let option = document.createElement('option');
                option.value = child.id;
                option.textContent = `${child.name} (Age: ${child.age})`;
                childDropdown.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching children:', error));
});
