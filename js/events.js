function printId(e) {
    const div = e.target;
    console.log(div.id);
}

function deletePhoto(e) {
    const formData = new FormData();
    formData.append("id", e.target.id);

    fetch("php/delete.php", {
        method: "POST",
        body: formData
    })
        .then((response) => response.text())
        .then((data) => {
            console.log("PHP: " + data);
            //TODO: refresh
        })
        .catch((error) => {
            console.error("Error:",error);
        });

    //TODO: disable context menu
}