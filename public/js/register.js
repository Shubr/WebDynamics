const form = document.querySelector('form');
const responseDiv = document.getElementById('response');

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    const response = await fetch (form.action, {
        method: form.method,
        body: formData
    });

    const result = await response.json();
    // Clear previous response messages
    responseDiv.innerHTML = "";
    // Check if the response contains errors
    if(result.status === 'error'){
        let message = result.message;

        // Check if the error message is a unique constratnt volation
        if(message.includes('Integrity constraint violation')) {
            if (message.includes('Duplicate entry')) {
                message = 'Username already exists.';
            }
        }
         // Show the customised or orginal error message
         responseDiv.innerHTML = `<p>${message}</[p]`;
        
        } else if (result.status === 'success') {
            window.location.href = '/login';
        } else { 
            responseDiv.innerHTML = '<p>Unexpected sever response</p>'
        }
});