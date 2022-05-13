class Messages {
    static getSuccessMessage(message) {
        let successMessage = `
        <div class="alert alert-success" role="alert">
            <strong>Éxito!</strong> ${message}
        </div>
        `;

        return successMessage;
    }

    static getErrorMessage(response) {
        let errors = "";

        let object = response.responseJSON.errors;
        for (const key in object) {
            if (Object.hasOwnProperty.call(object, key)) {
                errors += `<li>${object[key]}</li>`;
            }
        }

        let errorMessage = `
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            <strong>Opps!</strong> ${response.responseJSON.message}
            <ul>
                ${errors}
            </ul>
        </div>
        `;

        return errorMessage;
    }

    static getSimpleErrorMessage(message) {
        let simpleErrorMessage = `
        <div class="alert alert-warning" role="alert">
            <strong>Éxito!</strong> ${message}
        </div>
        `;

        return simpleErrorMessage;
    }
}

export default Messages;
