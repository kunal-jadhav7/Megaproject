document.addEventListener("DOMContentLoaded", function() {
    fetch('get_children.php')
        .then(response => response.json())
        .then(data => {
            let childrenList = document.getElementById('childrenList');
            childrenList.innerHTML = '';

            data.forEach(child => {
                let childDiv = document.createElement('div');
                childDiv.className = 'child';
                childDiv.innerHTML = `
                    <h3>${child.name}</h3>
                    <p><strong>Age:</strong> ${child.age}</p>
                    <p><strong>Last Seen Location:</strong> ${child.last_seen_location}</p>
                    <p>${child.description}</p>
                    <img src="${child.photo}" alt="${child.name}" width="200">
                `;
                childrenList.appendChild(childDiv);
            });
        })
        .catch(error => console.error('Error fetching children:', error));
});
