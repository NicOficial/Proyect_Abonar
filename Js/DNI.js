const apiKey = 'YOUR_ID_ANALYZER_API_KEY';

const formData = new FormData();
formData.append('file_front', dniFront);
formData.append('file_back', dniBack);

fetch(`https://api.idanalyzer.com`, {
    method: 'POST',
    body: formData,
    headers: {
        'Authorization': `Bearer ${apiKey}`
    }
})
.then(response => response.json())
.then(data => {
    // Procesar los resultados de la verificación de identidad
    console.log(data);
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
