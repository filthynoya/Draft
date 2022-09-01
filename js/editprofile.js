document.querySelector('#b2').style.display = 'none';
document.querySelector('#b3').style.display = 'none';
document.querySelector('#b4').style.display = 'none';

function changeDisplay (dis1, dis2, dis3, dis4) {
    document.querySelector('#' + dis1).style.display = 'block';
    document.querySelector('#' + dis2).style.display = 'none';
    document.querySelector('#' + dis3).style.display = 'none';
    document.querySelector('#' + dis4).style.display = 'none';
}

function update_img () {
    var selectedFile = document.getElementById('imgupload').files[0];
    var img = document.getElementById('propicimg')

    var reader = new FileReader();
    reader.onload = function(){
        img.src = this.result
        console.log (this.result)
    }
    reader.readAsDataURL(selectedFile);
}