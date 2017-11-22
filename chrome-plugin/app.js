// how der mangler kommentare her hilsen nichlas
var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        // console.log(this.responseText);
        var myArr = JSON.parse(this.responseText);
        console.log(myArr);
        var txt = "";
        var cityName;
        for (i = 0; i < myArr.length; i++) {
            cityName = myArr[i].CityName;
            pop = myArr[i].Population;
            console.log(cityName);
            if (cityName != null) {
                txt = txt + cityName + " - " + pop + " indbyggere. <br />"; }
        }
        document.getElementById("demo").innerHTML = txt;


    }
};
xmlhttp.open("GET", "http://localhost/Eksamensrepetition/restful_api.php#", true);
xmlhttp.send();
