const form = document.querySelector('.login-form');
const responseDiv = document.getElementById('responseDiv');

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    const response = await fetch(form.action, {
        method: 'POST',
        body: formData
    });

    const result = await response.json();
    // Clear prevois response messages
    responseDiv.innerHTML = '';
    responseDiv.classList.add('show');

    // Check if the response contains errors
    if(result.status === 'error') {
        let message = result.message;

          
          responseDiv.innerHTML = `<p>${message}</[p]`;
          responseDiv.style.color = 'Red'; // To make the message text red
   
        } else if (result.status === 'success') {
        window.location.href = '/dashboard'; // Redirect to dashboard
    } else {

        responseDiv.innerHTML = '<p>Unexpected sever response</p>'
        responseDiv.style.color = 'Red'; // To make the message text red
    }
});