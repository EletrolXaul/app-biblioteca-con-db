async function cercaLibro() {
    const titolo = document.getElementById('title').value;
    const authorSelect = document.getElementById('author_id');
    const authorName = authorSelect.options[authorSelect.selectedIndex].text;
    
    if (!titolo || !authorName) {
        alert('Inserisci sia il titolo che l\'autore');
        return;
    }
    
    try {
        const query = `intitle:"${titolo}" inauthor:"${authorName}"`;
        const response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${encodeURIComponent(query)}&langRestrict=it&maxResults=10`);
        const data = await response.json();
        
        if (data.items && data.items.length > 0) {
            const book = data.items.find(item => {
                const info = item.volumeInfo;
                const matchTitle = info.title.toLowerCase().includes(titolo.toLowerCase());
                const matchAuthor = info.authors && info.authors.some(author => 
                    author.toLowerCase().includes(authorName.toLowerCase())
                );
                return matchTitle && matchAuthor;
            })?.volumeInfo || data.items[0].volumeInfo;

            await verificaISBN(book);
            await verificaAnno(book);
            
            console.log('Dati libro trovati:', book);
        } else {
            alert('Nessun risultato trovato per questo libro');
        }
    } catch (error) {
        console.error('Errore durante la ricerca:', error);
        alert('Errore durante la ricerca dei dati del libro');
    }
}

async function verificaISBN(book) {
    if (book.industryIdentifiers) {
        const isbn13 = book.industryIdentifiers.find(id => id.type === 'ISBN_13');
        const isbn10 = book.industryIdentifiers.find(id => id.type === 'ISBN_10');
        const isbn = isbn13 || isbn10;
        
        if (isbn) {
            const isbnValue = isbn.identifier.replace(/[^0-9X]/g, '');
            const isbnInput = document.getElementById('isbn');
            const isbnStatus = document.getElementById('isbn_status');
            
            if (isbnInput) {
                isbnInput.value = isbnValue;
            }
            
            if (isbnStatus) {
                const currentIsbn = isbnInput.value;
                if (currentIsbn === isbnValue) {
                    isbnStatus.innerHTML = '✅';
                    isbnStatus.title = 'ISBN corretto';
                } else {
                    isbnStatus.innerHTML = '⚠️';
                    isbnStatus.title = `ISBN trovato: ${isbnValue}`;
                }
            }
        }
    }
}

async function verificaAnno(book) {
    if (book.publishedDate) {
        const date = new Date(book.publishedDate);
        const yearInput = document.getElementById('publication_year');
        const yearStatus = document.getElementById('year_status');
        let foundYear;
        
        if (!isNaN(date.getFullYear())) {
            foundYear = date.getFullYear();
        } else {
            const yearMatch = book.publishedDate.match(/\d{4}/);
            if (yearMatch) {
                foundYear = yearMatch[0];
            }
        }
        
        if (foundYear && yearInput) {
            yearInput.value = foundYear;
            
            if (yearStatus) {
                const currentYear = yearInput.value;
                if (currentYear == foundYear) {
                    yearStatus.innerHTML = '✅';
                    yearStatus.title = 'Anno di pubblicazione corretto';
                } else {
                    yearStatus.innerHTML = '⚠️';
                    yearStatus.title = `Anno trovato: ${foundYear}`;
                }
            }
        }
    }
}