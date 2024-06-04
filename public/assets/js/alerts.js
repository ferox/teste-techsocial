document.addEventListener('DOMContentLoaded', function() {
    if (localStorage.getItem('createAlert') === 'true') {
        const alertElement = document.getElementById('createAlert');
        alertElement.style.display = 'block';
        localStorage.removeItem('createAlert');
    }

    if (localStorage.getItem('errorCreateAlert') === 'true') {
        const alertElement = document.getElementById('errorCreateAlert');
        alertElement.style.display = 'block';
        localStorage.removeItem('errorCreateAlert');
    }

    if (localStorage.getItem('deleteAlert') === 'true') {
        const alertElement = document.getElementById('deleteAlert');
        alertElement.style.display = 'block';
        localStorage.removeItem('deleteAlert');
    }

    if (localStorage.getItem('errorDeleteAlert') === 'true') {
        const alertElement = document.getElementById('errorDeleteAlert');
        alertElement.style.display = 'block';
        localStorage.removeItem('errorDeleteAlert');
    }

    if (localStorage.getItem('updateAlert') === 'true') {
        const alertElement = document.getElementById('updateAlert');
        alertElement.style.display = 'block';
        localStorage.removeItem('updateAlert');
    }

    if (localStorage.getItem('errorUpdateAlert') === 'true') {
        const alertElement = document.getElementById('errorUpdateAlert');
        alertElement.style.display = 'block';
        localStorage.removeItem('errorUpdateAlert');
    }

    if (localStorage.getItem('notFoundUserAlert') === 'true') {
        const alertElement = document.getElementById('notFoundUserAlert');
        alertElement.style.display = 'block';
        localStorage.removeItem('notFoundUserAlert');
    }
});
