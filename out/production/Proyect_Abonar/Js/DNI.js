document.getElementById('uploadForm').addEventListener('submit', async function(event) {
    event.preventDefault();
    
    const formData = new FormData();
    const files = document.getElementById('fileInput').files;
    
    for (let i = 0; i < files.length; i++) {
        formData.append('files', files[i]);
    }

    try {
        const response = await fetch('/upload', {
            method: 'POST',
            body: formData
        });
        const data = await response.json();
        document.getElementById('response').DNI.html = `<p>${data.message}</p>`;
    } catch (error) {
        console.error('Error:', error);
    }
});
