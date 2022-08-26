document.querySelector('#b2').style.display = 'none';
document.querySelector('#b3').style.display = 'none';

function changeDisplay (dis1, dis2, dis3) {
    document.querySelector('#' + dis1).style.display = 'block';
    document.querySelector('#' + dis2).style.display = 'none';
    document.querySelector('#' + dis3).style.display = 'none';
}