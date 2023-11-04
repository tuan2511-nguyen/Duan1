document.getElementById("upload-button").addEventListener("click", function() {
    document.getElementById("file-upload").click();
});

document.getElementById("file-upload").addEventListener("change", function() {
    var selectedFile = this.files[0];
    if (selectedFile) {
        alert("File đã được chọn: " + selectedFile.name);
    }
});
