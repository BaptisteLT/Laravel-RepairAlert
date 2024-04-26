//TODO: ne pas permettre de mettre du texte dans les champs km, month et year

document.getElementById('years-input').addEventListener('keyup', function(e){
    let year = parseFloat(this.value);
    let monthValue = (year*12).toFixed(2);
    monthValue = parseFloat(monthValue).toString();
    if(monthValue !== 'NaN')
    {
        document.getElementById('months-input').value = monthValue;
    }
    else
    {
        document.getElementById('months-input').value = '';
    }
})

document.getElementById('months-input').addEventListener('keyup', function(e){
    let month = parseFloat(this.value);
    let yearValue = (month/12).toFixed(2);
    yearValue = parseFloat(yearValue).toString();
    if(yearValue !== 'NaN')
    {
        document.getElementById('years-input').value = yearValue;
    }
    else
    {
        document.getElementById('years-input').value = '';
    }
})
