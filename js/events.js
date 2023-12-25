function printId(e) {
    const div = e.target;
    console.log(div.id);
}

function deletePhoto(e) {
    const formData = new FormData();
    formData.append("file", document.getElementById(formId).files[0]);
    console.log(document.getElementById(formId).files[0]);

    fetch("php/upload.php", {
        method: "POST",
        body: formData
    })
        .then((response) => response.text())
        .then((data) => {
            window.location.reload();
        })
        .catch((error) => {
            console.error("Error:",error);
        });
}