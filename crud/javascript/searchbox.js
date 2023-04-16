
    var searchInput = document.getElementById('search__input');
    searchInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            document.getElementById('search-form').submit();
        }
    });
