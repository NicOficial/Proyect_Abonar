document.getElementById('dniForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const dniFront = document.getElementById('dniFront').files[0];
    const dniBack = document.getElementById('dniBack').files[0];

    if (!dniFront || !dniBack) {
        alert('Por favor, sube ambos lados del DNI.');
        return;
    }

    const formData = new FormData();
    formData.append('file_front', dniFront);
    formData.append('file_back', dniBack);

    // Enviar datos a la API de ID Analyzer (reemplaza con tu API Key)
    fetch('https://api.idanalyzer.com', {
        method: 'POST',
        body: formData,
        headers: {
            'Authorization': 'Bearer YOUR_ID_ANALYZER_API_KEY'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data && data.result) {
            alert('DNI validado con éxito!');
        } else {
            alert('El DNI no es válido.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un error al validar el DNI.');
    });
});
