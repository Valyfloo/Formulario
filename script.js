function handleFormSubmit(event) {
    event.preventDefault(); // Previene el comportamiento predeterminado del formulario

    const form = event.target;
    const formData = new FormData(form);

    fetch('registro.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Crea un contenedor para el mensaje emergente
            const messageBox = document.createElement('div');
            messageBox.className = 'message-box';
            messageBox.textContent = 'Registro exitoso';
            document.body.appendChild(messageBox);

            // Opcional: reinicia el formulario
            form.reset(); 

            // Opcional: oculta el mensaje después de 3 segundos
            setTimeout(() => {
                messageBox.style.display = 'none';
            }, 3000);
        } else {
            alert('Error al registrar: ' + data.message);
        }
    })
    .catch(error => {
        alert('Error de red: ' + error.message);
    });
}

// Asigna el manejador al evento submit del formulario
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', handleFormSubmit);
    }
});
