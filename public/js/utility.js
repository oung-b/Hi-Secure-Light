function fetchUtility(url, formData, modal = false) {
    fetch(url, {
        method: "POST",
        body: formData
    }).then(response => {
        if (response.ok) {
            if (modal) {
                showModal(response.url);
            } else window.location.href = response.url;
        } else if (response.status === 419) {
            window.location.reload();
        } else return response.json();
    }).then(data => {
        let validationTxt = document.querySelectorAll('.validation-txt');

        validationTxt.forEach(element => {
            element.style.display = 'none';
            element.innerHTML = '';
            for (let key in data) {
                if (element.id === "validation-" + key) {
                    element.style.display = '';
                    element.innerHTML = `<i class="xi-error"></i> ${data[key][0]}`;
                }
            }
        })
    })
}

function deleteUtility(url) {
    let deleteForm = document.getElementById('delete');
    let checkedCheckbox = document.querySelectorAll('.check-input:checked');
    let deleteId = Array.from(checkedCheckbox).map(checkbox => checkbox.id);

    deleteId.forEach(id => {
        let deleteInput = document.createElement('input');
        deleteInput.setAttribute('type', 'hidden');
        deleteInput.setAttribute('name', 'id[]');
        deleteInput.value = id;
        deleteForm.appendChild(deleteInput);
    })

    let formData = new FormData(deleteForm);
    fetchUtility(url, formData)
}

function showModal(responseUrl = null) {
    document.querySelector('.modal-alert').style.display = '';
    if (responseUrl) {
        document.getElementById('modal-button').onclick = function () {
            window.location.href = responseUrl;
        };
    }
}

function hideModal() {
    document.querySelector('.modal-alert').style.display = 'none';
    document.querySelectorAll('.validation-txt').forEach(element => {
        element.style.display = 'none';
        element.innerHTML = '';
    })
}

function showConfirmModal(url = null) {
    document.querySelector('.modal-confirm').style.display = '';
}

function hideConfirmModal() {
    document.querySelector('.modal-confirm').style.display = 'none';
    document.querySelectorAll('.validation-txt').forEach(element => {
        element.style.display = 'none';
        element.innerHTML = '';
    })
}
