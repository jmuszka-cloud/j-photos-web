function uploadToServer(formId) {

    const formData = new FormData();
    formData.append("file", document.getElementById(formId).files[0]);
    console.log(document.getElementById(formId).files[0]);

    fetch("php/upload.php", {
        method: "POST",
        body: formData
    })
        .then((response) => response.text())
        .then((data) => {
            
        })
        .catch((error) => {
            console.error("Error:",error);
        });
}