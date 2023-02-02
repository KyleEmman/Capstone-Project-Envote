function convertPDF(nameOfFile) {
    const certificate = document.querySelector('#certificate')
    const configuration = {
        margin: 2,
        filename: nameOfFile,
        jsPDF: {orientation: 'landscape'}
    }
    html2pdf(certificate, configuration)   
}